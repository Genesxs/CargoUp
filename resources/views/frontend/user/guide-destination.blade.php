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
                            Si no deseas agregar más destinos, haga click sobre el botón siguiente para visualizar la guía de envío.
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('storeGuideDestiny') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <h4>Escoja tipo de envío</h4>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="envio" id="paquete" value="1"
                                            onclick="habilitarDeshabilitar()" checked>
                                        <label class="form-check-label" for="paquete">Paquete</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="envio" id="sobre" value="2"
                                            onclick="habilitarDeshabilitar()">
                                        <label class="form-check-label" for="sobre">Sobre</label>
                                    </div>
                                    @include('frontend.user.includes.package')

                                </div>

                                <!-- Directions -->
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <h4>Dirección de destino/s</h4>
                                    <ul class="nav nav-tabs" id="myTabDirections" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="destiny-tab" data-toggle="tab" href="#destiny"
                                                role="tab" aria-controls="destiny" aria-selected="false">Destino/s</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabDirections">
                                        <div class="tab-pane fade show active" id="destiny" role="tabpanel"
                                            aria-labelledby="destiny-tab">
                                            @include('frontend.user.includes.destiny')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form method="GET" action="{{ route('storeGuide') }}"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <div class="mt-2">
                                        <button  class="btn btn-primary" id="next">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endsection
