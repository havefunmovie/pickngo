<div>
    
    {{-- @if($validateError)
        <div class="alert alert-warning">{{ $validateError }}</div>
    @endif --}}
    <table class="table table-striped mt-3" width="100%">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>price</th>
            <th></th>
        </tr>
        @if(count($mServiceSummary))
            @foreach($mServiceSummary as $row)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>
                        {{$row['name']}} <br>
                        <span class="mdi mdi-dark mdi-inactive mdi-information"></span>
                        <span class="gray-dark fs-6 fw-lighter"> {{$row['service_details']['weight'] .' lb / '. $row['service_details']['distance'].' km'}}</span>
                    </td>
                    <td>
                        {{$row['cost']}} <br>
                        <span class="gray-dark fs-6 fw-lighter"> plus: $0.69/kilometer , $2/pound  </span>
                    </td>
                    <td align="center" valign="center">
                        <button wire:click="selectService('{{$row['name']}}')" class="btn btn-sm btn-outline-success py-0">Select</button>
                    </td>
                </tr>
                <!-- Modal -->
                <div class="modal fade" id="ServiceDetails" tabindex="-1" aria-labelledby="ServiceDetailsLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="ServiceDetailsLabel">Service Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span>Service Name : </span> <span class="gray-dark">{{ $row['name'] }}</span>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        @endif
    </table>
  
  
{{--    {{ $paginationServiceSummary->appends(request()->query())->links() }}--}}



{{-- 
'name' => 'Regular',
                'cost' => $regularCost,
                'service_details' =>[
                    'weight' => $service->weight_minimum,
                    'distance' => $service->distance_minimum,
                ],
                'order_extras' => [
                    'weight' => $extra_weight,
                    'distance' => $extra_distance,
                ], --}}