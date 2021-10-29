<div>
    @forelse ($user->unreadNotifications as $notification)
        @if ( $notification->data['order']['agent_accept_status'] == 'Accept')
            <div class="alert alert-success" role="alert">
                <div class="row">
                    <div class="col-11">
                        <h4 class="alert-heading"><i class="mdi mdi-bell"></i>&nbsp; <span class="fs-6">Your {{ $notification->data['order_type'] }} Order is {{ $notification->data['order']['agent_accept_status'] }} by our agent at {{ substr($notification->data['order']['updated_at'],0,10) }}</span> </h4>
                    </div>
                    <div class="col-1">
                        <button wire:click="markAsRead('{{ $notification->id }}')" type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                <form wire:submit.prevent="selectNewAgent">
                    <div class="row">
                        <div class="col-11">
                            <h4 class="alert-heading"><i class="mdi mdi-bell"></i>&nbsp; <span class="fs-6">Your {{ $notification->data['order_type'] }} Order is {{ $notification->data['order']['agent_accept_status'] }} by our agent at {{ substr($notification->data['order']['updated_at'],0,10) }}</span> </h4>
                            <hr>
                            <h6 class="ml-3">reject reason : <b>{{ $notification->data['order']['reject_reason_message'] }}</b></h6>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mt-5">
                            <label class="mb-3"> you can choose anouther agent!</label>
                            <select wire:model = "agent" class="form-control" id="exampleFormControlSelect1">
                                <option>select new agent</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}">{{ $agent->name}}</option>
                                @endforeach
                            </select>
                            <button wire:click="setOrderId({{ $notification->data['order']['id'] }}, '{{ $notification->data['order_type'] }}' , '{{ $notification->id }}')" class="btn btn-primary mt-3 float-right"><i class="fs-5 mdi mdi-arrow-left-bold-circle-outline"></i> submit</button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
    @empty
        <p class="fs-4"><i class="mdi mdi-information-outline"></i> there are no new notifications</p>
    @endforelse

</div>
