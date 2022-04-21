<div class="table-responsive-sm">
    <table class="table table-striped" id="documentTypes-table">
        <thead>
            <tr>
                <th>@lang('Name')</th>
                <th colspan="3">@lang('Action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($documentTypes as $documentType)
            <tr>
                <td>{{ $documentType->name }}</td>
                <td>
                    {!! Form::open(['route' => ['backend.documentTypes.destroy', $documentType->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('backend.documentTypes.show', [$documentType->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('backend.documentTypes.edit', [$documentType->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>