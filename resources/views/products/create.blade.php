@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header font-weight-bold">Add Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        {{-- add form --}}
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="pname">Product Name</label>
                                    <input type="text" class="form-control" id="pname" placeholder="Product name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pdesc">Product description</label>
                                    <input type="text" class="form-control" id="pdesc" placeholder="Product description">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pbrand">Product Brand</label>
                                    <input type="text" class="form-control" id="pbrand" placeholder="Product Brand">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pmedia">Product Image</label>
                                    <input type="media" class="form-control" id="pmedia" placeholder="Product Image">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="pexpiry">Product Expiry</label>
                                    <input type="media" class="form-control" id="pexpiry" placeholder="Product Expiry">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
