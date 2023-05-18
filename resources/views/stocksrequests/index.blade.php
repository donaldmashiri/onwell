@extends('layouts.header')
@extends('layouts.topbar')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-success">Request Stock in Your Department</h6>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @if($stocks->count() > 0 )
                            <table class="table">
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
                                            <a href="" class="btn btn-warning btn-sm">Request</a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        @else
                            <h1 class="alert alert-danger">No Stocks Request</h1>
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

                    </div>
                </div>
            </div>



        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
