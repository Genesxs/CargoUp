<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    <p>{{ $bank->name }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('Status')) !!}
    <p>{{ $status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At')) !!}
    <p>{{ $bank->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At')) !!}
    <p>{{ $bank->updated_at }}</p>
</div>

