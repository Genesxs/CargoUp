@extends('backend.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Type Accounts')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header  d-flex justify-content-between">
                            @lang('Type Accounts')
                            <a class="btn btn-primary" href="{{ route('backend.typeAccounts.create') }}">@lang('Add')</a>
                        </div>
                        <div class="card-body">
                            @include('backend.type_accounts.table')
                            <div class="pull-right mr-3">

                                @include('coreui-templates::common.paginate', [
                                    'records' => $typeAccounts,
                                ])

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
