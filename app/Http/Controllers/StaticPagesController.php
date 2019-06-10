<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{

    public function home()
    {
        $hot_products = Product::where('avgPoint','>', config('setting.avgPoint'))->take(config('setting.limit'))->get();
        $newest_products = Product::orderBy('created_at', 'desc')->limit(config('setting.limit'))->get();

        return view('static_pages.home', compact('hot_products','newest_products'));
    }

    public function contact()
    {
        return view('static_pages.contact');
    }
}
