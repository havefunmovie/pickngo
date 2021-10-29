<div>
    <x-slot name="title">
        profile
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                       <i class="mdi mdi-account"></i> Your information
                    </div>
                    <div class="card-body">
                        <p>
                            <label class="px-3"> Name : </label> 
                            {{ $agent->name .' '. $agent->family}}
                        </p>
                        <p>
                            <label class="px-3"> Phone : </label> 
                            {{ $agent->mobile}}
                        </p>
                        <p>
                            <label class="px-3"> Fax : </label> 
                            {{ $agent->fax}}
                        </p>
                        <p>
                            <label class="px-3"> Email : </label> 
                            {{ $agent->email}}
                        </p>
                        <p>
                            <label class="px-3"> Store Name : </label> 
                            {{ $agent->company_name}}
                        </p>
                        <p>
                            <label class="px-3"> Address : </label> 
                            {{ $agent->address .', '. $agent->city .', '. $agent->province .', Canada - '. $agent->postal}}
                        </p>
                        <p>
                            <label class="px-3"> TPS : </label> 
                            {{ $agent->tps}}
                        </p>
                        <p>
                            <label class="px-3"> TVQ : </label> 
                            {{ $agent->tvq}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">QR code</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                {{ QrCode::size(150)->eyeColor(1, 217,19,47, 0, 0, 0)->style('dot')->eye('circle')->format('svg')->generate("http://127.0.0.1:4030/forms?code=".auth()->user()->agent_code) }}
                                <a href={{ url('agent/profile/PrintQR') }} class="mt-4 ml-2 btn-sm"><i class="text-lg mdi mdi-magnify-plus "></i> Show me bigger</a>
                            </div>
                            <div class="col-3">
                                <label class="m-0 p-0">Your Agent Code : </label> 
                                <span class="text-info font-bold">{{ $agent->agent_code }}</span>
                                <p class="text-xs">(usable for who want your code)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>