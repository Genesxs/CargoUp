@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">@include('frontend.user.includes.menu')</div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-5">
                    @include('frontend.user.includes.messages')
                </div>
                <div class="row mt-5 ml-3">
                    <div class="col-12 col-lg-3 col-xs-12 d-flex justify-content-center mt-4">
                        <div>
                            <a href="{{ url('dashboard') }}"><img src="{{ asset('/img/vehiculo.png') }}" height="250"
                                    width="100%"></a>
                            <p class="text-center mt-2 h4"><strong>Selecciona un vehiculo</strong></p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-9 col-xs-12 d-flex justify-content-start mt-4">
                        <div class=" table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Vehiculo</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col"># de cuotas</th>
                                        <th scope="col">valor cuotas</th>
                                        <th scope="col">Precio de contado</th>
                                        <th scope="col">Descuento por pago de contado</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($typeVehicles as $typeVehicle)
                                        {{-- <form method="POST" action="{{ route('selectVehicle', ['id' => $typeVehicle->id]) }}">
                                                    @csrf --}}
                                        <tr>
                                            <th scope="row">
                                                <img src="{{ asset($typeVehicle->url_photo) }}" height="150px"
                                                    width="180px" alt="">
                                            </th>
                                            <td>
                                                {{ $typeVehicle->name }}
                                            </td>
                                            <td>
                                                <select class="form-control" name="calculo" id={{ $typeVehicle->id }}>
                                                    @foreach ($quotas as $quota)
                                                        <option value="{{ $quota->quota_number }}">
                                                            {{ $quota->quota_number }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                @php
                                                    $tV = 'quota' . strval($typeVehicle->id);
                                                @endphp
                                                <input class="form-control" name="vrlcuota" type="text"
                                                    id={{ $tV }} size="15" maxlength="15" readonly>
                                            </td>
                                            <td>
                                                @php
                                                    $tVMonto = 'monto' . strval($typeVehicle->id);
                                                @endphp
                                                <input class="form-control" type="text" name="monto"
                                                    id={{ $tVMonto }} value="{{ $typeVehicle->price }}" readonly>
                                            </td>

                                            @php
                                                $tVdesc = 'desc' . strval($typeVehicle->id);
                                            @endphp
                                            <td> <input class="form-control" name="vrldescuento" id={{ $tVdesc }}
                                                    type="text" size="15" maxlength="15" readonly></td>

                                            <td>
                                                {{-- <a class="btn btn-outline-success" href="{{ route('selectVehicle',['id' => $typeVehicle->id])}}">Seleccionar</a> --}}
                                                <a class="btn btn-primary"
                                                    href="{{ route('creditPayment') }}">Seleccionar</a>
                                            </td>
                                        </tr>

                                        </form>
                                    @endforeach
                                </tbody>
                                {{ $typeVehicles->links() }}
                            </table>

                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                </div>
            </div>
        </div>

    @endsection
