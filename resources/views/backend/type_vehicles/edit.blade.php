@extends('backend.layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('backend.typeVehicles.index') !!}">@lang('Type Vehicle')</a>
          </li>
          <li class="breadcrumb-item active">@lang('Edit')</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang('Edit Type Vehicle')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::Model($typeVehicle, ['route' => ['backend.typeVehicles.update', $typeVehicle->id],'method' => 'patch','files' => true]) !!}

                              @include('backend.type_vehicles.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection