
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="form-group row mt-3">
                <div class="col-sm-6">
                    <label for="departments" class="form-label">@lang('Department')</label>
                    <select class="form-control" name="departments" id="departments" required>
                        <option value="" disabled selected>Seleccione un Departamento</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="municipalities" class="form-label">@lang('Municipality')</label>
                    <select class="form-control custom-select" name="municipalities" id="municipalities" required>
                        <option value="" disabled selected>Seleccione un Municipio</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3 col-md-12">
                    <label for="ubication" class="form-label">Ubicación</label>
                    <select class="form-control custom-select" name="ubications" id="ubications" required>
                        <option value="" disabled selected>Seleccione una ubicación</option>
                        @foreach ($ubications as $ubication)
                            <option value="{{ $ubication->id }}">{{ $ubication->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2 col-md-3 mt-2">
                    <label for="" class="form-label "></label>
                    <input type="text" class="form-control" id="nro1" name="nro1" placeholder="" required>
                </div>
                <div style="margin-top:35px;"><strong>#</strong></div>
                <div class="col-sm-2 col-md-3">
                    <label for="" class="form-label ">Nro.</label>
                    <input type="text" class="form-control" name="nro2" id="nro2" placeholder="" required>
                </div>
                <div style="margin-top:35px;"><strong>-</strong></div>
                <div class="col-sm-2 col-md-3">
                    <label for="" class="form-label">Nro.</label>
                    <input type="text" class="form-control" name="nro3" id="nro3" placeholder="" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 col-md-12">
                    <label for="aditional_info">Indicaciones adicionales:</label>
                    <textarea class="form-control" id="aditional_info" name="aditional_info" rows="3" required></textarea>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mt-3">
            <h4>Información del destinatario</h4>
            <div class="form-group row">
                <div class="col-sm-8 col-md-12">
                    <label for="names">Nombres: </label>
                    <input type="text" class="form-control" id="names" name="names" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 col-md-12">
                    <label for="last_names">Apellidos: </label>
                    <input type="text" class="form-control" id="lastnames" name="lastnames" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 col-md-12">
                    <label for="telephone">Teléfono:</label>
                    <input type="textr" class="form-control" id="telephone" name="telephone" placeholder="">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-8 col-md-12">
                    <label for="cellphone">Celular:</label>
                    <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="">
                </div>

                <input type="hidden" name="guideId" value="{{ $lastGuideId }}">

                <div class="col-sm-2 col-md-6 mt-4">
                    <div class="mt-2">
                        <button class="btn btn-primary d-flex justify-content-center" id="destiny">Agregar destino</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
