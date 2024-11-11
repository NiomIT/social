@extends('backend.admin.layouts.master')
@section('page_content')
<!-- Main Content -->
<div class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-sm-flex align-items-center form-group mb-3">
      <div class="breadcrumb-title pe-3">Edit New Post</div>
      <div class="ps-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Edit New Post</li>
            </ol>
         </nav>
      </div>
      <div class="ms-auto">
         <div class="btn-group">
            <a href="{{ route('post.index') }}" class="btn btn-primary">All Post</a> 				 
         </div>
      </div>
   </div>
   <!--end breadcrumb-->
   <div class="card">
      <div class="card-body p-4">
         <h5 class="card-title">Edit New Post</h5>
         <hr/>
         <form id="myForm" method="post" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data" >
            @csrf
            <div class="form-body mt-4">
               <div class="row">
                  <div class="col-lg-8">
                     <div class="border border-3 p-4 rounded">
                        <div class="form-group mb-3">
                           <label for="inputpostTitle" class="form-label">Post Title En</label>
                           <input type="text" name="post_title_en" class="form-control" id="inputpostTitle" value="{{ $post->post_title_en}}">
                        </div>
                        <div class="form-group mb-3">
                           <label for="inputpostTitle" class="form-label">Post Title Bn</label>
                           <input type="text" name="post_title_bn" class="form-control" id="inputpostTitle"value="{{ $post->post_title_bn}}">
                        </div>
                        <div class="form-group mb-3">
                           <label for="inputProductTitle" class="form-label">Post Tag En</label>
                           <input type="text" name="post_tag_en" class="form-control visually-hidden" data-role="tagsinput" value="{{ $post->post_tag_en}}">
                        </div>
                        <div class="form-group mb-3">
                           <label for="inputProductTitle" class="form-label">Post Tag Bn</label>
                           <input type="text" name="post_tag_bn" class="form-control visually-hidden" data-role="tagsinput" value="{{ $post->post_tag_bn}}">
                        </div>
                        <div class="mb-3">
                           <label for="inputProductDescription" class="form-label"> Description En</label>
                           <textarea class="mytextarea" name="description_en">value="{{ $post->description_en}}"</textarea>
                        </div>
                        <div class="mb-3">
                           <label for="inputProductDescription" class="form-label"> Description Bn</label>
                           <textarea class="mytextarea" name="description_bn">value="{{ $post->description_bn}}"</textarea>
                        </div>
                        <div class="card-body">
                           <div class="mb-3">
                              <label for="formFile" class="form-label">Choose Thambnail Image</label>
                              <input name="post_thambnail" class="form-control" type="file" id="image">
                           </div>
                           <div class="mb-3">
                              <label for="formFile" class="form-label"></label>
                              <img src="{{ asset($post->post_thambnail) }}" style="width:100px;height:100px" id="showImage">
                           </div>
                           <input type="submit" class="btn btn-primary px-4" value="Update Image " />	
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="border border-3 p-4 rounded">
                        <div class="row g-3">
                           <div class="form-group col-md-6">
                              <label for="inputPrice" class="form-label">Map Url</label>
                              <input type="text" class="form-control"  name="map_url" value="{{ $post->map_url}}">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputPrice" class="form-label">Advertisement Url</label>
                              <input type="text" class="form-control" name="advertisement_url" value="{{ $post->advertisement_url}}">
                           </div>
                           <div class="form-group col-12">
                              <label for="inputVendor" class="form-label">Category</label>
                              <select name="category_id" class="form-select" id="inputVendor">
                                 <option disabled selected>Select Category</option>
                                 @foreach($categories as $cat)
                                 <option value="{{ $cat->id }}" {{ $cat->id == $post->category_id ? 'selected' : '' }}>{{ $cat->category_name_en }}</option>
                                @endforeach
                              </select>
                           </div>
                           <div class="form-group col-12">
                              <label for="inputCollection" class="form-label"> SubCategory</label>
                              <select name="subcategory_id" class="form-select" id="inputCollection">
                                 @foreach($subcategory as $subcat)
                                 <option value="{{ $subcat->id }}" {{ $subcat->id == $post->subcategory_id ? 'selected' : '' }}>{{ $subcat->subcategory_name_en }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-12">
                              <label for="inputCollection" class="form-label"> SubSubCategory</label>
                              <select name="subsubcategory_id" class="form-select" id="inputCollection">
                                 @foreach($subsubcategory as $subsubcat)
                                 <option value="{{ $subsubcat->id }}" {{ $subsubcat->id == $post->subsubcategory_id ? 'selected' : '' }}>{{ $subsubcat->sub_subcategory_name_en }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class=" col-12">
                              <label for="inputCollection" class="form-label">Select Vendor</label>
                              <select name="vendor_id" class="form-select" id="inputCollection">
                                 <option disabled selected>Select Vendor</option>
                                 @foreach($activeVendor as $vendor)
                              	<option value="{{ $vendor->id }}" {{ $vendor->id == $post->vendor_id ? 'selected' : '' }}>{{ $vendor->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-12">
                              <div class="row g-3">
                                 <div class=" col-md-6">
                                    <div class="form-check">
                                       <input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="flexCheckDefault" {{ $post->hot_news == 1 ? 'checked' : '' }} >
                                     <label class="form-check-label" for="flexCheckDefault"> Hot News</label>
                                    </div>
                                 </div>
                                 <div class=" col-md-6">
                                    <div class="form-check">
                                       <input class="form-check-input" name="featured_news" type="checkbox" value="1" id="flexCheckDefault" {{ $post->featured_news == 1 ? 'checked' : '' }} >
                                     <label class="form-check-label" for="flexCheckDefault"> Featured News</label>
                                    </div>
                                 </div>
                                 <div class=" col-md-6">
                                    <div class="form-check">
                                       <input class="form-check-input" name="trending_news" type="checkbox" value="1" id="flexCheckDefault" {{ $post->trending_news == 1 ? 'checked' : '' }} >
                                     <label class="form-check-label" for="flexCheckDefault"> Trending News</label>
                                    </div>
                                 </div>
                              </div>
                              <!-- // end row  -->
                           </div>
                           <hr>
                           <div class="form-group col-12">
                              <div class="d-grid">
                                 <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--end row-->
            </div>
         </form>
      </div>
   </div>
</div>
<!-- thumble img er jonne -->
<script type="text/javascript">
   function mainThamUrl(input){
   	if (input.files && input.files[0]) {
   		var reader = new FileReader();
   		reader.onload = function(e){
   			$('#mainThmb').attr('src',e.target.result).width(80).height(80);
   		};
   		reader.readAsDataURL(input.files[0]);
   	}
   }
</script>
<!--multiple img er jonne  -->
<script> 
   $(document).ready(function(){
    $('#multiImg').on('change', function(){ //on file input change
       if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
       {
           var data = $(this)[0].files; //this file data
            
           $.each(data, function(index, file){ //loop though each file
            if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                   var fRead = new FileReader(); //new filereader
                   fRead.onload = (function(file){ //trigger function on successful read
                   return function(e) {
                       var img = $('<img/>').EditClass('thumb').attr('src', e.target.result) .width(100)
                   .height(80); //create image element 
                       $('#preview_img').append(img); //append image to output element
                   };
                   })(file);
                   fRead.readAsDataURL(file); //URL representing the file's data.
               }
           });
            
       }else{
           alert("Your browser doesn't support File API!"); //if File API is absent
       }
    });
   });
    
</script>
<!-- Category with subcategory show Ajax -->
<script type="text/javascript">
   $(document).ready(function() {
     $('select[name="category_id"]').on('change', function(){
         var category_id = $(this).val();
         if(category_id) {
             $.ajax({
                 url: "{{  url('post/category-subcategory/ajax') }}/"+category_id,
                 type:"GET",
                 dataType:"json",
                 success:function(data) {
                   $('select[name="subcategory_id"]').html('<option value="" selected="" disabled="">---Select SubCategory---</option>');
                   $.each(data, function(key, value){
                       $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                   });
                   $('select[name="subsubcategory_id"]').html('<option value="" selected="" disabled="">---Select SubSubCategory---</option>');
                 },
             });
         } else {
             alert('danger');
         }
     });
   });
   
   // Show State Data 
   $(document).ready(function(){
        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{ url('post/subsubcategory-get/ajax') }}/"+subcategory_id,
                    type: "GET",
                    dataType:"json",
                    success:function(data){
                        $('select[name="subsubcategory_id"]').html('');
                        var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id + '">' + value.sub_subcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
<script type="text/javascript">
   $(document).ready(function (){
       $('#myForm').validate({
           rules: {
               post_title_en: {
                   required : true,
               }, 
               post_tag_en: {
                   required : true,
               }, 
               description_en: {
                   required : true,
               }, 
              
                post_thambnail: {
                   required : true,
               }, 
                multi_img: {
                   required : true,
               }, 
               
                category_id: {
                   required : true,
               }, 
                
           },
           messages :{
               post_title_en: {
                   required : 'Please Enter post Title En',
               },
               post_tag_en: {
                   required : 'Please Enter post Title En',
               },
               description_en: {
                   required : 'Please Enter  Description En',
               },
               post_thambnail: {
                   required : 'Please Select post Thambnail Image',
               },
             
           },
           errorElement : 'span', 
           errorPlacement: function (error,element) {
               error.EditClass('invalid-feedback');
               element.closest('.form-group').append(error);
           },
           highlight : function(element, errorClass, validClass){
               $(element).EditClass('is-invalid');
           },
           unhighlight : function(element, errorClass, validClass){
               $(element).removeClass('is-invalid');
           },
       });
   });
   
</script>
@endsection