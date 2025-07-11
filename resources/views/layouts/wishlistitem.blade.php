@if ($product)
    <div class="col-span-12">
        <div class="max-w-7xl mx-auto p-4">
            <h2 class="text-3xl font-bold mb-6">Your Wishlist</h2>

            <div class="space-y-4">
                @foreach ($product as $key => $item)
                    <div class="flex flex-col md:flex-row items-center bg-white p-4 rounded-lg shadow">

                        <img src="{{ asset('storage/' . $item['image']) }}" class="w-20 h-20 rounded object-cover"
                            alt="Product">

                        <div class="flex-1 md:ml-4 mt-3 md:mt-0 space-y-1 w-full">
                            <div class="flex justify-between items-start">
                                <p class="text-lg font-semibold">{{ $item['name'] }}</p>
                                <button onclick="removeWish(event, {{ $key }})"
                                    class="text-red-500 text-sm hover:underline">Remove</button>
                            </div>

                            <div class="text-sm flex items-center gap-2">
                                <span class="font-medium">Price:</span>
                                <span class="text-gray-700 font-semibold">Rs {{ $item['price'] }}</span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            {{-- Add All to Cart Button --}}
            <div class="mt-8 bg-gray-100 p-5 rounded-lg flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-lg font-semibold">Add all wishlist items to your cart?</p>

                @php $ids = []; @endphp
                @foreach ($product as $item)
                    @php $ids[] = $item['product_id']; @endphp
                @endforeach

                <form action="{{ route('multiCart') }}" method="POST" class="w-full sm:w-auto flex">
                    @csrf
                    @foreach ($ids as $id)
                        <input type="hidden" name="pid[]" value="{{ $id }}">
                    @endforeach
                    <button type="submit"
                        class="px-6 py-3 text-white bg-black hover:bg-gray-800 rounded-lg text-base transition">
                        Add All to Cart
                    </button>
                </form>
            </div>
        </div>
    </div>
@else
    {{-- Empty State --}}
    <div class="col-span-12 h-[80vh] flex justify-center items-center">
        <div class="text-center p-8 bg-white rounded-2xl shadow-lg max-w-sm w-full">
            <div class="mb-6 flex justify-center items-center flex-col">
                <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-heart">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                </svg>
            </div>
            <h1 class="text-2xl font-semibold text-gray-800 mb-3">Your Wishlist is Empty</h1>
            <p class="text-gray-500 mb-6">Looks like you haven’t added anything to your wishlist yet.</p>
            <a href="/shop"
                class="px-6 py-3 bg-black border-2 border-black text-white rounded-lg inline-block hover:bg-white hover:text-black transition">
                Continue Shopping
            </a>
        </div>
    </div>
@endif
