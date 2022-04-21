@extends('backend.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Banks')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            @lang('Banks')
                            <a class="btn btn-primary" href="{{ route('backend.banks.create') }}"> @lang('Add') </a>
                        </div>
                        <div class="card-body">
                            @include('backend.banks.table')
                            <div class="pull-right mr-3">

                                @include('coreui-templates::common.paginate', [
                                    'records' => $banks,
                                ])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
