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
        <div class="breadcrumb-title pe-3">All subscribe</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Subscriber </li>
                </ol>
            </nav>
        </div>
       
    </div>
    <!--end breadcrumb-->
   
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Email</th>
                            <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $key => $item)
                        <tr>
                           <td> {{ $key+1}} </td>
                           <td> {{ $item->email}} </td>
                           <td>
                             <a href="{{ route('subscribe.delete',$item->id) }}"class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                   
                </table>
            </div>
        </div>
    </div>
    
</div>


@endsection