{{-- <!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $typeVehicle->id }}</p>
</div> --}}

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('Name')) !!}
    <p>{{ $typeVehicle->name }}</p>
</div>

<div class="form-group">
    {!! Form::label('name', __('Image')) !!}<br>
    <img src="{{ asset($typeVehicle->url_photo) }}" height="100px" width="150px" >
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', __('Price')) !!}
    <p>{{ $typeVehicle->price }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At')) !!}
    <p>{{ $typeVehicle->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At')) !!}
    <p>{{ $typeVehicle->updated_at }}</p>
</div>

