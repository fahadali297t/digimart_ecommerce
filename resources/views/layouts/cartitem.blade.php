@if ($product)
    <div class="flex flex-col lg:flex-row gap-8">

        <!-- Cart Items -->
        <div class="w-full lg:w-2/3 space-y-4">
            @php $grandTotal = 0; @endphp
            @foreach ($product as $key => $item)
                <div class="flex flex-col md:flex-row items-center bg-white p-4 rounded-lg shadow-sm">

                    <img src="{{ asset('storage/' . $item['image']) }}" class="w-24 h-24 rounded object-cover"
                        alt="Product">

                    <div class="flex-1 md:ml-4 mt-3 md:mt-0 space-y-2 w-full">
                        <div class="flex justify-between items-start">
                            <p class="text-lg font-semibold">{{ $item['name'] }}</p>
                            <button onclick="remove(event, {{ $key }})"
                                class="text-red-500 text-sm hover:underline">Remove</button>
                        </div>

                        <div class="flex flex-wrap items-center gap-4 text-sm">
                            <div><span class="font-medium">Price:</span> Rs {{ $item['price'] }}</div>
                            <div class="flex items-center space-x-2">
                                <button {{ $item['product_quantity'] > 1 ? '' : 'disabled' }}
                                    onclick="desc(event, {{ $key }}, 'desc')"
                                    class="px-2 py-1 bg-gray-200 rounded">-</button>
                                <span id="counter_{{ $key }}">{{ $item['product_quantity'] }}</span>
                                <button onclick="inc(event, {{ $key }}, 'inc')"
                                    class="px-2 py-1 bg-gray-200 rounded">+</button>
                            </div>
                            <div><span class="font-medium">Total:</span> Rs <span
                                    id="total_{{ $key }}">{{ $item['price'] * $item['product_quantity'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @php $grandTotal += $item['price'] * $item['product_quantity']; @endphp
            @endforeach
        </div>

        <!-- Cart Summary -->
        <div class="w-full lg:w-1/3 bg-white p-5 rounded-lg shadow space-y-4">
            <h3 class="text-2xl font-semibold">Summary</h3>
            <div class="space-y-3 text-sm">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span class="font-semibold">Rs {{ $grandTotal }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Shipping</span>
                    <span class="font-semibold">Free</span>
                </div>
                <div class="flex justify-between">
                    <span>Total Discount</span>
                    <span class="font-semibold">--</span>
                </div>
                <div class="border border-gray-300"></div>
                <div class="flex justify-between text-lg font-bold">
                    <span>Total</span>
                    <span>Rs {{ $grandTotal }}</span>
                </div>
            </div>
            <form action="{{ route('cart.checkout') }}" method="GET" class="pt-3">
                <input type="hidden" name="total" value="{{ $grandTotal }}">
                <button type="submit"
                    class="w-full bg-black text-white py-3 rounded-lg hover:bg-white hover:text-black border border-black transition">Checkout</button>
            </form>
        </div>
    </div>

    <!-- Mobile sticky bottom bar -->
    <div
        class="fixed bottom-0 inset-x-0 bg-white shadow-lg flex justify-between items-center p-4 border-t border-gray-200 lg:hidden">
        <div class="text-lg font-bold">Rs {{ $grandTotal }}</div>
        <form action="{{ route('cart.checkout') }}" method="GET">
            <input type="hidden" name="total" value="{{ $grandTotal }}">
            <button type="submit" class="bg-black text-white px-6 py-2 rounded-lg hover:bg-gray-800">Checkout</button>
        </form>
    </div>
@else
    <!-- Empty Cart -->
    <div class="flex flex-col items-center justify-center min-h-[70vh] text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
            <path d="M17 17h-11v-14h-2" />
            <path d="M6 5l14 1l-1 7h-13" />
        </svg>
        <h2 class="text-2xl font-semibold">Your cart is empty</h2>
        <p class="text-gray-500 mt-2">Looks like you haven't added anything yet.</p>
        <a href="/shop"
            class="mt-5 inline-block bg-black text-white px-6 py-3 rounded-lg hover:bg-white hover:text-black border border-black transition">Continue
            Shopping</a>
    </div>
@endif
