<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->first();

        $products = Product::whereIn('id', array_keys($carts->cart))->get();

        $products->map(function ($product) use ($carts) {
            $product->qty        = $carts->cart[$product->id]['qty'];
            $product->hargaTotal = $product->qty * $product->harga;
        });

        $total = 0;
        foreach ($products as $product) {
            $total += $product->hargaTotal;
        }

        return view('pages.orderdetail', compact('carts', 'products', 'total'));
    }
}
