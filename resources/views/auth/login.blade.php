@extends('frontend.master')
@section('main')
<div class="row newsfeed-right-side-content mb-5 mt-5">
   <div class="col-md-8 second-section mx-auto" id="page-content-wrapper">
      <div class="posts-section mb-5">
         <div class="post border-bottom p-3 bg-white w-shadow">
            <form action="{{ route('login') }}" method="POST" class="pt-5" data-form="validate">
               @csrf
               <div class="col-md-12" id="email_div">
                  <label for="">Email</label>
                  <div class="form-group">
                     <input type="email" id="email" class="form-control" name="email"
                        placeholder="Email Address" id="email">
                  </div>
               </div>
               <!-- Password -->
               <div class="col-md-12">
   <label for="password">Password</label>
   <div class="form-group position-relative">
      <input type="password" class="form-control" name="password" id="password" required>
      <span onclick="togglePasswordVisibility()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
         <i id="eyeIcon" class="fas fa-eye"></i>
      </span>
   </div>
</div>
               <div class="checkbox">
                  <label>
                  <input type="checkbox" name="checkbox">
                  <span>Remember me</span>
                  </label>
               </div>
               <!-- Sign Up Button -->
               <div class="col-md-12 text-right">
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary sign-up">Login</button>
                  </div>
               </div>
               <p class="help-block clearfix">
                  {{-- <a href="{{ route('password.request') }}" class="btn-link pull-left">Forgot Username or Password?</a> --}}
                  <a  class="btn-link pull-left">Forgot Username or Password?</a>
                  <a href="{{ route('register') }}" class="btn-link pull-right">Create An Account</a>
               </p>
            </form>
         </div>
      </div>
   </div>
</div>

<!-- Font Awesome er link add korte hobe -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<script>
   function togglePasswordVisibility() {
      var passwordField = document.getElementById("password");
      var eyeIcon = document.getElementById("eyeIcon");
      
      if (passwordField.type === "password") {
         passwordField.type = "text";
         eyeIcon.classList.remove("fa-eye");
         eyeIcon.classList.add("fa-eye-slash");
      } else {
         passwordField.type = "password";
         eyeIcon.classList.remove("fa-eye-slash");
         eyeIcon.classList.add("fa-eye");
      }
   }
</script>
@endsection