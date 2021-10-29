<div>
    <div class="table-responsive">
        <table class="table table-hover table-warning mt-3" width="100%">
            <thead class="bg-warning text-white">
            <tr>
                <th>No.</th>
                <th class="text-center">Service Percentage</th>
                <th align="center" valign="center"></th>
            </tr>
            </thead>
            <tbody>
            @if($services)
                @foreach($services as $row)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td class="text-center">{{$row['service_percentage']}}</td>
                        <td>
                            <a href="{{ route('admin.settings.agent.edit', $row['id']) }}" class="btn btn-sm btn-outline-warning py-0">Edit</a>
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
