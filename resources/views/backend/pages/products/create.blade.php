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
                    <li class="breadcrumb-item active" aria-current="page">Add New Code</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#importModal" type="button">Import
                    CSV</button>
            </div>
            <!-- Import Modal -->
            <div class="modal fade" id="importModal" aria-labelledby="importModalLabel" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Import Codes</h1>
                            <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data"
                            novalidate>
                            @csrf
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="ps-0 mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li style="list-style: none;">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <label class="form-label" for="category_id">Category</label>
                                    <select class="form-select" id="category_id" name="category_id">
                                        @foreach ($parentCat as $pCat)
                                            <option value="{{ $pCat->id }}" disabled>{{ $pCat->name }}
                                            </option>
                                            @foreach ($pCat->childrenCat as $childCat)
                                                <option value="{{ $childCat->id }}">&#8627;
                                                    {{ $childCat->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mt-3">
                                    <label class="btn btn-primary" for="code">Upload</label>
                                    <input id="code" name="code" type="file" hidden>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">Close</button>
                                <input class="btn btn-primary" name="import" type="submit" value="Import">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <form class="row g-3" action="{{ route('product.store') }}" method="POST" novalidate>
            @csrf
            <div class="card-header bg-transparent py-3">
                <div class="d-sm-flex align-items-center">
                    <h6 class="mb-0">Add New Code</h6>
                    <div class="ms-auto">
                        <input class="btn btn-primary" name="addCode" type="submit" value="Add Code">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-12 col-lg-4">
                        <div class="card bg-light border shadow-none">
                            <div class="card-body">
                                <div class="col-12">
                                    <label class="form-label" for="code">Code</label>
                                    <input class="form-control @error('code') is-invalid @enderror mb-3" id="code"
                                        name="code" type="text" value="{{ old('code') }}"
                                        placeholder="Product title">
                                    @error('code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4">
                        <div class="card bg-light border shadow-none">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label" for="category_id">Category</label>
                                        <select class="form-select mb-3" id="category_id" name="category_id">
                                            @foreach ($parentCat as $pCat)
                                                <option value="{{ $pCat->id }}" disabled>{{ $pCat->name }}
                                                </option>
                                                @foreach ($pCat->childrenCat as $childCat)
                                                    <option value="{{ $childCat->id }}">&#8627;
                                                        {{ $childCat->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="card bg-light border shadow-none">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label" for="status">Status</label>
                                        <select class="@error('status') is-invalid @enderror form-select mb-3"
                                            id="status" name="status">
                                            <option value="" hidden>Please Select Status</option>
                                            <option value="0" @selected(old('status') == 0)>Redeemed</option>
                                            <option value="1" @selected(old('status') == 1)>Redeemable</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </form>
    </div>
    <!--end row-->
@endsection

@push('scripts')
    @include('backend.includes.additionalScripts.ckeditor')
@endpush
