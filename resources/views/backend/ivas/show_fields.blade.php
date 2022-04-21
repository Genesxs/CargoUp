<!-- Percentage Field -->
<div class="form-group">
    {!! Form::label('percentage', __('Percentage')) !!}
    <p>{{ $iva->percentage }}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', __('Start Date')) !!}
    <p>{{ $iva->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', __('End Date')) !!}
    <p>{{ $iva->end_date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At')) !!}
    <p>{{ $iva->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At')) !!}
    <p>{{ $iva->updated_at }}</p>
</div>

