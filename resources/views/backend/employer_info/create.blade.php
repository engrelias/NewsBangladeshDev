@extends('admin_dashboard.mainLayout')
@php

if(isset($employer)) {
    $show = "Update Employer";
} else {
    $show = "Add Employer";
}

@endphp

@section('title', $show)

@section('styles')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{('admin_dashboard/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
    <!-- END: Vendor CSS-->

    <style>
                                
        .dataTables_filter
        {
            float: right;
            text-align: right;  
        }

        .pagination
        {
            background:red;
            text-align: right !important;
            float: right;
            padding: 0px;
        }
    </style>

@endsection

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
                <div class="content-header-left col-md-4 col-12 mb-2">
                    <h3 class="content-header-title">{{$show}}</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                           
                                <li class="breadcrumb-item active"> {{$show}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="form-control-repeater">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="file-repeater">{{$show}}</h4>
                                    <a class="heading-elements-toggle">
                                        <i class="la la-ellipsis-h font-medium-3"></i>
                                    </a>
                                  
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <form class="form row" action="{{ isset($employer) ? route('employer.update') : route('employer.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @if(isset($employer))   
                                                @method('PUT')
                                            @endif

                                            <div class="form-group col-md-4 mb-2">
                                                <input type="text" class="form-control" placeholder="First Name" name="firstName">
                                           
                                            </div>
                                            <div class="form-group col-md-4 mb-2">
                                                <input type="text" class="form-control" placeholder="Last name" name="lastName">
                                            </div>
                                            <div class="form-group col-md-4 mb-2">
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ isset($employer) ? $employer->email : old('email') }}">
                                                @if($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ isset($employer) ? $employer->phone : old('phone') }}">
                                                @if($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-3 mb-2">
                                                @php 
                                                $positions = ['Manager', 'Developer', 'Designer', 'Intern']; 
                                                @endphp

                                               <select class="form-control" name="position" >
                                                <option value="0">Select Position</option>
                                                @foreach($positions as $position)
                                                    <option value="{{ $position }}" {{ (isset($employer) && $employer->position == $position) ? 'selected' : '' }}>{{ $position }}</option>
                                                @endforeach
                                               </select>
                                                @if($errors->has('position'))
                                                <span class="text-danger">{{ $errors->first('position') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="City" name="city" value="{{ isset($employer) ? $employer->city : old('city') }}">
                                                @if($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="State" name="state" value="{{ isset($employer) ? $employer->state : old('state') }}">
                                                @if($errors->has('state'))  
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="Post Code" name="postal_code" value="{{ isset($employer) ? $employer->postal_code : old('postal_code') }}">
                                                @if($errors->has('postal_code'))
                                                <span class="text-danger">{{ $errors->first('postal_code') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-3 mb-2">
                                                <input type="text" class="form-control" placeholder="Country" name="country" value="{{ isset($employer) ? $employer->country : old('country') }}">
                                                @if($errors->has('country'))
                                                <span class="text-danger">{{ $errors->first('country') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-6 mb-2">
                                                <input type="text" class="form-control" placeholder="Address" value="{{ isset($employer) ? $employer->address : old('address') }}" name="address">
                                                @if($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group col-md-4 mb-2">
                                                <input type="date" class="form-control" placeholder="Hiring Date" name="hiring_date" value="{{ isset($employer) ? $employer->hiring_date : old('hiring_date') }}">
                                                @if($errors->has('hiring_date'))
                                                <span class="text-danger">{{ $errors->first('hiring_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4 mb-2">
                                                <input type="date" class="form-control" placeholder="End Date" name="end_date" value="{{ isset($employer) ? $employer->end_date : old('end_date') }}">
                                                @if($errors->has('end_date'))
                                                <span class="text-danger">{{ $errors->first('end_date') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4 mb-2">
                                                <input type="file" class="form-control" placeholder="Image" name="image" accept="image/*">
                                                @if($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group col-12 mb-2 file-repeater">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="ft-plus"></i> 
                                                    @if(isset($employer)) 
                                                        Update Employer
                                                    @else
                                                        Add Employer        
                                                    @endif
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="{{ asset('admin_dashboard/app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin_dashboard/app-assets/js/scripts/tables/datatables-extensions/datatables-sources.js') }}" type="text/javascript"></script>

@endsection

