@php
    $categories = App\Models\Category::all();
@endphp

@extends('frontend.master')
@section('main')
    <div class="row newsfeed-right-side-content mb-5 mt-5">
        <div class="col-md-8 second-section mx-auto" id="page-content-wrapper">
            <div class="posts-section mb-5">
                <div class="post border-bottom p-3 bg-white w-shadow">
                    <div class="media text-muted pt-3">
                        <form action="{{ route('register') }}" method="POST" class="pt-5" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Full Name"
                                            id="name">
                                    </div>
                                </div>
                                <!-- Category -->
                                <div class="col-md-12">
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

                                <!-- Subcategory with tag-like input design -->
                                <div class="col-md-12" id="subcategory_div">
                                    <div class="form-group position-relative">
                                        <input type="text" id="subcategory_input" class="form-control"
                                            placeholder="Type or Select SubCategory">
                                        <div id="suggested_subcategories"
                                            style="position: absolute; z-index: 1000; background: #fff; width: 100%; display: none; border: 1px solid #ddd; max-height: 150px; overflow-y: auto;">
                                            <!-- Suggested subcategories will be appended here -->
                                        </div>
                                    </div>
                                    <!-- Selected Subcategory tags -->
                                    <div id="selected_subcategories" style="margin-top: 10px;"></div>
                                </div>

                                <!-- Username -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="col-md-12" id="email_div">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"
                                            placeholder="Email Address" id="email">
                                    </div>
                                </div>

                                <!-- City -->
                                <div class="col-md-12" id="city_div">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city_id" placeholder="City">
                                    </div>
                                </div>

                                <!-- Area -->
                                <div class="col-md-12" id="area_div">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="area_id" placeholder="Area">
                                    </div>
                                </div>
                                <div class="col-md-6" id="house_div">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="house_no" placeholder="House No">
                                    </div>
                                </div>
                                <div class="col-md-6" id="road_div">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="road_no" placeholder="Road No">
                                    </div>
                                </div>
                                <!-- Photo -->
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <label for="photo">Your Photo</label>
                                        <input type="file" class="form-control" name="photo" id="photo"
                                            accept="image/*">
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password_confirmation" class="form-control"
                                            name="password_confirmation" placeholder="Confirm Password"
                                            id="password_confirmation">
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Sign Up Button -->
                                <div class="col-md-6 text-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary sign-up">Sign Up</button>
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
            // Display subcategory dropdown based on selected category
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                var category_slug = $("option:selected", this).data("slug");

                var restrictedSlugs = ['private', 'personal', 'privacy-cat'];

                if (restrictedSlugs.includes(category_slug)) {
                    $('#subcategory_div').hide();
                    $('#area_div').hide();
                    $('#city_div').hide();
                    $('#road_div').hide();
                    $('#house_div').hide();
                } else {
                    $('#subcategory_div').show();
                    $('#area_div').show();
                    $('#city_div').show();
                    $('#road_div').show();
                    $('#house_div').show();

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
                                        '<div class="suggestion-item" style="padding: 5px; cursor: pointer;" data-id="' +
                                        value.id + '">' +
                                        value.subcategory_name + '</div>');
                                });
                            },
                        });
                    }
                }
            });

            // Select or add subcategory on click
            $(document).on('click', '.suggestion-item', function() {
                var subcategory_id = $(this).data('id');
                var subcategory_name = $(this).text();
                addSubcategory(subcategory_id, subcategory_name);
            });

            // Add subcategory to the selected tags area and hide the input field
            function addSubcategory(subcategory_id, subcategory_name) {
                if (subcategory_id || subcategory_name) {
                    // Clear any existing input or suggestion list before adding the new tag
                    $('#subcategory_input').val('');
                    $('#suggested_subcategories').hide();

                    var tag = '';
                    if (subcategory_id) {
                        tag =
                            '<span class="subcategory-tag" style="background-color: #E0E0E0; padding: 5px; margin: 2px; display: inline-block;" data-id="' +
                            subcategory_id + '">' +
                            subcategory_name +
                            ' <span class="remove-tag" style="cursor: pointer; color: #FF0000;">&times;</span></span>';
                    } else if (subcategory_name) {
                        tag =
                            '<span class="subcategory-tag" style="background-color: #E0E0E0; padding: 5px; margin: 2px; display: inline-block;" data-name="' +
                            subcategory_name + '">' +
                            subcategory_name +
                            ' <span class="remove-tag" style="cursor: pointer; color: #FF0000;">&times;</span></span>';
                    }

                    $('#selected_subcategories').html(tag); // Show only one tag
                    $('#subcategory_input').hide(); // Hide input field when a subcategory is selected
                }
            }

            // Remove tag and show the input field again
            $(document).on('click', '.remove-tag', function() {
                $(this).closest('.subcategory-tag').remove();
                $('#subcategory_input').show(); // Show the input field again when a tag is removed
            });

            // Show suggestions again if input is cleared
            $('#subcategory_input').on('input', function() {
                var input = $(this).val();
                if (input.length > 0) {
                    $('#suggested_subcategories').show();
                } else {
                    $('#suggested_subcategories').hide();
                }
            });

            // Hide suggestions when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#subcategory_input, #suggested_subcategories').length) {
                    $('#suggested_subcategories').hide();
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('form').on('submit', function(e) {
                // সাবক্যাটেগরি ট্যাগ থেকে ডাটা নেওয়া
                var subcategory_id = $('#selected_subcategories .subcategory-tag').data('id');
                var subcategory_name = $('#subcategory_input').val();

                // সাবক্যাটেগরি সিলেক্ট করা না থাকলে, subcategory_name ইনপুট ফিল্ডে থাকা ভ্যালু পাঠানো হবে
                if (!subcategory_id && subcategory_name) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'subcategory_name',
                        value: subcategory_name
                    }).appendTo('form');
                } else if (subcategory_id) {
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'subcategory_id',
                        value: subcategory_id
                    }).appendTo('form');
                }
            });
        });
    </script>
@endsection
