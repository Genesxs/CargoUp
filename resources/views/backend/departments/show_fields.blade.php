<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    <p>{{ $department->name }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('Code')) !!}
    <p>{{ $department->code }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At')) !!}
    <p>{{ $department->updated_at }}</p>
</div>

