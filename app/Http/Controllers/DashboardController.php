<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productsTotal = Product::all();
        $productCount = count($productsTotal);

        $userTotal = User::where('role', 'User')->count();

        $countAktifProducts = Product::where('status', 1)->count();

        $countAktifUsers = User::where('status', 1)->count();

        $newestProducts = Product::orderBy('updated_at', 'desc')->take(10)->get();

        $newestProducts->transform(function ($product) {
            $product->formatted_updated_at = $product->updated_at->format('d  F  Y |  H:i:s');
            return $product;
        });

        return view('admin.dashboard', compact('productCount', 'userTotal', 'countAktifProducts', 'countAktifUsers', 'newestProducts'));
    }
}
