<!-- Percentage Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    <p>{{ $discount->name }}</p>
</div>

<!-- Percentage Field -->
<div class="form-group">
    {!! Form::label('percentage', __('Percentage')) !!}
    <p>{{ $discount->percentage }}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', __('Start Date')) !!}
    <p>{{ $discount->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', __('End Date')) !!}
    <p>{{ $discount->end_date }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At')) !!}
    <p>{{ $discount->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At')) !!}
    <p>{{ $discount->updated_at }}</p>
</div>

