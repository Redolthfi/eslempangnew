@extends('layouts.app')

@section('body')
    <x-main-header title="Ini halaman master products" />

    @include('includes.alert')
    <div class="w-full p-4 border border-gray-100 shadow rounded-lg">
        <form method="POST" class="grid sm:grid-cols-2 gap-5">
            @csrf
            <div class="">
                <input type="file" name="image" accept="image/*">
            </div>
            <div class="">
                <div class="mb-5">
                    <x-basic-label for="name" title="Name" />
                    <x-basic-input type="text" id="name" name="name" value="{{ $product->name }}" required />
                </div>
                <div class="mb-5">
                    <x-basic-label for="name" title="Category" />
                    <select name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option>-- Select ---</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" @selected($item->id == $product->category_id)>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <x-basic-label for="harga" title="Harga" />
                    <x-basic-input type="number" id="harga" name="harga" value="{{ $product->harga }}" required />
                </div>
                <div class="mb-5">
                    <x-basic-label for="desc" title="Deskripsi" />
                    <textarea name="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ $product->description }}</textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Tambah</button>
                </div>
            </div>
        </form>
    </div>
@endsection