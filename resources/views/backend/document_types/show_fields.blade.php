<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    <p>{{ $documentType->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At')) !!}
    <p>{{ $documentType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At')) !!}
    <p>{{ $documentType->updated_at }}</p>
</div>

