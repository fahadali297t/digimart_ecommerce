@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')


    <main class="w-full mb-32 min-h-[100vh]">

        <div class="container px-5 md:px-0 m-auto mt-10 ">
            <div class="grid grid-cols-12">
                <div class="col-span-12 lg:col-span-5 ">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12 sm:col-span-9 h-full flex justify-center items-center">
                            <img src="{{ asset('storage/' . $product->product_image->coverImage) }}" alt="">
                        </div>
                        <div class="col-span-3 ">
                            <div class="grid h-full grid-cols-5 w-[90vw]  sm:w-auto sm:grid-cols-1">
                                <x-productsimg :path='$product->product_image->supportImg1' />
                                <x-productsimg :path='$product->product_image->supportImg1' />
                                <x-productsimg :path='$product->product_image->supportImg3' />
                                <x-productsimg :path='$product->product_image->supportImg4' />
                                <x-productsimg :path='$product->product_image->supportImg5' />



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 mt-10 lg:mt-0 lg:col-span-7 flex flex-col gap-4 p-0 lg:p-10 ">
                    <h1 class="text-3xl font-semibold">{{ $product->name }}</h1>

                    <p>
                        {{ $product->description }}
                    </p>
                    <div class="flex justify-start gap-2 items-center">
                        <h1 class="text-3xl font-bold mt-5">
                            PKR {{ $product->price }}
                        </h1>
                        @if ($product->discount_price)
                            <h3 class="text-xl font-semibold text-black/50 line-through">
                                PKR {{ $product->discount_price }}
                            </h3>
                        @endif
                    </div>
                    <h2 class="text-lg text-black font-semibold">
                        Size:
                    </h2>
                    <div class="flex justify-centerm items-center gap-10">
                        <p class="px-3 py-2 border-2 border-black text-xs">S</p>
                        <p class="px-3 py-2 border-2 border-black text-xs">M</p>
                        <p class="px-3 py-2 border-2 border-black text-xs">L</p>
                        <p class="px-3 py-2 border-2 border-black text-xs">XL</p>
                    </div>


                    <div class="quantity mt-8 flex justify-between items-center gap-5">


                        <a href=""
                            class="text-lg flex justify-center items-center text-black border-2 border-black hover:cursor-pointer bg-white w-1/2 py-3">Add
                            to Wishlist</a>
                        <form action="{{ route('addcart') }}" method="post"
                            class="text-lg flex justify-center items-center text-white border-2 border-black hover:cursor-pointer bg-black w-1/2 py-3">

                            @csrf
                            <input type="hidden" name="pid" value="{{ $product->id }}">
                            <a href="{{ route('addcart') }}" onclick="addtoCart(event)" class="">Add
                                to
                                cart</a>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </main>
@endsection
