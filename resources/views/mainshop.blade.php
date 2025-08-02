@extends('layouts.user_layout')

@section('content')
    @include('layouts.userNav')

    <style>
        .loader {
            position: relative;
            width: 120px;
            height: 120px;
        }

        h3 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 18px;
            color: #101a36;
        }

        .span1 {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform: rotate(calc(45deg * var(--i)));
        }

        .span1:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #74baff72;
        }

        .span1:nth-child(even):before {
            background: #2980b9;
            animation: circle 1s linear infinite;
            transform-origin: 60px;
        }

        @keyframes circle {

            0%,
            25% {
                transform: rotate(0deg) scale(1);
            }

            50% {
                transform: rotate(90deg) scale(1.3);
            }

            75%,
            100% {
                transform: rotate(180deg) scale(1);
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

                                <div class="w-full col-span-4 h-full flex justify-center items-center ">

                                    <div class="box1 mt-10">
                                        <div class="loader">
                                            <span class="span1" style="--i: 1"></span>
                                            <span class="span1" style="--i: 2"></span>
                                            <span class="span1" style="--i: 3"></span>
                                            <span class="span1" style="--i: 4"></span>
                                            <span class="span1" style="--i: 5"></span>
                                            <span class="span1" style="--i: 6"></span>
                                            <span class="span1" style="--i: 7"></span>
                                            <span class="span1" style="--i: 8"></span>
                                        </div>
                                    </div>
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
        window.addEventListener('load', () => {
            fetchData('');

        })
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
            document.getElementById('shop_content').innerHTML = ` <div class="w-full col-span-4 h-full flex justify-center items-center ">

                                    <div class="box1 mt-10">
                                        <div class="loader">
                                            <span class="span1" style="--i: 1"></span>
                                            <span class="span1" style="--i: 2"></span>
                                            <span class="span1" style="--i: 3"></span>
                                            <span class="span1" style="--i: 4"></span>
                                            <span class="span1" style="--i: 5"></span>
                                            <span class="span1" style="--i: 6"></span>
                                            <span class="span1" style="--i: 7"></span>
                                            <span class="span1" style="--i: 8"></span>
                                        </div>
                                    </div>
                                </div>`
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
                document.getElementById('shop_content').innerHTML = ` <div class="w-full col-span-4 h-full flex justify-center items-center ">

                                    <div class="box1 mt-10">
                                        <div class="loader">
                                            <span class="span1" style="--i: 1"></span>
                                            <span class="span1" style="--i: 2"></span>
                                            <span class="span1" style="--i: 3"></span>
                                            <span class="span1" style="--i: 4"></span>
                                            <span class="span1" style="--i: 5"></span>
                                            <span class="span1" style="--i: 6"></span>
                                            <span class="span1" style="--i: 7"></span>
                                            <span class="span1" style="--i: 8"></span>
                                        </div>
                                    </div>
                                </div>`
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
