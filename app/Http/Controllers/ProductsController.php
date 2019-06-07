<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::paginate(config('setting.per_page'));

        return view('products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::whereSlug($slug)->first();
        $blob = $product->image;

        return view('products.show', compact('product','blob'));
    }

    public function edit($slug)
    {
        //
    }
}
