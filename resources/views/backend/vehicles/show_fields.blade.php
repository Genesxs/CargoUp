<!-- Badge Field -->
<div class="form-group">
    {!! Form::label('badge', __('Badge')) !!}
    <p>{{ $vehicle->badge }}</p>
</div>

<!-- Capacity Field -->
<div class="form-group">
    {!! Form::label('capacity', __('Capacity')) !!}
    <p>{{ $vehicle->capacity }}</p>
</div>

<!-- Type Owner Field -->
<div class="form-group">
    {!! Form::label('owner_id', __('Owner')) !!}
    <p>{{ $vehicle->nameUs }}</p>
</div>

<!-- Type Vehicle Field -->
<div class="form-group">
    {!! Form::label('type_vehicle_id', __('Type Vehicle')) !!}
    <p>{{ $vehicle->nameTv }}</p>
</div>

@switch($vehicle->status)
    @case(1)
        <div class="form-group">
            {!! Form::label('status', __('Status')) !!}
            <p>Activo</p>
        </div>
    @break

    @case(2)
        <div class="form-group">
            {!! Form::label('status', __('Status')) !!}
            <p>Retirado</p>
        </div>
    @break
@endswitch
