@extends('backend.layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('Document Types')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header d-flex justify-content-between">
                             @lang('Document Types')
                             <a class="btn btn-primary" href="{{ route('backend.documentTypes.create') }}">@lang('Add')</a>
                         </div>
                         <div class="card-body">
                             @include('backend.document_types.table')
                              <div class="pull-right mr-3">
                                     
        @include('coreui-templates::common.paginate', ['records' => $documentTypes])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

