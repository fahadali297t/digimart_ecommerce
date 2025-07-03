<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-gray-50 mt-5 min-h-screen">
    @include('layouts.userNav')
    <div class="size-full flex justify-center items-center min-h-[100vh] bg-gray-50">
        <div class="max-w-md bg-white p-8 rounded-2xl shadow-xl text-center">
            <div class="flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mx-auto mb-6">
                <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" stroke-width="2.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-gray-800 mb-4">Order Successful!</h1>
            <p class="text-gray-600 mb-6">Thank you for your purchase. We’ve received your order and it’s being
                processed.
            </p>

            <a href="/"
                class="inline-block bg-green-500 hover:bg-green-600 text-white text-sm font-semibold px-6 py-3 rounded-lg transition duration-300">
                Continue Shopping
            </a>

            <div class="mt-6 text-gray-400 text-xs">
                <p>Order ID: #{{ $id }}</p>
                <p class="mt-1">You’ll receive an email confirmation shortly.</p>
            </div>
        </div>
    </div>

</body>

</html>

<script src="{{ asset('assets/dist/js/custom.js') }}"></script>
