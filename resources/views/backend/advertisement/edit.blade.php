@extends('backend.admin.layouts.master')
<!-- Main Content -->
@section('page_content')
<div class="page-content">
  <!--breadcrumb-->
  <div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Add Advertisement</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Advertisement</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
             <a href="{{ route('advertisement.index') }}" class="btn btn-primary">All Advertisement</a>
               
            </div>
        </div>
    </div>
    <hr/>
  <!--end breadcrumb-->
  <div class="container">
     <div class="main-body">
        <div class="row">
           <div class="col-lg-10">
              <div class="card">
                 <div class="card-body">
                  <form id="myForm" method="post" action="{{ route('advertisement.update',$advertisement->id) }}" enctype="multipart/form-data">
                    @csrf
                       <div class="row mb-3">
                          <div class="col-sm-3">
                             <h6 class="mb-0">Advertisement Url</h6>
                          </div>
                          <div class="form-group col-sm-9 text-secondary">
                             <input type="text" name="url" class="form-control" value="{{ $advertisement->url }}"/>
                          </div>
                       </div>
                       @error('url')
                       <span class="text-danger">{{ $message }}</span>
                       @enderror
                       <div class="row mb-3">
                        <div class="col-sm-3">
                        </div>
                        <div class="form-group col-sm-9 text-secondary">
                            <input class="form-check-input" name="box_size" type="checkbox" value="1" id="flexCheckDefault" {{ $advertisement->box_size == 1 ? 'checked' : '' }} >
                            <label class="form-check-label" 
                            for="flexCheckDefault"> Box Size</label>
                        </div>
                     </div>
                     <div class="row mb-3">
                        <div class="col-sm-3">
                        
                        </div>
                        <div class="form-group col-sm-9 text-secondary">
                            <input class="form-check-input" name="non_box_size" type="checkbox" value="1" id="flexCheckDefault" {{ $advertisement->non_box_size == 1 ? 'checked' : '' }} >
                            <label class="form-check-label" 
                            for="flexCheckDefault"> Non Box Size</label>
                        </div>
                     </div>
                       <div class="row mb-3">
                        <div class="col-sm-3">
                           <h6 class="mb-0">Status</h6>
                        </div>
                    
                        <div class="col-sm-9 text-secondary">
                            <select name="status" id="status" class="form-control">
                                @if ($advertisement->status == 1)
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
     </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function (){
      $('#myForm').validate({
          rules: {
              url: {
                  required : true,
              }, 
          },
          messages :{
            url: {
                  required : 'Please Enter advertisement url',
              },
          },
          errorElement : 'span', 
          errorPlacement: function (error,element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
          },
          highlight : function(element, errorClass, validClass){
              $(element).addClass('is-invalid');
          },
          unhighlight : function(element, errorClass, validClass){
              $(element).removeClass('is-invalid');
          },
      });
  });
  
</script>
@endsection

