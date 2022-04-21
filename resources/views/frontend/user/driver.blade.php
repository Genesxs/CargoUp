@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')


    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">@include('frontend.user.includes.menu')</div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-12">@include('frontend.user.includes.messages')</div>
                </div>
                <div class="row mt-5">
                </div>
                <div class="row mt-5">
                    <div class="col d-flex justify-content-center">
                        <div>
                            <a href="{{ route('showDriver') }}"><img src="{{ asset('/img/RegistroC.png') }}"
                                    height="350" weight="100%"></a>
                            <p class="text-center mt-5 h4 "><strong>Registrarse como conductor</strong></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                </div>
            </div>
        </div>
    </div>
@endsection