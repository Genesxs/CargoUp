@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">@include('frontend.user.includes.menu')</div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        @include('frontend.user.includes.messages')
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-12"></div>
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <strong>Darle clic a la imagen para descargar formato hoja de vida, una vez diligenciada
                                debe subirla</strong>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 ml-3">
                    <div class="col-12 col-lg-4 col-xs-12 d-flex justify-content-center mt-4">
                        <div>
                            <a href="{{ url('dashboard') }}"><img src="{{ asset('/img/RegistroC.png') }}" height="350"
                                    weight="100%"></a>
                            <p class="text-center mt-2 h4"><strong>Registrarse como conductor</strong></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-xs-12 d-flex justify-content-center mt-4">
                        @include('frontend.user.includes.register-driver')
                    </div>
                </div>
                <div class="row mt-5">
                </div>
            </div>
        </div>
    </div>

@endsection
