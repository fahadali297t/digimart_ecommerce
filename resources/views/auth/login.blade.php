{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<x-auth-session-status class="mb-4" :status="session('status')" />
@extends('layouts.layout_auth')

@section('content')

  <div class="page page-center">
  <div class="container container-tight py-4">
    <div class="text-center mb-4">
      <a href="." class="navbar-brand   navbar-brand-autodark">
        DigiMart
    </a>
    </div>
    <div class="card card-md">
      <div class="card-body">
        <h2 class="h2 text-center mb-4">Login to your account</h2>
        <form action="{{ route('login') }}" method="POST" >
            @csrf
            <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off">
              <div class="mt-2 block text-danger">
                @error('email')
                    {{ $message }}
                @enderror
              </div>
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
              <span class="form-label-description">
                <a href="{{ route('password.request') }}">I forgot password</a>
              </span>
            </label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control" name="password"  placeholder="Your password"  autocomplete="off">
              <x-input-error :messages="$errors->get('password')" class="mt-2" />
              <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </a>
              </span>
            </div>
          </div>
          <div class="mb-2">
            <label class="form-check">
              <input type="checkbox" class="form-check-input"/>
              <span class="form-check-label">Remember me on this device</span>
            </label>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
          </div>
        </form>
      </div>
     
    </div>
    <div class="text-center text-secondary mt-3">
      Don't have account yet? <a href="{{ route('register') }}" tabindex="-1">Sign up</a>
    </div>
  </div>
  </div>
  
@endsection