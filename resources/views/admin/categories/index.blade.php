@extends('admin.mainLayout')

@section('title', 'Category List')

@section('styles')

    <!-- Data Table css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/dataTables.min.css')}}" />

    <style>
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .dataTables_wrapper .dataTables_scroll {
            margin-bottom: 1rem;
        }

        .dataTables_wrapper .dataTables_paginate,
        .dataTables_wrapper .dataTables_info {
            margin-top: 0.5rem;
        }

    </style>
@endsection




@section('content')
    

    <div class="dashboard-main-body">

        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">Category List</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">Category List</li>
            </ul>
        </div>
    
        <div class="card basic-data-table fixed-header-table">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">Category List</h5>
                <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Add Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive scroll-sm">
                    
                    <table class="table bordered-table mb-0"  id="dataTable"  data-page-length='10'>
                        <thead>
                            <tr>
                            <th scope="col">
                                <div class="form-check style-check d-flex align-items-center">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">
                                    S.L
                                </label>
                                </div>
                            </th>
                                <th scope="col">Category Name</th>
                                <th scope="col ">Category Slug</th>
                                <th scope="col">Category Img</th>
                                <th scope="col">Category Icon</th>
                                <th scope="col">Lang Code</th>
                                <th scope="col">Category Parent</th>
                                <th scope="col">Parent Lang</th>
                                <th scope="col">Category Order</th>
                                <th scope="col">Meta_title</th>
                                <th scope="col">Meta_description</th>
                                <th scope="col" >Meta_keywords</th>
                                <th scope="col" >Is_menu</th>
                                <th scope="col">Is_mobile_menu</th>
                                <th scope="col" >Status</th>
                                <th scope="col" >Created By</th>
                                <th scope="col" >Created Date</th>
                                <th scope="col" >Updated Date</th>
                                <th scope="col" >Deleted Date</th>
                                <th scope="col" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-10">
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox">
                                        </div>
                                        {{$key + 1}}
                                    </div>
                                </td>
                                <td> {{$category->category_name ?? 'N/A'}} </td>
                                <td> {{$category->category_slug ?? 'N/A'}} </td>
                                <td>  
                                    @if($category->category_img)
                                        <img src="{{ asset('storage/' . $category->category_img) }}" class="img-fluid rounded" alt="{{ $category->category_name }}" width="50">
                                    @endif
                                </td>
                                <td> {{$category->category_icon ?? 'N/A'}} </td>
                                <td> {{$category->lang->lang_code ?? 'N/A'}} </td>
                                <td> {{$category->category_parent ?? 'N/A'}} </td>
                                <td> {{$category->parent_lang ?? 'N/A'}} </td>
                                <td> {{$category->category_order ?? 'N/A'}} </td>
                                <td> {{$category->meta_title ?? 'N/A'}} </td>
                                <td> {{$category->meta_description ?? 'N/A'}} </td>
                                <td> {{$category->meta_keywords ?? 'N/A'}} </td>
                                <td> {{$category->is_menu ? 'Yes' : 'No'}} </td>
                                <td> {{$category->is_mobile_menu ? 'Yes' : 'No'}} </td>
                                <td>
                                    @if($category->category_status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td> {{$category->user->name ?? 'N/A'}} </td>
                                <td> {{$category->created_at ?? 'N/A'}} </td>
                                <td> {{$category->updated_at ?? 'N/A'}} </td>
                                <td> {{$category->deleted_at ?? 'N/A'}} </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">
                                            <iconify-icon icon="lucide:edit"></iconify-icon>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>


                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection




@section('scripts')

  <!-- Data Table js -->
  <script src="{{asset('admin/assets/js/lib/dataTables.min.js')}}"></script>

    <script>

           $(document).ready(function () {
                $('#dataTable').DataTable({
                    scrollY: "400px",      // height of scrollable body
                    scrollCollapse: true,  // shrink when fewer rows
                    paging: true,          // keep pagination
                    searching: true,       // keep search
                    info: true,            // show "Showing 1 to 10 of X entries"
                    ordering: true         // enable sorting
                });
            });

    </script>
@endsection