@if ($product)
    <div class="col-span-12 lg:col-span-12 scroll-auto">
        <div class="container mx-auto p-4">
            <h2 class="text-2xl font-bold mb-4">WishList</h2>

            <!-- Table Head -->
            <div class="hidden md:grid grid-cols-12 bg-black/80 text-white p-3 rounded">
                <div class="col-span-2">Product Name</div>
                <div>Price</div>
                <div>Action</div>
            </div>

            <!-- Cart Items -->
            <div class="space-y-4">
                <!-- Single Cart Item -->
                @php
                    $grandTotal = 0;
                @endphp
                @foreach ($product as $key => $item)
                    <div class="grid grid-cols-1 md:grid-cols-6 items-center bg-white p-3 rounded shadow">

                        <!-- Product Info -->
                        <div class="col-span-2 flex items-center space-x-3">
                            <img src="{{ asset('storage/' . $item['image']) }}" class="w-16 h-16 rounded object-cover"
                                alt="Product">
                            <div>
                                <p class="font-semibold">{{ $item['name'] }}</p>

                            </div>
                        </div>

                        <!-- Price -->
                        <div class="flex justify-start items-center">
                            <h1 class="text-black font-semibold">
                                Price: &nbsp;
                            </h1>
                            <div class="price text-gray-700 font-medium ">{{ $item['price'] }}</div>

                        </div>



                        <!-- Remove Action -->
                        <div class=" mt-2 md:mt-0">
                            <button onclick="removeWish(event , {{ $key }} )"
                                class="text-red-500 hover:underline">Remove</button>

                        </div>

                    </div>
                    @php

                        $grandTotal += $item['price'] * $item['product_quantity'];
                    @endphp
                    {{-- {{ $key }} => {{ $item }} <br> --}}
                @endforeach

                <!-- Repeat Above Block for more items -->

            </div>


        </div>

    </div>
    <div class=" col-span-12 ">
        <!-- Cart Summary -->
        <div class="mt-6 h-full flex flex-col justify-between items-end  bg-gray-100 p-4 rounded">
            @php
                $ids = [];
            @endphp
            @foreach ($product as $item)
                @php
                    $ids[] = $item['product_id'];
                @endphp
            @endforeach
            <form action="{{ route('multiCart') }}" method="POST" class="multi_cart w-full sm:w-auto flex">
                @csrf
                @foreach ($ids as $id)
                    <input type="hidden" name="pid[]" value="{{ $id }}">
                @endforeach
                <button type="submit"
                    class="flex items-center justify-center px-6 py-3 text-white bg-black hover:bg-gray-800 rounded-lg text-lg transition uppercase">
                    Add All to cart
                </button>
            </form>


        </div>
    </div>
@else
    <div class="col-span-12  h-[80vh] flex justify-center items-center">
        <div class="text-center p-8 bg-white rounded-2xl shadow-lg max-w-sm w-full">
            <div class="mb-6 flex justify-center items-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                    <path d="M17 17h-11v-14h-2" />
                    <path d="M6 5l14 1l-1 7h-13" />
                </svg>
            </div>
            <h1 class="text-2xl font-semibold text-gray-800 mb-3">Your WishList is Empty</h1>
            <p class="text-gray-500 mb-6">Looks like you haven’t added anything to your WishList yet.</p>
            <a href="/shop" class="px-6 py-3 bg-black border-2 border-black text-white rounded-lg mt-2 inline-block">
                Continue Shopping
            </a>
        </div>
    </div>
@endif
