@extends('admin.mainLayout')

@section('title', 'Section list')

@section('styles')
    <style>
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
    </style>
@endsection




@section('content')
    
    <div class="dashboard-main-body">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Section List</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
            <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                Section List
            </a>
            </li>
        </ul>
        </div>

        <div class="card h-100 p-0 radius-12">
            <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center flex-wrap gap-3 justify-content-between">
                <div class="d-flex align-items-center flex-wrap gap-3">
                    <span class="text-md fw-medium text-secondary-light mb-0">Show</span>
                    <select class="form-select form-select-sm w-auto ps-12 py-6 radius-12 h-40-px">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                    <form class="navbar-search">
                        <input type="text" class="bg-base h-40-px w-auto" id="searchInput" placeholder="Search by username..." onkeyup="filterTable()">
                        <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                    </form>
                
                </div>
                <a href="{{route('admin.homepage.create')}}" class="btn btn-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2"> 
                    <iconify-icon icon="ic:baseline-plus" class="icon text-xl line-height-1"></iconify-icon>
                    Add New Section
                </a>
            </div>
            <div class="card-body p-24">
                <div class="table-responsive scroll-sm">
                    <table class="table bordered-table sm-table mb-0" id="dataTable">
                    <thead>
                        <tr>
                        <th scope="col" onclick="sortTable(0)">
                            <div class="d-flex align-items-center gap-10">
                                <div class="form-check style-check d-flex align-items-center">
                                    <input class="form-check-input radius-4 border input-form-dark" type="checkbox" name="checkbox" id="selectAll">
                                </div>
                                S.L
                            </div>
                        </th>
                        <th scope="col" onclick="sortTable(1)">Section Name</th>
                        <th scope="col" onclick="sortTable(2)">Section Title</th>
                        <th scope="col" onclick="sortTable(4)">Section Style</th>
                        <th scope="col" onclick="sortTable(3)">Section Img</th>
                        <th scope="col" onclick="sortTable(3)">Section Category</th>
                        <th scope="col" onclick="sortTable(5)">Lang Code</th>
                        <th scope="col" onclick="sortTable(8)">Section Order</th>
                        <th scope="col" onclick="sortTable(6)">Parent Section</th>
                        <th scope="col" onclick="sortTable(13)">Status</th>
                        <th scope="col" onclick="sortTable(14)">Display By</th>
                        <th scope="col" onclick="sortTable(15)">Created Date</th>
                        <th scope="col" onclick="sortTable(16)">Updated Date</th>
                        <th scope="col" onclick="sortTable(18)">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($sections as $key => $section)

                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-10">
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox">
                                        </div>
                                        {{$key + 1}}
                                    </div>
                                </td>
                                <td> {{$section->section_name ?? 'N/A'}} </td>
                                <td> {{$section->section_title ?? 'N/A'}} </td>
                                <td> {{$section->section_style ?? 'N/A'}} </td>
                                <td>  
                                    @if($section->section_image)
                                        <img src="{{ asset('storage/' . $section->section_image) }}" class="img-fluid rounded" alt="{{ $section->section_name }}" width="50">
                                    @endif
                                </td>
                                <td> {{$section->categories->name ?? 'N/A'}} </td>
                                <td> {{$section->lang->lang_title ?? 'N/A'}} </td>
                                <td> {{$section->section_order ?? 'N/A'}} </td>
                                <td> {{$section->parent_section ?? 'N/A'}} </td>
                                <td>
                                    @if($section->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td> {{$section->user->name ?? 'N/A'}} </td>
                                <td> {{$section->created_at ?? 'N/A'}} </td>
                                <td> {{$section->updated_at ?? 'N/A'}} </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <a href="{{ route('admin.homepage.edit', $section->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.homepage.destroy', $section->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>


                        @endforeach


                        
                    </tbody>
                    </table>
                </div>

                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mt-24">
                    <span>Showing 1 to 10 of 12 entries</span>
                    <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center">
                        <li class="page-item">
                            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md" href="javascript:void(0)"><iconify-icon icon="ep:d-arrow-left" class=""></iconify-icon></a>
                        </li>
                        <li class="page-item">
                            <a class="page-link text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md bg-primary-600 text-white" href="javascript:void(0)">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px" href="javascript:void(0)">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md" href="javascript:void(0)">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md" href="javascript:void(0)">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md" href="javascript:void(0)">5</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link bg-neutral-200 text-secondary-light fw-semibold radius-8 border-0 d-flex align-items-center justify-content-center h-32-px w-32-px text-md" href="javascript:void(0)"> <iconify-icon icon="ep:d-arrow-right" class=""></iconify-icon> </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection




@section('scripts')
    <script>
        console.log('Home Page');
    </script>
@endsection