<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $products = \App\Models\Product::get();

        return view('pages.test', compact('products'));
    }

    // menambahkan data baru
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'qty' => ['required', 'numeric', 'min:1'],
            'note' => 'nullable'
        ]);

        // dd($request->all());

        try {

            // mencari order data jika ada
            $cartUser = Cart::where('user_id', auth()->user()->id)->first();

            if (!$cartUser) {
                $cartUser = Cart::create([
                    'user_id' => auth()->user()->id, // ambil user yg login
                    'cart' => [
                        $request->input('product_id') => [
                            'qty' => $request->input('qty'),
                            'note' => $request->input('note') ?? null
                        ]
                    ]
                ]);

                return back()->with('success', 'product berhasil ditambahkan ke cart');
            }

            // data lama dari db
            $stackCart = $cartUser->cart;

            // gabung data baru dan lama
            $stackCart[$request->input('product_id')] = [
                'qty' => $request->input('qty'),
                'note' => $request->input('note') ?? null
            ];

            $cartUser->cart = $stackCart;

            // save perubahan
            $cartUser->save();

            return back()->with('success', 'product berhasil ditambahkan ke cart');

        } catch (\Throwable $th) {
            logError('cart gagal menambah barang', $th);

            return back()->with('error', 'gagal menambah product ke cart');
        }
    }

    public function delete($id)
    {
        // mencari order data jika ada
        $cartUser = Cart::where('user_id', auth()->user()->id)->first();

        try {
            if ($cartUser) {
                $collection = collect($cartUser->cart);

                // filter
                $cart = $collection->filter(function ($value, $key) use ($id) {
                    return $key != $id;
                });

                $cartUser->cart = $cart;
                $cartUser->save();

                return back()->with('success', 'product berhasil dihapus dari cart');
            }

            return back()->with('success', 'tidak ada product pada cart');
        } catch (\Throwable $th) {
            logError('cart delete failed', $th);

            return back()->with('error', 'gagal dalam menghapus product pada cart. coba lagi nanti');
        }
    }
}
