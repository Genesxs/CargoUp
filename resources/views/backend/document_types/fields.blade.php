<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('backend.documentTypes.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
</div>
