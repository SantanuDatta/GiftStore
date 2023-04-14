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
        @php
            $parentCat = App\Models\Category::with(['products', 'parentCategory', 'childrenCat'])
                ->parent()
                ->orderAsc()
                ->get();
        @endphp
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#importModal">Import
                    CSV</button>
            </div>
            <!-- Import Modal -->
            <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Import Codes</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('product.import') }}" method="POST" enctype="multipart/form-data"
                            novalidate>
                            @csrf
                            <div class="modal-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0 ps-0">
                                            @foreach ($errors->all() as $error)
                                                <li style="list-style: none;">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-12">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-select" name="category_id" id="category_id">
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
                                    <label for="code" class="btn btn-primary">Upload</label>
                                    <input type="file" name="code" id="code" hidden>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="import" class="btn btn-primary" value="Import">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card">
                <form class="row g-3" action="{{ route('product.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="card-header py-3 bg-transparent">
                        <div class="d-sm-flex align-items-center">
                            <h5 class="mb-2 mb-sm-0">Add New Code</h5>
                            <div class="ms-auto">
                                <input type="submit" name="addCode" class="btn btn-primary" value="Add Code">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="col-12">
                                            <label for="code" class="form-label">Code</label>
                                            <input type="text" name="code" id="code"
                                                class="form-control @error('code') is-invalid @enderror mb-3"
                                                placeholder="Product title" value="{{ old('code') }}">
                                            @error('code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="category_id" class="form-label">Category</label>
                                                <select class="form-select mb-3" name="category_id" id="category_id">
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
                                <div class="card shadow-none bg-light border">
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="status" class="form-label">Status</label>
                                                <select name="status" id="status"
                                                    class="form-select mb-3 @error('status') is-invalid @enderror">
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
        </div>
    </div>
    <!--end row-->
@endsection

@push('scripts')
    @include('backend.includes.additionalScripts.ckeditor')
@endpush
