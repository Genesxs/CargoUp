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
                            <div class="col-12">@include('frontend.user.includes.messages')</div>
                        </div>
                    </div>
                    <div class="card-title ml-4  d-flex justify-content-center">
                        <h2 class="title">Comprobante de pago</h2>
                    </div>
                    <div class="card-body ">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-6">
                                <form method="POST" action="{{route('storePaymentGuide')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('payment_guide', 'Subir comprobante de pago:') !!}
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="payment_guide"
                                                    name="payment_guide" capture="payment_guide" accept=".pdf, image/*"
                                                    required="required" autofocus="autofocus">
                                                <label id="payment_guide" class="custom-file-label">Escoger un documento o
                                                    imagen...</label>
                                            </div>
                                    </div>
                                    <div class="form-row mt-3">
                                            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
