@extends('admin.layouts.app')

@section('css')
    <style>
        table.GeneratedTable {
            width: 100%;
            background-color: #ffffff;
            border-collapse: collapse;
            border-width: 2px;
            border-color: #f79e02;
            border-style: solid;
            color: #000000;
        }

        table.GeneratedTable td,
        table.GeneratedTable th {
            border-width: 2px;
            border-color: #f79e02;
            border-style: solid;
            padding: 3px;
        }

        table.GeneratedTable thead {
            background-color: #fff700;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Fail!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Order Lists</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        @if ($orderLists)
                        <div class="table-responsive p-0">
                            @if (count($orderLists) > 0)
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            No</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Product</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Image</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Quantity</th>
                                        <th
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Color</th>
                                        <th
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Total Price</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderLists as $key=>$order)
                                    @php
                                        $order_code = $order->order_code;
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            {{ $order->name }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('dbImg/products/'.$order->image) }}" width="150" alt="">
                                        </td>
                                        <td>
                                            {{ $order->quantity }}
                                        </td>
                                        <td>
                                            {{ $order->product_color }}
                                        </td>
                                        <td>
                                            {{ $order->total_price . " MMK" }}
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $order->created_at->format('d-m-Y') }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class=" text-center">
                                <h4>There is no Items</h4>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>

                <table class="GeneratedTable mt-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Delivery Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{ $deliveryDetail->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $deliveryDetail->email }}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{ $deliveryDetail->phone }}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{ $deliveryDetail->address }}</td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td>{{ $deliveryDetail->message }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('payments.show.code',$order_code) }}" class="btn btn-info mt-2">
                    Go to Payment
                </a>
            </div>
        </div>
    </div>
@endsection
