@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Products List</h4>
                    <a href="{{ url('products/create') }}"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Product</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <table class="table table-bordered mb-5">
                            <thead>
                            <tr class="table-success">
                                <th scope="col">#</th>
                                <th scope="col">SKU</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Currency</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $data)
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->sku }}</td>
                                    <td>{{ $data->product_name }}</td>
                                    <td>{!!  $data->currency_logo !!}</td>
                                    <td>{{ $data->price }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $products->links() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
