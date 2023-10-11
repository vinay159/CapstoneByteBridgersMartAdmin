@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Products</div>

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

                        <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data" data-parsley-validate>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="" data-parsley-required="true">
                            </div>
                            <div class="form-group">
                                <label for="product_description">Product Description</label>
                                <input type="text" class="form-control" id="product_description" name="product_description" placeholder="" data-parsley-required="true">
                            </div>
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" class="form-control" id="sku" name="sku" placeholder="" data-parsley-required="true">
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select id="currency" name="currency" class="form-control" data-parsley-required="true">
                                    <option selected value="">Choose...</option>
                                    @foreach($currencies as $currency)
                                    <option value="{{$currency}}">{{$currency}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="" data-parsley-required="true" data-parsley-type="number">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" accept="image/*" class="form-control" id="image" name="image" placeholder="" data-parsley-required="true">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
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
