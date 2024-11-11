@extends('backend.admin.layouts.master')
<!-- Page Title -->
@section('page_title', 'Admin Dashboard')
<!-- Additional CSS -->
@push('Backend_style')
    <link href="{{ asset('backend') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endpush
<!-- Main Content -->
@section('page_content')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>

                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Category Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" name="category_name" class="form-control"
                                value="{{ $category->category_name }}" />
                        </div>
                    </div>
                    @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror


                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9 text-secondary">
                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

    </div>


@endsection
<!-- Additional JS -->
@push('Backend_javaScript')
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endpush
