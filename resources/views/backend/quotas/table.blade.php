<div class="table-responsive-sm">
    <table class="table table-striped" id="quotas-table">
        <thead>
            <tr>
                <th>@lang('Quota Number')</th>
                <th>@lang('Price')</th>
                <th colspan="3">@lang('Action')</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($quotas as $quota)
                <tr>
                    <td>{{ $quota->quota_number }}</td>
                    <td>{{ $quota->price }}</td>
                    <td>
                        {!! Form::open(['route' => ['backend.quotas.destroy', $quota->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('backend.quotas.show', [$quota->id]) }}"
                                class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                            <a href="{{ route('backend.quotas.edit', [$quota->id]) }}" class='btn btn-ghost-info'><i
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
