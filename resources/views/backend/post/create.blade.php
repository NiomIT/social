@extends('backend.admin.layouts.master')
@section('page_content')
    <!-- Main Content -->
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center form-group mb-3">
            <div class="breadcrumb-title pe-3">Add New Post</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Post</li>
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
                <h5 class="card-title">Add New Post</h5>
                <hr />
                <form id="myForm" method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">
                                    <div class="form-group mb-3">
                                        <label for="inputpostTitle" class="form-label">Post Title En</label>
                                        <input type="text" name="post_title_en" class="form-control" id="inputpostTitle"
                                            placeholder="Enter post title">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="inputpostTitle" class="form-label">Post Title Bn</label>
                                        <input type="text" name="post_title_bn" class="form-control" id="inputpostTitle"
                                            placeholder="Enter post title">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Post Tag En</label>
                                        <input type="text" name="post_tag_en" class="form-control visually-hidden"
                                            data-role="tagsinput" value="new post,top post">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Post Tag Bn</label>
                                        <input type="text" name="post_tag_bn" class="form-control visually-hidden"
                                            data-role="tagsinput" value="new post,top post">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label"> Description En</label>
                                        <textarea class="mytextarea" name="description_en">Hello, World!</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label"> Description Bn</label>
                                        <textarea class="mytextarea" name="description_bn">Hello, World!</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="inputpostTitle" class="form-label">Post Thambnail</label>
                                        <input name="post_thambnail" class="form-control" type="file" id="formFile"
                                            onChange="mainThamUrl(this)">
                                        <img src="" id="mainThmb" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">
                                        <div class="form-group col-md-6">
                                            <label for="inputPrice" class="form-label">Map Url</label>
                                            <input type="text" class="form-control" name="map_url" placeholder="Map url">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPrice" class="form-label">Advertisement Url</label>
                                            <input type="text" class="form-control" name="advertisement_url"
                                                placeholder="advertisement_url">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="inputVendor" class="form-label">Category</label>
                                            <select name="category_id" class="form-select" id="inputVendor">
                                                <option disabled selected>Select Category</option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="inputCollection" class="form-label"> SubCategory</label>
                                            <select name="subcategory_id" class="form-select" id="inputCollection">
                                                <option disabled selected>Select SubCategory</option>
                                            </select>
                                        </div>

                                        <div class=" col-12">
                                            <label for="inputCollection" class="form-label">Select Vendor</label>
                                            <select name="vendor_id" class="form-select" id="inputCollection">
                                                <option disabled selected>Select Vendor</option>
                                                @foreach ($activeVendor as $vendor)
                                                    <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <div class="row g-3">
                                                <div class=" col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="hot_news" type="checkbox"
                                                            value="1" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault"> Hot
                                                            News</label>
                                                    </div>
                                                </div>
                                                <div class=" col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="featured_news"
                                                            type="checkbox" value="1" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Featured
                                                            News</label>
                                                    </div>
                                                </div>
                                                <div class=" col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="trending_news"
                                                            type="checkbox" value="1" id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">Trending
                                                            News</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- // end row  -->
                                        </div>
                                        <hr>
                                        <div class="form-group col-12">
                                            <div class="d-grid">
                                                <input type="submit" class="btn btn-primary px-4"
                                                    value="Save Changes" />
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
    <script>
        document.getElementById('inputVendor').addEventListener('change', function() {
            let categoryId = this.value;

            // Clear the Subcategory dropdown before making a new request
            let subcategorySelect = document.getElementById('inputCollection');
            subcategorySelect.innerHTML = '<option disabled selected>Select SubCategory</option>';

            // AJAX request to fetch subcategories based on selected category
            fetch(`/get-subcategories/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    // Populate the Subcategory dropdown with received data
                    data.forEach(subcategory => {
                        subcategorySelect.innerHTML +=
                            `<option value="${subcategory.id}">${subcategory.subcategory_name}</option>`;
                    });
                })
                .catch(error => console.error('Error fetching subcategories:', error));
        });
    </script>

    <!-- thumble img er jonne -->
    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <!--multiple img er jonne  -->
    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(100)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    post_title_en: {
                        required: true,
                    },
                    post_tag_en: {
                        required: true,
                    },
                    description_en: {
                        required: true,
                    },

                    post_thambnail: {
                        required: true,
                    },
                    multi_img: {
                        required: true,
                    },

                    category_id: {
                        required: true,
                    },

                },
                messages: {
                    post_title_en: {
                        required: 'Please Enter post Title En',
                    },
                    post_tag_en: {
                        required: 'Please Enter post Title En',
                    },
                    description_en: {
                        required: 'Please Enter  Description En',
                    },
                    post_thambnail: {
                        required: 'Please Select post Thambnail Image',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
