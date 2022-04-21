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
            <div class="col-12">
                <div class="card">
                    <div class="row mt-3">
                        <div class="col-3 col-sm-3 col-md-12 col-lg-12 col-xl-12">
                            <div class="col-12">@include(
                                'frontend.user.includes.messages'
                            )</div>
                        </div>
                    </div>
                    <div class="card-title ml-4">
                        <h2 class="title">Guía de envío</h2>
                        <h4 class="subtitle">Guía # {{ $guide->guideId }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-6">
                                <h5 class="tittle">Datos de origen:</h5>
                                <table class="table table-responsive tbl">
                                    <thead>
                                        <tr>
                                            <th scope="col">Departamento</th>
                                            <th scope="col">Municipio</th>
                                            <th scope="col">Dirección</th>
                                            <th scope="col">Información adicional</th>
                                            <th scope="col">Remitente</th>
                                            <th scope="col">Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{ $origin->depOr }}</th>
                                            <td>{{ $origin->munOr }}</td>
                                            <td>{{ $guide->pickAd }}</td>
                                            <td>{{ $origin->adOr }}</td>
                                            <td>{{ $origin->remitente }}</td>
                                            <td>{{ $origin->telRemit }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                <h5 class="tittle">Datos de destino/s:</h5>
                                <table class="table table-responsive tbl">
                                    <thead>
                                        <tr>
                                            <th scope="col">Departamento</th>
                                            <th scope="col">Municipio</th>
                                            <th scope="col">Dirección</th>
                                            <th scope="col">Información adicional</th>
                                            <th scope="col">Remitente</th>
                                            <th scope="col">Teléfono</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guideDestinations as $destination)
                                            <tr>
                                                <th>{{ $destination->depDe }}</th>
                                                <td>{{ $destination->munDes }}</td>
                                                <td>{{ $destination->desAd }}</td>
                                                <td>{{ $destination->adDes }}</td>
                                                <td>{{ $destination->namDes }} {{ $destination->lastDes }}</td>
                                                <td>{{ $destination->telDes }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-4 mt-3">
                                <table class="table table-responsive tbl mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cantidad total</th>
                                            <th scope="col">Peso total</th>
                                            <th scope="col">Subtotal</th>
                                            <th scope="col">Descuento</th>
                                            <th scope="col">Iva</th>
                                            <th scope="col">Total costo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($guideTotals as $total)
                                            <tr>
                                                @if ($guide->iva_id == null && $guide->discount_id == null)
                                                    <th>{{ $total->totalCuantity}}</th>
                                                    <td>{{ $total->totalWeight }}</td>
                                                    <td>{{ $guide->subtotal }}</td>
                                                    <td>0,00</td>
                                                    <td>0,00</td>
                                                    <td>{{ $guide->total }}</td>
                                                @else
                                                    <th>{{ $total->totalCuantity }}</th>
                                                    <td>{{ $total->totalWeight }}</td>
                                                    <td>{{ $guide->subtotal }}</td>
                                                    <td>{{ $guide->dis }}</td>
                                                    <td>{{ $guide->iva }}</td>
                                                    <td>{{ $guide->total }}</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12  d-flex justify-content-end">
                                <div class="mt-2" style="margin-right: 200px;">
                                    <a class="btn btn-primary btn-lg" id="pay" href="{{route('payment-guide')}}">Pagar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
