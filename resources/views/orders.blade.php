 {{-- <x-app-layout><i class="fa-solid fa-arrow-right"></i></a>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Profile') }}
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
             <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                 <div class="max-w-xl">
                     @include('profile.partials.update-profile-information-form')
                 </div>
             </div>

             <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                 <div class="max-w-xl">
                     @include('profile.partials.update-password-form')
                 </div>
             </div>

             <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                 <div class="max-w-xl">
                     @include('profile.partials.delete-user-form')
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout> --}}




 @extends('layouts.user_layout')

 @section('content')
     @include('layouts.userNav')


     <main class="w-full mb-32 min-h-[100vh]">

         <div style="background-image: url('assets/dist/img/page-header.jpg')"
             class="size-full page_top bg-center bg-cover h-[40vh] bg-blue-500">
             <div class="bg-black/60 flex flex-col justify-center items-center  size-full">
                 <span class="font-satisfy text-white  text-2xl">explore</span>
                 <h1 class="text-3xl text-white font-bold">My Account</h1>
             </div>
         </div>


         <div class="container px-5 md:px-0 m-auto mt-10 ">
             <div class="grid grid-cols-12">
                 <x-profile-nav />
                 <div id="content" class="col-span-12 lg:col-span-8 content">
                     @forelse ($order_item as $item)
                         <div class="bg-slate-200 rounded-lg shadow p-5">
                             <div class="flex justify-between items-center mb-4">
                                 <h2 class="text-lg font-semibold text-indigo-600">Order #{{ $item->id }}</h2>
                                 <span
                                     class="text-sm bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full">{{ $item->shipment_status === '1' ? 'Shipped' : 'Processing' }}</span>
                             </div>

                             <p class="text-sm text-gray-500 mb-2">Placed on: {{ $item->created_at }}</p>

                             <div class="text-sm space-y-1 mb-4">
                                 <p><span class="font-bold">Total:</span> Rs. {{ $item->total_amount }}</p>
                                 <p><span class="font-bold">Payment:&nbsp;</span>
                                     {{ $item->payment_method === 'cod' ? 'Cash on delivery' : 'Card Payment' }}
                                 </p>
                                 <p><span class="font-bold">Payment Status:&nbsp;</span>
                                     {{ $item->payable_status ? 'Paid' : 'Pending Payment' }}
                                 </p>
                             </div>

                             <div>
                                 <h3 class="font-semibold mb-2">Products:</h3>
                                 <ul class="text-sm space-y-1">

                                     @forelse ($products as $key => $item)
                                         <li class="flex flex-col justify-center items-start  border-b pb-1">
                                             <div>
                                                 <span class="">Product Name:</span> <span>{{ $item->name }}</span>

                                             </div>
                                             <span>Qty: {{ $product[$key][$item->id] }}</span>
                                             <span>Price: {{ $item->price }}</span>
                                         </li>
                                     @empty
                                     @endforelse

                                 </ul>
                             </div>

                             <div class="mt-4 text-start">
                                 <a href="#" class="text-indigo-600 text-sm font-medium hover:underline">View
                                     Details</a>
                             </div>
                         </div>
                     @empty
                     @endforelse
                 </div>
             </div>
         </div>
     </main>
 @endsection
