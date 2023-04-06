@extends('frontend.layout.template')

@section('body-content')
    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">User Profile</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Profile</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- User profile section -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <!-- <div class="ec-vendor-block-bg"></div>
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="assets/images/user/1.jpg" alt="vendor image">
                                    <h5>Mariana Johns</h5>
                                </div> -->
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
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            <div class="ec-vendor-block-bg">
                                                <a href="#" class="btn btn-lg btn-primary"
                                                    data-link-action="editmodal" title="Edit Detail"
                                                    data-bs-toggle="modal" data-bs-target="#edit_modal">Edit Detail</a>
                                            </div>
                                            <div class="ec-vendor-block-detail">
                                                <img class="v-img" src="assets/images/user/1.jpg" alt="vendor image">
                                                <h5 class="name">Mariana Johns</h5>
                                                <p>( Business Man )</p>
                                            </div>
                                            <p>Hello <span>Mariana Johns!</span></p>
                                            <p>From your account you can easily view and track orders. You can manage and change your account information like address, contact information and history of orders.</p>
                                        </div>
                                        <h5>Account Information</h5>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                    <h6>E-mail address <a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg"
                                                        class="svg_img pro_svg" alt="edit" /></a></h6>
                                                    <ul>
                                                        <li><strong>Email 1 : </strong>support1@exapmle.com</li>
                                                        <li><strong>Email 2 : </strong>support2@exapmle.com</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>Contact nubmer<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg"
                                                        class="svg_img pro_svg" alt="edit" /></a></h6>
                                                    <ul>
                                                        <li><strong>Phone Nubmer 1 : </strong>(123) 123 456 7890</li>
                                                        <li><strong>Phone Nubmer 2 : </strong>(123) 123 456 7890</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30">
                                                    <h6>Address<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg"
                                                        class="svg_img pro_svg" alt="edit" /></a></h6>
                                                    <ul>
                                                        <li><strong>Home : </strong>123, 2150 Sycamore Street, dummy text of
                                                            the, San Jose, California - 95131.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address">
                                                    <h6>Shipping Address<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg"
                                                        class="svg_img pro_svg" alt="edit" /></a></h6>
                                                    <ul>
                                                        <li><strong>Office : </strong>123, 2150 Sycamore Street, dummy text of
                                                            the, San Jose, California - 95131.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="ec-vendor-block-img space-bottom-30">
                                                                <div class="ec-vendor-block-bg cover-upload">
                                                                    <div class="thumb-upload">
                                                                        <div class="thumb-edit">
                                                                            <input type='file' id="thumbUpload01" class="ec-image-upload"
                                                                                accept=".png, .jpg, .jpeg" />
                                                                            <label><img src="assets/images/icons/edit.svg"
                                                                                    class="svg_img header_svg" alt="edit" /></label>
                                                                        </div>
                                                                        <div class="thumb-preview ec-preview">
                                                                            <div class="image-thumb-preview">
                                                                                <img class="image-thumb-preview ec-image-preview v-img"
                                                                                    src="assets/images/banner/8.jpg" alt="edit" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ec-vendor-block-detail">
                                                                    <div class="thumb-upload">
                                                                        <div class="thumb-edit">
                                                                            <input type='file' id="thumbUpload02" class="ec-image-upload"
                                                                                accept=".png, .jpg, .jpeg" />
                                                                            <label><img src="assets/images/icons/edit.svg"
                                                                                    class="svg_img header_svg" alt="edit" /></label>
                                                                        </div>
                                                                        <div class="thumb-preview ec-preview">
                                                                            <div class="image-thumb-preview">
                                                                                <img class="image-thumb-preview ec-image-preview v-img"
                                                                                    src="assets/images/user/1.jpg" alt="edit" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ec-vendor-upload-detail">
                                                                    <form class="row g-3">
                                                                        <div class="col-md-6 space-t-15">
                                                                            <label class="form-label">First name</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-6 space-t-15">
                                                                            <label class="form-label">Last name</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-12 space-t-15">
                                                                            <label class="form-label">Address 1</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-12 space-t-15">
                                                                            <label class="form-label">Address 2</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-12 space-t-15">
                                                                            <label class="form-label">Address 3</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-6 space-t-15">
                                                                            <label class="form-label">Email id 1</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-6 space-t-15">
                                                                            <label class="form-label">Email id 2</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-6 space-t-15">
                                                                            <label class="form-label">Phone number 1</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-6 space-t-15">
                                                                            <label class="form-label">Phone number 2</label>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                        <div class="col-md-12 space-t-15">
                                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                                            <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal"
                                                                                aria-label="Close">Close</a>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User profile section -->
@endsection