@extends('backend.admin.layouts.master')
<!-- Main Content -->
@section('page_content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
       <div class="breadcrumb-title pe-3">Post Archive</div>
       <div class="ps-3">
          <nav aria-label="breadcrumb">
             <ol class="breadcrumb mb-0 p-0">
              
             </ol>
          </nav>
       </div>
       <div class="ms-auto">
         <form method="POST" action="{{ route('posts.showDateWise') }}">
            @csrf
            <label for="calendar">Select Date Wise Post</label>
            <input type="date" id="calendar" name="calendar">
            <input type="submit" value="Submit">
        </form>
        
          
       </div>
    </div>
    <!--end breadcrumb-->
    <hr/>
    
 </div>
@endsection