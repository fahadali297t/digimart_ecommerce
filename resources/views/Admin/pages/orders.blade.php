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
                                    <h3 class="card-title">All Orders</h3>
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
                                                <th>Order By</th>
                                                <th>Address</th>
                                                <th>Products details</th>
                                                <th>Total Amount</th>
                                                <th>Payable Status</th>
                                                <th>Payment Method</th>
                                                <th>Shipment Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @forelse ($orders as $order)
                                                <tr>
                                                    <td><span class="text-secondary">{{ ++$i }}</span></td>
                                                    <td><span class=" {{ $order->user_id ? '' : 'text-danger' }}">
                                                            {{ $order->name }} </span>
                                                        <br> {{ $order->email }}
                                                    </td>
                                                    <td>{{ $order->address }} <br>City: {{ $order->city }} &nbsp;
                                                        ({{ $order->postal_code }})
                                                    </td>
                                                    <td>
                                                        <ol>
                                                            @forelse ($order->order_item as $item)
                                                                @forelse ($item->products as $j)
                                                                    <li class="mt-2">
                                                                        {{ $j->name }} - Qty {{ $j->pivot->quantity }}
                                                                    </li>
                                                                @empty
                                                                @endforelse
                                                            @empty
                                                            @endforelse
                                                        </ol>
                                                    </td>
                                                    <td>
                                                        Rs. {{ $order->total_amount }}
                                                    </td>
                                                    <td>{{ $order->payable_status ? 'Paid' : 'Not Paid' }}</td>
                                                    <td>{{ $order->payment_method === 'cod' ? 'Cash on delivery' : 'Card Payment' }}
                                                    </td>
                                                    <td id="table_shipment">
                                                        {{ $order->shipment_status ? $order->shipment_status : 'Pending' }}
                                                    </td>


                                                    <td class="text-end">
                                                        <span class="dropdown">
                                                            <button class="btn dropdown-toggle align-text-top"
                                                                data-bs-boundary="viewport"
                                                                data-bs-toggle="dropdown">Actions</button>
                                                            <div class="dropdown-menu dropdown-menu-end">

                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.order.update', $order->id) }}">
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
                                                                    View and update
                                                                </a>



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
