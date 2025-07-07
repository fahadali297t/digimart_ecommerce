<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Digimart') }}</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/dist/css/user.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://unpkg.com/flowbite@latest/dist/flowbite.min.js"></script>


</head>

<body>
    @yield('content')

    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- Shop Section -->
            <div>
                <h2 class="text-lg font-semibold mb-4">SHOP</h2>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-white">New In</a></li>
                    <li><a href="#" class="hover:text-white">Women</a></li>
                    <li><a href="#" class="hover:text-white">Men</a></li>
                    <li><a href="#" class="hover:text-white">Shoes</a></li>
                    <li><a href="#" class="hover:text-white">Bags & Accessories</a></li>
                    <li><a href="#" class="hover:text-white">Top Brands</a></li>
                    <li><a href="#" class="hover:text-white">Sale & Special Offers</a></li>
                </ul>
            </div>

            <!-- Information Section -->
            <div>
                <h2 class="text-lg font-semibold mb-4">INFORMATION</h2>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-white">About</a></li>
                    <li><a href="#" class="hover:text-white">Blog</a></li>
                </ul>
            </div>

            <!-- Customer Service Section -->
            <div>
                <h2 class="text-lg font-semibold mb-4">CUSTOMER SERVICE</h2>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#" class="hover:text-white">Search Terms</a></li>
                    <li><a href="#" class="hover:text-white">Advanced Search</a></li>
                    <li><a href="#" class="hover:text-white">Orders And Returns</a></li>
                    <li><a href="#" class="hover:text-white">Contact Us</a></li>
                    <li><a href="#" class="hover:text-white">Theme FAQs</a></li>
                    <li><a href="#" class="hover:text-white">Consultant</a></li>
                    <li><a href="#" class="hover:text-white">Store Locations</a></li>
                </ul>
            </div>

            <!-- Newsletter and Social Section -->
            <div>
                <h2 class="text-lg font-semibold mb-4">NEWSLETTER SIGN UP</h2>
                <p class="text-gray-300 mb-4">Sign up for exclusive updates, new arrivals & insider-only discounts</p>
                <form class="flex mb-4">
                    <input type="email" placeholder="Enter your email address"
                        class="w-full p-2 rounded-l bg-gray-800 text-gray-300 focus:outline-none">
                    <button type="submit" class="bg-white text-gray-900 px-4 rounded-r font-semibold">SUBMIT</button>
                </form>
                <div class="flex space-x-3">
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-gray-800 rounded-full hover:bg-white hover:text-gray-900 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-gray-800 rounded-full hover:bg-white hover:text-gray-900 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-gray-800 rounded-full hover:bg-white hover:text-gray-900 transition">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-gray-800 rounded-full hover:bg-white hover:text-gray-900 transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-gray-800 rounded-full hover:bg-white hover:text-gray-900 transition">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800 mt-8 pt-6 text-gray-500 text-sm text-center">
            <p>&copy; 2024, Ella Demo. All Rights Reserved. Themes By Halothemes</p>
            <div class="flex justify-center space-x-3 mt-4">
                <img src="visa.png" alt="Visa" class="h-6">
                <img src="mastercard.png" alt="MasterCard" class="h-6">
                <img src="paypal.png" alt="Paypal" class="h-6">
                <img src="applepay.png" alt="Apple Pay" class="h-6">
                <img src="bitcoin.png" alt="Bitcoin" class="h-6">
            </div>
        </div>
    </footer>
    {{-- js --}}
    <script src="{{ asset('assets/dist/js/custom.js') }}"></script>
    @yield('scripts');
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>

</html>
