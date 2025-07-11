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
                                <div class="card-header d-flex justify-content-between align-item-center">
                                    <h3 class="card-title">All Admins</h3>
                                    {{-- <a href="{{ route('admin.category.add') }}" class="btn btn-primary">Add New Category</a> --}}

                                </div>

                                <div class="table-responsive">
                                    <table class="table card-table table-vcenter text-nowrap datatable">
                                        <thead>
                                            <tr>
                                                <th class="w-1">No.
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm icon-thick"
                                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M6 15l6 -6l6 6" />
                                                    </svg>
                                                </th>
                                                <th>Admin Name</th>
                                                <th>Email</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @forelse ($admins as $admin)
                                                <tr>
                                                    <td><span class="text-secondary">{{ ++$i }}</span></td>
                                                    <td>
                                                        {{ $admin->name }}
                                                    </td>
                                                    <td>{{ $admin->email }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.admins.remove') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $admin->id }}">
                                                            <button type="submit"
                                                                class="text-white  btn btn-danger">Remove</button>
                                                        </form>
                                                    </td>



                                                </tr>
                                            @empty
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>

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
