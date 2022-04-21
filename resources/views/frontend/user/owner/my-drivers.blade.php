@extends('frontend.layouts.app')

@section('title', __('Dashboard'))

@section('content')


    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-12">@include('frontend.user.includes.menu')</div>
        </div>

        <div class="row" style="margin-top:80px;">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">@include('frontend.user.includes.messages')</div>
                </div>
                <div class="row mt-5 ml-4">
                    <div class="col-12 col-lg-4 col-xs-4 d-flex justify-content-center mt-4">
                        <div>
                            <a href="{{ url('selectDriver') }}"><img src="{{ asset('/img/select.png') }}" height="350"
                                    width="100%"></a>
                            <p class="text-center mt-5 h4"><strong>Seleccionar conductor</strong></p>
                            <div>
                                <p class="mt-5 d-flex justify-content-center">
                                    <a href="{{ route('showOwDriver') }}" class="btn btn-primary btn-lg">Mis conductores</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-xs-12 d-flex justify-content-start mt-4">
                        <div class=" table-responsive">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Conductor</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Cédula</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($drivers as $driver)
                                        <form method="POST" action="{{ route('removeDriver', ['id' => $driver->driver_id]) }}">
                                        @csrf
                                        <tr>
                                            <th scope="row">
                                                <img src="{{ asset($driver->photod) }}" height="150" width="150">
                                            </th>
                                            <td>{{ $driver->usDriver }} </td>
                                            <td>{{ $driver->emdriver }}</td>
                                            <td>{{ $driver->iddriver }}</td>
                                            <td><a class="btn btn-primary" href="{{ route('removeDriver', ['id' => $driver->driver_id]) }}">Desvincular</a>
                                        </tr>
                                        </form>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
                <div class="row mt-5">
                </div>
            </div>
        </div>

    </div>
@endsection
