@extends('admin.mainLayout')

@section('title', 'Admin Profile')


@section('styles')

@endsection



@section('content')

    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">View Profile</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">View Profile</li>
            </ul>
        </div>

        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="user-grid-card position-relative border radius-16 overflow-hidden bg-base h-100">

                    <div class="pb-24 ms-16 mb-24 me-16  ">
                        <div class="text-center border border-top-0 border-start-0 border-end-0" style="margin-top:50px">
                            <img src="{{ !empty($user->profile_photo_path) 
                            ? asset('storage/' . $user->profile_photo_path) 
                            : asset('admin/assets/images/user-grid/user-grid-img14.png') }}" 
                            alt="Profile Photo" 
                            class="border br-white border-width-2-px w-200-px h-200-px rounded-circle object-fit-cover"/>

                            <h6 class="mb-0 mt-16">{{$user->name}}</h6>
                            <span class="text-secondary-light mb-16">{{$user->email}}</span>
                        </div>
                        <div class="mt-24">
                            <h6 class="text-xl mb-16">Personal Info</h6>
                            <ul>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Name</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{$user->name}}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Email</span>
                                    <span class="w-70 text-secondary-light fw-medium">{{$user->email}}</span>
                                </li>
                             
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Joined Date</span>
                                    <span class="w-70 text-secondary-light fw-medium">: {{$user->created_at}}</span>
                                </li>
                                <li class="d-flex align-items-center gap-1 mb-12">
                                    <span class="w-30 text-md fw-semibold text-primary-light"> Country of Residence</span>
                                    <span class="w-70 text-secondary-light fw-medium">: Bangladesh</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-body p-24">
                        <ul class="nav border-gradient-tab nav-pills mb-20 d-inline-flex" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link d-flex align-items-center px-24 active" id="pills-edit-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-edit-profile" type="button" role="tab" aria-controls="pills-edit-profile" aria-selected="true">
                                Edit Profile 
                              </button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link d-flex align-items-center px-24" id="pills-change-password-tab" data-bs-toggle="pill" data-bs-target="#pills-change-password" type="button" role="tab" aria-controls="pills-change-password" aria-selected="false" tabindex="-1">
                                Change Password 
                              </button>
                            </li>
                          </ul>

                        <div class="tab-content" id="pills-tabContent">   

                            <div class="tab-pane fade show active" id="pills-edit-profile" role="tabpanel" aria-labelledby="pills-edit-profile-tab" tabindex="0">
                                <h6 class="text-md text-primary-light mb-16">Profile Image</h6>
                            
                                <!-- Upload Image End -->
                                <form action="{{ route('admin.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')

                                        <!-- Upload Image Start -->
                                        <div class="mt-16 position-relative" style="width: 100%; height: 150px; margin-bottom: 50px;">
                                            <!-- Avatar Upload (Higher Z-Index) -->
                                        

                                            <!-- Upload Image Start -->
                                            <div class=" mt-16 position-relative" style="width: 100%; height: 150px; margin-bottom: 50px;">

                                            <!-- Avatar Upload (Higher Z-Index) -->
                                            <div class="avatar-upload position-absolute  mt-20 " style="z-index: 2; margin-left: 10px;">
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
                                            
                                            <!-- BG Theme Upload (Lower Z-Index) -->
                                            <div class="bg-theme-upload position-absolute top-0 start-0 " style="z-index: 1;">
                                                <div class="avatar-preview w-100 h-100">
                                                <div id="imagePreview2" class="w-100 h-100"></div>
                                                </div>
                                                <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 cursor-pointer">
                                                <input type='file' id="imageUpload2" accept=".png, .jpg, .jpeg" hidden>
                                                <label for="imageUpload2"
                                                    class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                                    <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                                </label>
                                                </div>
                                            </div>
                                            
                                            </div>

                                        </div>

                                        <div class="row">
                                            <!-- Name -->
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8"> 
                                                        Name <span class="text-danger-600">*</span>
                                                    </label>
                                                    <input type="text" class="form-control radius-8" 
                                                        name="name" id="name" 
                                                        value="{{ old('name', $user->name) }}" 
                                                        placeholder="Enter Name">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Email -->
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8"> 
                                                        Email <span class="text-danger-600">*</span>
                                                    </label>
                                                    <input type="email" class="form-control radius-8" 
                                                        name="email" id="email" 
                                                        value="{{ old('email', $user->email) }}" 
                                                        placeholder="Enter email address">
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Role -->
                                            <div class="col-sm-6">
                                                <div class="mb-20">
                                                    <label for="user_role" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                        User Role <span class="text-danger-600">*</span>
                                                    </label>
                                                    <input type="text" class="form-control radius-8" 
                                                        name="user_role" id="user_role" 
                                                        value="{{ old('user_role', $user->user_role) }}" 
                                                        placeholder="Enter Role">
                                                    @error('user_role')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center gap-3">
                                            <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8"> 
                                                Save
                                            </button>
                                        </div>
                                </form>

                            </div>

                            <div class="tab-pane fade" id="pills-change-password" role="tabpanel" aria-labelledby="pills-change-password-tab" tabindex="0">
                                <form action="{{ route('password.change') }}" method="POST">
                                    @csrf

                                    {{-- Current Password --}}
                                    <div class="mb-20">
                                        <label for="current_password" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Current Password <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control radius-8" 
                                                id="current_password" name="current_password" 
                                                placeholder="Enter Current Password*">
                                        </div>
                                        @if ($errors->has('current_password'))
                                            <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                        @endif
                                    </div>

                                    {{-- New Password --}}
                                    <div class="mb-20">
                                        <label for="password" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            New Password <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control radius-8" 
                                                id="password" name="password" 
                                                placeholder="Enter New Password*">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    {{-- Confirm Password --}}
                                    <div class="mb-20">
                                        <label for="password_confirmation" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                            Confirm Password <span class="text-danger-600">*</span>
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control radius-8" 
                                                id="password_confirmation" name="password_confirmation" 
                                                placeholder="Confirm Password*">
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center gap-3">
                                        <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8"> 
                                            Save
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
    </div>

@endsection


@section('scripts')

<script>

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

</script>


@endsection