<div class="table-responsive-sm">
    <table class="table table-striped" id="ivas-table">
        <thead>
            <tr>
                <th>@lang('Percentage')</th>
                <th>@lang('Start Date')</th>
                <th>@lang('End Date')</th>
                <th colspan="3">@lang('Action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ivas as $iva)
                <tr>
                    <td>{{ $iva->percentage }}</td>
                    <td>{{ $iva->start_date }}</td>
                    <td>{{ $iva->end_date }}</td>
                    <td>
                        {!! Form::open(['route' => ['backend.ivas.destroy', $iva->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('backend.ivas.show', [$iva->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>
                            <a href="{{ route('backend.ivas.edit', [$iva->id]) }}" class='btn btn-ghost-info'><i
                                    class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
