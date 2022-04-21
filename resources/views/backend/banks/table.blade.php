<div class="table-responsive-sm">
    <table class="table table-striped" id="banks-table">
        <thead>
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Status')</th>
                <th colspan="3">@lang('Action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banks as $bank)
                <tr>
                    <td>{{ $bank->name }}</td>
                    @if ($bank->status == 0)
                        <td> @lang('Active') </td>
                    @else
                        <td> @lang('Inactive') </td>
                    @endif

                    <td>
                        {!! Form::open(['route' => ['backend.banks.destroy', $bank->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('backend.banks.show', [$bank->id]) }}" class='btn btn-ghost-success'><i
                                    class="fa fa-eye"></i></a>
                            <a href="{{ route('backend.banks.edit', [$bank->id]) }}" class='btn btn-ghost-info'><i
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
