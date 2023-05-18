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
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Request Stock in Your Department</h6>
                        <a href="{{ route('stocksrequests.index') }}" class="btn btn-secondary justify-content-end">Back</a>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        <table class="table table-bordered table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Quantity</th>
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
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#requestStock{{$stock->id}}">Request</a>
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
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
