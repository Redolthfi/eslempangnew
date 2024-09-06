@extends('layouts.app')

@section('body')
    <x-main-header title="Ini halaman master order" />

    @include('includes.alert')
    {{-- table data --}}
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acction
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $item)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">
                        {{ ($orders->currentPage() - 1) * $orders->perPage() + $key + 1 }}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $item->id }}
                    </th>
                    <td class="px-6 py-4">
                        @foreach ($item->orders as $product)
                            <p>{{ $product['name'] }} x {{ $product['qty'] }} </p>
                        @endforeach
                    </td>
                    <td class="px-6 py-4">
                        Rp. {{ number_format($item->total) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->status }}
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route('master.orderlist.detail', $item->id) }}" class="text-blue-500 hover:underline">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $orders->links() }}

@endsection