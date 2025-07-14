@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')

    <style>
        .h1 {
            /* font-size: 40px; */
            margin: 0;
            padding: 0;
            text-transform: uppercase;
            letter-spacing: 10px;
            color: white;
            position: relative;
        }

        .h1:before {
            content: "loading..";
            position: absolute;
            top: 0;
            left: 0;

            color: black;
            overflow: hidden;
            border-right: 4px solid black;
            animation: animate 5s linear infinite;
        }

        @keyframes animate {
            0% {
                width: 0;
            }

            50% {
                width: 100%;
            }

            100% {
                width: 0;
            }
        }
    </style>

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
                                <div class="col-span-4  flex justify-center items-center mt-10">
                                    <h1 class="h1 text-sm md:text-3xl  font-semibold text-center w-fit  ">loading..</h1>

                                </div>

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
        document.addEventListener('DOMContentLoaded', () => {
            setCache();
            console.log('cashe set ');

        });
        document.addEventListener('DOMContentLoaded', () => {
            fetchData('');
            console.log('Data fetch set ');

        });



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

        const setCache = () => {
            fetch("/setCashe", {
                method: "GET",
                headers: {
                    "Content-Type": "application/json",
                },

            })

        }

        function fetchData(values) {

            document.getElementById('shop_content').innerHTML = `  <div class="col-span-4  flex justify-center items-center mt-10">
                                    <h1 class="h1 text-sm md:text-3xl  font-semibold text-center w-fit  ">loading..</h1>

                                </div>`;

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
                document.getElementById('shop_content').innerHTML = `  <div class="col-span-4  flex justify-center items-center mt-10">
                                    <h1 class="h1 text-sm md:text-3xl  font-semibold text-center w-fit  ">loading..</h1>

                                </div>
`;

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
