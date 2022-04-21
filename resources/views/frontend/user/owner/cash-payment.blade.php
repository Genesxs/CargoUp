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
                </div>
                <div class="row mt-5">
                    <div class="col-12">@include('frontend.user.includes.messages')</div>
                </div>
                <!--body-->
                <div class="row mt-5 ml-3">
                    <div class="col-12 col-lg-4 col-xs-12 d-flex justify-content-center mt-4">
                        <div>
                            <a href="{{ url('dashboard') }}"><img src="{{ asset('/img/Pagocon.png') }}" height="350"
                                    width="100%"></a>
                            <p class="text-center mt-2 h4"><strong>Paga de contado o crédito</strong></p>
                            <div>
                                <p class="mt-5 d-flex justify-content-center">
                                    <a href="{{ route('creditPayment') }}" class="btn btn-primary btn-lg">CRÉDITO</a>
                                </p>
                                <p class="mt-3 d-flex justify-content-center">
                                    <a href="{{ route('cashPayment') }}" class="btn btn-primary btn-lg">CONTADO</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-xs-12 d-flex justify-content-start mt-4">
                        @include('frontend.user.includes.cash')
                    </div>
                    <div class="row mt-5">
                    </div>
                </div>
                <!--end body-->
            </div>

        </div>
        <!--col-md-10-->
    </div>
    <!--row-->
    </div>
    <!--container-->

@endsection
