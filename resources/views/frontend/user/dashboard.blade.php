@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')


    <div class="container-fluid mt-3">
        <div class="row">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <div class="col-12">@include('frontend.user.includes.menu')</div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="row mt-5">
                    <div class="col-12">@include('frontend.user.includes.messages')</div>
                </div>
                <div class="row mt-5">
                </div>
                <div class="row mt-5 ml-4">
                    <div class="col-12 col-lg-4 col-xs-4 d-flex justify-content-center mt-4">
                        <div>
                            <a href="{{ route('showVehicle') }}"><img src="{{ asset('/img/vehiculo.png') }}" height="350"
                                    width="100%"></a>
                            <p class="text-center mt-2 h4"><strong>Selecciona un vehiculo</strong></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xs-4 d-flex justify-content-center mt-4">
                        <div>
                            <a href="{{ route('creditPayment') }}"><img src="{{ asset('/img/Pagocon.png') }}" height="350"
                                    width="100%"></a>
                            <p class="text-center mt-2 h4"><strong>Paga de contado o crédito</strong></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 col-xs-4 d-flex justify-content-center mt-4">
                        <div>
                            <a href="{{ route('showDriver') }}"><img src="{{ asset('/img/RegistroC.png') }}" height="350"
                                    weight="100%"></a>
                            <p class="text-center mt-2 h4"><strong>Registrarse como conductor</strong></p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                </div>
            </div>
        </div>
    </div>
@endsection
