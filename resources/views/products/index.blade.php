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
                                <div class="col-md-4 font-weight-bold">Product Master - List</div>
                                <div class="col-md-8 text-right">
                                    <div class="col-md-1 d-inline-block px-0 mr-5"><a href="{{ url('products/create') }}" class="w-100 btn btn-sm btn-primary active">New</a></div>
                                    <input type="text" class="form-control form-control-sm col-md-4 d-inline-block" id="q" name="q" placeholder="Search" value="">
                                    <div class="col-md-1 d-inline-block px-0">
                                        <button type="submit" class="w-100 btn btn-sm btn-dark active">Search</button>
                                    </div>
                                    <div class="col-md-1 d-inline-block px-0"><a href="javascript:;" class="w-100 btn btn-sm btn-light active">Clear</a></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div id="response">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-md-left py-sm-2">
                                        Showing 1 to 10 of 50 entries
                                    </div>
                                    <ul class="pagination float-md-right" role="navigation">
                                        <li class="page-item disabled" aria-disabled="true" aria-label="First">
                                            <span class="page-link" aria-hidden="true">‹‹</span>
                                        </li>
                                        <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                                            <span class="page-link" aria-hidden="true">‹</span>
                                        </li>
                                        <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                                        <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">15</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:;">16</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:;" rel="next" aria-label="Next »">›</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:;" rel="next" aria-label="Last">››</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>Id</th>
                                        <th>Product Name</th>
                                        <th>Product Description</th>
                                        <th>Currency</th>
                                        <th>Price</th>
                                        <th>SKU</th>
                                        <th colspan="3" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $data)
                                        <tr>
                                            <td style="min-width: 20px;">{{ $data->id }}</td>
                                            <td style="min-width: 200px; word-wrap: break-word; white-space: normal;">{{ $data->product_name }}</td>
                                            <td style="min-width: 200px; word-wrap: break-word; white-space: normal;">{{ $data->product_description }}</td>
                                            <td>{!!  $data->currency_logo !!}</td>
                                            <td>{{ $data->price }}</td>
                                            <td>{{ $data->sku }}</td>
                                            <td class="text-center" style="min-width: 90px;">
                                                <a class="btn btn-sm btn-success active" href="https://communication.test.ideopay.in/emailMaster/edit/1">Edit</a>
                                            </td>
                                            <td class="text-center" style="min-width: 90px;">
                                                <form class="delete-record" action="https://communication.test.ideopay.in/emailMaster/delete/1" method="post">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <input type="hidden" name="_token" value="PsNfrRcYFHGIhUvcEzFUsiwXk9TYCzpD8M5N9Aha">
                                                    <button type="submit" class="btn btn-sm btn-danger active">Delete</button>
                                                </form>
                                            </td>
                                            <td class="text-center" style="min-width: 90px;">
                                                <a class="btn btn-sm btn-info active" href="https://communication.test.ideopay.in/auditLogs/1/email_template_master">Logs</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center">
                            {!! $products->links() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
