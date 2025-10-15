@extends('admin.mainLayout')

@section('title', 'News List')

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
            <h6 class="fw-semibold mb-0">News List</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">News List</li>
            </ul>
        </div>
    
        <div class="card basic-data-table fixed-header-table">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">News List</h5>
                <a href="{{ route('news.create') }}" class="btn btn-primary btn-sm">Add News</a>
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
                                <th scope="col" >News Title</th>
                                    <th scope="col" >News Slug</th>
                                    <th scope="col" >News Sub Title</th>
                                    <th scope="col" >News Summary</th>
                                    <th scope="col" >News Des</th>
                                    <th scope="col" >News Img</th>
                                    <th scope="col" >News Img Caption</th>
                                    <th scope="col" >News Video</th>
                                    <th scope="col" >Video Url</th>
                                    <th scope="col" >Video Url Form</th>
                                    <th scope="col" >Is_video_page</th>
                                    <th scope="col" >News Tag</th>
                                    <th scope="col" >News Desk</th>
                                    <th scope="col" >News Ticker</th>
                                    <th scope="col" >News Order</th>
                                    <th scope="col" >News Parent</th>
                                    <th scope="col" >Lang Code</th>
                                    <th scope="col">News View Count</th>
                                    <th scope="col">Meta_title</th>
                                    <th scope="col">Meta_description</th>
                                    <th scope="col" >Meta_keywords</th>
                                    <th scope="col" >Status</th>
                                    <th scope="col" >Created By</th>
                                    <th scope="col" >Updated By</th>
                                    <th scope="col" >Updated Date</th>
                                    <th scope="col" >Deleted Date</th>
                                    <th scope="col" >Action</th>
                                </tr>
                            </thead>
                        <tbody>

                            @foreach ($newsItems as $key => $news)

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-10">
                                            <div class="form-check style-check d-flex align-items-center">
                                                <input class="form-check-input radius-4 border border-neutral-400" type="checkbox" name="checkbox">
                                            </div>
                                            {{$key + 1}}
                                        </div>
                                    </td>
                                    <td> {{$news->news_title ?? 'N/A'}} </td>
                                    <td> {{$news->news_slug ?? 'N/A'}} </td>
                                    <td> {{$news->news_subtitle ?? 'N/A'}} </td>
                                    <td> {{$news->news_summary ?? 'N/A'}} </td>
                                    <td> {{$news->news_desc ?? 'N/A'}} </td>
                                    <td>  
                                        @if($news->news_img)
                                            <img src="{{ asset('storage/' . $news->news_img) }}" class="img-fluid rounded" alt="{{ $news->news_img }}" width="50">
                                        @endif
                                    </td>
                                    <td> {{$news->news_img_caption ?? 'N/A'}} </td>

                                    <td>  
                                        @if($news->news_video)
                                            <video controls width="100">
                                                <source src="{{ asset('storage/' . $news->news_video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td> {{$news->video_url ?? 'N/A'}} </td>
                                    <td> {{$news->video_url_from ?? 'N/A'}} </td>
                                    <td> {{$news->is_video_page ? 'Yes' : 'No'}} </td>
                                    <td> {{$news->news_tag ?? 'N/A'}} </td>
                                    <td> {{$news->news_desk ?? 'N/A'}} </td>
                                    <td> {{$news->news_ticker ?? 'N/A'}} </td>
                                    <td> {{$news->news_order ?? 'N/A'}} </td>
                                    <td> {{$news->news_parent ?? 'N/A'}} </td>
                                    <td> {{$news->lang_code ?? 'N/A'}} </td>
                                    <td> {{$news->news_view_count ?? 'N/A'}} </td>
                                    <td> {{$news->meta_title ?? 'N/A'}} </td>
                                    <td> {{$news->meta_desc ?? 'N/A'}} </td>
                                    <td> {{$news->meta_keyword ?? 'N/A'}} </td>
                                
                                    <td>
                                        @if($news->news_status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td> {{$news->user->name ?? 'N/A'}} </td>
                                    <td> {{$news->updated_by ?? 'N/A'}} </td>
                                    <td> {{$news->created_at ?? 'N/A'}} </td>
                                    <td> {{$news->updated_at ?? 'N/A'}} </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('news.destroy', $news->id) }}" method="POST" class="d-inline">
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