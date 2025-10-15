@extends('admin_dashboard.main-layout')
@section('title', 'Admin Login')


@section('content')

<section class=" mx-auto mt-5 mb-3" style="max-width: 500px; margin: auto;">

    <div class="card">
        <div class="card-content collapse show">
            <div class="card-body">
            
                <form class="form" method="POST" action="{{ route('admin.loginStore') }}">
                  @csrf

                    <div class="form-body">
                        <h3 class="form-section">
                            <i class="ft-user"></i>Admin Login</h3>

                        <div class="form-group">
                            <label for="companyName">Email </label>
                            <input type="email" id="companyName" class="form-control" placeholder="Email" name="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="companyinput1">Password</label>
                            <input type="password" id="companyinput1" class="form-control" placeholder="Password" name="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    
                    </div>

                    <div class="form-actions">
                        <p>Are you already not registered? <a href="/register">Register here</a> </p>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</section>

    




@endsection




@section('styles')
@endsection
@section('scripts')
    <script>
        // You can add any custom scripts here if needed
    </script>
@endsection

