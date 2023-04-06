@extends('backend.layout.template')

@section('body-content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Error</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">404 Error</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="error-404 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card py-5">
                <div class="row g-0">
                    <div class="col col-xl-5">
                        <div class="card-body p-4">
                            <h1 class="display-1"><span class="text-danger">4</span><span class="text-primary">0</span><span
                                    class="text-success">4</span></h1>
                            <h2 class="font-weight-bold display-4">Lost in Space</h2>
                            <p>You have reached the edge of the universe.
                                <br>The page you requested could not be found.
                                <br>Dont'worry and return to the previous page.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <img src="{{ asset('backend/images/error/404-error.png') }}" class="img-fluid" alt="">
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
@endsection
