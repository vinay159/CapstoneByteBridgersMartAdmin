@extends('layouts.app')

<link rel="stylesheet" href="{{  asset('css/view_orders.css') }}">

@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-12">
                <div class="card white_bg">
                    <div class="card-header"><h3 class="vo_title">Your Orders</h3></div>

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
                                            <span class="info-box-number text-center text-muted mb-0">${{ $order->final_price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row custom_row">
                                <div class="custom_card">
                                    <div class="col-5">
                                        <div class="customer_info">
                                            <p>Name: <span>{{ $order->first_name }}, {{ $order->last_name }}</span></p>
                                            <p>Address: <span>{{ $order->address }}</span></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="pay_info">
                                            <p>Payment Status: <span class="{{ $order->payment_status }}">{{ $order->payment_status }}</span></p>
                                            <p>Payment Date: <span>{{ is_null($order->payment_date) ? '' : $order->payment_date->toDateTimeString() }}</span></p>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="deliver_info">
                                            <p>Tracking No.: <span>{{ $order->tracking_no }}</span></p>
                                            <p>Delivery Date: <span>{{ is_null($order->delivery_date) ? '' : $order->delivery_date->toDateTimeString() }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Macbook Air 13</td>
                                        <td>1</td>
                                        <td>$1589.55</td>
                                        <td>$1580.55</td>
                                    </tr>
                                    <tr>
                                        <td>Macbook Air 13</td>
                                        <td>1</td>
                                        <td>$1589.55</td>
                                        <td>$1580.55</td>
                                    </tr>
                                    <tr>
                                        <td>Macbook Air 13</td>
                                        <td>1</td>
                                        <td>$1589.55</td>
                                        <td>$1580.55</td>
                                    </tr>
                                    <tr>
                                        <td>Macbook Air 13</td>
                                        <td>1</td>
                                        <td>$1589.55</td>
                                        <td>$1580.55</td>
                                    </tr>
                                    <tr>
                                        <td>Macbook Air 13</td>
                                        <td>1</td>
                                        <td>$1589.55</td>
                                        <td>$1580.55</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                            <div class="form-group">
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
