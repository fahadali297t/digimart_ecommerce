@php
    $subtotal = 0;
@endphp
@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')

    <form action="{{ route('order.pay') }}" method="POST" class="space-y-6">
        @csrf
        <div class="container mx-auto px-0 md:px-4 py-12">
            <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">Checkout</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Billing Form -->
                <div class="lg:col-span-2 bg-white p-8 rounded-2xl shadow-lg">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-700">Billing Details</h2>

                    <section class="space-y-6">
                        <div>
                            <label class="block text-gray-600 mb-1">Full Name</label>
                            <input required type="text" name="name"
                                placeholder="{{ Auth::check() ? Auth::user()->name : 'John Doe' }}"
                                value="{{ Auth::check() ? Auth::user()->name : '' }}"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-600 mb-1">Email Address</label>
                            <input required type="email" name="email"
                                placeholder="{{ Auth::check() ? Auth::user()->email : 'user@example.com' }}"
                                value="{{ Auth::check() ? Auth::user()->email : '' }}"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-gray-600 mb-1">Street Address</label>
                            <input required type="text" name="address" placeholder="123 Main St, Apartment 4B"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-600 mb-1">City</label>
                                <input required type="text" name="city" placeholder="New York"
                                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-600 mb-1">Postal Code</label>
                                <input type="text" name="zip" placeholder="10001(optional)"
                                    class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-gray-600 mb-1">Payment Method</label>

                            <div class="flex w-full mt-4 mb-5  justify-start md:justify-start gap-3 items-center">


                                {{-- <button onclick="togglePayment('cod')" value="cod" type="button" name="paymentMethod"
                                    id="COD"
                                    class="px-2 py-2 md:px-12 md:py-3 border-2 flex justify-center items-center gap-4 rounded-lg border-black ">
                                    Cash on delivery
                                </button>
                                <button onclick="togglePayment('card')" value="card" type="button" name="paymentMethod"
                                    id="card"
                                    class="px-2 py-2 md:px-12 md:py-3 border-2 flex justify-center items-center gap-4 rounded-lg border-black ">
                                    Card Payment
                                </button> --}}

                                <div>
                                    <label id="cod_label" for="COD"
                                        class="px-2 py-2 md:px-12 md:py-3 border-2 flex justify-center items-center gap-4 rounded-lg border-black ">
                                        Cash on delivery
                                    </label>
                                    <input type="radio" name="paymentMethod" class="hidden" id="COD" value="cod">

                                </div>
                                <div>
                                    <label for="card" id="card_label"
                                        class="px-2 py-2 md:px-12 md:py-3 border-2 flex justify-center items-center gap-4 rounded-lg border-black ">
                                        Card payment
                                    </label>
                                    <input type="radio" name="paymentMethod" class="hidden" id="card" value="card">

                                </div>


                            </div>

                            {{-- <select name="payment"
                            class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="card">Credit/Debit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="cash">Cash on Delivery</option>
                        </select> --}}
                            <div class="hidden" id="card-element"></div>
                        </div>

                        <div>
                            <label class="block text-gray-600 mb-1">Additional Notes</label>
                            <textarea name="comment" rows="4" placeholder="Leave a note for the seller (optional)"
                                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                    </section>


                </div>

                <!-- Order Summary -->
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-700">Order Summary</h2>

                    <div class="space-y-4">

                        @forelse ($cart as $key => $item)
                            <div class="flex items-center gap-4">
                                <div class="flex-1">
                                    <h4 class="font-semibold text-gray-800">{{ $item['name'] }}</h4>
                                    <p class="text-sm text-gray-500">Qty: {{ $item['product_quantity'] }}</p>
                                </div>
                                <span class="font-semibold text-gray-800">Rs.
                                    {{ $item['product_quantity'] * $item['price'] }}</span>
                            </div>
                            <input type="hidden" name="product-id[]" value="{{ $item['product_id'] }}">
                            <input type="hidden" name="product-{{ $item['product_id'] }}-quantity"
                                value="{{ $item['product_quantity'] }}">
                            @php

                                $subtotal += $item['product_quantity'] * $item['price'];
                            @endphp

                        @empty
                        @endforelse

                    </div>

                    <div class="border-t border-gray-200 my-6"></div>

                    <div class="space-y-3 text-gray-700">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>Rs. {{ $subtotal }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span>free</span>
                        </div>
                        <div class="flex justify-between font-bold text-lg">
                            <span>Total</span>
                            <span>Rs. {{ $subtotal }}</span>
                        </div>
                    </div>
                    <input type="hidden" name="total" value="{{ $subtotal }}">
                    @if (Auth::check())
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @else
                        <input type="hidden" name="session_id" value="{{ session()->getId() }}">
                    @endif

                    <div class="w-full flex justify-center items-center ">
                        <button type="submit"
                            class="w-full mt-6 bg-black hover:bg-white text-white border-2 hover:border-black hover:text-black font-semibold py-3 rounded-lg transition">
                            Proceed to Payment
                        </button>
                    </div>



                </div>
            </div>
        </div>
    </form>
@endsection


@section('scripts')
    <script src="https://js.stripe.com/basil/stripe.js"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');
    </script>
    <script src="https://kit.fontawesome.com/0e26b3244d.js" crossorigin="anonymous"></script>
@endsection
