@extends('layouts.app')

@section('body')
    <x-main-header title="Ini halaman master products" />

    @include('includes.alert')
    <div class="w-full p-4 border border-gray-100 shadow rounded-lg">
        <form method="POST" class="grid sm:grid-cols-2 gap-5">
            @csrf
            <div class="">
                <div class="mb-5">
                    <x-basic-label for="name" title="Order ID" />
                    <x-basic-input type="text" value="{{ $order->id }}" disabled />
                </div>
                <div class="mb-5">
                    <x-basic-label for="name" title="Nama" />
                    <x-basic-input type="text" value="{{ $order->user->name }}" disabled />
                </div>
                <div class="mb-5">
                    <x-basic-label for="name" title="Phone" />
                    <x-basic-input type="text" value="{{ $order->user->profile->phone_number }}" disabled />
                </div>
                <div class="mb-5">
                    <x-basic-label for="name" title="Address" />
                    <textarea name="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" disabled>
                        {{ $order->user->profile->address }}
                    </textarea>
                </div>
            </div>

            <div class="">
                <div class="mb-5">
                    <x-basic-label for="name" title="Order Create" />
                    <x-basic-input type="text" value="{{ date('H:i:s, d F Y', strtotime($order->created_at)) }}" disabled />
                </div>
                <div class="mb-5">
                    <x-basic-label title="Status" />
                    <select name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option @selected($order->status == 'PENDING')>PENDING</option>
                        <option @selected($order->status == 'PROCESS')>PROCESS</option>
                        <option @selected($order->status == 'ABORT')>ABORT</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Update</button>
                </div>
            </div>
        </form>
    </div>

    <div class="w-full p-4 border border-gray-100 shadow rounded-lg mt-10">
        <x-main-header title="products order" />
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Note
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orders as $key => $item)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">
                            {{ $key + 1 }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['name'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['qty'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['note'] ?? '-' }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection