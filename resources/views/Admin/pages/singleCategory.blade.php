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
                                DigiMart
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
                            <img class="category_cover" src="{{ asset('storage/uploads/' . $categs->img) }}" alt=""
                                srcset="">
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-item-center">
                                    <h3 class="card-title">{{ $categs->name }}</h3>
                                    <a href="{{ route('admin.subcategory.add') }}" class="btn btn-primary">Add Sub
                                        Category</a>

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
                                                <th>Sub Category</th>
                                                <th>Total Products</th>

                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @forelse ($categs->sub_category as $cat)
                                                <tr>
                                                    <td><span class="text-secondary">{{ ++$i }}</span></td>
                                                    <td>
                                                        <p class="text-reset" tabindex="-1">{{ $cat->name }}</p>
                                                    </td>

                                                    <td>
                                                        {{ $cat->product_count }}
                                                    </td>

                                                    <td>
                                                        <span class="badge bg-success me-1"></span> Main
                                                    </td>

                                                    <td class="text-end">
                                                        <span class="dropdown">
                                                            <button class="btn dropdown-toggle align-text-top"
                                                                data-bs-boundary="viewport"
                                                                data-bs-toggle="dropdown">Actions</button>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.subcategory.list') }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                                                        <path
                                                                            d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                                                    </svg>
                                                                    &nbsp;
                                                                    View All Sub Categories
                                                                </a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.subcategory.edit', $cat->id) }}">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                                        <path
                                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                                        <path d="M16 5l3 3" />
                                                                    </svg>
                                                                    &nbsp;
                                                                    Edit
                                                                </a>
                                                                <form action="{{ route('admin.subcategory.delete') }}"
                                                                    method="post">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $cat->id }}">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M4 7l16 0" />
                                                                            <path d="M10 11l0 6" />
                                                                            <path d="M14 11l0 6" />
                                                                            <path
                                                                                d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                            <path
                                                                                d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                        </svg>
                                                                        &nbsp;
                                                                        Delete
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </span>
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
