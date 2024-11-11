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
                      <th>Description_en</th>
                      <th>Status </th>
                      <th>Action</th>
                   </tr>
                </thead>
                <tbody>
                   @foreach($posts as $key => $item)		
                   <tr>
                      <td> {{ $key+1 }} </td>
                      <td> <img src="{{ asset($item->post_thambnail) }}" style="width: 70px; height:40px;" >  </td>
                      <td>{{ $item->post_title_en }}</td>
                      <td>{{ Str::limit($item->description_bn, 10) }}</td>
                     <td>

                        @if($item->status == 1)
                        <a href="{{ route('post.in_active',['id'=>$item->id]) }}" class="badge rounded-pill bg-success">Active</a>
                        @else
                          <a href="{{ route('post.active',['id'=>$item->id]) }}" class="badge rounded-pill bg-danger">Disable</a>
                        @endif
                       </td>
                      <td>
                        <a href="{{ route('post.edit',$item->id) }}" class="btn btn-info" title="Edit Data"> <i class="fa fa-pencil"></i> </a>
                        <a href="{{ route('post.delete',$item->id) }}" class="btn btn-danger"  title="Trash Data" ><i class="fa fa-trash"></i></a>
                        <a href="{{ route('post.copy',$item->id) }}" class="btn btn-danger"  title="Copy Data" ><i class="fa fa-copy"></i></a>
                        
                        <a href="{{ route('post.edit',$item->id) }}" class="btn btn-warning" title="Details Page"> <i class="fa fa-eye"></i> </a>
                       
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