@extends('layouts.app')

<link rel="stylesheet" href="{{  asset('css/view_orders.css') }}">

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card white_bg">
                    <div class="card-header">View Orders</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="" enctype="multipart/form-data"
                              data-parsley-validate>
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Order ID #</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{ $order->order_id }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Order Status</span>
                                            <span class="info-box-number text-center mb-0 dispatched">Dispatched</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-light">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center text-muted">Total Price</span>
                                            <span class="info-box-number text-center text-muted mb-0">{{ $order->final_price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center mb-2">
                                                <img class="product_img img-fluid" src="{{ asset('img/macbook_air.jpg') }}" alt="product name">
                                            </div>
                                            <ul class="c_list-group c_list-group-unbordered mb-3">
                                                <li class="c_list-group-item">
                                                    <b>Product Name</b> <span class="float-right">Macbook Air 13</span>
                                                </li>
                                                <li class="c_list-group-item">
                                                    <b>Quantity</b> <span class="float-right">1</span>
                                                </li>
                                                <li class="c_list-group-item">
                                                    <b>Pattern/Category</b> <span class="float-right">Laptop</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="card">
                                        <div class="customer_info">
                                            <h4 class="custom_title">Customer Information</h4>
                                            <p><b>Name:</b> <span>{{ $order->first_name }}, {{ $order->last_name }}</span></p>
                                            <p><b>Address:</b> <span>{{ $order->address }}</span></p>
                                        </div>
                                        <div class="pay_info">
                                            <h4 class="custom_title">Payment Information</h4>
                                            <p><b>Payment Status:</b> <span class="">{{ $order->payment_status }}</span></p>
                                            <p><b>Payment Date:</b> <span>{{ is_null($order->payment_date) ? '' : $order->payment_date->toDateTimeString() }}</span></p>
                                        </div>
                                        <div class="deliver_info">
                                            <p><b>Tracking No.:</b> <span>{{ $order->tracking_no }}</span></p>
                                            <p><b>Delivery Date:</b> <span>{{ is_null($order->delivery_date) ? '' : $order->delivery_date->toDateTimeString() }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
{{--                                <button type="submit" class="btn btn-primary">Save</button>--}}
                                <a href="{{ route('orders.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/parsley.js') }}"></script>
@endsection
