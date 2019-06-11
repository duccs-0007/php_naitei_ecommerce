<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Moddel\Category;
use Session;

class CartsController extends Controller
{    
    public function addToCart(Request $request) 
    {
        try
        {
            $id = $request->id;
            $product = Product::findOrFail($id);
            $quantity = $request->quantity;
            $image = $product->images[config('setting.zero_value')];
            
            $oldCart = Session::has('cart')?Session::get('cart'):null;
            $cart = new Cart($oldCart);
            $cart->add($product, $product->id, $quantity);

            $request->session()->put('cart', $cart);
            
            return response()->json([
                'cart' => $cart->items,
                'totalQuantity' => $cart->totalQuantity,
                'totalPrice' => $cart->totalPrice,
                'product' => $product,
                'image' => $product->images[config('setting.zero_value')]
            ]);
        }
        catch (\Exception $e)
        {
            
        }
    }

    public function index()
    {
        if (!Session::has('cart'))
        {
            return redirect()->route('root')->with('status', trans('content.no_item_in_cart'));
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('carts.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
}
