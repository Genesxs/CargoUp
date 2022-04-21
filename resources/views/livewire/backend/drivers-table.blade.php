@if ($owners->isEmpty())
    <div>
        <p>No hay propietarios registrados.</p>
    </div>
@else
    <div>
        <div>
            <div class="row">
                <div class="form-group col-6">
                    <select wire:model="ownerId" name="ownerId" id="guideId" class="custom-select">
                        <option value="">Select a owner...</option>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->ownerId }}">{{ $owner->nameOw }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-6">
                    <div class="form-check form-check-inline">
                        <button class="btn btn-primary" type="submit" wire:click='search()'>Buscar</button>
                    </div>
                </div>

                <div class="col-12">
                    @if (session()->has('message'))
                        <div class="alert alert-success mt-3" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    @include('frontend.user.includes.messages')
                </div>
            </div>

            <div class="row ml-2 mt-4">
                @if ($drivers != null && $owner != null)

                    <div class="card">
                        <div class="card-body">
                            <img class="img-responsive mb-3 " src="{{ asset($owner->photoOw) }}" height="80px"
                                width="80px">
                            <p>Nombre: {{ $owner->nameOw }}</p>
                            <p>Municipio: {{ $owner->mun }} </p>
                            <p>Departamento: {{ $owner->dep }}</p>
                        </div>
                    </div>

                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Foto conductor</th>
                                <th>Nombre conductor</th>
                                <th>Placa vehículo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($drivers as $driver)
                                <tr class="text-center">
                                    <td> <img src="{{ asset($driver->driverPhoto) }}" height="80px" width="80px">
                                    <td>{{ $driver->nameDri }}</td>
                                    <td>{{ $vehicles->badge }}</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <button class="btn btn-primary"
                                                wire:click="assing({{ $driver->driverId }})">Asignar</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <h3>Selecciona una propietario</h3>
                            </tr>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endif
