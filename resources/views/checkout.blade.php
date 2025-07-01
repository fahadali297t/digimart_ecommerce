@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')


    <main class="w-full mb-32 min-h-[100vh]">
        <div class="container mt-5 mx-auto">
            <div class="grid  grid-cols-1 md:grid-cols-2">
                <div>
                    <h1 class="text-3xl text-black font-semibold">Checkout</h1>
                </div>
                <div class="order_summary flex flex-col justify-center items-center">
                    <h1 class="text-3xl text-black font-semibold">Order Summary</h1>
                    
                    {{ $total }}
                </div>
            </div>
        </div>
    </main>
@endsection
