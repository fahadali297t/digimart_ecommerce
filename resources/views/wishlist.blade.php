@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')


    <body class="bg-gray-50 text-gray-800">
        <main class="w-full min-h-[100vh] pt-10 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto space-y-10">
                <h2 class="text-3xl font-bold">Your WishList</h2>
                @includeIf('layouts.wishlistitem', ['product' => $product])


            </div>
        </main>
    </body>



    {{-- cart page --}}


    {{-- ================ --}}
    {{-- @foreach ($product as $key => $item)
            {{ $key }} => {{ $item->product->name }}
        @endforeach --}}
    </main>
@endsection
