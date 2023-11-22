@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
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
                            <div class="form-group">
                                <label for="order_id">Order ID</label>
                                <input type="text" class="form-control" id="order_id" name="order_id" readonly
                                       value="{{ $order->order_id }}" placeholder="" data-parsley-required="true">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" readonly
                                           value="{{ $order->first_name }}" placeholder="" data-parsley-required="true">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" readonly
                                           value="{{ $order->last_name }}" placeholder="" data-parsley-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" readonly
                                       value="{{ $order->address }}" placeholder="" data-parsley-required="true">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="payment_status">Payment Status</label>
                                    <input type="text" class="form-control" id="payment_status" name="payment_status" readonly
                                           value="{{ $order->payment_status }}" placeholder="" data-parsley-required="true">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="payment_date">Payment Date</label>
                                    <input type="text" class="form-control" id="payment_date" name="payment_date" readonly
                                           value="{{ is_null($order->payment_date) ? '' : $order->payment_date->toDateTimeString() }}" placeholder="" data-parsley-required="true">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="tracking_no">Tracking No</label>
                                    <input type="text" class="form-control" id="tracking_no" name="tracking_no" readonly
                                           value="{{ $order->tracking_no }}" placeholder="" data-parsley-required="true">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="delivery_date">Delivery Date</label>
                                    <input type="text" class="form-control" id="delivery_date" name="delivery_date" readonly
                                           value="{{ is_null($order->delivery_date) ? '' : $order->delivery_date->toDateTimeString() }}" placeholder="" data-parsley-required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="final_price">Total Price</label>
                                <input type="text" class="form-control" id="final_price" name="final_price" readonly
                                       value="{{ $order->final_price }}" placeholder="" data-parsley-required="true">
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
