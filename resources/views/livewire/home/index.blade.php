<div>

    @if($alert_status)
        <div class="fixed w-100 h-100 top-0 left-0 text-center" id="alarm" style="z-index: 99; background: url('/assets/images/background/active-bg.jpg'); display: table; overflow: hidden;">
            <span wire:click="close" class="fixed w-100"><img class="m-2 w-10 float-end" src="{{ asset('/assets/icons/close.png') }}"/></span>
            <div style="display: table-cell; vertical-align: middle;">
                <img class="m-2 w-25 m-auto" src="{{ asset('/assets/icons/anim-warning.gif') }}"/>
                <h2 class="text-orange-500">Renewal is Up</h2>
                <h4 class="text-blue-500">Your renewal date is up. Please renew your mailbox contract.</h4>
            </div>
        </div>
    @endif

    <div class="index">
        <div class="container">
            <div class="row">
                <div class="text-index text-lg-center col-md-5 offset-md-7 pt-md-5 ms-md-auto me-auto text-end mt-3 mt-md-5 me-lg-5">
                    <div class="pink-text text-pink fs-3 pt-md-2 mt-md-5">{{ __('Post office Service ( POS )') }}</div>
                    <div class="black-text fs-5">{{ __('Stay Home we do everything for you') }}</div>
                </div>
                <div class="col-md-12 text-end save-up my-md-5 my-3 pt-5 pb-md-2">
                    <div class="mt-lg-4">
                        <span class="save-text">{{ __('Save Up To') }}</span>
                        <span class="text-pink save-number">{{ __('70%') }}</span>
                    </div>
                    <div>
                        <span class="save-text">
                            {{ __('On Shopping') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container ">
            <ul class="nav nav-tabs border-bottom-0 mb-2 bg-secondary-op-30 rounded-pill nav-menu" id="myTab" role="tablist">
                <li class="nav-item mx-1" role="presentation">
                    <button class="fw-light fs-8 px-4 rounded-pill nav-link active" id="parcel-tab" data-bs-toggle="tab" data-bs-target="#parcel" type="button" role="tab" aria-controls="parcel" aria-selected="true">
                        {{ __('Parcel') }}
                    </button>
                </li>
                <li class="nav-item mx-1" role="presentation">
                    <button class="fw-light fs-8 px-4 rounded-pill nav-link" id="envelop-tab" data-bs-toggle="tab" data-bs-target="#envelop" type="button" role="tab" aria-controls="envelop" aria-selected="false">
                        {{ __('Envelop') }}
                    </button>
                </li>
                <li class="nav-item mx-1" role="presentation">
                    <button class="fw-light fs-8 px-4 rounded-pill nav-link" id="scanning-tab" data-bs-toggle="tab" data-bs-target="#scanning" type="button" role="tab" aria-controls="scanning" aria-selected="false">
                        {{ __('Scanning') }}
                    </button>
                </li>
                <li class="nav-item mx-1" role="presentation">
                    <button class="fw-light fs-8 px-4 rounded-pill nav-link" id="printing-tab" data-bs-toggle="tab" data-bs-target="#printing" type="button" role="tab" aria-controls="printing" aria-selected="false">
                        {{ __('Printing') }}
                    </button>
                </li>
                <li class="nav-item mx-1" role="presentation">
                    <button class="fw-light fs-8 px-4 rounded-pill nav-link" id="faxing-tab" data-bs-toggle="tab" data-bs-target="#faxing" type="button" role="tab" aria-controls="faxing" aria-selected="false">
                        {{ __('Faxing') }}
                    </button>
                </li>
                <li class="nav-item mx-1" role="presentation">
                    <button class="fw-light fs-8 px-4 rounded-pill nav-link" id="mailbox-tab" data-bs-toggle="tab" data-bs-target="#mailbox" type="button" role="tab" aria-controls="mailbox" aria-selected="false">
                        {{ __('Mailbox') }}
                    </button>
                </li>
            </ul>
        </div>
        <div class="container-fluid pb-md-5 px-0">
            <div class="bg-secondary-op-30">
                <div class="container pt-2 pb-3">
                    @include('livewire.home.sections.get-quote')
                </div>
            </div>
        </div>
    </div>

</div>
