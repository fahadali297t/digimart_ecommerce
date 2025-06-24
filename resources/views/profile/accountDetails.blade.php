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
             class="size-full page_top h-[40vh] bg-blue-500">
             <div class="bg-black/60 flex flex-col justify-center items-center  size-full">
                 <span class="font-satisfy text-white  text-2xl">explore</span>
                 <h1 class="text-3xl text-white font-bold">My Account</h1>
             </div>
         </div>


         <div class="container px-5 md:px-0 m-auto mt-10 ">
             <div class="grid grid-cols-12">
                 <x-profile-nav />
                 <div id="content" class="col-span-12 mt-10 lg:col-span-8 content">
                     @include('profile.partials.update-profile-information-form')

                 </div>
             </div>
         </div>
     </main>
 @endsection
