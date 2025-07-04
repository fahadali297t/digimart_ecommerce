<a href="{{ route('product.view', $pro->slug) }}"
    class="w-full h-full overflow-hidden flex-col flex justify-start items-center">
    <div class="w-full h-3/4">
        <img class="w-full h-full object-cover object-center"
            src="{{ asset('storage/' . $pro->product_image->coverImage) }}" srcset="">
    </div>
    <div class="mt-5 flex flex-col justify-center items-center">
        {{-- su_category --}}
        <p class="text-sm text-black/60">{{ $pro->sub_category->name }}</p>
        {{-- Title --}}
        <h1 class="text-black  text-xl  font-semibold">{{ $pro->name }}</h1>
        {{-- rating --}}
        <x-review />
        {{-- Price --}}
        <div class="flex justify-center gap-1 items-center">
            @if ($pro->discount_price)
                <p class="text-black  font-semibold">PKR. {{ $pro->discount_price }}</p>
                <p class="text-black/60 font-semibold line-through text-xs">{{ $pro->price }}</p>
            @else
                <p class="text-black  font-semibold">PKR. {{ $pro->price }}</p>
                <p class="text-black/60 font-semibold line-through text-xs">{{ $pro->discount_price }}</p>
            @endif
        </div>
    </div>
</a>
