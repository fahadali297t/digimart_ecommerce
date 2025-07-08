@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')


    <main class="w-full mb-32 min-h-[100vh]">
        <x-shopTop :name=$name />
        <div class="container mx-auto">

            <div class=" grid grid-cols-12">
                <div class="col-span-12 ">
                    <div class=" mt-10 px-5 py-5 mx-auto ">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-x-5 gap-y-5 lg:grid-cols-4">
                            {{-- products --}}
                            @foreach ($product as $pro)
                                <x-productcard :pro=$pro />
                            @endforeach
                        </div>
                        <div class="w-full -z-10 mt-10">
                            {{ $product->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main shop --}}

    </main>
@endsection
