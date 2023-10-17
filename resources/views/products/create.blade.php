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

                        <form method="POST" action="{{ $is_edit ? route('products.update', $product->id) : route('products.store') }}" enctype="multipart/form-data" data-parsley-validate>
                            {{ csrf_field() }}
                            @if($is_edit)
                                <input type="hidden" name="_method" value="PUT">
                            @endif
                            <div class="form-group">
                                <label for="product_name">Product Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" placeholder="" data-parsley-required="true">
                            </div>
                            <div class="form-group">
                                <label for="product_description">Product Description</label>
                                <input type="text" class="form-control" id="product_description" name="product_description" value="{{ $product->product_description }}" placeholder="" data-parsley-required="true">
                            </div>
                            <div class="form-group">
                                <label for="sku">SKU</label>
                                <input type="text" readonly class="form-control" id="sku" name="sku" placeholder="" value="{{ $product->sku }}" data-parsley-required="true">
                            </div>
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select id="currency" name="currency" class="form-control" data-parsley-required="true">
                                    <option selected value="">Choose...</option>
                                    @foreach($currencies as $currency)
                                    <option value="{{$currency}}" {{ $product->$currency == $currency ? 'selected' : '' }}>{{$currency}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" placeholder="" data-parsley-required="true" data-parsley-type="number">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" accept="image/*" class="form-control" id="image" name="image" placeholder="" {{ $is_edit ? '' : 'data-parsley-required="true"'}}>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('products.index') }}" class="btn btn-danger">Back</a>
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
