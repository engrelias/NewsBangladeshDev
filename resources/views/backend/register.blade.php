@extends('admin_dashboard.main-layout')
@section('title', 'Admin Login')


@section('content')

<section class="w-50 mx-auto mt-5 mb-3">

    <div class="card">
                  
        <div class="card-content collapse show">
            <div class="card-body">
            
                <form class="form">
                    <div class="form-body">
                        <h4 class="form-section">
                            <i class="ft-user"></i>Register</h4>
                        <div class="form-group">
                            <label for="companyName">Email </label>
                            <input type="email" id="companyName" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyinput1">Password</label>
                                    <input type="password" id="companyinput1" class="form-control" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="companyinput5">Company Locations</label>
                                    <select id="companyinput5" name="interested" class="form-control">
                                        <option value="none" selected="" disabled="">Countries</option>
                                        <option value="design">US</option>
                                        <option value="development">Canada</option>
                                        <option value="illustration">Japan</option>
                                        <option value="branding">Australia</option>
                                        <option value="video">China</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="companyinput8">About Company</label>
                            <textarea id="companyinput8" rows="5" class="form-control" name="comment" placeholder="About Company"></textarea>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="button" class="btn btn-danger mr-1">
                            <i class="ft-x"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Save
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
    </script>
@endsection

