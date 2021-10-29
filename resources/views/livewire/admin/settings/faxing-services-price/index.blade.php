<div>
    <div class="table-responsive">
        <table class="table table-hover table-success mt-3" width="100%">
            <thead class="bg-success text-white">
            <tr>
                <th>No.</th>
                <th class="text-center">Price of First Page</th>
                <th class="text-center">Price of More Page</th>
                <th align="center" valign="center"></th>
            </tr>
            </thead>
            <tbody>
            @if($services)
                @foreach($services as $row)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td class="text-center">{{$row['price_first_page']}}</td>
                        <td class="text-center">{{$row['price_more_page']}}</td>
                        <td>
                            <a href="{{ route('admin.settings.faxing.edit', $row['id']) }}" class="btn btn-sm btn-outline-success py-0">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-secondary">{{ __('There is no any Data yet!') }}</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
