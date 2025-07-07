<div class="col-span-2 min-h-[100vh] max-h-[100vh] sticky top-10 overflow-y-scroll hidden lg:block">
    <div class="mt-10 px-5 py-5 mx-auto">
        @php
            $cat = App\Models\Category::get();
        @endphp
        <h1 class="mb-3 text-xl font-semibold  uppercase">Filter</h1>
        <div class=" flex justify-center gap-2 items-start flex-col">
            @foreach ($cat as $c)
                <div class="flex justify-start items-center gap-3">
                    <input type="checkbox" value="{{ $c->id }}" class="check" name="category"
                        id="{{ $c->id }}">
                    <label for="{{ $c->id }}">
                        {{ $c->name }}
                    </label>
                </div>
            @endforeach

            <div>
                <label for="price">Price:</label>
                <input type="range" name="price" id="price">
            </div>
        </div>
    </div>
</div>
