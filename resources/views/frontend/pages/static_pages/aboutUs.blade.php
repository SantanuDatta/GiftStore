@extends('frontend.layout.template')

@section('body-content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">About Us</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">About Us</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec About Us page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">About Us</h2>
                        <h2 class="ec-title">About Us</h2>
                        <p class="sub-title mb-3">About our business Firm</p>
                    </div>
                </div>
                <div class="ec-common-wrapper">
                    <div class="row">
                        <div class="col-md-6 ec-cms-block ec-abcms-block text-center">
                            <div class="ec-cms-block-inner">
                            <img class="a-img" src="{{ asset('frontend/images/offer-image/1.jpg') }}" alt="about">
                            </div>
                        </div>
                        <div class="col-md-6 ec-cms-block ec-abcms-block text-center">
                            <div class="ec-cms-block-inner">
                                <h3 class="ec-cms-block-title">What is the ekka?</h3>
                                <p>Electronic typesetting text of the printing and typesetting industry. when an unknown printer took a galley of type
                                    and scrambled it to make a type specimen book. Lorem Ipsum is
                                    simply dutmmy text ever since the 1500s, It has survived not only,
                                    but also the leap into electronic typesetting.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing. It has survived not only five centuries,
                                    but also the leap into electronic typesetting.</p>
                                <p>Also the leap into electronic typesetting printing and typesetting industry. It has survived not only five centuries,
                                    but also the leap into electronic typesetting, when an unknown printer took a galley of type
                                    and scrambled it to make a type specimen book. It has survived not only five centuries,
                                    but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ec testmonial Start -->
    <section class="section ec-test-section section-space-ptb-100 section-space-m">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title mb-0">
                        <h2 class="ec-bg-title">Testimonial</h2>
                        <h2 class="ec-title">Client Review</h2>
                        <p class="sub-title mb-3">What say client about us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ec-test-outer">
                    <ul id="ec-testimonial-slider">
                        <li class="ec-test-item">
                            <img src="{{ asset('frontend/images/testimonial/top-quotes.svg') }}" class="svg_img test_svg top" alt="" />
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="{{ asset('frontend/images/testimonial/1.jpg') }}" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen</div>
                                    <div class="ec-test-name">John Doe</div>
                                    <div class="ec-test-designation">General Manager</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('frontend/images/testimonial/bottom-quotes.svg') }}" class="svg_img test_svg bottom"
                                alt="" />
                        </li>
                        <li class="ec-test-item">
                            <img src="{{ asset('frontend/images/testimonial/top-quotes.svg') }}" class="svg_img test_svg top" alt="" />
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="{{ asset('frontend/images/testimonial/2.jpg') }}" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen</div>
                                    <div class="ec-test-name">John Doe</div>
                                    <div class="ec-test-designation">General Manager</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('frontend/images/testimonial/bottom-quotes.svg') }}" class="svg_img test_svg bottom"
                                alt="" />
                        </li>
                        <li class="ec-test-item">
                            <img src="{{ asset('frontend/images/testimonial/top-quotes.svg') }}" class="svg_img test_svg top" alt="" />
                            <div class="ec-test-inner">
                                <div class="ec-test-img"><img alt="testimonial" title="testimonial"
                                        src="{{ asset('frontend/images/testimonial/2.jpg') }}" /></div>
                                <div class="ec-test-content">
                                    <div class="ec-test-desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                                        ever since the 1500s, when an unknown printer took a galley of type and
                                        scrambled it to make a type specimen</div>
                                    <div class="ec-test-name">John Doe</div>
                                    <div class="ec-test-designation">General Manager</div>
                                    <div class="ec-test-rating">
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                        <i class="ecicon eci-star fill"></i>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('frontend/images/testimonial/bottom-quotes.svg') }}" class="svg_img test_svg bottom"
                                alt="" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ec testmonial end -->

    <!-- Services Section Start -->
    <section class="section ec-services-section section-space-p">
        <h2 class="d-none">Services</h2>
        <div class="container">
            <div class="row">
                <div class="ec_ser_content ec_ser_content_1 col-sm-12 col-md-6 col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{ asset('frontend/images/icons/service_1.svg') }}" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Free Shipping</h2>
                            <p>Free shipping on all US order or order above $200</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_2 col-sm-12 col-md-6 col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{ asset('frontend/images/icons/service_2.svg') }}" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>24X7 Support</h2>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_3 col-sm-12 col-md-6 col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{ asset('frontend/images/icons/service_3.svg') }}" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>30 Days Return</h2>
                            <p>Simply return it within 30 days for an exchange</p>
                        </div>
                    </div>
                </div>
                <div class="ec_ser_content ec_ser_content_4 col-sm-12 col-md-6 col-lg-3">
                    <div class="ec_ser_inner">
                        <div class="ec-service-image">
                            <img src="{{ asset('frontend/images/icons/service_4.svg') }}" class="svg_img" alt="" />
                        </div>
                        <div class="ec-service-desc">
                            <h2>Payment Secure</h2>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->
@endsection