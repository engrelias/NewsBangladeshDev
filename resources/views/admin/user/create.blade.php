@extends('admin.mainLayout')

@section('title', 'Create User')

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
            <h6 class="fw-semibold mb-0">Create User</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Create New User</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12">
            <div class="card-body p-24">
                <div class="row justify-content-center">
                    

                     <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ @$updateUser ? route('admin.user.update', $updateUser->id) : route('admin.user.store') }}" method="POST" enctype="multipart/form-data" class="row gy-3 needs-validation" novalidate >
                                    @csrf
                                    @if(@$updateUser)
                                        @method('PUT')
                                    @endif

                                    
                                    <!-- Avatar Upload (Higher Z-Index) -->
                                    <div style="margin-bottom:150px !important " class="col-md-12  d-flex justify-content-start ">
                                        <div class="avatar-upload position-absolute  mb-20 " style="z-index: 1; margin-left: 10px;">
                                            <div class="avatar-preview ">
                                            <div id="imagePreview" class="w-100 h-100"></div>
                                            </div>
                                            <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 cursor-pointer" style="z-index: 3;">
                                            <input type='file' name="profile_photo_path" id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                            <label for="imageUpload"
                                                class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                            </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- user name --}}
                                    <div class="col-md-6">
                                        <label class="form-label"> Name</label>
                                        <div class="icon-field has-validation">
                                        <span class="icon">
                                            <iconify-icon icon="f7:person"></iconify-icon>
                                        </span>
                                        <input type="text" name="name" value="{{ @$updateUser ? $updateUser->name : old('name') }}"  class="form-control" placeholder="Enter Name" required>
                                        <div class="invalid-feedback">
                                            Please provide name
                                        </div>
                                        </div>
                                    </div>

                                    {{-- user role --}}
                                    <div class="col-md-6">
                                        <label for="role" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            User Role <span class="text-danger">*</span>
                                        </label>

                                        <select class="form-control radius-8 form-select" name="user_role" id="role">
                                            <option value="">Select Role</option>
                                            @foreach($role as $value)
                                                <option value="{{ @$updateUser ? $updateUser->user_role : $value->id }}" {{ @$updateUser->user_role == (string)$value->id ? 'selected' : '' }}>{{ $value->role_title }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_role')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- user email --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Email</label>
                                        <div class="icon-field has-validation">
                                        <span class="icon">
                                            <iconify-icon icon="mage:email"></iconify-icon>
                                        </span>
                                        <input type="email" name="email" value="{{ @$updateUser ? $updateUser->email : old('email') }}" class="form-control" placeholder="Enter Email" required>
                                        <div class="invalid-feedback">
                                            Please provide email address
                                        </div>
                                        </div>
                                    </div>

                                    {{-- user phone --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Phone</label>
                                        <div class="icon-field has-validation">
                                        <span class="icon">
                                            <iconify-icon icon="solar:phone-calling-linear"></iconify-icon>
                                        </span>
                                        <input type="text" name="phone" value="{{ @$updateUser ? $updateUser->phone : old('phone') }}" class="form-control" placeholder="+1 (555) 000-0000" required>
                                        <div class="invalid-feedback">
                                            Please provide phone number
                                        </div>
                                        </div>
                                    </div>

                                    {{-- password --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Password</label>
                                        <div class="icon-field has-validation">
                                            <span class="icon">
                                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                                            </span>
                                            <input 
                                                type="password" 
                                                name="password" 
                                                class="form-control" 
                                                placeholder="*******" 
                                                required>
                                            <div class="invalid-feedback">
                                                Please provide a password
                                            </div>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- confirm password --}}
                                    <div class="col-md-6">
                                        <label class="form-label">Confirm Password</label>
                                        <div class="icon-field has-validation">
                                            <span class="icon">
                                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                                            </span>
                                            <input 
                                                type="password" 
                                                name="password_confirmation" 
                                                class="form-control" 
                                                placeholder="*******" 
                                                required>
                                            <div class="invalid-feedback">
                                                Please confirm your password
                                            </div>
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <button class="btn btn-primary-600" type="submit">Submit form</button>
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
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
    </script>

@endsection