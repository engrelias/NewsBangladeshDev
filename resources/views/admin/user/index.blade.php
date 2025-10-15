@extends('admin.mainLayout')

@section('title', 'Users List')

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
            <h6 class="fw-semibold mb-0">User Roles & Permissions</h6>
            <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
                </li>
                <li>-</li>
                <li class="fw-medium">User Roles</li>
            </ul>
        </div>
            
        <div class="card basic-data-table fixed-header-table">
             <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title mb-0">User List</h5>
                <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-sm">Add New User</a>
            </div>
            <div class="card-body">
                <div class="overflow-x-auto table-responsive scroll-sm">
                    <table class="table bordered-table mb-0 mx-0" id="dataTable" data-page-length='10'>
                        <thead>
                        <tr>
                            <th scope="col">User</th>
                            <th scope="col">Status</th>
                            <th scope="col">Role</th>
                            <th scope="col">Role Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($users as $key => $user)

                        <tr>
                            <td>
                            <div class="d-flex align-items-center">
                                @if($user->profile_photo_path)
                                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" alt="{{ $user->name }}" width="50">
                                @else
                                    <img src="{{ asset('admin/assets/images/user.png') }}" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden" alt="{{ $user->name }}" width="50">
                                @endif
                                <div class="flex-grow-1">
                                <span class="text-md mb-0 fw-bolder text-primary-light d-block">{{ $user->name }}</span>
                                <span class="text-sm mb-0 fw-normal text-secondary-light d-block">{{ $user->email }}</span>
                                </div>
                            </div>
                            </td>

                            <td>
                                @if($user->is_active)
                                    <span class="bg-success text-white px-20 py-4 rounded fw-medium text-sm">Active</span>
                                @else
                                    <span class="bg-warning-focus text-white px-20 py-4 rounded fw-medium text-sm">Pending</span>
                                @endif
                            </td>
                       
                            
                            <td>
                                @php 
                                    $role = $user->user_role; // Assuming a user has one role  
                                @endphp
                                <select class="form-control w-auto border border-neutral-900 fw-semibold text-primary-light text-sm">
                                    <option value="1" {{ $role == 1 ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ $role == 2 ? 'selected' : '' }}>Editor</option>
                                    <option value="3" {{ $role == 3 ? 'selected' : '' }}>Reporter</option>
                                </select>
                            </td>
                            
                            <td>
                                @if($user->role->role_status == 1)
                                    <span class="bg-success text-white px-20 py-4 rounded fw-medium text-sm">Active</span>
                                @else
                                    <span class="bg-danger-focus text-white px-20 py-4 rounded fw-medium text-sm">Inactive</span>
                                @endif
                            </td>
                            
                            <td> {{$user->created_at->format('Y-m-d H:i:s') ?? 'N/A'}} </td>
                            <td> {{$user->updated_at->format('Y-m-d H:i:s') ?? 'N/A'}} </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline">
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