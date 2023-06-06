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
                    <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#importModal" type="button">Import
                    CSV</button>
            </div>
            <div class="btn-group">
                <a class="btn btn-warning" href="{{ route('product.export') }}">Export As CSV</a>
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
                                        @foreach ($categories as $pCat)
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
                                    <label class="btn btn-dark form-control" for="code"><span><i
                                                class="bi bi-upload"></i></span><span class="ps-2">Upload
                                            CSV</span></label>
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
    <div class="card bg-light w-100 border shadow-none">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table-bordered table-striped table align-middle" id="data">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Codes</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $serial = 1;
                        @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $serial }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>
                                    @if ($product->status == 1)
                                        <span class="badge bg-info">Redeemable</span>
                                    @else
                                        <span class="badge bg-warning">Redeemed</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center fs-6 gap-3">
                                        <a class="text-warning" data-bs-toggle="modal"
                                            data-bs-target="#edit-{{ $product->id }}" href="javascript:;"
                                            aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                        <a class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-{{ $product->id }}" href="javascript:;"
                                            aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                    {{-- Edit Modal --}}
                                    <div class="modal fade" id="edit-{{ $product->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered" aria-hidden="true">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Code Summery</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('product.update', $product) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="bg-light w-100 border shadow-none">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="code">Code</label>
                                                                    <input class="form-control" id="code"
                                                                        name="code" type="text"
                                                                        value="{{ $product->code }}">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <label class="form-label"
                                                                        for="category_id">Category</label>
                                                                    <select class="form-select" id="category_id"
                                                                        name="category_id">
                                                                        @foreach ($categories as $pCat)
                                                                            <option value="{{ $pCat->id }}" disabled>
                                                                                {{ $pCat->name }}
                                                                            </option>
                                                                            @foreach ($pCat->childrenCat as $childCat)
                                                                                <option value="{{ $childCat->id }}"
                                                                                    @selected($childCat->id == $product->category_id || old('category_id') == $childCat->id)>
                                                                                    &#8627; {{ $childCat->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <label class="form-label"
                                                                        for="status">Status</label>
                                                                    <select
                                                                        class="@error('status') is-invalid @enderror form-select mb-3"
                                                                        id="status" name="status">
                                                                        <option value="" hidden>
                                                                            Please Select Status</option>
                                                                        <option value="0"
                                                                            @selected($product->status || old('status') == 0)>
                                                                            Redeemed</option>
                                                                        <option value="1"
                                                                            @selected($product->status || old('status') == 1)>
                                                                            Redeemable</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                            type="button">Close</button>
                                                        <input class="btn btn-primary" name="updateCode" type="submit"
                                                            value="Update Changes">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Delete Modal --}}
                                    <div class="modal fade" id="delete-{{ $product->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered" aria-hidden="true">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete This Code</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal" type="button"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('product.delete', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Are You Sure You Want To Delete This Code?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-bs-dismiss="modal"
                                                            type="button">Close</button>
                                                        <input class="btn btn-danger" name="deleteCode" type="submit"
                                                            value="Delete Code">
                                                    </div>
                                                </form>
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
@endsection
