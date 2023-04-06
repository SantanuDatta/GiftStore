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
                <button type="button" class="btn btn-dark">Import CSV</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-warning">Export As CSV</button>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>
                            <div class="d-flex align-items-center gap-3 fs-6">
                                <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="" data-bs-original-title="View detail"
                                    aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                                <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="" data-bs-original-title="Edit info"
                                    aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                                <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="" data-bs-original-title="Delete"
                                    aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                            </div>
                        </td>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection