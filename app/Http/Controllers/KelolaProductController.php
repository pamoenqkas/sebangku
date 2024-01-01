<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class KelolaProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->get();

        $products->transform(function ($product) {
            $product->formatted_updated_at = $product->updated_at->format('d  F  Y - h:m');
            return $product;
        });

        $products->transform(function ($product) {
            $product->harga  = number_format($product->harga, 0, ',', '.');
            return $product;
        });
        return view('admin.kelola-product', compact('products'));
    }

    public function create()
    {
        return view('admin.create-product');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit-product', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'image_path' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('image_path')) { 
            $destinationPath = public_path('images/');
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image_path'] = "/images/$profileImage";  
            $image_path_new = "/images/$profileImage";

        }  
        $input = Product::create([
            'name' => $request->name,
            'status' => $request->status,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'image_path' => $image_path_new,
        ]);

        // Product::create($input);

        return redirect()->route('kelola-product')->with('status', 'success');
    }


    public function destroy($id): RedirectResponse
    {
        $product = Product::find($id);

        if ($product->delete()) {
            $product->delete();
            return redirect()->route('kelola-product')->with('success', 'Product deleted successfully');
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $product = Product::find($id);

        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'image_path' => 'NULLABLE',
        ]);
        $updateData = $request->all();
        $product->name = $updateData['name'];
        $product->status = $updateData['status'];
        $product->jenis = $updateData['jenis'];
        $product->harga = $updateData['harga'];

        if ($product->save()) {
            return redirect()->route('kelola-product')->with('success', 'Product updated successfully');
        }
    }

    public function activateProduct($id)
    {
        $product = Product::find($id);
        $product->status = 1;
        if ($product->save()) {
            return redirect()->route('kelola-product')->with('success', 'Product updated successfully');
        }
    }

    public function deactivateProduct($id)
    {
        $product = Product::find($id);
        $product->status = 0;
        if ($product->save()) {
            return redirect()->route('kelola-product')->with('success', 'Product updated successfully');
        }
    }
}
