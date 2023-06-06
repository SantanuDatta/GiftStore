@extends('backend.layout.template')

@section('body-content')
    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4 mb-3">
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Orders</p>
                            <h4 class="mb-0">5.8K</h4>
                            <p class="font-13 mb-0 mt-2"><i class="bi bi-arrow-up"></i><span>22.5% from last
                                    week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-primary text-white">
                            <i class="bi bi-basket2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Income</p>
                            <h4 class="mb-0">$9,786</h4>
                            <p class="font-13 mb-0 mt-2"><i class="bi bi-arrow-up"></i><span>13.2% from last
                                    week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">Total Views</p>
                            <h4 class="mb-0">875</h4>
                            <p class="font-13 mb-0 mt-2"><i class="bi bi-arrow-up"></i><span>12.3% from last
                                    week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-orange text-white">
                            <i class="bi bi-emoji-heart-eyes"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1">New Clients</p>
                            <h4 class="mb-0">9853</h4>
                            <p class="font-13 mb-0 mt-2"><i class="bi bi-arrow-up"></i><span>32.7% from last
                                    week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-info text-white">
                            <i class="bi bi-people-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->

    <div class="row">
        <div class="col-12 col-lg-8 col-xl-8 d-flex mb-3">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0">Revenue History</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div class="">
                            <h4 class="text-success mb-0">$9,279</h4>
                            <p class="mb-0">Revenue</p>
                        </div>
                        <div class="vr"></div>
                        <div class="">
                            <h4 class="text-pink mb-0">$5,629</h4>
                            <p class="mb-0">Investment</p>
                        </div>
                    </div>
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xl-4 d-flex mb-3">
            <div class="card w-100 rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0">Task Overview</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
                                    class="bi bi-three-dots"></i></div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="chart2"></div>
                </div>
                <ul class="list-group list-group-flush mb-0 shadow-none">
                    <li class="list-group-item border-top bg-transparent"><i
                            class="bi bi-circle-fill me-2 font-weight-bold text-primary"></i> Complete <span
                            class="float-end">120</span></li>
                    <li class="list-group-item bg-transparent"><i
                            class="bi bi-circle-fill me-2 font-weight-bold text-orange"></i> In Progress <span
                            class="float-end">110</span></li>
                    <li class="list-group-item bg-transparent"><i
                            class="bi bi-circle-fill me-2 font-weight-bold text-info"></i> Started <span
                            class="float-end">70</span></li>
                </ul>
            </div>
        </div>

    </div>
    <!--end row-->

    <div class="row row-cols-1 row-cols-lg-4 radial-charts g-4 mb-3">
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="text-center">
                        <p class="mb-1">Orders</p>
                        <h4 class="">9,254</h4>
                    </div>
                    <div class="">
                        <div id="chart3"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-1">Completed</p>
                        <h4 class="">5632</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="text-center">
                        <p class="mb-1">Unique Visitors</p>
                        <h4 class="">5,2684</h4>
                    </div>
                    <div class="">
                        <div id="chart4"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-1">Increased since Last Week</p>
                        <h4 class="">25%</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="text-center">
                        <p class="mb-1">Impressions</p>
                        <h4 class="">7,362</h4>
                    </div>
                    <div class="">
                        <div id="chart5"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-1">Increased since Last Week</p>
                        <h4 class="">45%</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="text-center">
                        <p class="mb-1">Followers</p>
                        <h4 class="">4278K</h4>
                    </div>
                    <div class="">
                        <div id="chart6"></div>
                    </div>
                    <div class="text-center">
                        <p class="mb-1">Increased since Last Week</p>
                        <h4 class="">55%</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->

    <div class="row">
        <div class="col-12 col-lg-6 col-xl-6 d-flex mb-3">
            <div class="card rounded-4 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0">Sales By Countries</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="world-map" style="height: 242px;"></div>
                </div>
                <div class="table-responsive">
                    <table class="align-items-center table">
                        <tbody>
                            <tr>
                                <td><i class="flag-icon flag-icon-gb"></i></td>
                                <td><i class="bi bi-circle-fill me-2 text-primary"></i> Russia</td>
                                <td>
                                    <p class="mb-0">Sales: <span class="fw-bold">28,000</span></p>
                                </td>
                                <td>40%</td>
                            </tr>
                            <tr>
                                <td><i class="flag-icon flag-icon-au"></i></td>
                                <td><i class="bi bi-circle-fill me-2 text-warning"></i> Australia</td>
                                <td>
                                    <p class="mb-0">Sales: <span class="fw-bold">58,000</span></p>
                                </td>
                                <td>60%</td>
                            </tr>
                            <tr>
                                <td><i class="flag-icon flag-icon-us"></i></td>
                                <td><i class="bi bi-circle-fill me-2 text-success"></i> United States</td>
                                <td>
                                    <p class="mb-0">Sales: <span class="fw-bold">72,000</span></p>
                                </td>
                                <td>30%</td>
                            </tr>
                            <tr>
                                <td><i class="flag-icon flag-icon-in"></i></td>
                                <td><i class="bi bi-circle-fill me-2 text-secondary"></i> India</td>
                                <td>
                                    <p class="mb-0">Sales: <span class="fw-bold">68,000</span></p>
                                </td>
                                <td>55%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-6 d-flex mb-3">
            <div class="card rounded-4 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <h6 class="mb-0">Customer Reviews</h6>
                        <div class="fs-5 ms-auto dropdown">
                            <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots"></i>
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex align-items-start gap-3">
                            <div class="review-user">
                                <img class="rounded-circle" src="{{ asset('backend/images/avatars/avatar-1.png') }}"
                                    alt="" width="65" height="65">
                            </div>
                            <div class="review-content ms-3">
                                <div class="rates fs-6 cursor-pointer">
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                    <i class="bx bxs-star text-warning"></i>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <h6 class="mb-0">James Caviness</h6>
                                    <p class="ms-auto mb-0">February 16, 2021</p>
                                </div>
                                <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche
                                    tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro
                                    keffiyeh dreamcatcher synth.</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->

    <div class="row row-cols-1 row-cols-lg-3 mb-3">
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="">
                            <h4 class="mb-0">24.5K</h4>
                            <p class="mb-0">Facebook Followers</p>
                        </div>
                        <div class="fs-2 text-facebook">
                            <i class="bi bi-facebook"></i>
                        </div>
                    </div>
                    <div id="chart7"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="">
                            <h4 class="mb-0">37.8K</h4>
                            <p class="mb-0">Twitter Followers</p>
                        </div>
                        <div class="fs-2 text-twitter">
                            <i class="bi bi-twitter"></i>
                        </div>
                    </div>
                    <div id="chart8"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="">
                            <h4 class="mb-0">56.9K</h4>
                            <p class="mb-0">Youtube Subscribers</p>
                        </div>
                        <div class="fs-2 text-youtube">
                            <i class="bi bi-youtube"></i>
                        </div>
                    </div>
                    <div id="chart9"></div>
                </div>
            </div>
        </div>

    </div>
    <!--end row-->
@endsection
