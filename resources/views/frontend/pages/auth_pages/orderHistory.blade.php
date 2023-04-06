@extends('frontend.layout.template')

@section('body-content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">User History</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">History</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- User history section -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        @include('frontend.includes.profileLink')
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card">
                        <div class="ec-vendor-card-header">
                            <h5>Product History</h5>
                            <div class="ec-header-btn">
                                <a class="btn btn-lg btn-primary" href="#">Shop Now</a>
                            </div>
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                <table class="table ec-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><span>225</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/1.jpg"
                                                    alt="product image"></td>
                                            <td><span>Stylish baby shoes</span></td>
                                            <td><span>16 Jul 2021</span></td>
                                            <td><span>$65</span></td>
                                            <td><span>Active</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>548</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/2.jpg"
                                                    alt="product image"></td>
                                            <td><span>Sweat Pullover Hoodie</span></td>
                                            <td><span>13 Aug 2016</span></td>
                                            <td><span>$68</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>684</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/3.jpg"
                                                    alt="product image"></td>
                                            <td><span>T-shirt for girl</span></td>
                                            <td><span>20 Jul 2015</span></td>
                                            <td><span>$360</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>987</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/4.jpg"
                                                    alt="product image"></td>
                                            <td><span>Wool hat for men</span></td>
                                            <td><span>05 Feb 2014</span></td>
                                            <td><span>$584</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>225</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/5.jpg"
                                                    alt="product image"></td>
                                            <td><span>Women leather purse</span></td>
                                            <td><span>23 Jul 2013</span></td>
                                            <td><span>$65</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>548</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/6.jpg"
                                                    alt="product image"></td>
                                            <td><span>Doctor kit toy</span></td>
                                            <td><span>28 Mar 2011</span></td>
                                            <td><span>$68</span></td>
                                            <td><span>Disabled</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><span>684</span></th>
                                            <td><img class="prod-img" src="assets/images/product-image/7.jpg"
                                                    alt="product image"></td>
                                            <td><span>Teddy bear for baby</span></td>
                                            <td><span>16 Apr 2010</span></td>
                                            <td><span>$360</span></td>
                                            <td><span>On Hold</span></td>
                                            <td><span class="tbl-btn"><a class="btn btn-lg btn-primary"
                                                        href="#">View</a></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User history section -->
@endsection