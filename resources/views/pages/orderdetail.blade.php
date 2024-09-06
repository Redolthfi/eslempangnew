<x-layout>
    <section class="bg-white py-8 antialiased  md:py-16 ">
        <form action="{{route('order.post') }}" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
          <div class="mx-auto max-w-3xl">
            <h2 class="text-xl font-semibold text-gray-900  sm:text-2xl">Order summary</h2>
      
            @include('includes.alert')

            @if ($products->count() < 1)
            <div class="p-4 my-4 text-sm text-blue-800 rounded-lg bg-blue-100" role="alert">
              <span class="font-medium">Info alert!</span> tidak ada product pada cart.
            </div>
            @endif

            <div class="mt-6 space-y-4 border-b border-t border-gray-200 py-8  sm:mt-8">
              <h4 class="text-lg font-semibold text-gray-900 ">Billing & Delivery information</h4>
      
              <dl>
                <dt class="text-base font-medium text-gray-900 ">Individual</dt>
                <dd class="mt-1 text-base font-normal text-gray-500 ">Bonnie Green - +1 234 567 890, San Francisco, California, United States, 3454, Scott Street</dd>
              </dl>
      
              <button type="button" data-modal-target="billingInformationModal" data-modal-toggle="billingInformationModal" class="text-base font-medium text-primary-700 hover:underline ">Edit</button>
            </div>
      
            <div class="mt-6 sm:mt-8">
              <div class="relative overflow-x-auto border-b border-gray-200 ">
                <table class="w-full text-left font-medium text-gray-900  md:table-fixed ">
                  <tbody class="divide-y divide-gray-200 ">
                    @foreach ($products as $item)
                    <tr>
                      <td class="whitespace-nowrap py-4 md:w-[384px]">
                        <div class="flex items-center gap-4">
                          <a href="#" class="flex items-center aspect-square w-10 h-10 shrink-0">
                            <img class="h-auto w-full max-h-full " src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="imac image" />
                            <img class="hidden h-auto w-full max-h-full " src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="imac image" />
                          </a>
                          <a href="{{ route('product.detail', $item->id) }}" class="hover:underline">{{ $item->name }}</a>
                        </div>
                      </td>
      
                      <td class="p-4 text-base font-normal text-gray-900 ">x {{ $item->qty }}</td>
      
                      <td class="p-4 text-right text-base font-bold text-gray-900 ">Rp. {{ number_format($item->hargaTotal) }}</td>

                      <td class="text-right">
                        <a href="{{ route('cart.delete', $item->id) }}" class="text-red-500">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
      
              <div class="mt-4 space-y-6">
                <h4 class="text-xl font-semibold text-gray-900 ">Order summary</h4>
      
                <div class="space-y-4">
                  {{-- <div class="space-y-2">
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-gray-500 ">Original price</dt>
                      <dd class="text-base font-medium text-gray-900 ">$6,592.00</dd>
                    </dl>
      
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-gray-500 ">Store Pickup</dt>
                      <dd class="text-base font-medium text-gray-900 ">$99</dd>
                    </dl>
      
                    <dl class="flex items-center justify-between gap-4">
                      <dt class="text-gray-500 ">Tax</dt>
                      <dd class="text-base font-medium text-gray-900 ">$799</dd>
                    </dl>
                  </div> --}}
      
                  <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 ">
                    <dt class="text-lg font-bold text-gray-900 ">Total</dt>
                    <dd class="text-lg font-bold text-gray-900 ">Rp. {{ number_format($total) }}</dd>
                  </dl>
                </div>
      
                <div class="gap-4 sm:flex sm:items-center">
                  <button class="w-full rounded-lg  border border-gray-200 bg-white px-5  py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 ">Return to Shopping</button>
      
                  <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Send the order</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </section>
</x-layout>