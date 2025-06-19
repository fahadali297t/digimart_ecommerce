{{-- <x-guest-layout>
    <h1>
        Admin Dashboard
    </h1>
    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>  --}}

 @extends('layouts.layout_auth')

@section('content')
<div class="page page-center">
    <div class="container container-tight py-4">
      <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark">
          <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
        </a>
      </div>
      <form class="card card-md" action="{{ route('admin.register') }}" method="POST" >
        @csrf
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Create Admin account</h2>
          <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control" placeholder="Enter name">
            <div class="mt-2 block text-danger">
                @error('name')
                    {{ $message }}
                @enderror
              </div>          </div>
          <div class="mb-3">
            <label class="form-label" for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email" value="{{  old('email')}}" required autocomplete="username">
            <div class="mt-2 block text-danger">
                @error('email')
                    {{ $message }}
                @enderror
              </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <div class="input-group input-group-flat">
              <input type="password" id="password" class="form-control" name="password"
              required autocomplete="new-password" placeholder="Password" >
              <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </a>
              </span>
              <div class="mt-2 block text-danger">
                @error('password')
                    {{ $message }}
                @enderror
              </div>            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            <div class="input-group input-group-flat">
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password" >
              <span class="input-group-text">
                <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </a>
              </span>

            </div>
            <div class="mt-2 block text-danger">
                @error('password_confirmation')
                    {{ $message }}
                @enderror
              </div>
          </div>
          <div class="mb-3">
            <label class="form-check">
              <input type="checkbox" name="terms" required class="form-check-input"/>
              <span class="form-check-label">Agree the <a href = "" tabindex="-1">terms and policy</a>.</span>

            </label>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Create new account</button>
          </div>
        </div>
      </form>
      <div class="text-center text-secondary mt-3">
        Already have account? <a href="{{ route('admin.login') }}" tabindex="-1">Sign in</a>
      </div>
    </div>
  </div>
@endsection 