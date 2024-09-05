@extends('layouts.guest')

@section('body')
    <x-main-header title="Ini halaman master products" />

    @include('includes.alert')
    <div class="w-full p-4 border border-gray-100 shadow rounded-lg">
        <form method="POST" class="grid grid-cols-1 gap-5">
            @csrf
            <div class="">
                <div class="mb-5">
                    <x-basic-label for="name" title="Category" />
                    <select name="product_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option>-- Select ---</option>
                        @foreach ($products as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-5">
                    <x-basic-label for="qty" title="qty" />
                    <x-basic-input type="number" id="qty" name="qty" required />
                </div>
                <div class="mb-5">
                    <x-basic-label for="desc" title="Deskripsi" />
                    <textarea name="note" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Tambah</button>
                </div>
            </div>
        </form>
    </div>
@endsection