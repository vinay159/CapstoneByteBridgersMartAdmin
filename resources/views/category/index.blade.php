@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header clearfix">
                    <div id="filter">
                        <form class="listForm" action="javascript:;" method="get">
                            <div class="row clearfix">
                                <div class="col-md-4 font-weight-bold">Category - List</div>
                                <div class="col-md-8 text-right">
                                    <div class="col-md-1 d-inline-block px-0 mr-5"><a href="{{ route('category.create') }}" class="w-100 btn btn-sm btn-primary active">New</a></div>
                                    <input type="text" class="form-control form-control-sm col-md-4 d-inline-block" id="q" name="q" placeholder="Search" value="">
                                    <div class="col-md-1 d-inline-block px-0">
                                        <button type="submit" class="w-100 btn btn-sm btn-dark active">Search</button>
                                    </div>
                                    <div class="col-md-1 d-inline-block px-0"><a href="{{ route('category.index') }}" class="w-100 btn btn-sm btn-light active">Clear</a></div>
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
                                    {{ $category->appends(Request::except('page'))->links() }}
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th colspan="2" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($csrf = csrf_token())
                                    @foreach($category as $data)
                                        <tr>
                                            <td style="min-width: 20px;">{{ $data->id }}</td>
                                            <td style="min-width: 200px; word-wrap: break-word; white-space: normal;">{{ $data->name }}</td>
                                            <td class="text-center" style="min-width: 90px;">
                                                <a class="btn btn-sm btn-success active" href="{{ route('category.edit', $data->id) }}">Edit</a>
                                            </td>
                                            <td class="text-center" style="min-width: 90px;">
                                                <form class="delete-record" action="{{ route('category.destroy', $data->id) }}" method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="{{ $csrf }}">
                                                    @if($data->status == 1)
                                                        <button type="submit" class="btn btn-sm btn-danger active">Delete</button>
                                                    @else
                                                        <button type="submit" class="btn btn-sm btn-primary active">Undelete</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{ $category->appends(Request::except('page'))->links() }}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
