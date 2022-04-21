<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('Code')) !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('backend.departments.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
</div>
