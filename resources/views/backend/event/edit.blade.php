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
        <div class="breadcrumb-title pe-3">Edit event</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit event</li>
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
          <form method="post" action="{{ route('event.update',$event->id) }}" enctype="multipart/form-data">
            @csrf
               <div class="row mb-3">
                  <div class="col-sm-3">
                     <h6 class="mb-0">Event Topic</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="event_topic" class="form-control"  value="{{ $event->event_topic}}" />
                  </div>
               </div>
               @error('event_topic')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               <div class="row mb-3">
                  <div class="col-sm-3">
                     <h6 class="mb-0">Event Link</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="meeting_link" class="form-control"  value="{{ $event->meeting_link}}" />
                  </div>
               </div>
               @error('meeting_link')
               <span class="text-danger">{{ $message }}</span>
               @enderror

               <div class="row mb-3">
                <div class="col-sm-3">
                   <h6 class="mb-0">Start Date Select</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                   <input type="datetime-local" name="start_time" class="form-control"  value="{{ date('Y-m-d\TH:i', strtotime($event->start_time)) }}" />
                </div>
             </div>
             @error('start_time')
             <span class="text-danger">{{ $message }}</span>
             @enderror
             <div class="row mb-3">
                <div class="col-sm-3">
                   <h6 class="mb-0">End Date Select</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                   <input type="datetime-local" name="end_time" class="form-control"  value="{{ date('Y-m-d\TH:i', strtotime($event->end_time)) }}" />
                </div>
             </div>
             @error('end_time')
             <span class="text-danger">{{ $message }}</span>
             @enderror
               <div class="row mb-3">
                  <div class="col-sm-3">
                     <h6 class="mb-0">Name Of Presenter</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="presenter_name" class="form-control"  value="{{ $event->presenter_name}}" />
                  </div>
               </div>
               @error('presenter_name')
               <span class="text-danger">{{ $message }}</span>
               @enderror
               
             
               <div class="row mb-3">
                  <div class="col-sm-3">
                     <h6 class="mb-0">Presenter Image </h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                     <input type="file" name="photo" class="form-control"  id="image"/>
                  </div>
                @error('photo')
                  <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
               <div class="row mb-3">
                  <div class="col-sm-3">
                     <h6 class="mb-0"> </h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                     <img id="showImage" src="{{ asset($event->photo) }}" alt="Admin" style="width:100px; height: 100px;">
                  </div>
               </div>

               <div class="row mb-3">
                <div class="col-sm-3">
                   <h6 class="mb-0">Status</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <select name="status" id="status" class="form-control">
                    @if ($event->status == 1)
                    <option value="1" selected>Active</option>
                    <option value="0">Disable</option>
                    @else
                    <option value="1">Active</option>
                    <option value="0" selected>Disable</option>
                    @endif

                </select>
                </div>
             </div>
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
  } );
</script>
@endpush
