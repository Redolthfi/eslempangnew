<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // return view('orders.index');
        $orders = Order::latest()->paginate(15);

        // dd($orders);
        return view('pages.master.orderlist.index', compact('orders'));

    }

    // membuat order baru
    public function createPost()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->first();

        try {
            if ($carts && count($carts->cart) != 0) {
                $products = Product::whereIn('id', array_keys($carts->cart))->get();

                $products->map(function ($product) use ($carts) {
                    if (isset($carts->cart[$product->id])) {
                        $product->qty = $carts->cart[$product->id]['qty'];
                    }
                });

                // calculate harga
                $total = 0;

                foreach ($products as $product) {
                    $total = +$product->harga * $product->qty;
                }

                DB::beginTransaction();
                $order = Order::create([
                    'user_id' => auth()->user()->id,
                    'orders' => $products->map(function ($product) {
                        return [
                            'id' => $product->id,
                            'name' => $product->name,
                            'qty' => $product->qty,
                        ];
                    }),
                    'total' => $total,
                    'status' => 'PENDING'
                ]);

                // set 0 cartnya
                $carts->cart = [];
                $carts->save();

                DB::commit();

                return back()->with('success', 'order berhasil dibuat');
            }

            return back()->with('info', 'tidak ada data pada cart, silahkan memesan product terlebih dahulu');
        } catch (\Throwable $th) {
            DB::rollBack();

            logError('order failed to create', $th);

            return back()->with('error', 'gagal dalam membuat order, coba lagi nanti');
        }
    }

    public function detail($id)
    {

        $order = Order::findOrFail($id);

        return view('', compact('order'));
    }

    public function editPost(Request $request, $id)
    {

    }
}
