@extends('backend.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Vehicles')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            @lang('Vehicles')
                            <a class="btn btn-primary" href="{{ route('backend.vehicles.create') }}">@lang('Add')</a>
                        </div>
                        <div class="card-body">
                            @include('backend.vehicles.table')
                            <div class="pull-right mr-3">

                                {{-- @include('coreui-templates::common.paginate', [
                                    'records' => $vehicles,
                                ]) --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
