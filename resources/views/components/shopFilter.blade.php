<div class="col-span-2 sticky top-10 hidden lg:block">
    <div class="mt-10 px-5  h-[100vh] sticky top-14 overflow-x-hidden overflow-y-scroll py-5 mx-auto">
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
        </div>
        <div class="mt-5 flex justify-center gap-2 items-start flex-col ">
            <h1 class="text-start text-black text-lg">Price:</h1>
            <div>
                <input class="price hidden" type="radio" value="0" name="price" id="pricelow">
                <label id="priceDown" class="uppercase flex justify-center items-center " for="pricelow">Price <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-down">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M18 13l-6 6" />
                        <path d="M6 13l6 6" />
                    </svg></label>
            </div>
            <div>
                <input class="price hidden" type="radio" value="1" name="price" id="pricehigh">
                <label id="priceUp" class="uppercase flex justify-center items-center " for="pricehigh">Price <svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-up">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 5l0 14" />
                        <path d="M18 11l-6 -6" />
                        <path d="M6 11l6 -6" />
                    </svg></label>
            </div>
        </div>
    </div>

</div>



