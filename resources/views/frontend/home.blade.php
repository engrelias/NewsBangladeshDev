@extends('frontend.mainLayout')

@section('meta_title', 'বাংলা সংবাদপত্র - হোম')
@section('meta_description', 'বাংলা সংবাদপত্রের হোম পেজ')
@section('meta_keywords', 'বাংলা, সংবাদপত্র, হোম')

@section('title', 'বাংলা সংবাদপত্র - হোম')

@section('styles')
@endsection

@section('content')


    <!---------- BEGIN: Body Content ----------->
    @include('frontend.components.headerone')

    @include('frontend.components.tranding-news')

    @include('frontend.components.saradesh')

    @include('frontend.components.national-polities')

    @include('frontend.components.international-business')

    @include('frontend.components.video')

    @include('frontend.components.job_education')

    @include('frontend.components.pobash')

    @include('frontend.components.sport')

    @include('frontend.components.entertainment')

    @include('frontend.components.life_ict_religion')

    @include('frontend.components.footer')

    <!---------- END: Body Content ------------->


@endsection





@section('scripts')
    <script src="assets/js/home.js"></script>
@endsection