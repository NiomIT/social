@extends('backend.admin.layouts.master')
<!-- Main Content -->
@section('page_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="page-content">
   <!--breadcrumb-->
   <div class="page-content">
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
         <div class="breadcrumb-title pe-3">Add poll</div>
         <div class="ps-3">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb mb-0 p-0">
                  <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Add poll</li>
               </ol>
            </nav>
         </div>
         <div class="ms-auto">
            <div class="btn-group">
               <a href="{{ route('poll.index') }}" class="btn btn-primary">All poll</a>
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
                        <form class="col s12" method="post" action="{{route('poll.store')}}">
                           @csrf
                           <div class="row">
                           </div>
                           <div class="row">
                              <div class="row mb-3">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                 </div>
                                 <div class="col-sm-9 text-secondary">
                                    <input type="text" name="title" class="form-control"   />
                                 </div>
                              </div>
                              @error('title')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <div class="row mb-3 add_item ">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Option</h6>
                                 </div>
                                 <div class="col-sm-9 text-secondary d-flex justify-content-between ">
                                    <input type="text" name="options[]" class="form-control">
                                    <span class="btn btn-success addeventmore ms-2"><i class="fa fa-plus-circle"></i> </span>   
                                 </div>
                                 <div class="col-sm-3 mt-3">
                                    <h6 class="mb-0">Option</h6>
                                 </div>
                                 <div class="col-sm-9 text-secondary d-flex justify-content-between  mt-3">
                                    <input type="text" name="options[]" class="form-control">
                                    <span class="btn btn-success addeventmore ms-2"><i class="fa fa-plus-circle"></i> </span>   
                                 </div>
                              </div>
                            
                           </div>
                           <div style="visibility: hidden;">
                              <div class="whole_extra_item_add" id="whole_extra_item_add">
                                 <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                    <div class="row mb-3 mt-3">
                                       <div class="col-sm-3">
                                          <h6 class="mb-0">Option</h6>
                                       </div>
                                       <div class="col-sm-9 text-secondary d-flex justify-content-between ">
                                          <input type="text" name="options[]" class="form-control " >
                                          <span class="btn btn-success addeventmore ms-3 me-1"><i class="fa fa-plus-circle"></i> </span>
                                          <span class="btn btn-danger removeeventmore"><i class="fa fa-minus-circle"></i> </span>   
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-sm-3"></div>
                              <div class="col-sm-9 text-secondary">
                                 <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                              </div>
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
               poll_topic: {
                   required : true,
               }, 
           },
           messages :{
               poll_topic: {
                   required : 'Please Enter poll topic',
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
<script type="text/javascript">
   $(document).ready(function(){
      var counter = 0;
      $(document).on("click",".addeventmore",function(){
         var whole_extra_item_add = $('#whole_extra_item_add').html();
         $(this).closest(".add_item").append(whole_extra_item_add);
         counter++;
      });
      $(document).on("click",'.removeeventmore',function(event){
         $(this).closest(".delete_whole_extra_item_add").remove();
         counter -= 1
      });
   
   });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
@endsection