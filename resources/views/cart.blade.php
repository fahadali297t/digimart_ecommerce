@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')


    <main class="w-full mb-32 min-h-[100vh]">

        {{-- cart page --}}
        <div class="container mx-auto mt-10 px-5 md:px-0 ">

            <div class="grid max-h-[70vh] gap-10  grid-cols-12" id="cartItem">

                @includeIf('layouts.cartitem', ['product' => $product])
            </div>





        </div>

        {{-- ================ --}}
        {{-- @foreach ($product as $key => $item)
            {{ $key }} => {{ $item->product->name }}
        @endforeach --}}
    </main>
@endsection


<script>
    
</script>
