@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header clearfix">
                    <div id="filter">
                        <form class="listForm" action="" method="get">
                            <div class="row clearfix">
                                <div class="col-md-4 font-weight-bold">Orders - List</div>
                                <div class="col-md-8 text-right">
                                    <input type="text" class="form-control form-control-sm col-md-4 d-inline-block" id="q" name="q" placeholder="Search" value="">
                                    <div class="col-md-1 d-inline-block px-0">
                                        <button type="submit" class="w-100 btn btn-sm btn-dark active">Search</button>
                                    </div>
                                    <div class="col-md-1 d-inline-block px-0"><a href="{{ route('orders.index') }}" class="w-100 btn btn-sm btn-light active">Clear</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                        <div id="response">


                            <div class="row">
                                <div class="col-md-12">
                                    {{ $orders->appends(Request::except('page'))->links() }}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Order ID</th>
                                        <th>Total Amount</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($csrf = csrf_token())
                                    @foreach($orders as $data)
                                        <tr>
                                            <td style="min-width: 20px;">{{ $data->id }}</td>
                                            <td style="min-width: 200px; word-wrap: break-word; white-space: normal;">{{ $data->order_id }}</td>
                                            <td style="min-width: 200px; word-wrap: break-word; white-space: normal;">&#36;{{ $data->final_price }}</td>
                                            <td>{{ $data->payment_status }}</td>
                                            <td>{{ $data->status }}</td>
                                            <td class="text-center" style="min-width: 90px;">
                                                <a class="btn btn-sm btn-success active" href="{{ route('orders.show', $data->id) }}">View</a>
                                            </td>
                                            <td class="text-center" style="min-width: 90px;">
                                                @if($data->payment_status == 'SUCCESS' && $data->status == 'ACCEPTED')
                                                    <a class="btn btn-sm btn-primary active" href="{{ route('orders.edit', $data->id) }}">Dispatch</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $orders->appends(Request::except('page'))->links() }}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
