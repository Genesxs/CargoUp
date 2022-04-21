<div class="table-responsive-sm">
    <table class="table table-striped" id="guides-table">
        <thead class="text-center">
            <tr>
                <th>@lang('Guide')</th>
                <th>@lang('Status')</th>
                <th>@lang('Date create')</th>
                <th>@lang('Date pick')</th>
                <th>@lang('Customer name')</th>
                <th colspan="3">@lang('Action')</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($guides as $guide)
                <tr>
                    <td>{{ $guide->id }}</td>
                    @switch($guide->status)
                        @case(1)
                            <td>Pendiente</td>
                        @break

                        @case(2)
                            <td>Pagado</td>
                        @break

                        @case(3)
                            <td>Anulado</td>
                        @break

                        @case(4)
                            <td>Entregado</td>
                        @break
                    @endswitch
                    <td>{{ \Carbon\Carbon::parse($guide->date_guide)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($guide->date_pick)->format('d-m-Y') }}</td>
                    <td>{{ $guide->name }}</td>
                    <td>
                        <a href="{{ route('backend.guides.download', [$guide->id]) }}" class='btn btn-ghost-dark'><i
                                class="fa fa-download"></i></a>
                        <a href="{{ route('backend.guides.update', [$guide->id]) }}"
                            class='btn btn-success ml-4'>pagada</a>
                    </td>
                    <td>
                        @if ($guide->status == 2)
                            <a href="{{ route('backend.guides.assing', [$guide->id]) }}"
                                class='btn btn-info ml-4'>asignar
                                conductor</a>
                        @else
                            <div></div>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
