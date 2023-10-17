@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add Category</div>

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

                        <form method="POST" action="{{ $is_edit ? route('category.update', $category->id) : route('category.store') }}" enctype="multipart/form-data"
                              data-parsley-validate>
                            {{ csrf_field() }}
                            @if($is_edit)
                                <input type="hidden" name="_method" value="PUT">
                            @endif
                            <div class="form-group">
                                <label for="product_name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $category->name }}" placeholder="" data-parsley-required="true">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('category.index') }}" class="btn btn-danger">Back</a>
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
