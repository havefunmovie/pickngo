<div>
    <div class="table-responsive">
        <table class="table table-hover table-info mt-3" width="100%">
            <thead class="bg-info text-white">
                <tr>
                    <th>No.</th>
                    <th class="text-center">Color Type</th>
                    <th class="text-center">Paper Type</th>
                    <th class="text-center">Price of First Page</th>
                    <th class="text-center">Price of More Page</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @if($services)
                @foreach($services as $row)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td class="text-center">{{$row['color_type']}}</td>
                        <td class="text-center">{{$row['paper_type']}}</td>
                        <td class="text-center">{{$row['price_first_page']}}</td>
                        <td class="text-center">{{$row['price_more_page']}}</td>
                        <td>
                            <a href="{{ route('admin.settings.printing.edit', $row['id']) }}" class="btn btn-sm btn-outline-info py-0">Edit</a>
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
