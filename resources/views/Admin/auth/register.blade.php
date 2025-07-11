@extends('Admin.layout.dash')

@section('content')
    <div class="page">
        <!-- Sidebar -->
        @include('Admin.layout.sidebar')

        {{-- Page Module --}}
        <div class="page-wrapper">
            <!-- Page header -->
            <div class="page-header d-print-none">
                <div class="container-xl">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                Chawkbazar
                            </div>

                        </div>
                        <!-- Page title actions -->

                    </div>
                </div>
            </div>
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-deck row-cards">

                        <div class="col-12">
                            <div class="card">
                                <form class="card card-md" action="{{ route('admin.register') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <h2 class="card-title text-center mb-4">Add New Admin</h2>
                                        <div class="mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                                required class="form-control" placeholder="Enter name">
                                            <div class="mt-2 block text-danger">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="email">Email address</label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Enter email" name="email" value="{{ old('email') }}"
                                                required autocomplete="username">
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
                                                    required autocomplete="new-password" placeholder="Password">
                                                <span class="input-group-text">
                                                    <a href="#" class="link-secondary" title="Show password"
                                                        data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                            <path
                                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                        </svg>
                                                    </a>
                                                </span>
                                                <div class="mt-2 block text-danger">
                                                    @error('password')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                                            <div class="input-group input-group-flat">
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation" required autocomplete="new-password"
                                                    placeholder="Confirm Password">
                                                <span class="input-group-text">
                                                    <a href="#" class="link-secondary" title="Show password"
                                                        data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                            <path
                                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                        </svg>
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
                                                <input type="checkbox" name="terms" required class="form-check-input" />
                                                <span class="form-check-label">Agree the <a href = ""
                                                        tabindex="-1">terms and
                                                        policy</a>.</span>

                                            </label>
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-primary w-100">Create new
                                                account</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
            {{-- @include('Admin.layout.footer') --}}
        </div>
    </div>


    {{-- Report Modal --}}
    @include('Admin.layout.reportModal')
@endsection
