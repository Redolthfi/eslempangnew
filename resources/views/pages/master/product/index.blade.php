@extends('layouts.app')

@section('body')
    <x-main-header title="Ini halaman master products" />

    @include('includes.alert')

    <div class="mb-10 flex justify-end">
        <a href="{{ route('master.product.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Tambah Product</a>
    </div>
    {{-- table data --}}
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acction
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $item)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        {{ ($products->currentPage() - 1) * $products->perPage() + $key + 1 }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $item->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->category->name }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('master.product.edit', ['id' => $item->id]) }}" class="text-blue-500 hover:underline">Edit</a> | <a href="{{ route('master.product.delete', ['id' => $item->id]) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $products->links() }}

@endsection