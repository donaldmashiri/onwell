@extends('layouts.header')
@extends('layouts.topbar')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-md-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header bg-success  py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-white">Stock Requested</h6>
                        <a href="{{ route('stocksrequests.create') }}" class="btn btn-secondary justify-content-end">Create New Stock Request</a>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @include('partials.errors')
                        @if($stocks->count() > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Available Quantity</th>
                                    <th>Req Quantity</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stocks as $stock)
                                    <tr>
                                        <td>{{$stock->id}}</td>
                                        <td>{{$stock->name}}</td>
                                        <td>{{$stock->type}}</td>
                                        <td>{{$stock->description}}</td>
                                        <td>{{$stock->quantity}}</td>
                                        @foreach($stocksrequests as $stocksrequest)
                                             <td class="text-success font-weight-bold">{{$stocksrequest->quantity_requested}}</td>
                                        <td><h6 class="bg-info p-1">{{$stocksrequest->status}}</h6></td>
                                        @endforeach
                                        <td>
                                            <a href="{{ route('stocksrequests.update', $stocksrequest->id) }}" class="btn btn-primary btn-sm">Approve</a>

                                            <a href="{{ route('stocksrequests.destroy', $stocksrequest->id) }}" class="btn btn-danger btn-sm">Decline</a>

{{--                                            <a href="{{ route('stocksrequests.update', $stocksrequest->id) }}"--}}
{{--                                               onclick="event.preventDefault(); document.getElementById('approve-form-{{ $stocksrequest->id }}').submit();"--}}
{{--                                               class="btn btn-primary btn-sm">Approve</a>--}}

{{--                                            <form id="approve-form-{{ $stocksrequest->id }}" action="{{ route('stocksrequests.update', $stocksrequest->id) }}" method="POST" style="display: none;">--}}
{{--                                                @csrf--}}
{{--                                                @method('PUT')--}}
{{--                                            </form>--}}

{{--                                            <a href="{{ route('stocksrequests.destroy', $stocksrequest->id) }}"--}}
{{--                                               onclick="event.preventDefault(); document.getElementById('decline-form-{{ $stocksrequest->id }}').submit();"--}}
{{--                                               class="btn btn-danger btn-sm">Decline</a>--}}

{{--                                            <form id="decline-form-{{ $stocksrequest->id }}" action="{{ route('stocksrequests.destroy', $stocksrequest->id) }}" method="POST" style="display: none;">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                            </form>--}}
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- Stocks -->
                                <div class="modal fade" id="requestStock{{$stock->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-gradient-success">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Make Stock Request for</h5>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item font-weight-bold">Name : {{ $stock->name }}</li>
                                                    <li class="list-group-item font-weight-bold">Type : {{ $stock->type }}</li>
                                                    <li class="list-group-item text-info">Available Quantity : {{ $stock->quantity }}</li>
                                                </ul>
                                                <hr>
                                                <form action="{{route('stocksrequests.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="stock_id" value="{{$stock->id}}" class="form-control">
                                                    <div class="row mb-3 font-weight-bolder">
                                                        <div class="col-sm-12">
                                                            <label for="inputText" class=" col-form-label">Quantity Requested</label>
                                                            <input type="number" name="quantity_requested" min="1" max="{{ $stock->quantity }}" class="form-control" placeholder="Enter Quantity Requested">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                            </table>
                        @else
                            <h1 class="alert alert-danger">No Stock Requested</h1>
                        @endif
                    </div>
                </div>
            </div>





        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
