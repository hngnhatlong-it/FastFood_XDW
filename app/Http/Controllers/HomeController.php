<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Category::with('products')->get();
        return view('home', compact('categories'));
    }

    public function product($id)
    {
        $product = \App\Models\Product::with('category')->findOrFail($id);
        return view('product', compact('product'));
    }
}
