@extends('admin.mainLayout')

@section('title')
    {{ @$updateNews ? 'Edit News' : 'Add News' }}
@endsection

@section('styles')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lib/editor-katex.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lib/editor.atom-one-dark.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lib/editor.quill.snow.css') }}" />
      <!-- file upload css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/lib/file-upload.css') }}" />

    <style>
        /* Select2 Container */
        .select2-container--default .select2-selection--multiple {
            background-color: transparent;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            min-height: 48px;
            padding: 4px 8px;
            transition: all 0.3s ease;
        }

        .select2-container--default .select2-selection--multiple:focus,
        .select2-container--default .select2-selection--multiple:active {
            border-color: #0d6efd;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        /* Select2 Dropdown */
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #0d6efd;
            color: #fff;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: #e9ecef;
            color: #000;
        }

        /* Selected Items */
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #4269a3;
            border: 1px solid #4269a3;
            border-radius: 6px;
            color: white;
            padding: 4px 8px;
            margin: 2px;
            font-size: 14px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
            margin-right: 4px;
            border: none;
            background: transparent;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #ffcccc;
            background: transparent;
        }

        /* Search Input */
        .select2-container--default .select2-search--inline .select2-search__field {
            margin-top: 8px;
            padding: 4px;
            color: #000;
            background: transparent;
        }

        .select2-container--default .select2-search--inline .select2-search__field::placeholder {
            color: #6c757d;
        }

        /* Dropdown Arrow */
        .select2-container--default .select2-selection--multiple .select2-selection__arrow {
            height: 46px;
        }

        /* Dropdown Menu */
        .select2-container--default .select2-dropdown {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Focus State */
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        /* Loading State */
        .select2-container--default .select2-results__option--loading {
            color: #6c757d;
        }

        /* Dark theme support */
        .dark-theme .select2-container--default .select2-selection--multiple {
            background-color: #2d3748;
            border-color: #4a5568;
            color: #e2e8f0;
        }

        .dark-theme .select2-container--default .select2-dropdown {
            background-color: #2d3748;
            border-color: #4a5568;
        }

        .dark-theme .select2-container--default .select2-results__option {
            background-color: #2d3748;
            color: #e2e8f0;
        }

        .dark-theme .select2-container--default .select2-search--inline .select2-search__field {
            color: #e2e8f0;
            background: transparent;
        }
</style>

@endsection




@section('content')
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">{{ @$updateNews ? 'Edit News' : 'Add News' }}</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">{{ @$updateNews ? 'Edit News' : 'Add News' }}</li>
            </ul>
        </div>

        <div class="card h-100 p-0 radius-12">
            <div class="card-body p-24">
                <div class="row justify-content-center">
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        <div class="card border">


                                <form
                                    action="{{ @$updateNews ? route('news.update', $updateNews->id) : route('news.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (@$updateNews)
                                        @method('PUT')
                                    @endif

                                    <div class="card-body">
                                        <div class="row">

                                            {{-- News Title --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="name"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Title <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="news_title" id="news_title" class="form-control radius-8"
                                                    placeholder="Enter News title"
                                                    value="{{ @$updateNews ? $updateNews->news_title : old('news_title') }}" required>
                                                @error('news_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            
                                            {{-- News Slug --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="slug"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Slug <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="news_slug" id="news_slug" class="form-control radius-8"
                                                    placeholder="Enter News slug"
                                                    value="{{ @$updateNews ? $updateNews->news_slug : old('news_slug') }}" required>
                                                @error('news_slug')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            

                                            {{-- News Sub title --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="name"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Sub title <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" name="news_subtitle" class="form-control radius-8"
                                                    id="name" placeholder="Enter News Sub title"
                                                    value="{{ @$updateNews ? $updateNews->news_subtitle : old('news_subtitle') }}" required>
                                                @error('news_subtitle')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            {{-- Status --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="status"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Status <span class="text-danger">*</span>
                                                </label>
                                                @php
                                                    $statusArrary = [1 => 'Active', 0 => 'Inactive'];
                                                @endphp

                                                <select class="form-control radius-8 form-select" name="news_status"
                                                    id="status">
                                                    <option value="">Select Status</option>
                                                    @foreach ($statusArrary as $key => $value)
                                                        <option value="{{ @$updateNews ? $updateNews->news_status : $key }}"
                                                            {{ @$updateNews->news_status == (string) $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('news_status')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            {{-- News Order --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="News_order"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Order <span class="text-danger">*</span>
                                                </label>
                                                <input type="number" name="news_order" class="form-control radius-8"
                                                    id="news_order" placeholder="Enter News Order"
                                                    value="{{ @$updateNews ? $updateNews->news_order : old('news_order') }}" required>
                                                @error('news_order')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            {{-- Section --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="section_id"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                HomePage Section <span class="text-danger">*</span>
                                                </label>
                                                <select class="form-control radius-8 form-select" name="section_id"
                                                    id="section_id" >
                                                    <option value="">Select Section</option>
                                                    @foreach ($sections as $section)
                                                        <option value="{{ $section->id }}"
                                                            {{ @$updateNews->section_id == $section->id ? 'selected' : '' }}>
                                                            {{ $section->section_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('section_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>




                                            {{-- Lang --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="lang"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    Language <span class="text-danger">*</span>
                                                </label>
                                                @php
                                                    $langArrary = ['bn' => 'Bangla', 'eng' => 'English'];
                                                @endphp
                                                <select class="form-control radius-8 form-select" name="lang_code"
                                                    id="lang" required>
                                                    <option value="">Select Lang</option>
                                                    @foreach ($langArrary as $key => $value)
                                                        <option value="{{ @$updateNews ? $updateNews->lang_code : $key }}"
                                                            {{ @$updateNews->lang_code == (string) $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('lang_code')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            {{-- News tag --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="icon"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Tag
                                                </label>
                                                <input type="text" name="news_tag" class="form-control radius-8"
                                                    id="icon" placeholder="Enter News Tag"
                                                    value="{{ @$updateNews ? $updateNews->news_tag : old('news_tag') }}" required>
                                                @error('news_tag')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            {{-- News desk --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="icon"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Desk
                                                </label>
                                                <input type="text" name="news_desk" class="form-control radius-8"
                                                    id="icon" placeholder="Enter News Desk"
                                                    value="{{ @$updateNews ? $updateNews->news_desk : old('news_desk') }}" required>
                                                @error('news_desk')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            {{-- News Ticker --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="news_ticker"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Ticker
                                                </label>
                                                <input type="number" name="news_ticker" class="form-control radius-8"
                                                    id="news_ticker" placeholder="Enter News Ticker"
                                                    value="{{ @$updateNews ? $updateNews->news_ticker : old('news_ticker') }}"required>
                                                @error('news_ticker')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            
                                            {{-- News Image Caption --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="icon"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Image Caption
                                                </label>
                                                <input type="text" name="news_img_caption" class="form-control radius-8"
                                                    id="icon" placeholder="Enter News Image Caption"
                                                    value="{{ @$updateNews ? $updateNews->news_img_caption : old('news_img_caption') }}">
                                                @error('news_img_caption')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            
                                            
                                            {{-- News Video url --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="icon"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Video url
                                                </label>
                                                <input type="url" name="video_url" class="form-control radius-8"
                                                    id="icon" placeholder="Enter News Video url"
                                                    value="{{ @$updateNews ? $updateNews->video_url : old('video_url') }}">
                                                @error('video_url')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            
                                            {{-- News Image --}}
                                            <div class="col-md-6 mb-20">
                                                <label class="form-label fw-bold text-neutral-900">News Image</label>
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
                                                        <input id="upload-file" name="news_img" type="file" hidden>
                                                    </label>
                                                </div>
                                            </div>

                                        

                                            {{-- News Video Upload --}}
                                            <div class="col-md-6 mb-20">
                                                <label class="form-label fw-bold text-neutral-900">News Video</label>
                                                <div class="upload-video-wrapper position-relative h-160-px w-100">

                                                    <!-- Upload Input -->
                                                    <label class="upload-file h-100 w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-video">
                                                        <iconify-icon icon="solar:videocamera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                                        <span class="fw-semibold text-secondary-light">Upload Video</span>
                                                        <input id="upload-video" name="news_video" type="file" accept="video/*" hidden>
                                                    </label>

                                                    <!-- Video Preview (Absolute Positioned) -->
                                                    <div class="uploaded-video d-none position-absolute top-0 start-0 w-100 h-100">
                                                        <button type="button" class="uploaded-video__remove position-absolute top-0 end-0 z-3 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                                            <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                                        </button>
                                                        <video id="uploaded-video__preview"  class="w-100 h-100 object-fit-cover radius-8" controls>
                                                            <source src="" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>

                                        


                                            {{-- Video Url Form --}}
                                            <div class="col-md-6 mb-20">
                                                <label for="status"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    Video Url Form <span class="text-danger">*</span>
                                                </label>
                                                @php
                                                    $myArrary = [
                                                        1 => 'Youtube',
                                                        2 => 'Facebook',
                                                        3 => 'Tiktok',
                                                        4 => 'Other',
                                                    ];
                                                @endphp

                                                <select class="form-control radius-8 form-select" name="video_url_from"
                                                    id="video_url_from">
                                                    <option value="">Choose Video Url Form</option>
                                                    @foreach ($myArrary as $key => $value)
                                                        <option
                                                            value="{{ @$updateNews ? $updateNews->video_url_from : $key }}"
                                                            {{ @$updateNews->video_url_from == (string) $key ? 'selected' : '' }}>
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('video_url_from')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            {{-- Checkboxes --}}
                                            <div class="col-md-6 d-flex align-items-center gap-4 mb-3">

                                                {{-- Is Video Page --}}
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input mt-2" type="checkbox" id="is_video_page"
                                                        name="is_video_page" value="1"
                                                        {{ old('is_video_page', $updateNews->is_video_page ?? false) ? 'checked' : '' }}>
                                                    <label class="form-check-label ps-2" for="is_video_page">Is Video
                                                        Page</label>
                                                </div>

                                            </div>


                                            {{-- News Category --}}
                                            <div class="col-md-6 mb-3"> <label for="categories"
                                                    class="form-label">Select Categories</label> <select name="categories[]"
                                                    id="categories" class="form-control select2" multiple required>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ in_array($category->id, $selectedCategories ?? []) ? 'selected' : '' }}>
                                                            {{ $category->category_name }} </option>
                                                    @endforeach
                                                </select> @error('categories')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            {{-- News Summary --}}
                                            <div class="col-md-12 mb-20">
                                                <label for="summary"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    News Summary <span class="text-danger">*</span>
                                                </label>
                                                <textarea name="news_summary" class="form-control radius-8" id="summary" placeholder="Write News Summary...">{{ @$updateNews ? $updateNews->news_summary : old('news_summary') }}</textarea>
                                                @error('news_summary')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>


                                            {{-- News Description --}}
                                            <div class="col-md-12 mb-20">
                                                <label class="form-label fw-bold text-neutral-900">News Description <span
                                                        class="text-danger">*</span></label>
                                                <div class="border border-neutral-200 radius-8 overflow-hidden">
                                                    <div class="height-200">
                                                        <!-- Editor Toolbar Start -->
                                                        <div id="toolbar-container">
                                                            <span class="ql-formats">
                                                                <select class="ql-font"></select>
                                                                <select class="ql-size"></select>
                                                            </span>
                                                            <span class="ql-formats">
                                                                <button class="ql-bold"></button>
                                                                <button class="ql-italic"></button>
                                                                <button class="ql-underline"></button>
                                                                <button class="ql-strike"></button>
                                                            </span>
                                                            <span class="ql-formats">
                                                                <select class="ql-color"></select>
                                                                <select class="ql-background"></select>
                                                            </span>
                                                            <span class="ql-formats">
                                                                <button class="ql-script" value="sub"></button>
                                                                <button class="ql-script" value="super"></button>
                                                            </span>
                                                            <span class="ql-formats">
                                                                <button class="ql-header" value="1"></button>
                                                                <button class="ql-header" value="2"></button>
                                                                <button class="ql-blockquote"></button>
                                                                <button class="ql-code-block"></button>
                                                            </span>
                                                            <span class="ql-formats">
                                                                <button class="ql-list" value="ordered"></button>
                                                                <button class="ql-list" value="bullet"></button>
                                                                <button class="ql-indent" value="-1"></button>
                                                                <button class="ql-indent" value="+1"></button>
                                                            </span>
                                                            <span class="ql-formats">
                                                                <button class="ql-direction" value="rtl"></button>
                                                                <select class="ql-align"></select>
                                                            </span>
                                                            <span class="ql-formats">
                                                                <button class="ql-link"></button>
                                                                <button class="ql-image"></button>
                                                                <button class="ql-video"></button>
                                                                <button class="ql-formula"></button>
                                                            </span>
                                                            <span class="ql-formats">
                                                                <button class="ql-clean"></button>
                                                            </span>
                                                        </div>
                                                        <!-- Editor Toolbar End -->

                                                        <!-- Editor start -->
                                                        <div id="editor">
                                                            {!! @$updateNews ? $updateNews->news_desc : old('news_desc') !!}
                                                        </div>
                                                        <!-- Editor End -->
                                                    </div>
                                                </div>

                                                <!-- Hidden Textarea for Quill Content -->
                                                <textarea name="news_desc" id="news_desc" class="d-none">
                                                    {!! @$updateNews ? $updateNews->news_desc : old('news_desc') !!}
                                                </textarea>

                                                @error('news_desc')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>


                                    <br> <hr> <br>

                                    <div class="card-body ">

                                        {{-- Meta Info --}}
                                        <div class="row mt-10">
                                            <h6 class="mb-3 text-primary">Meta Information</h6>

                                            <div class="col-md-6 mb-20">
                                                <label for="meta_title"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    Meta Title
                                                </label>
                                                <input type="text" name="meta_title" class="form-control radius-8"
                                                    id="meta_title" placeholder="Enter Meta Title"
                                                    value="{{ @$updateNews ? $updateNews->meta_title : old('meta_title') }}">
                                            </div>

                                            <div class="col-md-6 mb-20">
                                                <label for="meta_keywords"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    Meta Keywords
                                                </label>
                                                <input type="text" name="meta_keyword" class="form-control radius-8"
                                                    id="meta_keyword" placeholder="Enter Meta Keywords"
                                                    value="{{ @$updateNews ? $updateNews->meta_keyword : old('meta_keyword') }}">
                                            </div>

                                            <div class="col-md-12 mb-20">
                                                <label for="desc"
                                                    class="form-label fw-semibold text-primary-light text-sm mb-8">
                                                    Meta Description
                                                </label>
                                                <textarea name="meta_desc" class="form-control radius-8" id="desc" placeholder="Write description...">{{ @$updateNews ? $updateNews->meta_desc : old('meta_desc') }}</textarea>
                                            </div>

                                        
                                            <div class="col-md-6 mb-20">
                                                <label class="form-label fw-bold text-neutral-900">Meta Image</label>
                                                <div class="upload-image-wrapper">
                                                    {{-- Preview Section --}}
                                                    <div class="uploaded-meta-img d-none position-relative h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50">
                                                        <button type="button" class="uploaded-meta-img__remove position-absolute top-0 end-0 z-1 text-2xxl line-height-1 me-8 mt-8 d-flex bg-danger-600 w-40-px h-40-px justify-content-center align-items-center rounded-circle">
                                                            <iconify-icon icon="radix-icons:cross-2" class="text-2xl text-white"></iconify-icon>
                                                        </button>
                                                        <img id="uploaded-meta-img__preview" class="w-100 h-100 object-fit-cover" 
                                                            src="{{ @$updateNews && $updateNews->meta_img ? asset('storage/' . $updateNews->meta_img) : asset('admin/assets/images/user.png') }}" 
                                                            alt="meta image">
                                                    </div>

                                                    {{-- Upload Button --}}
                                                    <label class="upload-meta-file h-160-px w-100 border input-form-light radius-8 overflow-hidden border-dashed bg-neutral-50 bg-hover-neutral-200 d-flex align-items-center flex-column justify-content-center gap-1" for="upload-meta-file">
                                                        <iconify-icon icon="solar:camera-outline" class="text-xl text-secondary-light"></iconify-icon>
                                                        <span class="fw-semibold text-secondary-light">Upload</span>
                                                        <input id="upload-meta-file" name="meta_img" type="file" hidden>
                                                    </label>
                                                </div>
                                                @error('meta_img')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body ">

                                        <div class="col-md-12 d-flex align-items-start justify-content-start gap-3">
                                            <button type="submit"
                                                class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                                {{ @$updateNews ? 'Update' : 'Save' }}
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

    <!-- jQuery (if not already included) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('admin/assets/js/editor.highlighted.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/editor.quill.js') }}"></script>
    <script src="{{ asset('admin/assets/js/editor.katex.min.js') }}"></script>

    <!-- file upload js -->
    <script src="{{ asset('admin/assets/js/lib/file-upload.js') }}"></script>






    <script>
        $(document).ready(function() {
            $('#categories').select2({
                placeholder: "Select categories...",
                color: '#fff',
                allowClear: true,
                width: '100%',
                closeOnSelect: false,
                theme: 'default',
                dropdownParent: $('.card-body'), // Important for modal or card layouts
                language: {
                    noResults: function() {
                        return "No categories found";
                    }
                }
            });

            // Fix for Select2 in Bootstrap modal (if using modals)
            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });
        });
    </script>



    <script>
        // Editor JS Start
        document.addEventListener('DOMContentLoaded', function() {
            const quill = new Quill('#editor', {
                modules: {
                    syntax: true,
                    toolbar: '#toolbar-container',
                },
                placeholder: 'Write news description...',
                theme: 'snow',
            });

            // Get the hidden textarea
            const newsDescField = document.querySelector('#news_desc');
            
            // Set initial content if exists
            if (newsDescField && newsDescField.value.trim() !== "") {
                quill.root.innerHTML = newsDescField.value.trim();
            }

            // Update hidden textarea on editor content change
            quill.on('text-change', function() {
                const html = quill.root.innerHTML;
                // Prevent saving empty <p><br></p>
                if (html === '<p><br></p>' || html === '<p></p>') {
                    newsDescField.value = '';
                } else {
                    newsDescField.value = html;
                }
            });

            // Also sync before form submission
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const html = quill.root.innerHTML.trim();
                    
                    // Prevent saving empty content
                    if (html === '<p><br></p>' || html === '<p></p>' || html === '') {
                        newsDescField.value = '';
                        // Optional: Show error message or prevent submission
                        // e.preventDefault();
                        // alert('Please enter news description');
                    } else {
                        newsDescField.value = html;
                    }
                });
            }
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


        // =============================== Upload Single Video JS Start ================================================
            const videoInput = document.getElementById("upload-video");
            const videoPreview = document.getElementById("uploaded-video__preview");
            const uploadedVideoContainer = document.querySelector(".uploaded-video");
            const removeVideoButton = document.querySelector(".uploaded-video__remove");

            videoInput.addEventListener("change", (e) => {
                if (e.target.files.length) {
                    const src = URL.createObjectURL(e.target.files[0]);
                    videoPreview.querySelector("source").src = src;
                    videoPreview.load(); // reload video
                    uploadedVideoContainer.classList.remove('d-none'); // show video preview overlay
                }
            });

            removeVideoButton.addEventListener("click", () => {
                videoPreview.querySelector("source").src = "";
                videoPreview.load(); // clear video
                uploadedVideoContainer.classList.add('d-none'); // hide preview
                videoInput.value = ""; // reset file input
            });

        // =============================== Upload Single Video JS End ================================================


        // =============================== Upload Meta Image js Start ================================================
        const metaFileInput = document.getElementById("upload-meta-file");
        const metaImagePreview = document.getElementById("uploaded-meta-img__preview");
        const uploadedMetaImgContainer = document.querySelector(".uploaded-meta-img");
        const removeMetaButton = document.querySelector(".uploaded-meta-img__remove");
        const uploadMetaLabel = document.querySelector(".upload-meta-file");

        metaFileInput.addEventListener("change", (e) => {
            if (e.target.files.length) {
                const src = URL.createObjectURL(e.target.files[0]);
                metaImagePreview.src = src;
                uploadedMetaImgContainer.classList.remove('d-none'); // show preview
                uploadMetaLabel.classList.add('d-none');             // hide upload button
            }
        });

        removeMetaButton.addEventListener("click", () => {
            metaImagePreview.src = "";
            uploadedMetaImgContainer.classList.add('d-none'); // hide preview
            uploadMetaLabel.classList.remove('d-none');      // show upload button back
            metaFileInput.value = ""; // reset file input
        });
        // =============================== Upload Meta Image js End =================================================




    </script>


    <script>
        $(document).ready(function() {
            $('#news_title').on('input change', function() {
                var name = $(this).val();
                var slug = name
                    .toLowerCase()
                    .replace(/ /g, '-')        // replace spaces with -
                    .replace(/[^\w-]+/g, '');  // remove non-word characters
                $('#news_slug').val(slug);
            });
        });
    </script>

@endsection
