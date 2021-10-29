<div>
    <div class="mt-3">
        @if($data)
            <table class="table table-striped w-100 mt-3 mb-6">
                <thead>
                <tr>
                    <th></th>
                    <th class="text-center">Box Number</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Box Type</th>
                    <th class="text-center">Select</th>
                </tr>
                </thead>
                <tbody>
                @foreach($boxes as $row)
                    <tr>
                        <td>
                            <span class="text-green-500 text-start">
                                <i class="mdi mdi-mailbox"></i>
                            </span>
                        </td>
                        <td class="text-center">
                            {{ $row['number'] }}
                        </td>
                        <td class="text-center"><span class="text-blue-500">{{ '$' . $price }}</span></td>
                        <td class="text-center">{{ $type }}</td>
                        <td class="text-center">
                            <button wire:loading.remove wire:click="select({{ $row['id'] }})" class="btn btn-sm btn-outline-success py-0">Select</button>
                            <button wire:loading wire:target="select({{ $row['id'] }})" class="btn btn-sm btn-outline-success py-0" type="button">
                                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $boxes->links() !!}
        @else
            <p class="text-center">Whoops! No boxes were found 🙁</p>
        @endif
    </div>
</div>
