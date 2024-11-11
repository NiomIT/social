@extends('frontend.master')
@section('main')
    <div class="container">
        <div class="row">
            <!-- Main Content Start -->
            <div class="main--content col-md-4 " data-sticky-content="true">
                <div class="sticky-content-inner">
                    <!-- Page Title Start -->
                    <div class="page--title pd--30-0">
                        <h2 class="h2">My Account</h2>

                        <div class="content">
                            <p><a class="text-info" href="{{ route('post.add') }}">add post</a></p>
                            <p><a class="text-info" href="/dashboard">My Profile</a></p>
                            <p><a class="text-info" href="{{ route('user.profile.edit') }}">Edit Profile</a></p>
                            <p><a class="text-info" href="{{ route('user.change.password') }}">Change Password</a></p>
                            <p><a class="text-info" href="{{ route('user.logout') }}">Logout</a></p>
                        </div>
                    </div>
                    <!-- Page Title End -->
                    <!-- Page Title Start -->
                    <div class="page--title pd--30-0">
                        <h2 class="h2">Activities</h2>

                        <div class="content">
                            <p><a class="text-info" href="">My Comments</a></p>
                            <p><a class="text-info" href="">Saved Articles</a></p>
                        </div>
                    </div>
                    <!-- Page Title End -->
                </div>
            </div>
            <!-- Main Content End -->

            <!-- Main Sidebar Start -->
            <div class="main--sidebar col-md-8 ptop--30 pbottom--30" data-sticky-content="true">
                <div class="sticky-content-inner">

                    @yield('user')

                </div>
            </div>
            <!-- Main Sidebar End -->
        </div>
    </div>
@endsection
