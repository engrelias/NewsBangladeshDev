@extends('admin.mainLayout')


@section('title') Admin Dashboard @endsection

@section('styles')

@endsection

@section('content')

    <div class="dashboard-main-body">
            <div class="d-flex flex-wrap align-items-start justify-content-start gap-2 mb-24">
                <h6 class="fw-semibold mb-0">Dashboard</h6>
                <ul class="d-flex align-items-center gap-2">
                <li class="fw-medium">
                    <a href="index.html" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Home
                    </a>
                </li>
            
                </ul>
            </div>

            <div class="row ">

                <div class="col-md-12 gy-4">
                    <div class="row mb-5">
                        <div class="col col-md-4 ">
                            <div class="card shadow-none border bg-gradient-start-2 ">
                            <div class="card-body p-10">
                                <div class="d-flex flex-wrap align-items-center justify-content-start gap-2">
                                <div class="w-40-px h-40-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="fa-solid:award" class="text-white text-xl mb-0"></iconify-icon>
                                </div>
                                <div class="d-flex  flex-column  justify-content-start mt-11">
                                    <h6 class="mb-0 ds-content-header">{{ totalNews() }}</h6>
                                    <p class="fw-medium text-warning ds-content-header-2 pt-1">Total News</p>
                                </div>
                                </div>
                        
                            </div>
                            </div>
                        </div>
                        
                        <div class="col col-md-4 mb-3">
                            <div class="card shadow-none border bg-gradient-middle-1 ">
                            <div class="card-body p-10">
                                <div class="d-flex flex-wrap align-items-center justify-content-start gap-2">
                                <div class="w-40-px h-40-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="gridicons:multiple-users" class="text-white text-xl mb-0"></iconify-icon>
                                </div>
                                <div class="d-flex  flex-column justify-content-start mt-11">
                                    <h6 class="mb-0 ds-content-header">{{ totalNewsViewers() }}</h6>
                                    <p class="fw-medium text-warning ds-content-header-2 pt-1">Total Viewer</p>
                                </div>
                                </div>
                            
                            </div>
                            </div>
                        </div>

                        <div class="col col-md-4 mb-3">
                            <div class="card shadow-none border bg-gradient-start-4 ">
                            <div class="card-body p-10">
                                <div class="d-flex flex-wrap align-items-center justify-content-start gap-2">
                                <div class="w-40-px h-40-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="fluent:people-20-filled" class="text-white text-xl mb-0"></iconify-icon>
                                </div>
                                <div class="d-flex  flex-column justify-content-start mt-11">
                                    <h6 class="mb-0 ds-content-header">{{ totalReporters() }}</h6>
                                    <p class="fw-medium text-warning ds-content-header-2 pt-1">Total Reporter</p>
                                </div>
                                </div>
                            
                            </div>
                            </div>
                        </div>

                        <div class="col col-md-4 mb-3">
                            <div class="card shadow-none border bg-gradient-middle-1 ">
                            <div class="card-body p-10">
                                <div class="d-flex flex-wrap align-items-center justify-content-start gap-2">
                                <div class="w-40-px h-40-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="fluent:people-20-filled" class="text-white text-xl mb-0"></iconify-icon>
                                </div>
                                <div class="d-flex  flex-column justify-content-start mt-11">
                                    <h6 class="mb-0 ds-content-header">{{ totalRegisteredUsers() }}</h6>
                                    <p class="fw-medium text-warning ds-content-header-2 pt-1">Total Verified User</p>
                                </div>
                                </div>
                            
                            </div>
                            </div>
                        </div>

                        <div class="col col-md-4 mb-3">
                            <div class="card shadow-none border bg-gradient-start-4 ">
                            <div class="card-body p-10">
                                <div class="d-flex flex-wrap align-items-center justify-content-start gap-2">
                                <div class="w-40-px h-40-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="fluent:people-20-filled" class="text-white text-xl mb-0"></iconify-icon>
                                </div>
                                <div class="d-flex  flex-column justify-content-start mt-11">
                                    <h6 class="mb-0 ds-content-header">{{ totalUsers() }}</h6>
                                    <p class="fw-medium text-warning ds-content-header-2 pt-1">Total  User</p>
                                </div>
                                </div>
                            
                            </div>
                            </div>
                        </div>
                
                        <div class="col col-md-4 ">
                            <div class="card shadow-none border bg-gradient-middle-1 ">
                            <div class="card-body p-10">
                                <div class="d-flex flex-wrap align-items-center justify-content-start gap-2">
                                <div class="w-40-px h-40-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                                    <iconify-icon icon="fa-solid:award" class="text-white text-xl mb-0"></iconify-icon>
                                </div>
                                <div class="d-flex  flex-column  justify-content-start mt-11">
                                    <h6 class="mb-0 ds-content-header">{{ totalCategory() }}</h6>
                                    <p class="fw-medium text-warning ds-content-header-2 pt-1">Total Category</p>
                                </div>
                                </div>
                        
                            </div>
                            </div><!-- card end -->
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mt-10">
                    <div class="card h-100">
                        <div class="card-body p-24">
            
                        <div class="d-flex flex-wrap align-items-center gap-1 justify-content-between mb-16">
                            <ul class="nav border-gradient-tab nav-pills mb-0" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                All Users
                            </li>
                        
                            </ul>
                            <a href="{{route('admin.users')}}"  class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                            View All
                            <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                            </a>
                        </div>
            
                        <div class="tab-content" id="pills-tabContent">   
                            <div class="tab-pane fade show active" id="pills-to-do-list" role="tabpanel" aria-labelledby="pills-to-do-list-tab" tabindex="0">
                            <div class="table-responsive scroll-sm">
                                <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center">Is Verified</th>
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col">Role</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach(allUsers() as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center"> 
                                            @if($user->email_verified_at)
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Verified</span>
                                            @else
                                            <span class="bg-warning-focus text-warning-main px-24 py-4 rounded-pill fw-medium text-sm">Unverified</span>
                                            @endif 
                                        </td>
                                        <td>
                                            @if($user->is_active)
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                            @else
                                            <span class="bg-danger-focus text-danger-main px-24 py-4 rounded-pill fw-medium text-sm">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{$user->role->role_title}}</td>
                                    </tr>
                                    @endforeach

                             
                                </tbody>
                                </table>
                            </div>
                            </div>
                            <div class="tab-pane fade" id="pills-recent-leads" role="tabpanel" aria-labelledby="pills-recent-leads-tab" tabindex="0">
                            <div class="table-responsive scroll-sm">
                                <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                    <th scope="col">Users </th>
                                    <th scope="col">Registered On</th>
                                    <th scope="col">Plan</th>
                                    <th scope="col" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <img src="assets/images/users/user1.png" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        <div class="flex-grow-1">
                                            <h6 class="text-md mb-0 fw-medium">Dianne Russell</h6>
                                            <span class="text-sm text-secondary-light fw-medium">redaniel@gmail.com</span>
                                        </div>
                                        </div>
                                    </td>
                                    <td>27 Mar 2024</td>
                                    <td>Free</td>
                                    <td class="text-center"> 
                                        <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span> 
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <img src="assets/images/users/user2.png" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        <div class="flex-grow-1">
                                            <h6 class="text-md mb-0 fw-medium">Wade Warren</h6>
                                            <span class="text-sm text-secondary-light fw-medium">xterris@gmail.com</span>
                                        </div>
                                        </div>
                                    </td>
                                    <td>27 Mar 2024</td>
                                    <td>Basic</td>
                                    <td class="text-center"> 
                                        <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span> 
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <img src="assets/images/users/user3.png" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        <div class="flex-grow-1">
                                            <h6 class="text-md mb-0 fw-medium">Albert Flores</h6>
                                            <span class="text-sm text-secondary-light fw-medium">seannand@mail.ru</span>
                                        </div>
                                        </div>
                                    </td>
                                    <td>27 Mar 2024</td>
                                    <td>Standard</td>
                                    <td class="text-center"> 
                                        <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span> 
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <img src="assets/images/users/user4.png" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        <div class="flex-grow-1">
                                            <h6 class="text-md mb-0 fw-medium">Bessie Cooper </h6>
                                            <span class="text-sm text-secondary-light fw-medium">igerrin@gmail.com</span>
                                        </div>
                                        </div>
                                    </td>
                                    <td>27 Mar 2024</td>
                                    <td>Business</td>
                                    <td class="text-center"> 
                                        <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span> 
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <img src="assets/images/users/user5.png" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                        <div class="flex-grow-1">
                                            <h6 class="text-md mb-0 fw-medium">Arlene McCoy</h6>
                                            <span class="text-sm text-secondary-light fw-medium">fellora@mail.ru</span>
                                        </div>
                                        </div>
                                    </td>
                                    <td>27 Mar 2024</td>
                                    <td>Enterprise </td>
                                    <td class="text-center"> 
                                        <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span> 
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>

    </div>

@endsection



@section('scripts')

@endsection