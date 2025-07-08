@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')

    @php
        $name = 'Shop';
    @endphp

    <main class="w-full mb-32 min-h-[100vh]">
        <x-shopTop :name=$name />
        <div class="container mx-auto">
            <x-shopFilterMobile />


            <section class="mainShop">
                <div class=" grid grid-cols-12">
                    <x-shopFilter />
                    <div class="col-span-12 lg:col-span-10">
                        <div class=" mt-10 px-5 py-5 mx-auto ">
                            <div id="shop_content" class="grid grid-cols-2 md:grid-cols-3 gap-x-5 gap-y-5 xl:grid-cols-4">



                            </div>

                        </div>
                    </div>
                </div>
            </section>
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

                    let i = Number(element.value)
                    values = values.filter(val => val !== i);
                    fetchData(values);
                }




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
                    document.getElementById('shop_content').innerHTML = data.html;
                })
                .catch((error) => console.error("Error:", error));
        }

        // for pricing filters



        let priceElement = document.querySelectorAll('.price');
        priceElement.forEach(element => {
            element.addEventListener('change', function(e) {
                let i = Number(element.value)
                if (i == 0) {
                    document.getElementById('priceDown').classList.add('active');
                    document.getElementById('priceUp').classList.remove('active');

                } else {
                    document.getElementById('priceUp').classList.add('active');
                    document.getElementById('priceDown').classList.remove('active');
                }
                fetch("/shopFilter", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken,
                        },
                        body: JSON.stringify({
                            ids: values,
                            i: i

                        }),
                    })
                    .then((res) => res.json())
                    .then((data) => {
                        document.getElementById('shop_content').innerHTML = data.html;
                    })
                    .catch((error) => console.error("Error:", error));
            })
        });
    </script>

    <script>
        function toggleDropdown(id) {
            let dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
        }
    </script>
@endsection
