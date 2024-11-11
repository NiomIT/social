<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- ==== Document Title ==== -->
     <title>{{ setting('site_title') }}</title>

     <!-- ==== Document Meta ==== -->
     @include('frontend.body.meta_document')

     <!-- ==== Favicons ==== -->
     <link rel="icon" href="{{ asset(setting('favicon_icon') ?? 'Null') }}" type="image/png">

     <!-- css_link Section Start -->
     @include('frontend.body.css_link')
     <!-- css_link Section End -->


</head>
<body>

    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preloader bg--color-1--b" data-preloader="1">
            <div class="preloader--inner"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Login Section Start -->
        <div class="login--section pd--100-0 bg--overlay" data-bg-img="{{ asset('frontend') }}/assets/img/login-img/bg.jpg">
            <div class="container">
                <!-- Login Form Start -->
                <div class="login--form">
                    <div class="title">
                        <h1 class="h1">Login</h1>
                        <p><a class="btn-link pull-right" href="/"></i>Back Home</a></p>
                    </div>


                    <form method="Post" action="{{ route('login') }}" data-form="validate">
                        @csrf
                        <div class="form-group">
                            <label>
                                <span>Username or Email Address</span>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </label>
                        </div>

                        <div class="form-group">
                            <label>
                                <span>Password</span>
                                <input type="password" name="password" class="form-control" required>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="checkbox">
                                <span>Remember me</span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-lg btn-block btn-primary">Log in</button>

                        <p class="help-block clearfix">
                            {{-- <a href="{{ route('password.request') }}" class="btn-link pull-left">Forgot Username or Password?</a> --}}
                            <a  class="btn-link pull-left">Forgot Username or Password?</a>
                            <a href="{{ route('register') }}" class="btn-link pull-right">Create An Account</a>
                        </p>
                    </form>
                </div>
                <!-- Login Form End -->
            </div>
        </div>
        <!-- Login Section End -->
    </div>
    <!-- Wrapper End -->

    <!-- js_link Section Start -->
    @include('frontend.body.js_link')
    <!-- js_link Section End -->

</body>
</html>
