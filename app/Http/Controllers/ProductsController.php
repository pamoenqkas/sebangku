<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->take(15)->get();
        return view('welcome', compact('products'));
    }

    public function indexMales()
    {
        $products = Product::where('jenis', 'mens')->get();
        return view('males', compact('products'));
    }

    public function indexFemales()
    {
        $products = Product::where('jenis', 'females')->get();
        return view('females', compact('products'));
    }

    public function indexKids()
    {
        $products = Product::where('jenis', 'kids')->get();
        return view('kids', compact('products'));
    }
}
