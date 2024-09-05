<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // nampilkna semua list product yabng ada  di db
        $products = Product::with('category')
            ->latest()->paginate(15);

        return view('pages.master.product.index', compact('products'));
    }

    // ini halaman membuat prodcut baru
    public function create()
    {
        $category = Category::get();

        return view('pages.master.product.create', compact('category'));
    }

    public function createPost(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'harga' => ['required', 'min:0', 'numeric'],
            'image' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ], [
            'category_id.exists' => 'category tidak valid'
        ]);

        // dd($request->all());
        try {

            // Ambil file dari request
            $file = $request->file('image');

            // Tentukan nama baru untuk file (misalnya: file_dengan_tanggal)
            $newFileName = 'file_' . time() . '.' . $file->getClientOriginalExtension();
            $path = Storage::putFileAs(
                'products',
                $request->file('image'),
                $newFileName
            );
            Product::create([
                'name' => $request->input('name'),
                'harga' => $request->input('harga'),
                'image' => $path,
                'description' => $request->input('description'),
                'category_id' => $request->input('category_id')
            ]);

            return redirect()->route('master.product.index')->with('success', 'berhasil menambahkan product baru');
        } catch (\Throwable $th) {
dd($th->getMessage());
            return back()->with('error', 'terdapat kesalahan server');
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        $category = Category::get();

        return view('pages.master.product.edit', compact('product', 'category'));
    }

    public function editPost(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'min:3'],
            'harga' => ['required', 'min:0', 'numeric'],
            'category_id' => ['required', 'exists:categories,id']
        ], [
            'category_id.exists' => 'category tidak valid'
        ]);

        $product = Product::findOrFail($id);

        try {
            $product->name        = $request->input('name');
            $product->harga       = $request->input('harga');
            $product->description = $request->input('description');
            $product->category_id = $request->input('category_id');
            $product->save();

            return back()->with('success', 'data berhasil diubah');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('master.product.index')->with('success', 'berhasil dihapus');
    }
}
