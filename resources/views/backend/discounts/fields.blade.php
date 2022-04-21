
<!-- Percentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('percentage', __('Percentage')) !!}
    {!! Form::number('percentage', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', __('Start Date')) !!}
    {!! Form::date('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#start_date').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', __('End Date')) !!}
    {!! Form::date('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#end_date').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('backend.discounts.index') }}" class="btn btn-secondary">@lang('Cancel')</a>
</div>
