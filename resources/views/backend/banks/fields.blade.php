<!-- Id Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::text('id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('Status')) !!}
    {!! Form::select('status', ['Activo', 'Inactivo'] , null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('backend.banks.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
</div>
