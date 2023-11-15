@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $is_edit ? 'Update User' : 'Add User' }}</div>

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

                        <form method="POST" action="{{ $is_edit ? route('users.update', $user->id) : route('users.store') }}" enctype="multipart/form-data"
                              data-parsley-validate>
                            {{ csrf_field() }}
                            @if($is_edit)
                                <input type="hidden" name="_method" value="PUT">
                            @endif
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ $user->name }}" placeholder="" data-parsley-required="true">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       value="{{ $user->email }}" placeholder="" data-parsley-required="true">
                            </div>

                            <div class="form-group">
                                <label for="password">Password (Optional: Enter password to update forcefully)</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       value="" placeholder="" {{ $is_edit ? '' : 'data-parsley-required="true"' }}>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('users.index') }}" class="btn btn-danger">Back</a>
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
