@extends('dashboard')
@section('user')


<!-- Widget Start -->
<div class=" ">
    <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label>User Name <span class="required">*</span></label>
                <input  class="form-control" name="username" type="text" value="{{ $userData->username}}" />
            </div>
            <div class="form-group col-md-6">
                <label>Full Name <span class="required">*</span></label>
                <input  class="form-control" name="name"  value="{{ $userData->name }}" type="text"/>
            </div>
            <div class="form-group col-md-6">
                <label>Email<span class="required">*</span></label>
                <input  class="form-control" name="email" type="text" value="{{ $userData->email}}"/>
            </div>
            <div class="form-group col-md-6">
                <label>Phone <span class="required">*</span></label>
                <input  class="form-control" name="phone" type="text" value="{{ $userData->phone}}"/>
            </div>
            <div class="form-group col-md-12">
                <label>Address<span class="required">*</span></label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="2">{!! $userData->address !!}</textarea>
            </div>
            <div class="form-group col-md-5">
                <label>User Photo<span class="required">*</span></label>
                <input  class="form-control" name="photo" type="file" id="imagehh" />
            </div>
            <div class="form-group col-md-6">
              <img src="{{ (!empty($userData->photo)) ? url('upload/user_images/'.$userData->photo):url('upload/no_image.jpg') }}" alt="User" id="showImagehh" class=" rounded-circle p-1 bg-primary" width="110">
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
            </div>
        </div>
    </form>
</div>
<!-- Widget End -->


<!--Site favicon Show -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#imagehh').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImagehh').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection
