<div class="card">
    <div class="card-header">
        <p class="text-success">Please choose your preferred <span class="fw-bold">SERVICE</span></p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Service</th>
                        <th scope="col">Delivery Days</th>
                        <th scope="col">Delivery Time</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($services)
                            @foreach ($services as $service)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $service['service_name'] }}</td>
                                    <td>
                                        @if($service['days'])
                                            {{ $service['days'] }}
                                        @else
                                            <span class="fs-4">-</span>
                                        @endif
                                        </td>
                                    <td>
                                        @if($service['DeliveryTime'])
                                            {{ $service['DeliveryTime'] }}
                                        @else
                                            <span class="fs-4">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $service['tot_charge'] }}</td>
                                    <td><input class="chooseService" wire:click="chooseService('{{ $service['service_code'] }}','{{ $service['service_name'] }}','{{ $service['tot_charge'] }}')" type="radio" name="chooseService"></td>
                                </tr>
                            @endforeach 
                        @endif
                    </tbody>
                    </table>
            </div>
            
        </div>
        <div class="mt-4">
            <div class="float-right">
                <button id="next_btn" {{ $disabled }} wire:click="sendDataToAgent" class="btn btn-success"><i class="mdi mdi-star"></i> Next</button>
            </div>
        </div>
    </div>
</div>
