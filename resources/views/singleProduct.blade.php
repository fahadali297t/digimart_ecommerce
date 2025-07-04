@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')

    <main class="w-full min-h-[100vh] bg-gray-50">

        <div class="container mx-auto px-5 md:px-0 py-10" x-data="{ activeImage: '{{ asset('storage/' . $product->product_image->coverImage) }}' }">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Product Images Section -->
                <div class="lg:col-span-5 flex justify-center items-center flex-col md:flex-row gap-4">

                    <!-- Main Image -->
                    <div class="relative  overflow-hidden rounded-lg shadow bg-white flex items-center justify-center w-fit">
                        <img :src="activeImage" alt="{{ $product->name }}"
                            class="transition-transform duration-300 ease-in-out object-contain max-h-[500px] w-full hover:scale-125">
                    </div>

                    <!-- Thumbnails -->
                    <div class="flex md:flex-col gap-3 overflow-x-auto lg:overflow-visible">
                        @foreach ([$product->product_image->supportImg1, $product->product_image->supportImg2, $product->product_image->supportImg3, $product->product_image->supportImg4, $product->product_image->supportImg5] as $img)
                            @if ($img)
                                <div class="cursor-pointer border-2 border-transparent hover:border-black rounded overflow-hidden flex-shrink-0 w-20 h-20"
                                    @click="activeImage='{{ asset('storage/' . $img) }}'">
                                    <img src="{{ asset('storage/' . $img) }}" alt="Thumbnail"
                                        class="object-cover w-full h-full">
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>

                <!-- Product Details -->
                <div class="lg:col-span-7 px-5 flex flex-col gap-6">
                    <p class="text-gray-500 uppercase text-sm tracking-wide">
                        {{ $product->sub_category->category->name }} &raquo; {{ $product->sub_category->name }}
                    </p>

                    <h1 class="text-4xl font-bold text-gray-900">{{ $product->name }}</h1>

                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>

                    <div class="flex items-center gap-4">
                        @if ($product->discount_price)
                            <h2 class="text-3xl font-bold text-green-600">PKR {{ $product->discount_price }}/-</h2>
                            <span class="text-xl text-gray-400 line-through">PKR {{ $product->price }}/-</span>
                        @else
                            <h2 class="text-3xl font-bold text-gray-900">PKR {{ $product->price }}/-</h2>
                        @endif
                    </div>

                    <div class="flex flex-wrap gap-4 mt-6">

                        <form action="{{ route('addcart') }}" method="POST" class="w-full sm:w-auto flex">
                            @csrf
                            <input type="hidden" name="pid" value="{{ $product->id }}">
                            <button type="submit"
                                class="flex items-center justify-center px-6 py-3 text-white bg-black hover:bg-gray-800 rounded-lg text-lg transition">
                                Add to Cart
                            </button>
                        </form>

                        <button
                            class="flex items-center justify-center px-5 py-3 border-2 border-black text-black hover:bg-black hover:text-white rounded-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" width="22" height="22"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12.572l-7.5 7.428-7.5-7.428a5 5 0 117.5-6.566 5 5 0 117.5 6.566z" />
                            </svg>
                            Wishlist
                        </button>

                    </div>
                </div>

            </div>
        </div>

    </main>

    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
