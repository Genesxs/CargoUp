<div class="">
    <a href="{{ route('download') }}"><img src="{{ asset('/img/form.JPG') }}" height="450" width="100%"></a>
    <div class="mt-3">

        <form method="POST" name="formPayment" action="{{ route('upPetition') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <div>
                        {!! Form::label('url_credit', 'Subir solicitud:') !!}
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="url_credit" name="url_credit"
                                    capture="url_credit" accept=".pdf, .doc, .docx" required="required"
                                    autofocus="autofocus">
                                <label id="url_credit" class="custom-file-label">Escoger una documento...</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <div>
                        {!! Form::label('url_bank_certificate', 'Subir certificado de cuenta bancaria:') !!}
                        <div class="input-group ">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="url_bank_certificate"
                                    name="url_bank_certificate" capture="url_bank_certificate"
                                    accept=".pdf, .doc, .docx" required="required" autofocus="autofocus">
                                <label id="url_bank_certificate" class="custom-file-label">Escoger una
                                    documento...</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    <div>
                        {!! Form::label('url_identity', 'Subir documento de identidad:') !!}
                        <div class="input-group">
                            <input type="file" class="custom-file-input" id="url_identity" name="url_identity"
                                capture="url_identity" accept="image/*,.pdf, .doc, .docx" required="required"
                                autofocus="autofocus">
                            <label id="url_identity" class="custom-file-label">Escoger una documento o imagen...</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-6">
                    <div>
                        {!! Form::label('url_photo', 'Subir foto:') !!}
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="url_photo" name="url_photo"
                                    capture="url_photo" accept="image/*" required="required" autofocus="autofocus">
                                <label id="url_photo" class="custom-file-label">Escoger una imagen...</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-sm-6">
                    <div>
                        <label for=""> Número de cuenta (para pagos de servicios):</label>
                        <div class="input-group ">
                            <input type="text" name="account_number" id="account_number" value="" required="required"
                                autofocus="autofocus" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="form-group col-sm-6">
                    <label for="bank_id" class="form-label">Banco: </label>
                    <select class="form-control custom-select" name="bank_id" id="bank_id" required="required"
                        autofocus="autofocus">
                        <option value="" disabled selected>Seleccione un banco</option>
                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}"> {{ $bank->name }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group col-sm-6">
                    <label for="type_account_id" class="form-label">Tipo de cuenta: </label>

                    <select class="form-control custom-select" name="type_account_id" id="type_account_id"
                        required="required" autofocus="autofocus">
                        <option value="" disabled selected>Seleccione el tipo de cuenta</option>
                        @foreach ($typeAccounts as $typeAccount)
                            <option value="{{ $typeAccount->id }}"> {{ $typeAccount->name }}</option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-sm-6">
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </form>

        <div class="mb-3">
            <strong>
                <div class="alert alert-warning" role="alert">
                    Una vez el préstamo sea aprobado por la entidad financiera, debe subir
                    el
                    documento de aprobación del mismo.
                </div>
            </strong>
        </div>

        <form method="POST" name="formPayment" action="{{ route('documentApproved') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-sm-6">
                    {!! Form::label('url_credit', 'Subir aprobación:') !!}
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="url_document_approved"
                                name="url_document_approved" capture="url_document_approved" accept=".pdf, .doc, .docx"
                                required="required" autofocus="autofocus">
                            <label id="url_document_approved" class="custom-file-label">Escoger una documento...</label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </form>

    </div>
</div>
