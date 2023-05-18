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
                        <h6 class="m-0 font-weight-bold text-primary">Add New Stock</h6>
                        <a href="{{ route('stocks.index') }}" class="btn btn-secondary justify-content-end">Back</a>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @include('partials.errors')
                        <form action="{{ route('stocks.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Stock Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter Stock Name" minlength="3" required>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="title">Type of Stock</label>
                                        <select class="form-control" name="type" id="">
                                            <option value="">Type of </option>
                                            <option value="fixed Stock">Fixed Stock</option>
                                            <option value="tangible Stock">Tangible Stock</option>
                                            <option value="intangible Stock">Intangible Stock</option>
                                            <option value="operating Stock">Operating Stock</option>
                                            <option value="non-operating Stock">Non-operating Stock</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="title">Quantity</label>
                                        <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity:" min="1"  required>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="title">Price</label>
                                        <input type="number" name="price" class="form-control" placeholder="Enter Price:" min="1" required>
                                    </div>
                                </div>

                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="title">Additional Description Or Information</label>
                                        <textarea class="form-control" name="description" id="" cols="15" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary float-end">Submit</button>
                                    </div>
                                </div>
                             </div>
                        </form>


                    </div>
                </div>
            </div>


        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
