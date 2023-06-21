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
                        <h6 class="m-0 font-weight-bold text-primary">Budget Planning</h6>
                        <div class="justify-content-en">
                            <a href="{{ route('stocks.create') }}" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addBudget">Add New Budget</a>
                        </div>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @include('partials.errors')

                        @if(empty($lastBudget->amount))
                            <p class="text-info">Please Enter Budget ...</p>
                        @else
                            <ul class="list-group m-3">
                                <li class="list-group-item">Budget <strong>${{ $lastBudget->amount }}</strong></li>
                            </ul>
                        @endif

                        @if($stocks->count() > 0 )

                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach($stocks as $stock)
                                    <tr>
                                        <td>#</td>
                                        <td>{{$stock->name}}</td>
                                        <td>{{$stock->quantity}}</td>
                                        <td>${{$stock->price}}</td>
                                    </tr>
                                    @php
                                        $totalPrice += $stock->price;
                                    @endphp
                                </tbody>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td class="font-weight-bolder text-danger">Total: ${{ $totalPrice }}</td>
                                </tr>
                            </table>

                            <!-- Include SweetAlert CSS -->
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">

                            <!-- Include SweetAlert JS -->
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>


                            <div class="container">
                                <div class="row">
                                @if ($lastBudget->amount > $totalPrice)
                                        <h4 class="text-success">Your budget for stock is higher, you can order more.</h4>
                                        <script>
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Your budget for stock is higher',
                                                text: 'You can order more.',
                                                confirmButtonText: 'OK',
                                            });
                                        </script>
                                    @elseif ($lastBudget->amount < $totalPrice)
                                            <h5 class="text-danger">Your budget for stock is lower, you should consider reducing your order.</h5>
                                        <script>
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Your budget for stock is lower',
                                                text: 'You should consider reducing your order.',
                                                confirmButtonText: 'OK',
                                            });
                                        </script>
                                    @else
                                            <h6 class="text-info">Your budget for stock matches the total price. You can proceed with the order.</h6>
                                        <script>
                                            Swal.fire({
                                                icon: 'info',
                                                title: 'Your budget for stock matches the total price',
                                                text: 'You can proceed with the order.',
                                                confirmButtonText: 'OK',
                                            });
                                        </script>
                                    @endif

                                </div>
                            </div>

                        @else
                            <h1 class="alert alert-danger">No Stocks Added</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Budget -->
        <div class="modal fade" id="addBudget" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-gradient-primary">
                        <h5 class="modal-title text-white" id="exampleModalLabel">$$ Add Budget</h5>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('budgets.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="number" name="amount" class="form-control"  required>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
