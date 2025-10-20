@extends('admin.mainLayout')

@section('title', 'Category List')

@section('styles')
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/dataTables.min.css')}}" />

    <style>
        .category-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }
        .action-buttons {
            white-space: nowrap;
        }
        .status-badge {
            font-size: 0.75rem;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .dataTables_wrapper .dataTables_scroll {
            margin-bottom: 1rem;
        }
        .dataTables_wrapper .dataTables_paginate,
        .dataTables_wrapper .dataTables_info {
            margin-top: 0.5rem;
        }
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
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
                    <table class="table bordered-table mb-0" xid="dataTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th scope="col">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="selectAll">
                                        <label class="form-check-label">S.L</label>
                                    </div>
                                </th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Language</th>
                                <th scope="col">Parent</th>
                                <th scope="col">Order</th>
                                <th scope="col">Menu Status</th>
                                <th scope="col">Status</th>
                                <th scope="col">Created</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-10">
                                        <div class="form-check style-check d-flex align-items-center">
                                            <input class="form-check-input radius-4 border border-neutral-200" type="checkbox" name="checkbox" value="{{ $category->id }}">
                                        </div>
                                        {{$key + 1}}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-medium">{{$category->category_name ?? 'N/A'}}</span>
                                        <small class="text-white">{{$category->category_slug ?? 'N/A'}}</small>
                                    </div>
                                </td>
                                <td>
                                    @if($category->category_img)
                                        <img src="{{ asset('storage/' . $category->category_img) }}" class="category-img" alt="{{ $category->category_name }}">
                                    @else
                                        <div class="category-img bg-light d-flex align-items-center justify-content-center">
                                            <iconify-icon icon="mdi:image-outline" class="text-muted"></iconify-icon>
                                        </div>
                                    @endif
                                </td>
                                <td>{{$category->lang->lang_code ?? 'N/A'}}</td>
                                <td>{{$category->category_parent ?? 'None'}}</td>
                                <td>{{$category->category_order ?? 'N/A'}}</td>
                                <td>
                                    <div class="d-flex flex-column gap-1">
                                        <span class="badge status-badge {{$category->is_menu ? 'bg-info' : 'bg-secondary'}}">
                                            {{$category->is_menu ? 'Menu' : 'Not in Menu'}}
                                        </span>
                                        <span class="badge status-badge {{$category->is_mobile_menu ? 'bg-primary' : 'bg-secondary'}}">
                                            {{$category->is_mobile_menu ? 'Mobile' : 'No Mobile'}}
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    @if($category->category_status)
                                        <span class="badge bg-success status-badge">Active</span>
                                    @else
                                        <span class="badge bg-danger status-badge">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <small>{{$category->created_at ? $category->created_at->format('M d, Y') : 'N/A'}}</small>
                                        <small class="text-white">{{$category->created_at ? $category->created_at->format('h:i A') : ''}}</small>
                                    </div>
                                </td>
                                <td class="action-buttons">
                                    <div class="d-flex align-items-center gap-2 justify-content-center">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                            <iconify-icon icon="lucide:edit"></iconify-icon>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this category?')">
                                                <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-sm btn-outline-secondary view-details" data-id="{{ $category->id }}" title="View Details">
                                            <iconify-icon icon="mdi:eye-outline"></iconify-icon>
                                        </button>
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

    <!-- Modal for Category Details -->
    <div class="modal fade" id="categoryDetailsModal" tabindex="-1" aria-labelledby="categoryDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryDetailsModalLabel">Category Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="categoryDetailsContent">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Data Table js -->
    <script src="{{asset('admin/assets/js/lib/dataTables.min.js')}}"></script>
    <!-- Add Bootstrap JS if not already included -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                scrollY: "400px",
                scrollCollapse: true,
                paging: true,
                searching: true,
                info: true,
                ordering: true,
                responsive: true
            });

            $('#selectAll').click(function() {
                $('input[name="checkbox"]').prop('checked', this.checked);
            });

            // View details button functionality
            $('.view-details').click(function() {
                const categoryId = $(this).data('id');
                const $modal = $('#categoryDetailsModal');
                const $content = $('#categoryDetailsContent');
                
                // Show loading state
                $content.html(`
                    <div class="text-center py-4">
                        <div class="loading-spinner mb-2"></div>
                        <p>Loading category details...</p>
                    </div>
                `);
                
                $modal.modal('show');
                
                $.ajax({
                    url: '/admin/categories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            const category = response.data;
                            
                            const createdDate = category.created_at ? new Date(category.created_at).toLocaleDateString('en-US', { 
                                year: 'numeric', 
                                month: 'short', 
                                day: 'numeric' 
                            }) : 'N/A';
                            
                            const updatedDate = category.updated_at ? new Date(category.updated_at).toLocaleDateString('en-US', { 
                                year: 'numeric', 
                                month: 'short', 
                                day: 'numeric' 
                            }) : 'N/A';
                            
                            const deletedDate = category.deleted_at ? new Date(category.deleted_at).toLocaleDateString('en-US', { 
                                year: 'numeric', 
                                month: 'short', 
                                day: 'numeric' 
                            }) : 'N/A';
                            
                            $content.html(`
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-header">
                                                <h6 class="mb-0">Basic Information</h6>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Category Name:</strong> ${category.category_name || 'N/A'}</p>
                                                <p><strong>Category Slug:</strong> ${category.category_slug || 'N/A'}</p>
                                                <p><strong>Language:</strong> ${category.lang ? category.lang.lang_code : 'N/A'}</p>
                                                <p><strong>Parent Category:</strong> ${category.category_parent || 'None'}</p>
                                                <p><strong>Order:</strong> ${category.category_order || 'N/A'}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-header">
                                                <h6 class="mb-0">Status & Display</h6>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Menu Status:</strong> 
                                                    <span class="badge ${category.is_menu ? 'bg-info' : 'bg-secondary'}">
                                                        ${category.is_menu ? 'In Menu' : 'Not in Menu'}
                                                    </span>
                                                </p>
                                                <p><strong>Mobile Menu:</strong> 
                                                    <span class="badge ${category.is_mobile_menu ? 'bg-primary' : 'bg-secondary'}">
                                                        ${category.is_mobile_menu ? 'In Mobile Menu' : 'Not in Mobile Menu'}
                                                    </span>
                                                </p>
                                                <p><strong>Status:</strong> 
                                                    <span class="badge ${category.category_status ? 'bg-success' : 'bg-danger'}">
                                                        ${category.category_status ? 'Active' : 'Inactive'}
                                                    </span>
                                                </p>
                                                ${category.category_img ? `
                                                    <p><strong>Image:</strong></p>
                                                    <img src="{{ asset('storage/') }}/${category.category_img}" class="category-img" alt="${category.category_name}">
                                                ` : ''}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">SEO Information</h6>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Meta Title:</strong> ${category.meta_title || 'N/A'}</p>
                                                <p><strong>Meta Description:</strong> ${category.meta_description || 'N/A'}</p>
                                                <p><strong>Meta Keywords:</strong> ${category.meta_keywords || 'N/A'}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-header">
                                                <h6 class="mb-0">Creation Info</h6>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Created By:</strong> ${category.user ? category.user.name : 'N/A'}</p>
                                                <p><strong>Created Date:</strong> ${createdDate}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="card h-100">
                                            <div class="card-header">
                                                <h6 class="mb-0">Modification Info</h6>
                                            </div>
                                            <div class="card-body">
                                                <p><strong>Updated Date:</strong> ${updatedDate}</p>
                                                <p><strong>Deleted Date:</strong> ${deletedDate}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);
                        } else {
                            $content.html(`
                                <div class="alert alert-danger">
                                    <h6>Error Loading Details</h6>
                                    <p class="mb-0">Unable to load category details. Please try again.</p>
                                </div>
                            `);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching category details:', error);
                        $content.html(`
                            <div class="alert alert-danger">
                                <h6>Error Loading Details</h6>
                                <p class="mb-0">Unable to load category details. Please try again.</p>
                                <small>Error: ${xhr.status} - ${xhr.statusText}</small>
                            </div>
                        `);
                    }
                });
            });

            // Close modal when hidden
            $('#categoryDetailsModal').on('hidden.bs.modal', function () {
                $('#categoryDetailsContent').empty();
            });
        });
    </script>
@endsection