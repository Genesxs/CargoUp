<!-- Badge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('badge', __('Badge')) !!}
    {!! Form::text('badge', null, ['class' => 'form-control']) !!}
</div>


<!-- Capacity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacity', 'Capacity') !!}
    {!! Form::text('capacity', null, ['class' => 'form-control']) !!}
</div>

<!-- Owner Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('owner_id', __('Owner')) !!}
    <select name="owner_id" id="owner_id" class="form-control">
        @foreach ($owners as $owner)
            <option value="{{ $owner->id }}">{{ $owner->name }}</option>
        @endforeach
    </select>
</div>

<!-- Type Vehicle Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_vehicle_id', __('Type Vehicle')) !!}
    {!! Form::select('type_vehicle_id', $typeVehicles, null, ['class' => 'form-control']) !!}
</div>

<!-- Type Vehicle Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', __('Status')) !!}
    {!! Form::select('status', ['1' => 'Activo', '2' => 'Retirado'], null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('backend.vehicles.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
</div>
