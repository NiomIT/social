@extends('backend.admin.layouts.master')
<!-- Main Content -->
@section('page_content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
       <div class="breadcrumb-title pe-3">All Post</div>
       <div class="ps-3">
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">All Post</li>
             </ol>
          </nav>
       </div>
       <div class="ms-auto">
          <div class="btn-group">
             <a href="{{ route('post.create') }}" class="btn btn-primary">Add Post</a> 				 
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
                      <th>post_thambnail </th>
                      <th>Post Title En</th>
                      <th>description_en</th>
                      <th>Status </th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                   @foreach($post as $key => $item)		
                   <tr>
                      <td> {{ $key+1 }} </td>
                      <td> <img src="{{ asset($item->post_thambnail) }}" style="width: 70px; height:40px;" >  </td>
                      <td>{{ $item->post_title_en }}</td>
                      <td>{!! $item->description_en !!}</td>
                     <td>

                        @if($item->status == 1)
                        <a href="{{ route('post.in_active',['id'=>$item->id]) }}" class="badge rounded-pill bg-success">Active</a>
                        @else
                          <a href="{{ route('post.active',['id'=>$item->id]) }}" class="badge rounded-pill bg-danger">Disable</a>
                        @endif
                       </td>
                      <td>
                        <a href="{{ route('post.restore',['id' => $item->id]) }}" class="btn btn-info btn-sm text-light"> <i class="fa-solid fa-window-restore"></i> Restore</a>
                        <a href="{{ route('post.kill',['id' => $item->id]) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa-solid fa-trash-can"></i> Delete</a>
                       
                      </td>
                   </tr>
                   @endforeach
                </tbody>
                <tfoot>
                   <tr>
                     <th>Sl</th>
                     <th>post_thambnail </th>
                     <th>Post Title En</th>
                     <th>description_en</th>
                     <th>Status </th>
                     <th>Action</th>
                   </tr>
                </tfoot>
             </table>
          </div>
       </div>
    </div>
 </div>
@endsection