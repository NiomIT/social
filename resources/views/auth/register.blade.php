@php
    $categories = App\Models\Category::all();
@endphp

@extends('frontend.master')
@section('main')
    <div class="row newsfeed-right-side-content mb-5 mt-5">
        <div class="col-md-8 second-section mx-auto" id="page-content-wrapper">

            <!-- Posts -->
            <div class="posts-section mb-5">
                <div class="post border-bottom p-3 bg-white w-shadow">
                    <div class="media text-muted pt-3">
                        <form action="" method="" class="pt-5">
                            <div class="row">
                                <!-- Full Name -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="full_name" placeholder="Full Name">
                                    </div>
                                </div>

                                <!-- Category -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="category_id" class="form-control" id="category_id">
                                            <option disabled selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" data-slug="{{ $category->slug }}">
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Subcategory -->
                                <div class="col-md-6" id="subcategory_div">
                                    <div class="form-group">
                                        <input type="text" name="subcategory_name" id="subcategory_name"
                                            class="form-control" placeholder="Type or Select SubCategory">
                                        <div id="suggested_subcategories"
                                            style="position: absolute; z-index: 1000; background: #fff; width: 100%; display: none;">
                                            <!-- Suggested subcategories will be appended here -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Area -->
                                <div class="col-md-12" id="area_div">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="area" placeholder="Area">
                                    </div>
                                </div>

                                <!-- Username -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email Address">
                                    </div>
                                </div>

                                <!-- Phone Number -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone"
                                            placeholder="Phone Number">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="confirm_password"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>

                                <!-- Agree Privacy -->
                                <div class="col-md-12">
                                    <p class="agree-privacy">By clicking the Sign Up button below you agree to our privacy
                                        policy and terms of use of our website.</p>
                                </div>

                                <!-- Sign In Option -->
                                <div class="col-md-6">
                                    <span class="go-login">Already a member? <a href="sign-in.html">Sign In</a></span>
                                </div>

                                <!-- Sign Up Button -->
                                <div class="col-md-6 text-right">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-primary sign-up">Sign Up</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                var category_slug = $("option:selected", this).data("slug");

                // Slug array to check multiple slugs
                var restrictedSlugs = ['private', 'personal', 'privacy-cat'];

                if (restrictedSlugs.includes(category_slug)) {
                    // Hide subcategory and area if restricted slug is selected
                    $('#subcategory_div').hide();
                    $('#area_div').hide();
                } else {
                    // Show subcategory and area for other categories
                    $('#subcategory_div').show();
                    $('#area_div').show();

                    if (category_id) {
                        $.ajax({
                            url: "{{ url('subcategory/category-subcategory/ajax') }}/" +
                                category_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('#suggested_subcategories').empty().show();
                                $.each(data, function(key, value) {
                                    $('#suggested_subcategories').append(
                                        '<div class="suggestion-item" style="padding: 5px; cursor: pointer;">' +
                                        value.subcategory_name + '</div>');
                                });
                            },
                        });
                    }
                }
            });

            // Select suggested subcategory on click
            $(document).on('click', '.suggestion-item', function() {
                $('#subcategory_name').val($(this).text());
                $('#suggested_subcategories').hide();
            });

            // Hide suggestions when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#subcategory_name, #suggested_subcategories').length) {
                    $('#suggested_subcategories').hide();
                }
            });
        });
    </script>
@endsection
