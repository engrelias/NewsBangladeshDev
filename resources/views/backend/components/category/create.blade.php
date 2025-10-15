@extends('admin_dashboard.mainLayout')
@section('title')
{{ __('create_event_category') }}
@endsection

@section('styles')

@endsection




@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <h4 class="card-title line-height-36">{{ __('EventCategory Create') }}</h4>

        </div>

        <div class="content-body">
            <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <x-forms.label name="category_name" :required="true" />
                                <x-forms.input type="text" name="category_name" data-show-errors="true" placeholder="enter category name" />
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                            <table class="ll-table table table-hover text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>{{ __('company') }}</th>
                                        <th>{{ __('active') }} {{ __('job') }}</th>
                                        <th>{{ __('establishment_date') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ancd</td>
                                            <td>ancd</td>
                                            <td>ancd</td>
                                        </tr>
                                        <tr>
                                            <td>ancd</td>
                                            <td>ancd</td>
                                            <td>ancd</td>
                                        </tr>
                                        <tr>
                                            <td>ancd</td>
                                            <td>ancd</td>
                                            <td>ancd</td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>

            </div>
        </div>

    </div>
</div>

@endsection






@section('scripts')

@endsection