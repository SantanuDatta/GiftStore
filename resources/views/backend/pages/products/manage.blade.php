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
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#importModal">Import
                    CSV</button>
            </div>
            <div class="btn-group">
                <a href="{{ route('product.export') }}" class="btn btn-warning">Export As CSV</a>
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
                                    <label for="code" class="btn btn-dark form-control"><span><i
                                                class="bi bi-upload"></i></span><span class="ps-2">Upload
                                            CSV</span></label>
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
    <div class="card shadow-none bg-light border w-100">
        <div class="card-body">
            <div class="table-responsive">
                <table id="data" class="table align-middle table-bordered table-striped">
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
                                    <div class="d-flex align-items-center gap-3 fs-6">
                                        <a href="javascript:;" class="text-warning" data-bs-toggle="modal"
                                            data-bs-target="#edit-{{ $product->id }}" aria-label="Edit"><i
                                                class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:;" class="text-danger" data-bs-toggle="modal"
                                            data-bs-target="#delete-{{ $product->id }}" aria-label="Delete"><i
                                                class="bi bi-trash-fill"></i></a>
                                    </div>
                                    {{-- Edit Modal --}}
                                    <div class="modal fade" id="edit-{{ $product->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered" aria-hidden="true">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Code Summery</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('product.update', $product) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="shadow-none bg-light border w-100">
                                                            <div class="card-body">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="code">Code</label>
                                                                    <input type="text" class="form-control"
                                                                        name="code" value="{{ $product->code }}"
                                                                        id="code">
                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <label for="category_id"
                                                                        class="form-label">Category</label>
                                                                    <select class="form-select" name="category_id"
                                                                        id="category_id">
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
                                                                    <select name="status" id="status"
                                                                        class="form-select mb-3 @error('status') is-invalid @enderror">
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
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" name="updateCode" class="btn btn-primary"
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
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('product.delete', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>Are You Sure You Want To Delete This Code?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" name="deleteCode" class="btn btn-danger"
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
