<div id="product_card"
    class="w-full h-[40vh] sm:h-[70vh] relative overflow-hidden flex-col flex justify-start items-center">
    @if ($pro->discount_price)
        <div class="text-white z-10 bg-red-500 p-1 md:p-3  absolute top-3 right-5">

            <p class="text-xs sm:text-base">
                -{{ intval(100 - ($pro->discount_price / $pro->price) * 100) }}%
            </p>

        </div>
    @endif


    @php
        use Illuminate\Support\Facades\Storage;

        $coverImage = Storage::disk('public')->exists($pro->product_image->coverImage)
            ? asset('storage/' . $pro->product_image->coverImage)
            : asset('assets/dist/img/error_image.png');

        $hoverImage = Storage::disk('public')->exists($pro->product_image->supportImg1)
            ? asset('storage/' . $pro->product_image->supportImg1)
            : $coverImage;

    @endphp


    <div id="productImageContainer-{{ $pro->id }}" style="background-image: url('{{ $coverImage }}')"
        onmouseover="this.style.backgroundImage = 'url({{ $hoverImage }})'"
        onmouseout="this.style.backgroundImage = 'url({{ $coverImage }})'"
        class="w-full h-3/4 md:h-3/5 xl:h-3/4 bg-cover bg-center product_image_container relative overflow-hidden ">
        <div class="size-full product_action absolute hidden top-0 px-3 py-3 left-0 bg-black/30">
            <div class="size-full flex justify-center gap-5 items-center ">

                <a class="btn_primary" href="{{ route('product.view', $pro->slug) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                        <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                    </svg>
                </a>
                <form action="{{ route('addcart') }}" method="POST" class="w-full sm:w-auto flex">
                    @csrf
                    <input type="hidden" name="pid" value="{{ $pro->id }}">
                    <button type="submit" class="btn_primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            <path d="M17 17h-11v-14h-2" />
                            <path d="M6 5l14 1l-1 7h-13" />
                        </svg>
                    </button>
                </form>

            </div>
        </div>
    </div>
    <div class="mt-5 flex flex-col justify-center items-center">
        {{-- su_category --}}
        <a href="{{ route('shop', $pro->sub_category->name) }}"
            class="text-xs sm:text-sm  text-black/60">{{ $pro->sub_category->name }}</a>
        {{-- Title --}}
        <a href="{{ route('product.view', $pro->slug) }}"
            class="text-black p_title  text-xs sm:text-base text-center   xl:text-xl  font-semibold">{{ $pro->name }}</a>
        {{-- rating --}}
        {{-- <x-review /> --}}
        {{-- Price --}}
        <div class="flex justify-center gap-1 items-center">
            @if ($pro->discount_price)
                <p class="text-green-600   font-semibold">PKR. {{ $pro->discount_price }}</p>
                <p class="text-black/60 font-semibold line-through text-xs">{{ $pro->price }}</p>
            @else
                <p class="text-black  font-semibold">PKR. {{ $pro->price }}</p>
            @endif
        </div>
    </div>
</div>
