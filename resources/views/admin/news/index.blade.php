@extends('admin.mainLayout')

@section('title', 'News Management')

@section('styles')
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/lib/dataTables.min.css')}}" />
    <style>
        .news-image {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
        .status-badge {
            font-size: 0.75rem;
        }
        .action-buttons {
            white-space: nowrap;
        }
        .table-responsive {
            border-radius: 8px;
        }
        .news-title {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .category-badge {
            margin: 2px;
        }
        .tab-content {
            padding: 20px 0;
        }
        .detail-row {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .detail-label {
            font-weight: 600;
            color: #495057;
        }
        .detail-value {
            color: #6c757d;
        }
        .image-preview {
            max-width: 200px;
            border-radius: 8px;
            margin-top: 10px;
        }
        .video-preview {
            max-width: 200px;
            border-radius: 8px;
        }
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                gap: 10px;
                align-items: flex-start !important;
            }
            .action-buttons {
                flex-direction: column;
                gap: 5px !important;
            }
            .action-buttons .btn {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    <div class="dashboard-main-body">
        <!-- Breadcrumb -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">News Management</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">News Management</li>
            </ul>
        </div>

        <!-- News Table Card -->
        <div class="card basic-data-table fixed-header-table">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">News Articles</h5>
                <a href="{{ route('news.create') }}" class="btn btn-primary btn-sm d-flex align-items-center gap-1">
                    <iconify-icon icon="solar:add-circle-outline"></iconify-icon>
                    <span>Add News</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive scroll-sm">
                    <table class="table bordered-table mb-0" xid="newsTable" data-page-length='10'>
                        <thead>
                            <tr>
                                <th width="40">
                                    <div class="form-check style-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="selectAllNews">
                                    </div>
                                </th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Categories</th>
                                <th>Language</th>
                                <th>Status</th>
                                <th>Views</th>
                                <th>Created By</th>
                                <th>Created Date</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($newsItems as $key => $news)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-10">
                                            <div class="form-check style-check d-flex align-items-center">
                                                <input class="form-check-input radius-4 border border-neutral-400" 
                                                       type="checkbox" name="news_ids[]" value="{{ $news->id }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="news-title" title="{{ $news->news_title ?? 'N/A' }}">
                                            {{ $news->news_title ?? 'N/A' }}
                                        </div>
                                        @if($news->news_subtitle)
                                            <small class="text-white d-block">{{ Str::limit($news->news_subtitle, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        @if($news->news_img)
                                            <img src="{{ asset('storage/' . $news->news_img) }}" 
                                                 class="news-image" 
                                                 alt="{{ $news->news_img_caption ?? 'News image' }}"
                                                 data-bs-toggle="tooltip" 
                                                 title="{{ $news->news_img_caption ?? '' }}">
                                        @else
                                            <span class="text-muted">No image</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($news->categories && $news->categories->count() > 0)
                                            <div class="d-flex flex-wrap">
                                                @foreach($news->categories->take(2) as $category)
                                                    <span class="badge bg-primary category-badge">{{ $category->category_name }}</span>
                                                @endforeach
                                                @if($news->categories->count() > 2)
                                                    <span class="badge bg-secondary category-badge">+{{ $news->categories->count() - 2 }}</span>
                                                @endif
                                            </div>
                                        @else
                                            <span class="text-muted">Uncategorized</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $news->lang_code ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        @if($news->news_status)
                                            <span class="badge bg-success status-badge">Active</span>
                                        @else
                                            <span class="badge bg-danger status-badge">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="fw-bold">{{ $news->news_view_count ?? 0 }}</span>
                                    </td>
                                    <td>
                                        <small>{{ $news->user->name ?? 'N/A' }} ({{ $news->user->email ?? 'N/A' }})</small>
                                    </td>
                                    <td>
                                        <small>{{ $news->created_at->format('M j, Y') }}</small>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2 action-buttons">
                                            <a href="{{ route('news.show', $news->id) }}" 
                                               class="btn btn-sm btn-outline-info" 
                                               title="View Details"
                                               data-bs-toggle="tooltip">
                                                <iconify-icon icon="solar:eye-outline"></iconify-icon>
                                            </a>
                                            <a href="{{ route('news.edit', $news->id) }}" 
                                               class="btn btn-sm btn-outline-primary" 
                                               title="Edit"
                                               data-bs-toggle="tooltip">
                                                <iconify-icon icon="solar:pen-outline"></iconify-icon>
                                            </a>
                                            <form action="{{ route('news.destroy', $news->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-danger" 
                                                        title="Delete"
                                                        data-bs-toggle="tooltip"
                                                        onclick="return confirm('Are you sure you want to delete this news item?')">
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
            // Initialize News DataTable
            $('#newsTable').DataTable({
                scrollY: "400px",
                scrollCollapse: true,
                paging: true,
                searching: true,
                info: true,
                ordering: true,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search news...",
                    paginate: {
                        previous: '<iconify-icon icon="solar:alt-arrow-left-outline"></iconify-icon>',
                        next: '<iconify-icon icon="solar:alt-arrow-right-outline"></iconify-icon>'
                    }
                },
                columnDefs: [
                    { orderable: false, targets: [0, 2, 3, 9] } // Disable sorting on checkbox, image, categories, and actions columns
                ]
            });

            // Select all checkboxes for news
            $('#selectAllNews').on('click', function() {
                $('input[name="news_ids[]"]').prop('checked', this.checked);
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Bulk actions
            $('#bulkAction').on('change', function() {
                const action = $(this).val();
                if (action) {
                    const selectedIds = $('input[name="news_ids[]"]:checked').map(function() {
                        return this.value;
                    }).get();
                    
                    if (selectedIds.length === 0) {
                        alert('Please select at least one news item.');
                        $(this).val('');
                        return;
                    }

                    if (confirm(`Are you sure you want to ${action} ${selectedIds.length} item(s)?`)) {
                        // Implement bulk action here
                        console.log(`Performing ${action} on:`, selectedIds);
                        // You would typically make an AJAX call here
                    }
                    
                    $(this).val('');
                }
            });
        });
    </script>
@endsection