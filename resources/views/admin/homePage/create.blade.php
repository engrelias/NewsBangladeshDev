@extends('admin.mainLayout')

@section('title', 'Home Page Section Create')

@section('styles')
      <!-- file upload css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lib/file-upload.css') }}" />

    <style>
        h6 {
            color: #487FFF;
            font-size: 18px !important;
            font-weight: 600;
        }
    </style>
@endsection




@section('content')
    
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Add HomePage</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Add HomePage</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12">
            <div class="card-body p-24">
                <div class="row justify-content-center">
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        <div class="card ">
                            <div class="card-body">


                            <form action="{{ @$updateHomePage ? route('admin.homepage.update', $updateHomePage->id) : route('admin.homepage.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(@$updateHomePage)
                                    @method('PUT')
                                @endif

                                <div class="row">
                                    
                                    {{-- Section Name --}}

                                    <div class="col-md-6 mb-20">
                                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Section Name <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="section_name" class="form-control radius-8"
                                            id="name" placeholder="Enter Section Name" value="{{ @$updateHomePage ? $updateHomePage->section_name : old('section_name') }}">
                                        @error('section_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    {{-- Section title --}}
                                    <div class="col-md-6 mb-20">
                                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Section Title <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="section_title" class="form-control radius-8"
                                            id="name" placeholder="Enter Section Title" value="{{ @$updateHomePage ? $updateHomePage->section_title : old('section_title') }}">
                                        @error('section_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    {{-- Section Style --}}
                                    <div class="col-md-6 mb-20">
                                        <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Section Style <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" name="section_style" class="form-control radius-8"
                                            id="name" placeholder="Enter Section Style" value="{{ @$updateHomePage ? $updateHomePage->section_style : old('section_style') }}">
                                        @error('section_style')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                  
                                    {{-- Checkboxes --}}
                                    <div class="col-md-6 d-flex align-items-center gap-4 pt-10 ">
                                        {{-- Is Active --}}
                                        <div class="form-check ">
                                            <input class="form-check-input " type="checkbox" id="is_active" name="is_active" value="1"
                                                {{ old('is_active', $updateHomePage->is_active ?? false) ? 'checked' : '' }}>
                                            <label style="padding-left: 10px !important; padding-bottom: 5px !important;" class="form-check-label " for="is_active">Is Active</label>
                                        </div>
                                    </div>
       

                                    {{-- Lang --}}
                                    <div class="col-md-6 mb-20">
                                        <label for="lang" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Language <span class="text-danger">*</span>
                                        </label>
                                        
                                        <select class="form-control radius-8 form-select" name="lang_code" id="lang">
                                            <option value="">Select Lang</option>
                                            @foreach($lang as $value)
                                                <option value="{{ @$updateHomePage ? $updateHomePage->lang_code : $value->id }}" {{ @$updateHomePage->lang_code == (string)$value->id ? 'selected' : '' }}>{{ $value->lang_title }}</option>
                                            @endforeach
                                        </select>
                                        @error('lang_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    {{-- Category --}}
                                    <div class="col-md-6 mb-20">
                                        <label for="section_categories" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Category Section <span class="text-danger">*</span>
                                        </label>
                                        
                                        <select class="form-control radius-8 form-select" name="section_categories" id="section_categories">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $value)
                                                <option value="{{ @$updateHomePage ? $updateHomePage->section_categories : $value->id }}" {{ @$updateHomePage->section_categories == (string)$value->id ? 'selected' : '' }}>{{ $value->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('section_categories')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                    {{-- Section Image --}}
                                    <div class="col-md-6 mb-20">
                                        <label class="form-label fw-bold text-neutral-900">Section Image</label>
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
                                                <input id="upload-file" name="section_image" type="file" hidden>
                                            </label>
                                        </div>
                                    </div>


                                    {{-- Category Order --}}
                                    <div class="col-md-6 mb-20">
                                        <label for="section_order" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Section Order <span class="text-danger">*</span>
                                        </label>
                                        <input type="number" name="section_order" class="form-control radius-8"
                                            id="section_order" placeholder="Enter Section Order" value="{{ @$updateHomePage ? $updateHomePage->section_order : old('section_order') }}">
                                        @error('section_order')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    
                                    {{-- Section Description --}}

                                    <div class="col-md-12 mb-20">
                                        <label for="desc" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Section Description
                                        </label>
                                        <textarea name="section_description" class="form-control radius-8"
                                            id="desc" placeholder="Write description...">{{ @$updateHomePage ? $updateHomePage->section_description : old('section_description') }}</textarea>
                                    </div>


                                    {{-- Category Image Preview --}}
                                    <div class="col-md-6 mb-20 d-flex flex-column">
                                        <h6>Old Img</h6>
                                        <img width="100px" src="{{ @$updateHomePage ? asset('storage/' . $updateHomePage->category_img) : '' }}" alt="">
                                    </div>


                             

                                </div>

                                <hr>

                                {{-- Ads Info --}}
                                <div class="row mt-10">
                                    <h6 class="mb-3">Ads Information</h6>

                                    <div class="col-md-4 mb-20">
                                        <label for="ad_type" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Ads Type
                                        </label>
                                        <input type="text" name="ad_type" class="form-control radius-8"
                                            id="ad_type" placeholder="Enter Ads Type" value="{{ @$updateHomePage ? $updateHomePage->ad_type : old('ad_type') }}">
                                    </div>

                                    <div class="col-md-4 mb-20">
                                        <label for="ad_code" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Ads Code
                                        </label>
                                        <input type="text" name="ad_code" class="form-control radius-8"
                                            id="ad_code" placeholder="Enter Ads Code" value="{{ @$updateHomePage ? $updateHomePage->ad_code : old('ad_code') }}">
                                    </div>

                                    <div class="col-md-4 mb-20">
                                        <label for="ad_url" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Ads Url
                                        </label>
                                        <input type="text" name="ad_url" class="form-control radius-8"
                                            id="ad_url" placeholder="Enter Ads Url" value="{{ @$updateHomePage ? $updateHomePage->ad_url : old('ad_url') }}">
                                    </div>


                                   {{-- Ads Image --}}
                                    <div class="col-md-6 mb-20">
                                        <label class="form-label fw-bold text-neutral-900">Ads Image</label>
                                        <div class="upload-image-wrapper">
                                            {{-- Preview Section --}}
                                            <div class="uploaded-ad-img d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                                <button type="button" class="uploaded-ad-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                                    <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                                </button>
                                                <img id="uploaded-ad-img__preview" class="w-100 h-100 object-fit-cover" 
                                                    src="{{ @$updateHomePage && $updateHomePage->ad_image ? asset('storage/' . $updateHomePage->ad_image) : asset('admin/assets/images/user.png') }}" 
                                                    alt="ads image">
                                            </div>

                                            {{-- Upload Button --}}
                                            <label class="upload-ad-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-ad-file">
                                                <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                                <span class="fw-semibold text-secondary-light">Upload</span>
                                                <input id="upload-ad-file" name="ad_image" type="file" hidden>
                                            </label>
                                        </div>
                                        @error('ad_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <br><hr><br>

                                    <div class="col-md-4 mb-20">
                                        <label for="ad_type2" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Ads Type2
                                        </label>
                                        <input type="text" name="ad_type2" class="form-control radius-8"
                                            id="ad_type2" placeholder="Enter Ads Type" value="{{ @$updateHomePage ? $updateHomePage->ad_type2 : old('ad_type2') }}">
                                    </div>

                                    <div class="col-md-4 mb-20">
                                        <label for="ad_code2" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Ads Code2
                                        </label>
                                        <input type="text" name="ad_code2" class="form-control radius-8"
                                            id="ad_code2" placeholder="Enter Ads Code" value="{{ @$updateHomePage ? $updateHomePage->ad_code2 : old('ad_code2') }}">
                                    </div>

                                    <div class="col-md-4 mb-20">
                                        <label for="ad_url2" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Ads Url2
                                        </label>
                                        <input type="text" name="ad_url2" class="form-control radius-8"
                                            id="ad_url2" placeholder="Enter Ads Url" value="{{ @$updateHomePage ? $updateHomePage->ad_url2 : old('ad_url2') }}">
                                    </div>


                                {{-- Ads Image 2 --}}
                                    <div class="col-md-6 mb-20">
                                        <label class="form-label fw-bold text-neutral-900">Ads Image 2</label>
                                        <div class="upload-image-wrapper">
                                            {{-- Preview Section --}}
                                            <div class="uploaded-ad2-img d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                                <button type="button" class="uploaded-ad2-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                                    <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                                </button>
                                                <img id="uploaded-ad2-img__preview" class="w-100 h-100 object-fit-cover" 
                                                    src="{{ @$updateHomePage && $updateHomePage->ad_image2 ? asset('storage/' . $updateHomePage->ad_image2) : asset('admin/assets/images/user.png') }}" 
                                                    alt="ads image 2">
                                            </div>

                                            {{-- Upload Button --}}
                                            <label class="upload-ad2-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-ad2-file">
                                                <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                                <span class="fw-semibold text-secondary-light">Upload</span>
                                                <input id="upload-ad2-file" name="ad_image2" type="file" hidden>
                                            </label>
                                        </div>
                                        @error('ad_image2')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                 
                                </div>

                                <div class="col-md-12 d-flex align-items-start justify-content-start gap-3">
                                    <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                       {{ @$updateHomePage ? 'Update' : 'Save' }}
                                    </button>
                                </div>
                            </form>


                            </div>
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


    // =============================== Upload Ads Image 2 js Start ================================================
    const ad2FileInput = document.getElementById("upload-ad2-file");
    const ad2ImagePreview = document.getElementById("uploaded-ad2-img__preview");
    const uploadedAd2ImgContainer = document.querySelector(".uploaded-ad2-img");
    const removeAd2Button = document.querySelector(".uploaded-ad2-img__remove");
    const uploadAd2Label = document.querySelector(".upload-ad2-file");

    ad2FileInput.addEventListener("change", (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            ad2ImagePreview.src = src;
            uploadedAd2ImgContainer.classList.remove('d-none'); // show preview
            uploadAd2Label.classList.add('d-none');             // hide upload button
        }
    });

    removeAd2Button.addEventListener("click", () => {
        ad2ImagePreview.src = "";
        uploadedAd2ImgContainer.classList.add('d-none'); // hide preview
        uploadAd2Label.classList.remove('d-none');      // show upload button again
        ad2FileInput.value = ""; // reset file input
    });
    // =============================== Upload Ads Image 2 js End =================================================



    // =============================== Upload Ads Image js Start ================================================
    const adFileInput = document.getElementById("upload-ad-file");
    const adImagePreview = document.getElementById("uploaded-ad-img__preview");
    const uploadedAdImgContainer = document.querySelector(".uploaded-ad-img");
    const removeAdButton = document.querySelector(".uploaded-ad-img__remove");
    const uploadAdLabel = document.querySelector(".upload-ad-file");

    adFileInput.addEventListener("change", (e) => {
        if (e.target.files.length) {
            const src = URL.createObjectURL(e.target.files[0]);
            adImagePreview.src = src;
            uploadedAdImgContainer.classList.remove('d-none'); // show preview
            uploadAdLabel.classList.add('d-none');             // hide upload button
        }
    });

    removeAdButton.addEventListener("click", () => {
        adImagePreview.src = "";
        uploadedAdImgContainer.classList.add('d-none'); // hide preview
        uploadAdLabel.classList.remove('d-none');      // show upload button again
        adFileInput.value = ""; // reset file input
    });
    // =============================== Upload Ads Image js End =================================================



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