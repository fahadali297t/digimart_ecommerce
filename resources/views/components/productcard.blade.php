<a id="product_card" href="{{ route('product.view', $pro->slug) }}"
    class="w-full h-full relative overflow-hidden flex-col flex justify-start items-center">
    @if ($pro->discount_price)
        <div class="text-white bg-red-500 px-3 py-3  absolute top-3 right-5">

            -{{ intval(100 - ($pro->discount_price / $pro->price) * 100) }}%

        </div>
    @endif

    <img src="{{ asset('storage/' . $pro->product_image->coverImage) }}" style="display:none;"
        onerror="document.getElementById('productImageContainer-{{ $pro->id }}').style.backgroundImage='url({{ asset('assets/dist/img/error image.png') }})';" />

    <div id="productImageContainer-{{ $pro->id }}"
        style="background-image: url('{{ asset('storage/' . $pro->product_image->coverImage) }}')"
        onmouseover="this.style.backgroundImage = 'url({{ asset('storage/' . $pro->product_image->supportImg1) }})'"
        onmouseout="this.style.backgroundImage = 'url({{ asset('storage/' . $pro->product_image->coverImage) }})'"
        class="w-full product_image_container relative overflow-hidden ">
        <div class="size-full product_action absolute opacity-0 top-0 px-3 py-3 left-0 bg-black/30 ">
            <h1>Hello</h1>
        </div>
    </div>

    <div class="mt-5 flex flex-col justify-center items-center">
        {{-- su_category --}}
        <p class="text-sm text-black/60">{{ $pro->sub_category->name }}</p>
        {{-- Title --}}
        <h1 class="text-black  text-base  xl:text-xl  font-semibold">{{ $pro->name }}</h1>
        {{-- rating --}}
        {{-- <x-review /> --}}
        {{-- Price --}}
        <div class="flex justify-center gap-1 items-center">
            @if ($pro->discount_price)
                <p class="text-green-600  font-semibold">PKR. {{ $pro->discount_price }}</p>
                <p class="text-black/60 font-semibold line-through text-xs">{{ $pro->price }}</p>
            @else
                <p class="text-black  font-semibold">PKR. {{ $pro->price }}</p>
            @endif
        </div>
    </div>
</a>
