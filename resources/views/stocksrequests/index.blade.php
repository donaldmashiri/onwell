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
                        @if(Auth::user()->role === "admin")
                        @else
                            <a href="{{ route('stocksrequests.create') }}" class="btn btn-secondary justify-content-end">Create New Stock Request</a>
                        @endif

                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @include('partials.errors')
                        @if($stockRequests->count() > 0)
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
                                @foreach ($stockRequests as $stockRequest)
                                    <tr>
                                        <td>{{ $stockRequest->stock->id }}</td>
                                        <td>{{ $stockRequest->stock->name }}</td>
                                        <td>{{ $stockRequest->stock->type }}</td>
                                        <td>{{ $stockRequest->stock->description }}</td>
                                        <td>{{ $stockRequest->stock->quantity }}</td>
                                        <td>{{ $stockRequest->quantity_requested }}</td>
                                        <td>
                                            @if($stockRequest->status == 'Approved')
                                                <p class="text-success fw-bolder">{{ $stockRequest->status }}</p>
                                            @elseif($stockRequest->status == 'Declined')
                                                <p class="text-danger fw-bolder">{{ $stockRequest->status }}</p>
                                            @else
                                                {{$stockRequest->status}}
                                            @endif
                                        </td>
                                        <td>
                                            @if(Auth::user()->role === "admin")
                                            <form action="{{ route('stocksrequests.update', $stockRequest->id) }}" method="POST" id="statusForm">
                                                @csrf
                                                @method('PUT')
                                                <button onclick="showAlert()"  class="btn btn-success btn-sm" name="status" value="Approved" type="submit">Approve</button>
                                                <button onclick="showDAlert()" class="btn btn-danger btn-sm" name="status" value="Declined" type="submit">Decline</button>
                                            </form>

                                            @endif

                                        </td>
                                    </tr>
                                </tbody>

                                <!-- Stocks -->
                                <div class="modal fade" id="requestStock{{$stockRequest->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-gradient-success">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Make Stock Request for</h5>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item font-weight-bold">Name : {{ $stockRequest->stock->name }}</li>
                                                    <li class="list-group-item font-weight-bold">Type : {{ $stockRequest->stock->type }}</li>
                                                    <li class="list-group-item text-info">Available Quantity : {{ $stockRequest->stock->quantity }}</li>
                                                </ul>
                                                <hr>
                                                <form action="{{route('stocksrequests.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="stock_id" value="{{$stockRequest->id}}" class="form-control">
                                                    <div class="row mb-3 font-weight-bolder">
                                                        <div class="col-sm-12">
                                                            <label for="inputText" class=" col-form-label">Quantity Requested</label>
                                                            <input type="number" name="quantity_requested" min="1" max="{{ $stockRequest->stock->quantity }}" class="form-control" placeholder="Enter Quantity Requested">
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
