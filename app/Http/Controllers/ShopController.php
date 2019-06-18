<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SearchRequest;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index()
    {
        $count_product = Product::count();
        $category_title = request()->category;
        $categories = Category::withCount('products')->get();
        
        if (request()->category)
        {
            $products = Product::with('category')->whereHas('category', function($query){
                $query->where('name', request()->category);
            });
        }
        else
        {
            $products = Product::select();
        }

        if (request()->sort == 'low_high')
        {
            $products = $products->orderBy('price')->paginate(config('setting.per_page_shop_value'));
        }
        elseif (request()->sort == 'high_low')
        {
            $products = $products->orderBy('price', 'desc')->paginate(config('setting.per_page_shop_value'));
        }
        else
        {
            $products = $products->paginate(config('setting.per_page_shop_value'));
        }

        return view('shop.index', compact('products', 'categories', 'count_product', 'category_title'));
    }

    public function search(SearchRequest $request)
    {   
        $query = $request->input('query');
        $products = Product::search($query)->paginate(config('setting.per_page_shop_value'));
        $count_product = Product::count();
        $categories = Category::withCount('products')->get();

        return view('search.results', compact('products', 'categories', 'count_product'));
    }
}
