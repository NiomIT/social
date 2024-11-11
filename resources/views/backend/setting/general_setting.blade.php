@extends('backend.admin.layouts.master')
<!-- Page Title -->
@section('page_title', 'General Setting')
<!-- Additional CSS -->
@push('Backend_style')
    <link href="{{ asset('backend') }}/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endpush
<!-- Main Content -->
@section('page_content')

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Setting </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            {{-- <li class="breadcrumb-item active" aria-current="page">Add Brand</li> --}}
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">


                    </div>
                </div>
            </div>
            <hr />
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <form action="{{ route('general.setting.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">

                                        <div class="mb-3">
                                            <label for="site_title" class="form-label">Site Title</label>
                                            <input class="form-control" type="text"
                                                name="site_title" id="site_title" value="{{ setting('site_title') }}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="site_phone_number" class="form-label">Site Phone Number</label>
                                            <input class="form-control"
                                                type="phone" name="site_phone_number" id="site_phone_number"
                                                value="{{ setting('site_phone_number') }}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="site_email" class="form-label">Site Email</label>
                                            <input class="form-control"
                                                type="email" name="site_email" id="site_email"
                                                value="{{ setting('site_email') }}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="site_bio" class="form-label">Site Bio</label>
                                            <textarea class="form-control" name="site_bio" id="site_bio"
                                                cols="30" rows="3">{{ setting('site_bio') }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="site_address" class="form-label">Site Address</label>
                                            <textarea class="form-control" name="site_address" id="site_address"
                                                cols="30" rows="3">{{ setting('site_address') }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="copy_right" class="form-label">Copy Right</label>
                                            <textarea class="form-control" name="copy_right" id="copy_right"
                                                cols="30" rows="2">{{ setting('copy_right') }}</textarea>
                                        </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                        <div class="mb-3">
                                            <label for="site_facebook_link" class="form-label">Site Facebook Link</label>
                                            <input class="form-control"
                                                type="text" name="site_facebook_link" id="site_facebook_link"
                                                value="{{ setting('site_facebook_link') }}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="site_twitter_link" class="form-label">Site Twitter Link</label>
                                            <input class="form-control"
                                                type="text" name="site_twitter_link" id="site_twitter_link"
                                                value="{{ setting('site_twitter_link') }}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="site_google_link" class="form-label">Site Google Link</label>
                                            <input class="form-control"
                                                type="text" name="site_google_link" id="site_google_link"
                                                value="{{ setting('site_google_link') }}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="site_rss_link" class="form-label">Site RSS Link</label>
                                            <input class="form-control"
                                                type="text" name="site_rss_link" id="site_rss_link"
                                                value="{{ setting('site_rss_link') }}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="site_vimeo_link" class="form-label">Site Vimeo Link</label>
                                            <input class="form-control"
                                                type="text" name="site_vimeo_link" id="site_vimeo_link"
                                                value="{{ setting('site_vimeo_link') }}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="site_youtube_link" class="form-label">Site YouTube Link</label>
                                            <input class="form-control"
                                                type="text" name="site_youtube_link" id="site_youtube_link"
                                                value="{{ setting('site_youtube_link') }}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="site_linkedin_link" class="form-label">Site Linkedin Link</label>
                                            <input class="form-control"
                                                type="text" name="site_linkedin_link" id="site_linkedin_link"
                                                value="{{ setting('site_linkedin_link') }}">

                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="logo_image" class="form-label">Site Logo Image</label>
                                        <input type="file" name="logo_image" id="logo_image">
                                        <br>
                                        <img id="show_logo_image" class="rounded avatar-lg" src="{{ asset(setting('logo_image') ?? 'Null') }}" alt="No Image" width="100px" height="50px;">

                                    </div>
                                    <div class="mb-3">
                                        <label for="favicon_icon" class="form-label">favicon Icon</label>
                                        <input type="file" name="favicon_icon" id="favicon_icon">
                                        <br>
                                        <img id="showFavicon" class="rounded avatar-lg" src="{{ asset(setting('favicon_icon') ?? 'Null') }}" alt="No Image" width="100px" height="50px;">

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                           <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </form>
                </div>
            </div>
        </div>


    @endsection
    <!-- Additional JS -->
    @push('Backend_javaScript')
     <!--Site favicon Show -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#logo_image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#show_logo_image').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <!--Site favicon Show -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#favicon_icon').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showFavicon').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    @endpush
