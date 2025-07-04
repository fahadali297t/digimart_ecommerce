@if ($product)
    <div class="col-span-12 lg:col-span-8 scroll-auto">
        <div class="container mx-auto p-4">
            <h2 class="text-2xl font-bold mb-4">Your Cart</h2>

            <!-- Table Head -->
            <div class="hidden md:grid grid-cols-6 bg-black/80 text-white p-3 rounded">
                <div class="col-span-2">Product</div>
                <div>Price</div>
                <div>Quantity</div>
                <div>Total</div>
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
                        <!-- Quantity -->
                        <div class="flex items-center space-x-2 md:justify-start mt-2 md:mt-0">
                            <button {{ $item['product_quantity'] > 1 ? '' : 'disabled' }}
                                onclick="desc(event , {{ $key }}  , 'desc' )"
                                class="increment px-2 py-1 bg-gray-200 rounded">-</button>

                            <span id="{{ 'counter_' . $key }}"class="counter">{{ $item['product_quantity'] }}</span>
                            <button onclick="inc(event , {{ $key }}  , 'inc' )"
                                class="increment px-2 py-1 bg-gray-200 rounded">+</button>
                        </div>

                        <!-- Total -->
                        <div class="flex justify-start items-center">
                            <h1 class="text-black font-semibold">
                                Total: &nbsp;
                            </h1>
                            <div id="{{ 'total_' . $key }}" class=" text-gray-800 font-semibold">Rs.
                                {{ $item['price'] * $item['product_quantity'] }}
                            </div>
                        </div>


                        <!-- Remove Action -->
                        <div class=" mt-2 md:mt-0">
                            <button onclick="remove(event , {{ $key }} )"
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
    <div class=" col-span-12 lg:col-span-4">
        <!-- Cart Summary -->
        <div class="mt-6 h-full flex flex-col justify-between items-end lg:items-start bg-gray-100 p-4 rounded">
            <h1 class="text-black text-2xl font-bold text-start w-full mb-5">Payment Details:</h1>
            <div class="flex justify-between w-full items-center gap-2">

                <p>Sub Total: </p>
                <p id="subtotal" class="text-xl font-semibold">Rs. {{ $grandTotal }}</p>
            </div>
            <div class="flex  justify-between w-full  items-center gap-2">

                <p>Shipping Fee: </p>
                <p class="text-xl font-semibold">Free</p>
            </div>
            <div class="flex  justify-between w-full  items-center gap-2">

                <p>Total Discount: </p>
                <p class="text-xl font-semibold">Rs. --</p>
            </div>
            <div class="w-full  border border-black"></div>
            <div class="flex  justify-between w-full  mb-4 items-center gap-2">

                <p class="text-lg font-bold ">Total: </p>
                <p id="grandTotal" class="text-xl font-bold">Rs. {{ $grandTotal }}</p>
            </div>
            <form action="{{ route('cart.checkout') }}" method="GET">

                <input type="hidden" name="total" value="{{ $grandTotal }}" id="total_hidden">
                <button
                    class="mt-3 md:mt-0 bg-white  text-black border-black border-2 px-20 py-2 rounded hover:bg-black hover:text-white transition duration-300 font-semibold"
                    type="submit">
                    Checkout
                </button>
            </form>
        </div>
    </div>
@else
@endif
