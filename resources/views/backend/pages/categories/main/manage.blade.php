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
                    <div class="card shadow-none bg-light border w-100">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('main.add') }}" method="POST"
                                enctype="multipart/form-data" id="add-main-cat" novalidate>
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" placeholder="Category name">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" rows="4" cols="3" placeholder="Main Category Description" name="description">{{ old('description') }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="">Feature Main Category?</label><br>
                                    <div class="form-check-inline">
                                        <label class="rdiobox rdiobox-info">
                                            <input name="is_featured" type="radio" value="1"
                                                class="form-check-input">
                                            <span>Enable</span>
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="rdiobox rdiobox-info">
                                            <input name="is_featured" type="radio" value="0" checked
                                                class="form-check-input">
                                            <span>Disable</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="main-cat-img">Image Upload [Optional]</label>
                                    <input type="file" id="main-cat-img" name="image" class="form-control">
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="status">Do You Want To Publish This Category?</label>
                                    <select name="status" id="status"
                                        class="form-select mb-3 @error('status') is-invalid @enderror">
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
                    <div class="card shadow-none bg-light border w-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data" class="table align-middle table-bordered table-striped">
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
                                                            <img class="img-fluid" style="width: 70%;"
                                                                src="{{ asset('backend/img/categories/' . $category->image) }}"
                                                                alt="">
                                                        </div>
                                                    @else
                                                        <div class="product-box rounded-circle border p-1">
                                                            <img class="img-fluid" style="width: 70%;"
                                                                src="{{ asset('backend/img/categories/logo-icon.png') }}"
                                                                alt="">
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
                                                    <div class="d-flex align-items-center gap-3 fs-6">
                                                        <a href="javascript:void(0)" class="text-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#view-{{ $category->slug }}"><i
                                                                class="bi bi-pencil-fill"></i>
                                                        </a>
                                                        <a href="javascript:;" class="text-danger" data-bs-toggle="modal"
                                                            data-bs-target="#delete-{{ $category->slug }}"><i
                                                                class="bi bi-trash-fill"></i>
                                                        </a>
                                                    </div>
                                                    <!-- View Modal -->
                                                    <div class="modal fade" id="view-{{ $category->slug }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit This Category</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                <form action="{{ route('main.update', $category) }}"
                    method="POST" enctype="multipart/form-data"
                    class="edit-main-cat" novalidate>
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="shadow-none bg-light border w-100">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name"
                                        value="{{ $category->name }}"
                                        placeholder="Category name">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label class="form-label">Slug</label>
                                    <input type="text" name="slug"
                                        class="form-control @error('slug') is-invalid @enderror"
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
                                    <textarea class="form-control" rows="4" cols="3" placeholder="Main Category Description"
                                        name="description">{{ $category->description }}</textarea>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="">Feature Main
                                        Category?</label><br>
                                    <div class="form-check-inline">
                                        <label
                                            class="rdiobox rdiobox-info">
                                            <input name="is_featured"
                                                type="radio"
                                                value="1"
                                                class="form-check-input"
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
                                        for="edit-main-cat-img">Image
                                        Upload
                                        [Optional]</label>
                                    @if (!is_null($category->image))
                                        <div class="border p-1">
                                            <img class="img-fluid"
                                                style="width: 30%;text-align: center;display: block;margin: 5px auto;"
                                                src="{{ asset('backend/img/categories/' . $category->image) }}"
                                                alt="">
                                        </div>
                                    @endif
                                    <input type="file"
                                        id="edit-main-cat-img"
                                        name="image"
                                        class="form-control">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mt-3">
                                    <label for="status">Do You Want To
                                        Publish This Category?</label>
                                    <select name="status" id="status"
                                        class="form-select mb-3 @error('status') is-invalid @enderror">
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
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updateMain"
                            class="btn btn-primary">Update changes</button>
                    </div>
                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Delete Modal -->
                                                    <div class="modal fade" id="delete-{{ $category->slug }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete This Category</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
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
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="deleteMain"
                                                                            class="btn btn-danger">Delete Category</button>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            // Get the modal element
            var modal = document.getElementById('view-{{ $category->slug }}');

            // When the modal is closed, clear any validation errors
            modal.addEventListener('hidden.bs.modal', function(event) {
                $('.invalid-feedback').remove();
                $('.is-invalid').removeClass('is-invalid');
            });

            // Show the modal if there are validation errors
            @if (count($errors) > 0)
                $(modal).modal('show');
            @endif
        });
    </script>
@endpush
