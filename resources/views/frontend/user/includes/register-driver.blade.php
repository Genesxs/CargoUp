<div class="">
    <a href="{{ route('downloadC') }}"><img src="{{ asset('/img/formd.JPG') }}" height="450" width="100%"></a>
    <p class="mt-3">
    <form method="POST" name="formDriver" action="{{ route('registerDriver') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-6">
                <div>
                    {!! Form::label('url_photo', 'Subir foto:') !!}
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="url_photo" name="url_photo"
                                capture="url_photo" accept="image/*">
                            <label id="url_photo" class="custom-file-label">Escoger una imagen...</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <div>
                    {!! Form::label('url_curriculum', 'Subir hoja de vida:') !!}
                    <div class="input-group ">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="url_curriculum" name="url_curriculum"
                                capture="url_curriculum" accept=".pdf, .doc, .docx">
                            <label id="url_curriculum" class="custom-file-label">Escoger una documento...</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-6">
                <label for="departments" class="form-label">@lang('Department')</label>
                <select class="form-control" name="departments" id="departments">
                    <option value="" disabled selected>Seleccione un Departamento</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <label for="municipalities" class="form-label">@lang('Municipality')</label>
                <select class="form-control custom-select" name="municipalities" id="municipalities">
                    <option value="" disabled selected>Seleccione un Municipio</option>
                </select>
            </div>

            <div class="form-group col-sm-6">
                <div>
                    {!! Form::label('experience', 'Años de experiencia como conductor:') !!}
                    <div class="input-group ">
                        {!! Form::number('experience', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-6">
                <div>
                    {!! Form::label('jobs_name', 'Empresas para las que ha trabajado:') !!}
                    <div class="input-group ">
                        {!! Form::textarea('jobs_name', null, ['class' => 'form-control']) !!}
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
    </p>
</div>

