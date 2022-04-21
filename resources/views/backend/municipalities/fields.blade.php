<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('Code')) !!}
    {!! Form::number('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Complete Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complete_code', __('Complete Code')) !!}
    {!! Form::text('complete_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Department Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department_id', __('Department')) !!}
    {!! Form::select('department_id', $department, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('backend.municipalities.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
</div>
