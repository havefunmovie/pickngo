<div>
    @if($validateError)
        <div class="alert alert-warning">{{ $validateError }}</div>
    @endif

    <table class="table table-striped mt-3" width="100%">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th align="center" valign="center">Business Days</th>
            <th align="center" valign="center">Real Price</th>
            <th align="center" valign="center"></th>
            <th align="center" valign="center">Your Price</th>
            <th align="center" valign="center"></th>
        </tr>

        @if(count($mServiceSummary))
            @foreach($mServiceSummary as $row)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>
                        <div class="row">
                            <div class="col-10">
                                {{$row['service_name']}}
                            </div>
                            <div class="col-2">
                                <img src="{{ asset('images/logos/ups-logo.png') }}" width="20" height="20"/>
                            </div>
                        </div>
                    </td>
                    <td align="center" valign="center">{{$row['days']}}</td>
                    <td align="center" valign="center"><strike> {{$row['tot_charge']}} </strike></td>
                    <td align="center" valign="center">{{$row['currency']}}</td>
                    <td align="center" valign="center" class="fw-bolder text-primary">{{$row['negotiated_charge']}}</td>
                    <td align="center" valign="center">
                        <button wire:loading.remove wire:click="selectService('{{$row['service_code']}}')" class="btn btn-sm btn-outline-success py-0">Select</button>
                        <button wire:loading wire:target="selectService('{{ $row['service_code'] }}')" class="btn btn-sm btn-outline-success py-0" type="button">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
    {{--    {{ $paginationServiceSummary->appends(request()->query())->links() }}--}}
</div>
