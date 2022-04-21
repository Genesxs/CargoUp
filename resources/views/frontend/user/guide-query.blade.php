@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')


    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">@include('frontend.user.includes.menu')</div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-title">
                        <h3 class="m-3">Mis guías</h3>
                    </div>
                    <div class="card-body">
                        @livewire('guides-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
