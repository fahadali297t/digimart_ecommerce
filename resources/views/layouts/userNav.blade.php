@php
    $categories = App\Models\Category::with('sub_category')->paginate(6);
@endphp

<nav class="w-full mt-5 lg:mt-0 px-5 sticky bg-white top-0 left-0  flex justify-between items-center">
    <div class="flex justify-between items-center gap-10">
        <h3 class="text-2xl font-semibold ">Chawkbazar</h3>
        <div class=" hidden lg:flex justify-center items-center  gap-10">
            <a href="{{ route('welcome') }}" class=" navlink">Home</a>
            <div href="" id="categoryNav"
                class="navlink category relative w-52 flex justify-center items-center gap-3 ">
                Category
                <img class="pt-1" src="{{ asset('assets/dist/img/icons/arrowdown.svg') }}" alt=""
                    srcset="">
                <div id="dropdownNav"
                    class="absolute z-50 hidden transition-transform duration-200 ease-in   dropdownNav  top-14 px-3 py-5 left-0 ">
                    <div
                        class="size-full grid bg-white/90 pt-5 backdrop-blur-md rounded-2xl shadow-lg border border-white/30 gap-y-10 gap-x-2 grid-cols-3 xl:grid-cols-5 ">

                        @forelse ($categories as $cat)
                            <div class="flex flex-col justify-start items-start px-5 pb-5 gap-2">
                                <a href="{{ route('shop.category', $cat->name) }}"
                                    class="text-lg font-semibold">{{ $cat->name }}</a>
                                <div class="text-start flex flex-col ">
                                    @forelse ($cat->sub_category as $item)
                                        <a href="{{ route('shop.subcategory', $item->name) }}"
                                            class="hover:bg-slate-200 text-sm transition ease-in duration-200 py-2 px-2 rounded-md">
                                            {{ $item->name }}
                                        </a>
                                    @empty
                                    @endforelse
                                </div>

                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
            </div>



            <a href="{{ route('shop') }}" class="navlink">Shop</a>
            <a href="" class=" navlink">Search</a>
            <a href="" class=" navlink">Blogs</a>


        </div>

    </div>

    <div class=" hidden lg:flex justify-center items-center  gap-10">
        <a href="" class=" hover:cursor-pointer font-normal ">
            <img src="{{ asset('assets/dist/img/icons/search.svg') }}" alt="" srcset="">
        </a>
        @if (Auth::check())
            <a href="{{ route('dashboard') }}"
                class=" border-2 border-black px-4 py-1 hover:cursor-pointer font-normal hover:bg-black hover:text-white transition-all duration-500 ease-in-out ">
                Account
            </a>
        @else
            <a href="{{ route('login') }}"
                class=" border-2 border-black px-4 py-1 hover:cursor-pointer font-normal hover:bg-black hover:text-white transition-all duration-500 ease-in-out ">
                Sign in
            </a>
        @endif
        <a href="{{ route('cart') }}" class=" hover:cursor-pointer font-normal ">
            <img src="{{ asset('assets/dist/img/icons/cart.svg') }}" alt="" srcset="">
        </a>



    </div>
    <div class="block lg:hidden">
        <button type="button" class="" onclick="toggleMenu();">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-menu-deep">
                <path stroke="none" d="MtoggleMenu0 0h24v24H0z" fill="none" />
                <path d="M4 6h16" />
                <path d="M7 12h13" />
                <path d="M10 18h10" />
            </svg>
        </button>
    </div>

</nav>
{{-- for Mobile --}}
<nav id="mobile_nav"
    class="w-full  hidden h-[100vh] fixed top-0 left-0 bg-white px-5 py-6 flex lg:hidden  justify-center flex-col items-start z-50">
    <div class="w-full flex justify-between items-center">
        <h3 class="text-2xl text-start font-semibold  w-full ">Chawkbazar</h3>
        <button type="button" onclick="toggleMenu();">
            <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M18 6l-12 12" />
                <path d="M6 6l12 12" />
            </svg>
        </button>

    </div>
    <div class="flex flex-col size-full justify-around  items-center gap-10">

        <div class="flex flex-col justify-center items-center  gap-10">
            <a href="{{ route('welcome') }}" class=" hover:underline text-lg hover:cursor-pointer font-normal ">
                Home
            </a>
            <a href="" class=" text-lg hover:cursor-pointer font-normal ">
                Category
            </a>
            <a href="{{ route('shop') }}" class=" text-lg hover:cursor-pointer font-normal ">
                Shop
            </a>
            <a href="" class=" text-lg hover:cursor-pointer font-normal ">
                Search
            </a>
            <a href="" class=" text-lg hover:cursor-pointer font-normal ">
                Blogs
            </a>


        </div>

    </div>




</nav>

<div class="w-full px-5 py-5 flex justify-around lg:hidden items-center bg-white  fixed bottom-0 left-0">
    <a href ="{{ route('welcome') }}">
        <img src="{{ asset('assets/dist/img/icons/home.svg') }}" alt="" srcset="">
    </a>
    <a href="{{ route('shop') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-building-store">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M3 21l18 0" />
            <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />
            <path d="M5 21l0 -10.15" />
            <path d="M19 21l0 -10.15" />
            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
        </svg>
    </a>

    <a href="">
        <img src="{{ asset('assets/dist/img/icons/search.svg') }}" alt="" srcset="">
    </a>
    <a href="{{ route('cart') }}">
        <img src="{{ asset('assets/dist/img/icons/cart.svg') }}" alt="" srcset="">
    </a>
    <a href="{{ route('dashboard') }}">
        <img src="{{ asset('assets/dist/img/icons/profile.svg') }}" alt="" srcset="">
    </a>

</div>
