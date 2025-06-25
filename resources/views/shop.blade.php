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
