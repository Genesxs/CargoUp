<div class="table-responsive-sm">
    <table class="table table-striped" id="vehicles-table">
        <thead>
            <tr>
                <th>@lang('Badge')</th>
                <th>@lang('Capacity')</th>
                <th>@lang('Status')</th>
                <th>@lang('Owner')</th>
                <th>@lang('Type Vehicle')</th>
                <th colspan="3">@lang('Action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->badge }}</td>
                    <td>{{ $vehicle->capacity }}</td>

                    @switch($vehicle->status)
                        @case(1)
                            <td>Activo</td>
                        @break

                        @case(2)
                            <td>Retirado</td>
                        @break
                    @endswitch

                    <td>{{ $vehicle->nameUs }}</td>
                    <td>{{ $vehicle->nameTv }}</td>
                    <td>
                        {!! Form::open(['route' => ['backend.vehicles.destroy', $vehicle->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('backend.vehicles.show', [$vehicle->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('backend.vehicles.edit', [$vehicle->id]) }}"
                                class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            {{-- {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!} --}}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
