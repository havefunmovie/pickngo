<div>
    <div class="accordion-body">
        <div class="mt-3">
            <table class="table table-striped mt-3" width="100%">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>price</th>
                    <th></th>
                </tr>
                @if(count($quotes))
                    @foreach($quotes as $quote)
                        <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                {{$quote['name']}} <br>
                                <span class="mdi mdi-dark mdi-inactive mdi-information"></span>
                                <span class="gray-dark fs-6 fw-lighter"> {{$quote['service_details']['weight'] .' lb / '. $quote['service_details']['distance'].' km'}}</span>
                            </td>
                            <td>
                                {{$quote['cost']}} <br>
                                <span class="gray-dark fs-6 fw-lighter"> plus: $0.69/kilometer , $2/pound  </span>
                            </td>
                            <td align="center" valign="center">
                                <button wire:click="selectService('{{$quote['name']}}')" class="btn btn-sm btn-outline-success py-0">Select</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
</div>
