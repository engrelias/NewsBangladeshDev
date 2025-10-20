@extends('admin.mainLayout')

@section('title', 'Category List')

@section('styles')

  <!-- file upload css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lib/file-upload.css') }}" />

    <style>
        h6 {
            color: #487FFF;
            font-size: 18px !important;
            font-weight: 600;
        }

    .form-check.form-switch input[type="radio"] {
        width: 2.5em;
        height: 1.5em;
        appearance: none;
        background-color: #ddd;
        border-radius: 2em;
        position: relative;
        outline: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .form-check.form-switch input[type="radio"]::before {
        content: "";
        position: absolute;
        width: 1.1em;
        height: 1.1em;
        border-radius: 50%;
        background: #fff;
        top: 0.2em;
        left: 0.2em;
        transition: transform 0.3s;
    }

    .form-check.form-switch input[type="radio"]:checked {
        background-color: #487FFF; /* success blue */
    }

    .form-check.form-switch input[type="radio"]:checked::before {
        transform: translateX(1em);
    }

    </style>
@endsection




@section('content')
    
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Add Category</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Add Category</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12">
            <div class="card-body p-24">
                <div class="row justify-content-center">
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        <div class="card border">


                            <form action="{{ @$updateCategory ? route('categories.update', $updateCategory->id) : route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(@$updateCategory)
                                    @method('PUT')
                                @endif

                                <div class="card-body">
                                    <div class="row">
                                        {{-- Category Name --}}
                                        <div class="col-md-6 mb-20">
                                            <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Category Name <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="category_name" class="form-control radius-8"
                                                id="category_name" placeholder="Enter Category Name" value="{{ @$updateCategory ? $updateCategory->category_name : old('category_name') }}" required>
                                            @error('category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        {{-- Category Slug --}}
                                        <div class="col-md-6 mb-20">
                                            <label for="slug" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Category Slug <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="category_slug" class="form-control radius-8"
                                                id="category_slug" placeholder="Enter Category Slug" value="{{ @$updateCategory ? $updateCategory->category_slug : old('category_slug') }}" required>
                                            @error('category_slug')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                                                            {{-- Parent Category --}}
                                        <div class="col-md-6 mb-20">
                                            <label for="category_parent" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Parent Category <span class="text-danger">*</span>
                                            </label>
                                
                                            <select class="form-control radius-8 form-select" name="category_parent" id="category_parent" >
                                                <option value="">Select Parent Category</option>
                                                @foreach($categories as $value)
                                                    <option value="{{ @$updateCategory ? $updateCategory->category_parent : $value->id }}" {{ @$updateCategory->category_parent == (string)$value->id ? 'selected' : '' }}>{{ $value->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_parent')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>




                                        {{-- Lang --}}
                                        <div class="col-md-6 mb-20">
                                            <label for="lang" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Language <span class="text-danger">*</span>
                                            </label>

                                            <select class="form-control radius-8 form-select" name="lang_code" id="lang" required>
                                                <option value="">Select Lang</option>
                                                @foreach($lang as $language)
                                                    <option value="{{ @$updateCategory ? $updateCategory->lang_code : $language->id }}" {{ @$updateCategory->lang_code == (string)$language->id ? 'selected' : '' }}>{{ $language->lang_title }}</option>
                                                @endforeach
                                            </select>
                                            @error('lang_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>




                                        {{-- Category Order --}}
                                        <div class="col-md-6 mb-20">
                                            <label for="category_order" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Category Order <span class="text-danger">*</span>
                                            </label>
                                            <input type="number" name="category_order" class="form-control radius-8"
                                                id="category_order" placeholder="Enter Category Order" value="{{ @$updateCategory ? $updateCategory->category_order : old('category_order') }}" required>
                                            @error('category_order')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

        
                                        {{-- Category status --}}

                                        <div class="col-md-6 ">
                                                <label for="category_status" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    Category Status <span class="text-danger">*</span>
                                                </label>

                                            <div class="d-flex gap-3 ">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input " type="radio" name="category_status" id="statusActive" value="1"
                                                        {{ @$updateCategory && $updateCategory->category_status == 1 ? 'checked' : '' }}>
                                                    <label style="padding-bottom:10px !important " class="form-check-label  ps-2" for="statusActive">Active</label>
                                                </div>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="radio" name="category_status" id="statusInactive" value="0"
                                                        {{ @$updateCategory && $updateCategory->category_status == 0 ? 'checked' : '' }}>
                                                    <label class="form-check-label ps-2" for="statusInactive">Inactive</label>
                                                </div>

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="radio" name="category_status" id="statusPending" value="2"
                                                        {{ @$updateCategory && $updateCategory->category_status == 2 ? 'checked' : '' }}>
                                                    <label class="form-check-label ps-2" for="statusPending">Pending</label>
                                                </div>
                                            </div>

                                        </div>
                                

                                        
                                        {{-- Category Icon --}}
                                        <div class="col-md-6 mb-20">
                                            <label for="icon" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Category Icon
                                            </label>
                                            <input type="text" name="category_icon" class="form-control radius-8"
                                                id="icon" placeholder="Enter Category Icon" value="{{ @$updateCategory ? $updateCategory->category_icon : old('category_icon') }}" required>
                                            @error('category_icon')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        
                                        {{-- Checkboxes --}}
                                        <div class="col-md-6 d-flex align-items-center gap-4 mb-3 mt-10">
                                            {{-- Is Menu --}}
                                            <div class="form-check m-0">
                                                <input class="form-check-input mt-2" type="checkbox" id="is_menu" name="is_menu" value="1"
                                                    {{ old('is_menu', $updateCategory->is_menu ?? false) ? 'checked' : '' }} >
                                                <label style="padding-bottom:5px !important; padding-left:5px !important" class="form-check-label ps-2" for="is_menu">Is Menu</label>
                                            </div>

                                            {{-- Is Mobile Menu --}}
                                            <div class="form-check m-0">
                                                <input class="form-check-input mt-2" type="checkbox" id="is_mobile_menu" name="is_mobile_menu" value="1"
                                                    {{ old('is_mobile_menu', $updateCategory->is_mobile_menu ?? false) ? 'checked' : '' }} >
                                                <label style="padding-bottom:5px !important; padding-left:5px !important" class="form-check-label ps-2" for="is_mobile_menu">Is Mobile Menu</label>
                                            </div>
                                        </div>



                                        {{-- Category Image --}}
                                        <div class="col-md-6 mb-20">
                                            <label class="form-label fw-bold text-neutral-900">Category Image</label>
                                            <div class="upload-image-wrapper">
                                                <div class="uploaded-img d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                                    <button type="button" class="uploaded-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                                        <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                                    </button>
                                                    <img id="uploaded-img__preview" class="w-100 h-100 object-fit-cover" src="{{ asset('admin/assets/images/user.png') }}" alt="image">
                                                </div>
                                                <label class="upload-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-file">
                                                    <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                                    <span class="fw-semibold text-secondary-light">Upload</span>
                                                    <input id="upload-file" name="category_img" type="file" hidden>
                                                </label>
                                            </div>
                                        </div>


                                        {{-- Category Image Preview --}}
                                        <div class="col-md-6 mb-20 mt-3 d-flex flex-column">
                                            <h6>Old Img</h6>
                                            <img width="100px" src="{{ @$updateCategory ? asset('storage/' . $updateCategory->category_img) : '' }}" alt="">
                                        </div>


                                    </div>
                                </div>


                                 <br> <hr> <br>

                                <div class="card-body">
                                    <div class="row mt-10">
                                        <h6 class="mb-3">Meta Information</h6>

                                        <div class="col-md-6 mb-20">
                                            <label for="meta_title" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Meta Title
                                            </label>
                                            <input type="text" name="meta_title" class="form-control radius-8"
                                                id="meta_title" placeholder="Enter Meta Title" value="{{ @$updateCategory ? $updateCategory->meta_title : old('meta_title') }}">
                                        </div>

                                        <div class="col-md-6 mb-20">
                                            <label for="meta_keywords" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Meta Keywords
                                            </label>
                                            <input type="text" name="meta_keywords" class="form-control radius-8"
                                                id="meta_keywords" placeholder="Enter Meta Keywords" value="{{ @$updateCategory ? $updateCategory->meta_keywords : old('meta_keywords') }}">
                                        </div>

                                        <div class="col-md-12 mb-20">
                                            <label for="desc" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                Meta Description
                                            </label>
                                            <textarea name="meta_description" class="form-control radius-8"
                                                    id="desc" placeholder="Write description...">{{ @$updateCategory ? $updateCategory->meta_description : old('meta_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div class="col-md-12 d-flex align-items-center justify-content-start gap-3">
                                        <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                        {{ @$updateCategory ? 'Update' : 'Save' }}
                                        </button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection




@section('scripts')

  <!-- file upload js -->
  <script src="{{ asset('admin/assets/js/lib/file-upload.js') }}"></script>


    <script>
        $(document).ready(function() {
            $('#category_name').on('input change', function() {
                var name = $(this).val();
                var slug = name
                    .toLowerCase()
                    .replace(/ /g, '-')        // replace spaces with -
                    .replace(/[^\w-]+/g, '');  // remove non-word characters
                $('#category_slug').val(slug);
            });
        });
    </script>


<script>
    // =============================== Upload Single Image js start here ================================================
    const fileInput = document.getElementById("upload-file");
    const imagePreview = document.getElementById("uploaded-img__preview");
    const uploadedImgContainer = document.querySelector(".uploaded-img");
    const removeButton = document.querySelector(".uploaded-img__remove");
    const uploadLabel = document.querySelector(".upload-file"); // get upload label wrapper

    fileInput.addEventListener("change", (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            imagePreview.src = src;
            uploadedImgContainer.classList.remove('d-none');  // show preview
            uploadLabel.classList.add('d-none');              // hide upload label
        }
    });

    removeButton.addEventListener("click", () => {
        imagePreview.src = "";
        uploadedImgContainer.classList.add('d-none'); // hide preview
        uploadLabel.classList.remove('d-none');       // show upload label back
        fileInput.value = ""; // reset file input
    });

    // =============================== Upload Single Image js End here ================================================

</script>


  <script>
    // ================== Image Upload Js Start ===========================
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
 
    // ================== Image Upload Js End ===========================
</script>

    <script>
        // Additional functionality for imageUpload2
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview2').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview2').hide();
                    $('#imagePreview2').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload2").change(function() {
            readURL2(this);
        });
    </script>

@endsection