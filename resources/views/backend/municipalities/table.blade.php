<div class="table-responsive-sm">
    <table class="table table-striped" id="municipalities-table">
        <thead>
            <tr>
                <th>@lang('Name')</th>
                {{-- <th>Code</th>
                <th>Complete Code</th> --}}
                <th>@lang('Department')</th>
                <th colspan="3">@lang('Action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($municipalities as $municipality)
                <tr>
                    <td>{{ $municipality->name }}</td>
                    {{-- <td>{{ $municipality->code }}</td>
                   <td>{{ $municipality->complete_code }}</td> --}}
                    <td>{{ $municipality->department->name }}</td>
                    <td>
                        {!! Form::open(['route' => ['backend.municipalities.destroy', $municipality->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('backend.municipalities.show', [$municipality->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('backend.municipalities.edit', [$municipality->id]) }}"
                                class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                            {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
