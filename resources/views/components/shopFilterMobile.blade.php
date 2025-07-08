<div class="w-full  lg:hidden flex justify-between items-center px-4 py-3 bg-gray-100 border-b border-gray-300">
    <!-- Price Filter -->
    <div class="relative">
        <button onclick="toggleDropdown('priceDropdown')"
            class="flex items-center gap-2 px-3 py-2 bg-white border rounded">
            <span>Price</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <!-- Price Dropdown -->
        <div id="priceDropdown" class="absolute z-20 w-40 mt-2 bg-white border rounded shadow hidden">
            <div>
                <input class="hidden peer price" type="radio" value="0" name="price" id="pricelow">
                <label onclick="toggleDropdown('priceDropdown')" for="pricelow"
                    class="block px-4 py-2 cursor-pointer hover:bg-gray-100 peer-checked:bg-gray-800 peer-checked:text-white">Low
                    to High</label>
            </div>
            <div>
                <input class="hidden peer  price" type="radio" value="1" name="price" id="pricehigh">
                <label onclick="toggleDropdown('priceDropdown')" for="pricehigh"
                    class="block px-4 py-2 cursor-pointer hover:bg-gray-100 peer-checked:bg-gray-800 peer-checked:text-white">High
                    to Low</label>
            </div>
        </div>
    </div>

    <!-- Category Filter -->
    <div class="relative">
        <button onclick="toggleDropdown('categoryDropdown')"
            class="flex items-center gap-2 px-3 py-2 bg-white border rounded">
            <span>Categories</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </button>
        <!-- Category Dropdown -->
        <div id="categoryDropdown" class="absolute right-0 z-50 w-48 mt-2 bg-white border rounded shadow hidden">
            @php
                $cat = App\Models\Category::get();
            @endphp
            @foreach ($cat as $c)
                <div>
                    <input type="checkbox" value="{{ $c->id }}" class="hidden check peer" name="category"
                        id="cat{{ $c->id }}">
                    <label onclick="toggleDropdown('categoryDropdown')" for="cat{{ $c->id }}"
                        class="block px-4 py-2 cursor-pointer hover:bg-gray-100 peer-checked:bg-gray-800 peer-checked:text-white">
                        {{ $c->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
