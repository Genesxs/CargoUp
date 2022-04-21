
<!-- Months Number  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('months_number', __('Quota Number')) !!}
    {{-- {!! Form::text('months_number', null, ['class' => 'form-control']) !!} --}}
    <input type="text" maxlength="4" name="quota_number" class="form-control" value="{{$quota->quota_number ? $quota->quota_number : ''}}">
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', __('Price')) !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('backend.quotas.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
</div>
