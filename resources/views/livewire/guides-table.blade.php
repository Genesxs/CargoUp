@if ($guides->isEmpty())
    <div>
        <p>No tienes guías creadas</p>
    </div>
@else
    <div>
        <div class="row">
            <div class="col-12">
                <div class="form-row d-flex justify-content-center">
                    <div class="form-group col-6">
                        <div class="d-flex">
                            <select wire:model="guideId" name="guideId" id="guideId" class="custom-select">
                                <option value="">Selecciona una guía...</option>
                                @foreach ($guides as $guide)
                                    <option value="{{ $guide->guideId }}">{{ $guide->guideId }}</option>
                                @endforeach
                            </select>
                            <div class="ml-4">
                                <button class="btn btn-primary" type="submit" wire:click='search()'>Buscar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                @include('frontend.user.includes.messages')
            </div>
        </div>

        <div class="row ml-2 mt-4">
            @if ($guideUsers != null)
                <div class="col-12 mb-3">
                    <table class="table table-responsive ">
                        <thead class="text-center d-flex justify-content-center">
                            <tr>
                                <th>Número de guía</th>
                                <th>Fecha de creación</th>
                                <th>Fecha de recogida</th>
                                <th>Valor a pagar</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-center d-flex justify-content-center">
                            <tr>
                                <td>{{ $guideUsers->id }}</td>
                                <td>{{ \Carbon\Carbon::parse($guideUsers->date_guide)->format('d-m-Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($guideUsers->date_pick)->format('d-m-Y') }}</td>
                                @if ($guideUsers->total == null)
                                    <td>0</td>
                                @else
                                    <td>{{ $guideUsers->total }}</td>
                                @endif
                                @if ($guideUsers->status == 1)
                                    <td>Pendiente</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <a class="btn btn-primary"
                                                href="{{ route('showEvidence', $guideUsers->id) }}">Pagar</a>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <button class="btn btn-danger" type="submit"
                                                wire:click="cancel()">Anular</button>
                                        </div>
                                    </td>
                                @elseif($guideUsers->status == 2)
                                    <td>Pagada</td>
                                    <td></td>
                                @elseif($guideUsers->status == 3)
                                    <td>Anulada</td>
                                    <td></td>
                                @elseif($guideUsers->status == 4)
                                    <td>Entregada</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if ($guideUsers->status == 4 && $owner != null && $vehicle != null)
                    <!--propietario vehiculo asignado-->
                    <div class="col-12">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <div class="d-flex justify-content-center">
                                    <li class="list-group-item bg">PROPIETARIO DEL VEHICULO</li>
                                    <li class="list-group-item bg-driver">ASIGNADO</li>
                                </div>
                                <div>
                                    <ul class="list-group">
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ asset($owner[0]->url_photo) }}" height="150px" width="150px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="list-group-item">{{ $owner[0]->name }}</h5>
                                            <h5 class="list-group-item">{{ $owner[0]->email }}</h5>
                                            <h5 class="list-group-item">C.C:
                                                {{ $owner[0]->identification_number }}
                                            </h5>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="d-flex flex-row justify-content-center">
                                    <li class="list-group-item bg">CONDUCTOR</li>
                                    <li class="list-group-item bg-driver">ASIGNADO</li>
                                </div>
                                <div>
                                    <ul class="list-group">
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ asset($vehicle->photod) }}" height="150px" width="150px">
                                        </div>
                                        <div class="text-center">
                                            <h5 class="list-group-item">{{ $vehicle->usDriver }}</h5>
                                            <h5 class="list-group-item">{{ $vehicle->emdriver }}</h5>
                                            <h5 class="list-group-item">C.C: {{ $vehicle->iddriver }}
                                            </h5>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <ul class="list-group">
                                    <li class="list-group-item">Placa : {{ $vehicle->badge }}</li>
                                    <li class="list-group-item">Municipio : {{ $owner[0]->mun }}</li>
                                    <li class="list-group-item">Departamento : {{ $owner[0]->dep }}
                                    </li>
                                    <li class="list-group-item">Tipo de vehiculo : {{ $vehicle->tvname }}</li>
                                    <li class="list-group-item">Capacidad : {{ $vehicle->capacity }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <table>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endif
