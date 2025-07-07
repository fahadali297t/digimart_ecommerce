@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')


    <main class="w-full mb-32 min-h-[100vh]">
        <x-shopTop />
        <div class="container mx-auto">
            <div class=" grid grid-cols-12">
                <div class="col-span-2 hidden lg:block">
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
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-10">
                    <div class=" mt-10 px-5 py-5 mx-auto ">
                        <div id="shop_content" class="grid grid-cols-2 md:grid-cols-3 gap-x-5 gap-y-5 lg:grid-cols-4">



                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{-- Main shop --}}

    </main>
@endsection

@section('scripts')
    <script>
        window.onload = function() {
            fetchData('');
        };

        let checks = document.querySelectorAll(".check");
        let values = [];
        // logic to load products when checked by categories
        checks.forEach(element => {
            element.addEventListener("change", (e) => {
                if (element.checked) {
                    let i = Number(element.value)
                    values.unshift(i);
                    fetchData(values);

                } else {
                    console.log(element.value + 'unchecked')
                    let i = Number(element.value)
                    values = values.filter(val => val !== i);
                    fetchData(values);
                }


                console.log(values)

            });
        });


        function fetchData(values) {
            fetch("/shopFilter", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": csrfToken,
                    },
                    body: JSON.stringify({
                        ids: values,

                    }),
                })
                .then((res) => res.json())
                .then((data) => {
                    console.log(data);
                    document.getElementById('shop_content').innerHTML = data.html;
                })
                .catch((error) => console.error("Error:", error));
        }
    </script>
@endsection
