@extends('backend.admin.layouts.master')
<!-- Page Title -->
@section('page_title', 'Admin Dashboard')
<!-- Additional CSS -->
@push('Backend_style')
<link href="{{ asset('backend') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endpush
<!-- Main Content -->
@section('page_content')

@php
    use Carbon\Carbon;
@endphp

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All event</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All event </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
             <a href="{{ route('event.create') }}" class="btn btn-primary">Add event</a>
               
            </div>
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
                            <th>Image</th>
                            <th>Name Of Presenter</th>
                            <th>Event Topic</th>
                            <th>Status</th>
                            <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $key => $item)
                        <tr>
                           <td> {{ $key+1}} </td>
                           <td>
                                <img src="{{ asset($item->photo) }}" width="70px" height="40px">
                           </td>
                           <td> {{ $item->presenter_name ?? 'NULL' }} </td>
                           <td> {{ $item->event_topic ?? 'NULL' }} </td>
                           <td>

                            @if(Carbon::parse($item->start_time)->isFuture())
                            <span class="badge rounded-pill bg-success">Meeting Upcoming</span>
                            @else
                            @if(Carbon::parse($item->end_time)->isFuture())
                            <span class="badge rounded-pill bg-success">Meeting Running</span>
                            @else
                            <span class="badge rounded-pill bg-danger">Meeting Expire</span>
                            @endif
                            @endif
                           </td>
                           <td>
                             <a href="{{ route('event.edit',$item->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                             <a href="{{ route('event.delete',$item->id) }}"class="btn btn-danger" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Name Of Presenter</th>
                            <th>Event Topic</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
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
  } );
</script>
@endpush
