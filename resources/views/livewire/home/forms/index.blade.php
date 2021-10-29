<div class="container-fluid">
    <x-slot name="styles">
        <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    </x-slot>
        
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="jumbotron jumbotron-fluid mt-5 shadow-lg p-3 mb-5 text-white rounded bg-success">
                <div class="container text-center p-3">
                  <h1 class="display-4">Welcome to pick & go</h1>
                  <p class="lead">Please fill the form below and set the agent code, our agent can process on your order</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-20 mb-5">
        {{-- show done notification --}}
        @if (Session::has('completed'))
            <div class="col-8 offset-2">
                <div class="alert alert-success fs-2 text-center mt-5">
                    congratulations your order successfully placed please see the <b>Agent</b> 
                </div>
            </div>
        @endif 
        @if ($notification)
            <div class='alert {{ $notification['class'] }}' role="alert">
                <p class="fw-bold">{{ $notification['message'] }}</p>
                <p class="fs-8">{{ $notification['subMessage'] }}</p>
            </div>
        @endif
        @if(($step == 1) && (Session::has('completed') == null))
        <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="text-success">Please enter <span class="fw-bold">Agent Code</span></span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label class="mb-2">Agent Code</label>
                                <input type="text" wire:model.lazy="agent_code" class="form-control" placeholder="Agent Code">
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="float-right">
                                <button wire:click='setAgentCode' class="btn btn-success"><i class="mdi mdi-star"></i> Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif ($step == 2)
                <div class="col-12">
                    <livewire:home.forms.findcustomer />
                {{-- Customer Info --}}
            @elseif ($step == 3)
                <div class="col-8">
                    <livewire:home.forms.customer />
            @endif 

            {{-- Reciver Info --}}
            @if ($step == 4)
                <div class="col-8">
                    <livewire:home.forms.reciver />
            @endif 

            {{-- Package Info --}}
            @if ($step == 5)
                <div class="col-8">
                    <livewire:home.forms.package />
            @endif 

            {{-- Get Qoute --}}
            @if ($step == 6)
                <div class="col-12">
                    <livewire:home.forms.qoute :data="$data"/>
            @endif 
        </div>

        {{-- Summery part --}}
        <div class="col-4">
            @if (($step >= 3)&& ($step <= 5))
                <div class="card mx-5">
                    <div class="card-header text-success">
                        Agent Info
                    </div>
                    <div class="card-body text-secondary">
                        <p>Name : <b>{{ $data['agent']['name'] .' '. $data['agent']['family']}}</b></p>
                        <p>Address : <b>{{ $data['agent']['address'] .', '. $data['agent']['city'] .', '. $data['agent']['province']}}</b></p>
                    </div>
                </div>
            @endif
            @if (($step >= 4) && ($step <= 5))
                <div class="card mx-5 mt-2">
                    <div class="card-header text-success">
                        Your Info
                        <span wire:click="customerEditInfo" class="float-right">
                            <i class="material-icons">edit</i>
                        </span>
                    </div>
                    <div class="card-body text-secondary">
                        <p>Name : <b>{{ $data['customer']['customer_name'] . ' ' . $data['customer']['customer_family']}}</b></p>
                        @if ($data['customer']['customer_company'])
                            <p>Company : <b>{{ $data['customer']['customer_company']}}</b></p>
                        @endif
                        <p>Phone : <b>{{ $data['customer']['customer_phone']}}</b></p>
                        <p>Email : <b>{{ $data['customer']['customer_email']}}</b></p>
                        @if ($data['customer']['customer_attention'])
                            <p>Attention : <b>{{ $data['customer']['customer_attention']}}</b></p>
                        @endif
                        <p>Address : <b>{{ $data['customer']['customer_address'] .', '. $data['customer']['customer_city'] .', '. $data['customer']['customer_province'] .', '. $data['customer']['customer_country'].' '. $data['customer']['customer_postalcode']}}</b></p>
                    </div>
                </div>
            @endif
            @if ($step == 5)
                <div class="card mx-5 mt-2">
                    <div class="card-header text-success">
                        Reciver Info
                        <span wire:click="reciverEditInfo" class="float-right">
                            <i class="material-icons">edit</i>
                        </span>
                    </div>
                    <div class="card-body text-secondary">
                        <p>Name : <b>{{ $data['reciver']['reciver_name'] . ' ' . $data['reciver']['reciver_family']}}</b></p>
                        @if ($data['reciver']['reciver_company'])
                            <p>Company : <b>{{ $data['reciver']['reciver_company']}}</b></p>
                        @endif
                        <p>Phone : <b>{{ $data['reciver']['reciver_phone']}}</b></p>
                        <p>Email : <b>{{ $data['reciver']['reciver_email']}}</b></p>
                        @if ($data['reciver']['reciver_attention'])
                            <p>Attention : <b>{{ $data['reciver']['reciver_attention']}}</b></p>
                        @endif
                        <p>Address : <b>{{ $data['reciver']['reciver_address'] .', '. $data['reciver']['reciver_city'] .', '. $data['reciver']['reciver_province'] .', '. $data['reciver']['reciver_country'].' '. $data['reciver']['reciver_postalcode']}}</b></p>
                    </div>
                </div>
            @endif
            {{-- @if ($step == 5)
                <div class="card mx-5 mt-2">
                    <div class="card-header text-success">
                        @if ($data['package']['package_type'] == 'parcel')
                            Parcel Info
                        @else
                            Envelop Info
                        @endif
                        <span wire:click="packageEditInfo" class="float-right">
                            <i class="material-icons">edit</i>
                        </span>
                    </div>
                    <div class="card-body text-secondary">
                        <p>Weight : <b>{{ $data['package']['package_weight'] .' '. $data['package']['weight_type']}}</b></p>
                        @if ($data['package']['package_type'] == 'parcel')    
                            <p>Dimentions : <b>{{ $data['package']['package_height'] .' x '. $data['package']['package_length'] .' x '. $data['package']['package_width'] .'  '. $data['package']['dimensions_type']}}</b></p>
                        @else
                            <p>Size : <b>{{ $data['package']['envelop_size']}}</b></p>
                        @endif
                        <p>Unit : <b>{{ $data['package']['package_unit']}}</b></p>
                        <p>Value of Content : <b> ${{ $data['package']['package_value']}}</b></p>
                        @if ($data['package']['package_description'])   
                            <p>Description : <b>{{ $data['package']['package_description']}}</b></p>
                        @endif
                        <p>Breakable ? <b>{{ $data['package']['breakable']}}</b></p>
                        <p>Replaceable ? <b>{{ $data['package']['replaceable']}}</b></p>
                        <p>Protection coverage ? <b>{{ $data['package']['protection']}}</b></p>
                        <p>Signature on Delivery ? <b>{{ $data['package']['signature']}}</b></p>
                    </div>
                </div>
            @endif --}}
        </div>
    </div>
</div>