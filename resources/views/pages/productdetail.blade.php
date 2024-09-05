<x-layout>
    <section class="py-8 bg-white md:py-16 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
          <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16 ">
            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto ">
              <img class="w-full 2/4 object-contain" src="{{ asset('images/bludru35.jpeg') }}" alt="" />
            </div>
            <div class="mt-6 sm:mt-8 lg:mt-0">
              <h1
                class="text-xl font-semibold text-gray-900 sm:text-2xl "
              >
                {{ $product->name }}
              </h1>
              <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                <p
                  class="text-2xl font-extrabold text-gray-900 sm:text-3xl "
                >
                  ${{ number_format($product->harga) }}
                </p>
              </div>
    
              
              <form method="POST" action="{{ route('order') }}">
                <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">                          
                    <button
                       class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                       role="button"
                     >
                       <svg
                         class="w-5 h-5 -ms-2 me-2"
                         aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg"
                         width="24"
                         height="24"
                         fill="none"
                         viewBox="0 0 24 24"
                       >
                         <path
                           stroke="currentColor"
                           stroke-linecap="round"
                           stroke-linejoin="round"
                           stroke-width="2"
                           d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
                         />
                       </svg>
                       Add to cart
                    </button>
                     <button type="button" id="decrement-button" data-input-counter-decrement="counter-input" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 ">
                    <svg class="h-2.5 w-2.5 text-gray-900 dark" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                    </svg>
                  </button>
                  <input type="text" id="counter-input" data-input-counter class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 " placeholder="" value="2" required />
                  <button type="button" id="increment-button" data-input-counter-increment="counter-input" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 ">
                    <svg class="h-2.5 w-2.5 text-gray-900 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                  </button>
                   </div>
                
            </form>
    
              <hr class="my-6 md:my-8 border-gray-200 " />
    
              <p class="mb-6 text-gray-500 dark:text-gray-400">
                Studio quality three mic array for crystal clear calls and voice
                recordings. Six-speaker sound system for a remarkably robust and
                high-quality audio experience. Up to 256GB of ultrafast SSD storage.
              </p>
    
              <p class="text-gray-500 ">
                Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
                Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
                Magic Keyboard or Magic Keyboard with Touch ID.
              </p>
            </div>
          </div>
        </div>
      </section>
        
 </x-layout> 
