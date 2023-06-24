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
                        <h6 class="m-0 font-weight-bold text-primary">2 Factor Authentication </h6>
                    </div>
                    <!-- Card Body -->

                    <div class="card-body">
                        @include('partials.errors')
                        <div class="card-body">
                            <form method="POST" action="{{ route('verify.factorauth') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="one_time_password" class="col-md-4 col-form-label text-md-right">{{ __('One-Time Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="one_time_password" type="text" class="form-control @error('one_time_password') is-invalid @enderror" name="one_time_password" required autofocus>

                                        @error('one_time_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="security" class="col-md-4 col-form-label text-md-right">{{ __('Security Question :') }}</label>
                                    <div class="col-md-6">
                                        <input id="security" type="text" class="form-control @error('security') is-invalid @enderror" name="security" required autofocus>

                                        @error('security')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('Answer :') }}</label>
                                    <div class="col-md-6">
                                        <input id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" required autofocus>

                                        @error('answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>



                    </div>
                </div>
            </div>


        </div>

    </div>
    <!-- /.container-fluid -->


@endsection
