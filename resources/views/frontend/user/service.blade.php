@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')


    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">
                @include('frontend.user.includes.menu')
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="row mt-3">
                        <div class="col-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">
                            <div class="col-12">@include('frontend.user.includes.messages')</div>
                        </div>
                    </div>
                    <div class="card-title m-2">
                        <div class="alert alert-info text-dark text-center">
                            Diligencia tu dirección de origen para poder ingresar los datos del paquete con su dirección/nes
                            de destino
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Directions -->
                            <div class="col-2">

                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                <h4>Dirección de origen</h4>
                                <ul class="nav nav-tabs" id="myTabDirections" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="origin-tab" data-toggle="tab" href="#origin"
                                            role="tab" aria-controls="origin" aria-selected="true">Origen</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabDirections">
                                    <div class="tab-pane fade show active" id="origin" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        @include('frontend.user.includes.origin')
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
