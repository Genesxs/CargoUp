<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    <p>{{ $gender->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At')) !!}
    <p>{{ $gender->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At')) !!}
    <p>{{ $gender->updated_at }}</p>
</div>

