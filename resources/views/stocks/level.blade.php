@extends('layouts.header')
@extends('layouts.topbar')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header bg-warning py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-dark">Stock Levels</h6>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @if($stocks->count() > 0 )
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Date Added</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($stocks as $stock)
                                    <tr>
                                        <td>#</td>
                                        <td>{{$stock->name}}</td>
                                        <td>{{$stock->type}}</td>
                                        <td>{{$stock->description}}</td>
                                        <td>
                                            @if($stock->quantity < 10)
                                                <p class="alert alert-danger">Stock is low <b class="badge badge-danger">{{$stock->quantity}}</b></p>
                                            @elseif($stock->quantity < 20)
                                                <p class="alert alert-warning">Moderate level <b class="badge badge-warning">{{$stock->quantity}}</b></p>
                                            @else
                                                <p class="alert alert-success">Stock is available <b class="badge badge-success">{{$stock->quantity}}</b></p>
                                            @endif
                                        </td>
                                        <td>{{$stock->created_at}}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        @else
                            <h1 class="alert alert-danger">No Stocks Added</h1>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Stocks -->
            <div class="modal fade" id="addStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-gradient-primary">
                            <h5 class="modal-title text-white" id="exampleModalLabel">Add Stock</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Upload Excel File</label>
                                    <input type="file" name="file" class="form-control" placeholder="Enter Asset Name" minlength="3" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
