<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    <div>
        {!! Form::label('url_photo', __('Image')) !!}
        <div class="input-group">
            <div class="custom-file">
                {!! Form::file('url_photo', ['class' => 'custom-file-input', 'accept' => 'image/*']) !!}
                {!! Form::label('url_photo', 'Choose file', ['class' => 'custom-file-label']) !!}
            </div>
        </div>
    </div>
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', __('Price')) !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('backend.typeVehicles.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
</div>
