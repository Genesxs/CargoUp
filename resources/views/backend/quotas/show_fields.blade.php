
<!-- Months Number  Field -->
<div class="form-group">
    {!! Form::label('quota_number ', __('Quota Number')) !!}
    <p>{{ $quota->quota_number  }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', __('Price')) !!}
    <p>{{ $quota->price }}</p>
</div>

{{-- <!-- Type Vehicle Id Id Field -->
<div class="form-group">
    {!! Form::label('type_vehicle_id', 'Type Vehicle:') !!}
    <p>{{ $quota->type_vehicle_id }}</p>
</div> --}}

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At')) !!}
    <p>{{ $quota->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At')) !!}
    <p>{{ $quota->updated_at }}</p>
</div>

