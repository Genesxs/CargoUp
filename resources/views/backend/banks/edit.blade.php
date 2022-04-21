@extends('backend.layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('backend.banks.index') !!}">@lang('Bank')</a>
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
                              <strong>@lang('Edit Bank')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($bank, ['route' => ['backend.banks.update', $bank->id], 'method' => 'patch']) !!}

                              @include('backend.banks.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection