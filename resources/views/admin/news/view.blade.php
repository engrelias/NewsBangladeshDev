@extends('admin.mainLayout')

@section('title', 'View News - ' . ($news->news_title ?? 'Untitled'))

@section('styles')
    <style>
        .news-detail-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .video-preview {
            max-width: 100%;
            border-radius: 8px;
        }
        .detail-row {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .detail-label {
            font-weight: 700;
            color: #657380;
            margin-bottom: 5px;
        }
        .detail-value {
            color: #edf2f6;
            font-size: 14px;

        }
        .detail-value-rich {
            color: #cbdbe9;
            font-size: 14px;
        }
        .meta-section {
            background-color: #1B2431;
            padding: 15px;
            border-radius: 8px;
            margin-top: 30px;
        }
        .category-badge {
            margin-right: 5px;
            margin-bottom: 5px;
        }
        .content-section {
            background: #1B2431;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .stat-badge {
            font-size: 0.9rem;
            padding: 8px 12px;
        }
    </style>
@endsection

@section('content')
    <div class="dashboard-main-body">
        <!-- Breadcrumb -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
            <h6 class="fw-semibold mb-0">News Details</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                        Dashboard
                    </a>
                </li>
                <li>-</li>
                <li class="fw-medium">
                    <a href="{{ route('news.index') }}">News</a>
                </li>
                <li>-</li>
                <li class="fw-medium">View News</li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    News Details: {{ $news->news_title ?? 'Untitled' }}
                    @if(!$news->news_status)
                        <span class="badge bg-danger ms-2">Inactive</span>
                    @endif
                </h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-primary btn-sm d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:pen-outline"></iconify-icon>
                        <span>Edit</span>
                    </a>
                    <a href="{{ route('news.index') }}" class="btn btn-secondary btn-sm d-flex align-items-center gap-1">
                        <iconify-icon icon="solar:arrow-left-outline"></iconify-icon>
                        <span>Back to List</span>
                    </a>
                </div>

            </div>
            <div class="card-body">
                <!-- Basic Information -->
                <div class="content-section">
                    <h6 class="mb-4 border-bottom pb-2">Basic Information</h6>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="detail-row">
                                <div class="detail-label">Title</div>
                                <div class="detail-value">{{ $news->news_title ?? 'N/A' }}</div>
                            </div>

                            @if($news->news_subtitle)
                            <div class="detail-row">
                                <div class="detail-label">Subtitle</div>
                                <div class="detail-value">{{ $news->news_subtitle }}</div>
                            </div>
                            @endif

                            <div class="detail-row">
                                <div class="detail-label">Slug</div>
                                <div class="detail-value">{{ $news->news_slug ?? 'N/A' }}</div>
                            </div>

                            @if($news->news_summary)
                            <div class="detail-row">
                                <div class="detail-label">Summary</div>
                                <div class="detail-value-rich">{{ $news->news_summary }}</div>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <!-- Statistics -->
                            <div class="detail-row">
                                <div class="detail-label">Quick Stats</div>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge bg-primary stat-badge">
                                        Views: {{ $news->news_view_count ?? 0 }}
                                    </span>
                                    <span class="badge bg-info stat-badge">
                                        Lang: {{ $news->lang_code ?? 'N/A' }}
                                    </span>
                                    <span class="badge bg-secondary stat-badge">
                                        Order: {{ $news->news_order ?? 0 }}
                                    </span>
                                </div>
                            </div>

                            <!-- Featured Image -->
                            @if($news->news_img)
                                <div class="detail-row">
                                    <div class="detail-label">Featured Image</div>
                                    <img src="{{ asset('storage/' . $news->news_img) }}" 
                                         class="news-detail-image" 
                                         alt="{{ $news->news_img_caption ?? 'News image' }}">
                                    @if($news->news_img_caption)
                                        <div class="text-center text-muted mt-2">
                                            <small>{{ $news->news_img_caption }}</small>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    @if($news->news_desc)
                    <div class="detail-row">
                        <div class="detail-label">Description</div>
                        <div class="detail-value-rich">
                            {!! $news->news_desc !!}
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Categories and Tags -->
                <div class="content-section mt-4">
                    <h6 class="mb-4 border-bottom pb-2">Categories & Tags</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="detail-row">
                                <div class="detail-label">Categories</div>
                                <div class="detail-value">
                                    @if($news->categories && $news->categories->count() > 0)
                                        @foreach($news->categories as $category)
                                            <span class="badge bg-primary category-badge">{{ $category->category_name }}</span>
                                        @endforeach
                                    @else
                                        <span class="text-muted">No categories assigned</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if($news->news_tag)
                            <div class="detail-row">
                                <div class="detail-label">Tags</div>
                                <div class="detail-value">{{ $news->news_tag }}</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Media Information -->
                <div class="content-section mt-4">
                    <h6 class="mb-4 border-bottom pb-2">Media Information</h6>
                    <div class="row">
                        @if($news->news_video)
                        <div class="col-md-6">
                            <div class="detail-row">
                                <div class="detail-label">Featured Video</div>
                                <video controls class="video-preview">
                                    <source src="{{ asset('storage/' . $news->news_video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        @endif

                        <div class="col-md-6">
                            @if($news->video_url)
                            <div class="detail-row">
                                <div class="detail-label">Video URL</div>
                                <div class="detail-value">
                                    <a href="{{ $news->video_url }}" target="_blank" class="text-break">
                                        {{ $news->video_url }}
                                    </a>
                                </div>
                            </div>
                            @endif

                            @if($news->video_url_from)
                            <div class="detail-row">
                                <div class="detail-label">Video Source</div>
                                <div class="detail-value">{{ $news->video_url_from }}</div>
                            </div>
                            @endif

                            <div class="detail-row">
                                <div class="detail-label">Video Page</div>
                                <div class="detail-value">
                                    @if($news->is_video_page)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-secondary">No</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Settings -->
                <div class="content-section mt-4">
                    <h6 class="mb-4 border-bottom pb-2">Additional Settings</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="detail-row">
                                <div class="detail-label">Ticker</div>
                                <div class="detail-value">{{ $news->news_ticker ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="detail-row">
                                <div class="detail-label">Order</div>
                                <div class="detail-value">{{ $news->news_order ?? 0 }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="detail-row">
                                <div class="detail-label">Parent News</div>
                                <div class="detail-value">{{ $news->news_parent ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="detail-row">
                                <div class="detail-label">Desk</div>
                                <div class="detail-value">{{ $news->news_desk ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="detail-row">
                                <div class="detail-label">Status</div>
                                <div class="detail-value">
                                    @if($news->news_status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SEO Meta Information -->
                <div class="meta-section mt-4">
                    <h6 class="mb-3">SEO Meta Information</h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-row">
                                <div class="detail-label">Meta Title</div>
                                <div class="detail-value">{{ $news->meta_title ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-row">
                                <div class="detail-label">Meta Description</div>
                                <div class="detail-value">{{ $news->meta_desc ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-row">
                                <div class="detail-label">Meta Keywords</div>
                                <div class="detail-value">{{ $news->meta_keyword ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-row">
                                <div class="detail-label">Meta Image</div>
                                <div class="detail-image">
                                    @if($news->meta_img)
                                        <img width="160px" height="120px" src="{{ asset('storage/' . $news->meta_img) }}" alt="Meta Image" class="img-fluid">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Audit Information -->
                <div class="content-section mt-4">
                    <h6 class="mb-4 border-bottom pb-2">Audit Information</h6>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="detail-row">
                                <div class="detail-label">Created By</div>
                                <div class="detail-value">{{ $news->user->name ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-row">
                                <div class="detail-label">Updated By</div>
                                <div class="detail-value">{{ $news->updated_by ?? 'N/A' }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-row">
                                <div class="detail-label">Created Date</div>
                                <div class="detail-value">{{ $news->created_at->format('M j, Y g:i A') }}</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="detail-row">
                                <div class="detail-label">Updated Date</div>
                                <div class="detail-value">{{ $news->updated_at->format('M j, Y g:i A') }}</div>
                            </div>
                        </div>
                    </div>
                    @if($news->deleted_at)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="detail-row">
                                <div class="detail-label">Deleted Date</div>
                                <div class="detail-value text-danger">{{ $news->deleted_at->format('M j, Y g:i A') }}</div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Initialize tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
@endsection