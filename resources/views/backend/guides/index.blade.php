@extends('backend.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Guides')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            @lang('Guides')
                            <form action="{{ route('backend.guides.search') }}" enctype="multipart/form-data">
                                <div class="form-row mt-3">
                                    <div class="form-group col-3">
                                        <label for="date_from">@lang('Date from')</label>
                                        <input class="form-control" id="date_from" name="date_from" type="date">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="date_to">@lang('Date to')</label>
                                        <input class="form-control" id="date_to" name="date_to" type="date">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="">@lang('Status')</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">@lang('Select a status')</option>
                                                <option value="1">pendiente</option>
                                                <option value="2">pagada</option>
                                                <option value="3">anulada</option>
                                                <option value="4">entregada</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-3 mt-4">
                                        <button type="submit" class="btn btn-primary mt-1">@lang('Search')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @if (count($guides) == 0)
                            <div class="alert alert-danger text-dark text-center">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                No tienes ninguna guía que coincidan con las fechas y estados ingresados.
                            </div>
                        @else
                            <div class="card-body">
                                @include('backend.guides.table')
                                <div class="pull-right mr-3">

                                    {{-- @include('coreui-templates::common.paginate', ['records' => $guides]) --}}

                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
