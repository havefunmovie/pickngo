<div>
    <x-slot name="title">
        QR code
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
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body ml-20">
                        <h4 class="text-gray-700 text-xl mb-5">Please scan me</h4>
                        <p class="">{{ QrCode::size(500)->eyeColor(1, 217,19,47, 0, 0, 0)->style('dot')->eye('circle')->format('svg')->generate("http://127.0.0.1:4030/forms?code=".auth()->user()->agent_code)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
