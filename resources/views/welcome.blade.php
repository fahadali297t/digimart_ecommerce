@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')


    <main class="w-full min-h-[100vh] mb-10">
        <section style="background-image: url('assets/dist/img/slideshow1.jpg')"
            class="hero relative bg-cover bg-center w-full bg-slate-600  h-[90vh]">

            <div class="min-w-full min-h-full  bg-black/60 absolute top-0 left-0">
            </div>
            <div class="size-full flex-col flex justify-center items-center gap-5 absolute">
                <h1 class="text-center text-3xl font-semibold  text-white">Elevate Your Everyday Style.</h1>
                <div class="h-0 border-2 border-white w-32 ">

                </div>
                <p class="text-white text-sm text-center uppercase ">Shop our collection of chic handbags and accessories
                    made to complement every moment.




                </p>
                <a class="px-10 py-3 border-2 text-white border-white hover:bg-black hover:border-black transition-all ease-in duration-200"
                    href="{{ route('shop') }}">Shop Now</a>
            </div>

        </section>

        {{-- categories Section --}}

        <section class="categories min-w-full ">
            <div class="container  px-5 py-5 mx-auto ">
                <div class="flex items-center w-full">
                    <div class="flex-grow border-t-2 border-black"></div>
                    <span class="px-4 font-bold text-black uppercase text-lg">Tranding Categories</span>
                    <div class="flex-grow border-t-2 border-black"></div>
                </div>

                <div class="grid mt-10 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @php
                        $categories = ['Men', 'Women', 'Kids'];
                        $catItem = App\Models\Category::whereIn('name', $categories)->get();
                        // echo $catItem;
                    @endphp
                    @forelse ($catItem as $item)
                        <a id="cat_home_anchor" href="{{ route('shop.category', $item->name) }}"
                            class="flex rounded-xl cursor-pointer  relative h-[30vh] justify-center items-center">
                            <div class="w-full h-full rounded-xl overflow-hidden absolute top-0 left-0">
                                <img id="cat_home_img" class="object-cover object-center w-full h-full"
                                    src="storage/uploads/{{ $item->img }}" alt="" srcset="">
                            </div>
                            <h1
                                class="z-30 w-full h-full text-xl md:text-2xl  text-white font-semibold rounded-xl flex justify-center items-center bg-black/60">
                                {{ $item->name }}</h1>
                        </a>
                    @empty
                    @endforelse

                </div>
        </section>

        {{-- Trending Products --}}

        <section class="trending_products min-w-full ">
            <div class="container px-5 py-5 mx-auto ">
                <div class="flex items-center w-full">
                    <div class="flex-grow border-t-2 border-black"></div>
                    <span class="px-4 font-bold text-black uppercase text-lg">Trending Products</span>
                    <div class="flex-grow border-t-2 border-black"></div>
                </div>


                <div class="grid mt-5 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                    @php
                        // $categories = ['Men', 'Women', 'Kids'];
                        $Men_products = App\Models\Products\Product::whereHas('sub_category.category', function (
                            $query,
                        ) {
                            $query->where('name', 'Men');
                        })->simplePaginate(4);

                        $Women_products = App\Models\Products\Product::whereHas('sub_category.category', function (
                            $query,
                        ) {
                            $query->where('name', 'Women');
                        })->simplePaginate(4);
                        // echo $catItem;
                    @endphp
                    @foreach ($Women_products as $pro)
                        <x-productcard :pro=$pro />
                    @endforeach
                    @foreach ($Men_products as $pro)
                        <x-productcard :pro=$pro />
                    @endforeach



                </div>
        </section>

        <section class="sale_products min-w-full ">
            <div class="container px-5 py-5 mx-auto ">
                <div class="flex items-center w-full">
                    <div class="flex-grow border-t-2 border-black"></div>
                    <span class="px-4 font-bold text-black uppercase text-lg">Top Brands</span>
                    <div class="flex-grow border-t-2 border-black"></div>
                </div>



                {{-- for brands --}}
                <div class="overflow-hidden relative w-full">
                    <div id="sliderList" class="flex w-max">
                        <div class="item w-64 flex-shrink-0 mx-2">
                            <img src="{{ asset('assets/dist/img/slider/1.webp') }}" class="w-full h-auto" alt="">
                        </div>
                        <div class="item w-64 flex-shrink-0 mx-2">
                            <img src="{{ asset('assets/dist/img/slider/2.webp') }}" class="w-full h-auto" alt="">
                        </div>
                        <div class="item w-64 flex-shrink-0 mx-2">
                            <img src="{{ asset('assets/dist/img/slider/3.webp') }}" class="w-full h-auto" alt="">
                        </div>
                        <div class="item w-64 flex-shrink-0 mx-2">
                            <img src="{{ asset('assets/dist/img/slider/4.webp') }}" class="w-full h-auto" alt="">
                        </div>
                        <div class="item w-64 flex-shrink-0 mx-2">
                            <img src="{{ asset('assets/dist/img/slider/5.webp') }}" class="w-full h-auto" alt="">
                        </div>
                        <div class="item w-64 flex-shrink-0 mx-2">
                            <img src="{{ asset('assets/dist/img/slider/6.webp') }}" class="w-full h-auto" alt="">
                        </div>
                        <div class="item w-64 flex-shrink-0 mx-2">
                            <img src="{{ asset('assets/dist/img/slider/7.webp') }}" class="w-full h-auto" alt="">
                        </div>
                        <div class="item w-64 flex-shrink-0 mx-2">
                            <img src="{{ asset('assets/dist/img/slider/8.webp') }}" class="w-full h-auto" alt="">
                        </div>
                        <!-- Repeat for all items -->
                    </div>
                </div>

        </section>

        {{-- sale Products --}}

        <section class="sale_products min-w-full ">
            <div class="container px-5 py-5 mx-auto ">
                <div class="flex items-center w-full">
                    <div class="flex-grow border-t-2 border-black"></div>
                    <span class="px-4 font-bold text-black uppercase text-lg">Sale</span>
                    <div class="flex-grow border-t-2 border-black"></div>
                </div>


                <div class="grid mt-5 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
                    @php
                        $Men_products = App\Models\Products\Product::where('discount_price', '>', 1)->simplePaginate(8);

                        // echo $catItem;

                    @endphp

                    @foreach ($Men_products as $pro)
                        <x-productcard :pro=$pro />
                    @endforeach



                </div>
        </section>

        {{-- 3 categories section --}}

        <section class="three_categories bg-slate-200 min-w-full ">
            <div class="container px-5 py-5 mx-auto ">



                <div class="grid mt-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

                    @php
                        $i = [1, 2, 3];
                    @endphp

                    @foreach ($i as $j)
                        <a href="" class="three_cat_anchor">
                            <div class="size-full relative  min-h-[600px] md:min-h-[800px] rounded-xl">

                                <div
                                    class="min-h-[200px] {{ $j == 2 ? 'md:hidden' : '' }} flex flex-col justify-center items-center">
                                    <h1 class="font-bold text-2xl uppercase text-black">
                                        {{ $j == 1 ? 'New Spring Collection' : ($j == 2 ? 'Down to the core' : 'New Winter Collection') }}
                                    </h1>
                                    <p class="text-black/60 text-center text-sm">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloribus
                                        laudantium.
                                    </p>
                                </div>
                                <div
                                    class="three_cat_img{{ $j }} relative overflow-hidden  min-h-[400px] md:min-h-[600px]">
                                    <button
                                        class=" three_cat_button px-5 py-3 border-2 border-black transition-all ease-in duration-200 hover:bg-white hover:text-black hover:border-2 hover:border-black font-semibold opacity-0 bg-black text-white absolute bottom-3 right-3">
                                        Go to Collection
                                    </button>
                                </div>
                                @if ($j == 2)
                                    <div class="min-h-[200px] hidden  md:flex justify-center gap-2 items-center flex-col">
                                        <h1 class="font-bold text-2xl uppercase text-black">
                                            {{ $j == 1 ? 'New Spring Collection' : ($j == 2 ? 'Down to the core' : 'New Winter Collection') }}
                                        </h1>
                                        <p class="text-black/60 text-center text-sm">Lorem ipsum dolor sit, amet
                                            consectetur
                                            adipisicing
                                            elit. Tempora, temporibus.</p>
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach


                </div>
        </section>

    </main>


    <!-- Font Awesome for icons (add in your <head>) -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection

@section('scripts')
    <script>
        const sliderList = document.getElementById("sliderList");
        let currentPosition = 0;
        const speed = 1; // adjust speed

        // Duplicate items for seamless loop
        sliderList.innerHTML += sliderList.innerHTML;

        function animateSlider() {
            currentPosition -= speed;
            sliderList.style.transform = `translateX(${currentPosition}px)`;

            // Reset position when scrolled half (since we duplicated content)
            if (Math.abs(currentPosition) >= sliderList.scrollWidth / 2) {
                currentPosition = 0;
            }

            requestAnimationFrame(animateSlider);
        }

        animateSlider();
    </script>
@endsection
