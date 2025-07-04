@extends('Admin.layout.dash')

@section('content')
    <div class="page">
        <!-- Sidebar -->
        @include('Admin.layout.sidebar')

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Page Header -->
            <div class="page-header d-print-none border-bottom py-3 mb-4">
                <div class="container-xl">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted">Chawkbazar</small>
                            <h2 class="page-title mb-0">Order Details</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Body -->
            <div class="page-body">
                <div class="container-xl">
                    <div class="row g-4">

                        <!-- Customer & Order Info -->
                        <div class="col-12 col-lg-6">
                            <div class="card shadow-sm">
                                <div class="card-header border-0 pb-0">
                                    <h3 class="card-title mb-0">Customer & Order Info</h3>
                                </div>
                                <div class="card-body pt-3">
                                    <div class="mb-3">
                                        <strong>Order By:</strong>
                                        <p class="mb-1">{{ $order->name }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Address:</strong>
                                        <p class="mb-1">{{ $order->address }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong>City:</strong>
                                        <p class="mb-1">{{ $order->city }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Postal Code:</strong>
                                        <p class="mb-1">{{ $order->postal_code }}</p>
                                    </div>
                                    <div class="mb-0">
                                        <strong>Total Amount:</strong>
                                        <p class="mb-1">{{ $order->total_amount }} /-</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment & Shipment Info -->
                        <div class="col-12 col-lg-6">
                            <div class="card shadow-sm">
                                <div class="card-header border-0 pb-0">
                                    <h3 class="card-title mb-0">Payment & Shipment</h3>
                                </div>
                                <div class="card-body pt-3">
                                    <div class="mb-3">
                                        <strong>Payment Method:</strong>
                                        <p class="mb-1">
                                            {{ $order->payment_method === 'card' ? 'Card Payment' : 'Cash on Delivery' }}
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Payment Status:</strong>
                                        <p class="mb-1" id="payment_status">
                                            {{ $order->payable_status ? 'Paid' : 'Unpaid' }}
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Shipment Status:</strong>
                                        <p class="mb-1">
                                            {{ $order->shipment_status ? $order->shipment_status : 'Processing' }}
                                        </p>
                                    </div>
                                    <div class="d-flex flex-wrap gap-2 mt-4">
                                        <button type="button" onclick="updateOrder({{ $order->id }}, 'payment')"
                                            class="btn btn-success btn-sm">
                                            Mark as Paid
                                        </button>

                                        <button type="button" onclick="updateOrder({{ $order->id }}, 'shipment')"
                                            class="btn btn-primary btn-sm">
                                            Update Shipment Status
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Footer --}}
            {{-- @include('Admin.layout.footer') --}}
        </div>
    </div>
@endsection
