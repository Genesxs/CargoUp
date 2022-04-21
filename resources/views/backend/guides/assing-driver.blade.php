@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            @include('flash::message')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            @lang('Assing driver')
                        </div>
                        <div class="card-body">
                            @livewire('backend.drivers-table', ['guide' => $guide])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection