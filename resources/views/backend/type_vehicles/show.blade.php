@extends('backend.layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('backend.typeVehicles.index') }}">@lang('Type Vehicle')</a>
            </li>
            <li class="breadcrumb-item active">@lang('Detail')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang('Details')</strong>
                                  <a href="{{ route('backend.typeVehicles.index') }}" class="btn btn-light">@lang('Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('backend.type_vehicles.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
