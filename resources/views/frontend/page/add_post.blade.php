@extends('frontend.master')
@section('main')
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Add New Post</h5>
            <hr />
            <form id="myForm" method="post" action="{{ route('user.post.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-body mt-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="border border-3 p-4 rounded">
                                <div class="form-group mb-3">
                                    <label for="inputpostTitle" class="form-label">Post Title</label>
                                    <input type="text" name="post_title" class="form-control" id="inputpostTitle"
                                        placeholder="Enter post title">
                                </div>
                                @error('post_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group mb-3">
                                    <label for="inputpostTitle" class="form-label">Post Thambnail</label>
                                    <input name="post_thambnail" class="form-control" type="file" id="formFile"
                                        onChange="mainThamUrl(this)">
                                    <img src="" id="mainThmb" />
                                </div>
                                @error('post_thambnail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>




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
@endsection
