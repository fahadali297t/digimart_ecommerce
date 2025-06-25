@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')


    <main class="w-full mb-32 min-h-[100vh]">

        <div style="background-image: url('assets/dist/img/page-header.jpg')" class="size-full page_top h-[40vh] bg-blue-500">
            <div class="bg-black/60 flex flex-col justify-center items-center  size-full">
                <span class="font-satisfy text-white  text-2xl">explore</span>
                <h1 class="text-6xl text-white font-bold">Shop</h1>
            </div>
        </div>
        {{-- Filter --}}
        <div class="w-full bg-slate-500">
            <div class="grid grid-cols-1 "></div>
        </div>
        {{-- Main shop --}}
        <div class="container mt-10 px-5 py-5 mx-auto ">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-x-5 gap-y-5 lg:grid-cols-4">
                @foreach ($product as $pro)
                    <div class="w-full h-full overflow-hidden flex-col flex justify-start items-center">
                        <div class="w-full h-3/4">
                            <img class="w-full h-full object-cover object-center"
                                src="{{ asset('storage/' . $pro->product_image->coverImage) }}" srcset="">
                        </div>
                        <div class="mt-5 flex flex-col justify-center items-center">
                            {{-- su_category --}}
                            <p class="text-sm text-black/60">{{ $pro->sub_category->name }}</p>
                            {{-- Title --}}
                            <h1 class="text-black  text-xl  font-semibold">{{ $pro->name }}</h1>
                            {{-- rating --}}
                            <x-review />
                            {{-- Price --}}
                            <div class="flex justify-center gap-1 items-center">
                                <p class="text-black  font-semibold">PKR. {{ $pro->price }}</p>
                                <p class="text-black/60 font-semibold line-through text-xs">{{ $pro->discount_price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full mt-10">
                {{ $product->links() }}
            </div>
        </div>
    </main>
@endsection
