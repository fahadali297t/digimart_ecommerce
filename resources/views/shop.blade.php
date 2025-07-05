@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')


    <main class="w-full mb-32 min-h-[100vh]">

        <div class="size-full page_top h-[40vh]">
            <div id="shop_header" class=" flex flex-col relative justify-center items-center  size-full">
                <div class="size-full absolute top-0 left-0 bg-black/60"></div>
                <span class="font-satisfy z-10 text-white  text-2xl">explore</span>
                <h1 class="text-6xl text-white z-10 font-bold">{{ $name }}</h1>
            </div>
        </div>
        {{-- Filter --}}
        <div class="w-full bg-slate-500">
            <div class="grid grid-cols-1 "></div>
        </div>
        {{-- Main shop --}}
        <div class="container mt-10 px-5 py-5 mx-auto ">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-x-5 gap-y-5 lg:grid-cols-4">
                {{-- products --}}
                @foreach ($product as $pro)
                    <x-productcard :pro=$pro />
                @endforeach
            </div>
            <div class="w-full mt-10">
                {{ $product->links() }}
            </div>
        </div>
    </main>
@endsection
