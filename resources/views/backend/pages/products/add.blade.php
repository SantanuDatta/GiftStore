@extends('backend.layout.template')

@section('body-content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">eCommerce</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-dark">Import CSV</button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <div class="card-header py-3 bg-transparent">
                    <div class="d-sm-flex align-items-center">
                        <h5 class="mb-2 mb-sm-0">Add New Product</h5>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12 col-lg-8">
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">
                                    <form class="row g-3" novalidate>
                                        <div class="col-12">
                                            <label class="form-label">Product title</label>
                                            <input type="text" class="form-control" placeholder="Product title">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">SKU</label>
                                            <input type="text" class="form-control" placeholder="SKU">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Full description</label>
                                            <textarea id="description" class="form-control" placeholder="Full description" rows="4" cols="4"></textarea>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="card shadow-none bg-light border">
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label class="form-label">Price</label>
                                            <input type="text" class="form-control" placeholder="Price">
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Status</label>
                                            <select class="form-select">
                                                <option>Published</option>
                                                <option>Draft</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Tags</label>
                                            <input type="text" class="form-control" placeholder="Tags">
                                        </div>
                                        <div class="col-12">
                                            <h5>Categories</h5>
                                            <div class="category-list">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="Jeans">
                                                    <label class="form-check-label" for="Jeans">
                                                        Jeans
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Images</label>
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
@endsection

@push('scripts')
    @include('backend.includes.additionalScripts.ckeditor')
@endpush
