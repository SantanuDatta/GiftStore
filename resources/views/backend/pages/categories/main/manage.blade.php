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
                    <li class="breadcrumb-item active" aria-current="page">Main Categories</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-header py-3">
            <h6 class="mb-0">Add New Main Category</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-4 d-flex">
                    <div class="card bg-light w-100 border shadow-none">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('main.add') }}" method="POST"
                                enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        type="text" value="{{ old('name') }}" placeholder="Category name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="4" cols="3" placeholder="Main Category Description">{{ old('description') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="">Feature Main Category?</label><br>
                                    <div class="form-check-inline">
                                        <label class="rdiobox rdiobox-info">
                                            <input class="form-check-input" name="is_featured" type="radio"
                                                value="1">
                                            <span>Enable</span>
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="rdiobox rdiobox-info">
                                            <input class="form-check-input" name="is_featured" type="radio" value="0"
                                                checked>
                                            <span>Disable</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="image">Image Upload [Optional]</label>
                                    <input class="form-control @error('image') is-invalid @enderror" id="image"
                                        name="image" type="file" value="{{ old('image') }}">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="status">Do You Want To Publish This Category?</label>
                                    <select class="@error('status') is-invalid @enderror form-select mb-3" id="status"
                                        name="status">
                                        <option value="" hidden>Please Select Status</option>
                                        <option value="0" @selected(old('status') == 0)>Draft</option>
                                        <option value="1" @selected(old('status') == 1)>Publish</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary" name="addMain">Add Main Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-8 d-flex">
                    <div class="card bg-light w-100 border shadow-none">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table-bordered table-striped table align-middle" id="data">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Featured</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $serial = 1;
                                        @endphp
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $serial }}</td>
                                                <td>
                                                    @if (!is_null($category->image))
                                                        <div class="product-box rounded-circle border p-1">
                                                            <img class="img-fluid"
                                                                src="{{ Storage::disk('mainCat')->url($category->image) }}"
                                                                alt="" style="width: 70%;">
                                                        </div>
                                                    @else
                                                        <div class="product-box rounded-circle border p-1">
                                                            <img class="img-fluid"
                                                                src="{{ Storage::disk('mainCat')->url('logo-icon.png') }}"
                                                                alt="" style="width: 70%;">
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    @if ($category->is_featured == 1)
                                                        <span class="badge bg-primary">Featured</span>
                                                    @else
                                                        <span class="badge bg-secondary">Not Featured</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($category->status == 1)
                                                        <span class="badge bg-info">Published</span>
                                                    @else
                                                        <span class="badge bg-warning">Drafted</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center fs-6 gap-3">
                                                        <a class="text-warning" data-bs-toggle="modal"
                                                            data-bs-target="#view-{{ $category->slug }}"
                                                            href="javascript:void(0)"><i class="bi bi-pencil-fill"></i>
                                                        </a>
                                                        <a class="text-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete-{{ $category->slug }}"
                                                            href="javascript:;"><i class="bi bi-trash-fill"></i>
                                                        </a>
                                                    </div>
                                                    <!-- View Modal -->
                                                    <div class="modal fade" id="view-{{ $category->slug }}"
                                                        aria-hidden="true" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit This Category</h5>
                                                                    <button class="btn-close" data-bs-dismiss="modal"
                                                                        type="button" aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('main.update', $category) }}"
                                                                    method="POST" enctype="multipart/form-data"
                                                                    novalidate>
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="modal-body">
                                                                        <div class="bg-light w-100 border shadow-none">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">Name</label>
                                                                                    <input
                                                                                        class="form-control @error('name') is-invalid @enderror"
                                                                                        name="name" type="text"
                                                                                        value="{{ $category->name }}"
                                                                                        placeholder="Category name">
                                                                                    @error('name')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group mt-3">
                                                                                    <label class="form-label">Slug</label>
                                                                                    <input
                                                                                        class="form-control @error('slug') is-invalid @enderror"
                                                                                        name="slug" type="text"
                                                                                        value="{{ $category->slug }}"
                                                                                        placeholder="Slug name">
                                                                                    @error('slug')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group mt-3">
                                                                                    <label
                                                                                        class="form-label">Description</label>
                                                                                    <textarea class="form-control" name="description" rows="4" cols="3"
                                                                                        placeholder="Main Category Description">{{ $category->description }}</textarea>
                                                                                </div>
                                                                                <div class="form-group mt-3">
                                                                                    <label for="">Feature Main
                                                                                        Category?</label><br>
                                                                                    <div class="form-check-inline">
                                                                                        <label
                                                                                            class="rdiobox rdiobox-info">
                                                                                            <input class="form-check-input"
                                                                                                name="is_featured"
                                                                                                type="radio"
                                                                                                value="1"
                                                                                                @if ($category->is_featured == 1) checked @endif>
                                                                                            <span>Enable</span>
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check-inline">
                                                                                        <label
                                                                                            class="rdiobox rdiobox-info">
                                                                                            <input name="is_featured"
                                                                                                type="radio"
                                                                                                value="0"class="form-check-input"
                                                                                                @if ($category->is_featured == 0) checked @endif>
                                                                                            <span>Disable</span>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group mt-3">
                                                                                    <label class="form-label"
                                                                                        for="image">Image
                                                                                        Upload
                                                                                        [Optional]</label>
                                                                                    @if (!is_null($category->image))
                                                                                        <div class="border p-1">
                                                                                            <img class="img-fluid"
                                                                                                src="{{ Storage::disk('mainCat')->url($category->image) }}"
                                                                                                alt=""
                                                                                                style="width: 30%;text-align: center;display: block;margin: 5px auto;">
                                                                                        </div>
                                                                                    @endif
                                                                                    <input
                                                                                        class="form-control @error('image') is-invalid @enderror"
                                                                                        id="image" name="image"
                                                                                        type="file"
                                                                                        value="{{ $category->image }}">
                                                                                    @error('image')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group mt-3">
                                                                                    <label for="status">Do You Want To
                                                                                        Publish This Category?</label>
                                                                                    <select
                                                                                        class="@error('status') is-invalid @enderror form-select mb-3"
                                                                                        id="status" name="status">
                                                                                        <option value="" hidden>
                                                                                            Please Select Status</option>
                                                                                        <option value="0"
                                                                                            @selected($category->status || old('status') == 0)>
                                                                                            Draft</option>
                                                                                        <option value="1"
                                                                                            @selected($category->status || old('status') == 1)>
                                                                                            Publish</option>
                                                                                    </select>
                                                                                    @error('status')
                                                                                        <div class="invalid-feedback">
                                                                                            {{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button class="btn btn-secondary"
                                                                            data-bs-dismiss="modal"
                                                                            type="button">Close</button>
                                                                        <button class="btn btn-primary" name="updateMain"
                                                                            type="submit">Update changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="delete-{{ $category->slug }}"
                                                        aria-hidden="true" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete This Category</h5>
                                                                    <button class="btn-close" data-bs-dismiss="modal"
                                                                        type="button" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Sure You Want To Delete This Category
                                                                        Permanently!</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <form action="{{ route('main.delete', $category) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-secondary"
                                                                            data-bs-dismiss="modal"
                                                                            type="button">Close</button>
                                                                        <button class="btn btn-danger" name="deleteMain"
                                                                            type="submit">Delete Category</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $serial++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
@endsection
