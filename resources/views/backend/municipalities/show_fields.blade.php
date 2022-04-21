<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    <p>{{ $municipality->name }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('Code')) !!}
    <p>{{ $municipality->code }}</p>
</div>

<!-- Complete Code Field -->
<div class="form-group">
    {!! Form::label('complete_code', __('Complete Code')) !!}
    <p>{{ $municipality->complete_code }}</p>
</div>

<!-- Department Id Field -->
<div class="form-group">
    {!! Form::label('department_id', __('Department')) !!}
    <p>{{ $municipality->department_id }}</p>
</div>


<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At')) !!}
    <p>{{ $municipality->updated_at }}</p>
</div>

