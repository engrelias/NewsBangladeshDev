@extends('admin_dashboard.mainLayout')
@section('title', 'event category')

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
                    <h3 class="content-header-title">Event Category</h3>
                </div>
                <div class="content-header-right col-md-8 col-12">
                    <div class="breadcrumbs-top float-md-right">
                        <div class="breadcrumb-wrapper mr-1">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                           
                                <li class="breadcrumb-item active">Event Category
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- HTML (DOM) sourced data -->
                <section id="html">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row d-flex justify-content-between align-items-center">
                                        <div class="col-md-4">
                                            <h4 class="card-title">All Category</h4>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{ route('eventCategory.create') }}" class="btn btn-primary">Add New Category</a>
                                        </div>
                                    </div> 
                                </div>
                                <div class="card-content  collapse show">
                                    <div class="card-body card-dashboard">
                                       
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered sourced-data">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Slug</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @foreach ($categories as $item)

                                                    <tr>
                                                        <td>{{$item->name}}</td>
                                                        <td>{{$item->slug}}</td>
                                                        <td>{{$item->description}}</td>
                                                        <td>
                                                            <a href="">Edit</a> || 
                                                            <a href="">Delete</a>
                                                        </td>
                                                    </tr>
                                                        
                                                    @endforeach

                                                </tbody>
                                            
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Slug</th>
                                                        <th>Description</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
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

