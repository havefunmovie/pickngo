<div>
    <form wire:submit.prevent="start" class="needs-validation">
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label fw-light fs-7 mb-1" for="key">{{ __('Shipping Type :') }}</label>
                    <select wire:model.lazy="address.shipping-type" class="form-control fw-lighter fs-8" id="shipping-type">
                        <option value="" hidden></option>
                        <option value="parcel">{{ __('Parcel') }}</option>
                        <option value="envelop">{{ __('Envelop') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4" wire:ignore>
                <div class="form-group">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label class="form-label fw-light fs-7 mb-1" for="from_line_1" value="{{ __('From Address :') }}"/>
                        <x-jet-input id="from_line_1" type="hidden" class="form-control fw-lighter fs-8" wire:model.lazy="line_1"/>
                        <div>
                            <select data-livewire="@this" id="line_1" class="js-select rounded-md shadow-sm px-2 py-1 border mt-1 block w-full">
                                <option selected value="">{{__('Select an Address')}}</option>
                                @foreach($from as $account)
                                    @if ($account['type'] === 'from')
                                        <option value="{{$account->id}}">{{$account->line_1}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <x-jet-input-error for="from_line_1" class="mt-2"/>
                    </div>
                </div>
            </div>
            <div class="col-md-4" wire:ignore>
                <div class="form-group">
                    <div class="col-span-6 sm:col-span-4">
                        <x-jet-label class="form-label fw-light fs-7 mb-1" for="from_line_2" value="{{ __('To Address :') }}"/>
                        <x-jet-input id="from_line_2" type="hidden" class="form-control fw-lighter fs-8" wire:model.lazy="line_2"/>
                        <div>
                            <select data-livewire="@this" id="line_2" class="js-select rounded-md shadow-sm px-2 py-1 border mt-1 block w-full">
                                <option selected value="">{{__('Select an Address')}}</option>
                                @foreach($from as $account)
                                    @if ($account['type'] === 'to')
                                        <option value="{{$account->id}}">{{$account->line_1}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <x-jet-input-error for="from_line_2" class="mt-2"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-pink w-100">{{ __('Submit') }}</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                @if($validateError)
                    <div class="alert alert-danger">{{ $validateError }}</div>
                @endif
            </div>
        </div>
    </form>

    <div class="row mt-5">
        <label for=""><i class="fs-5 mdi mdi-information"></i> Your deleted Address</label>
    </div>
    <a href="{{ route('home.account.create') }}" class="btn btn-outline-pink float-end mt-3"><i class="mdi mdi-plus"></i>{{ __('Create New Address') }}</a>
    <div class="mt-5 ">
        <livewire:home.panel.account.my-account.address-book-datatable />
    </div>
    <div class="mt-5">
        <div class="row mb-3">
            <label for=""><i class="fs-5 mdi mdi-information"></i> Your deleted Address</label>
        </div>
        <livewire:home.panel.account.my-account.deleted-address-book-datatable />
    </div>


    <!-- delete notification pupup -->
    <div id="delete_address_notification" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title text-white" id="myModalLabel">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body text-center">
                    <button class="btn btn-danger m-1 mx-md-5" wire:click="delete({{ $AddressId }})"">
                        <i class="mdi mdi-delete"></i>
                        delete
                    </button>
                    <button class="mx-md-5 close">
                        cancel
                    </button>
                </div>
            </div>
        </div>
    </div>


    <x-slot name="script">
        <script>
            $(document).ready(function () {
                $('#line_1').select2({
                    width: "100%"
                }).on('change', function (e) {
                    let livewire = $(this).data('livewire')
                    eval(livewire).set('from_line', $(this).val());
                });
                $('#line_2').select2({
                    width: "100%"
                }).on('change', function (e) {
                    let livewire = $(this).data('livewire')
                    eval(livewire).set('to_line', $(this).val());
                });
            });

            window.addEventListener('delete_address_notification', event => {
            $("#delete_address_notification").modal("show");
        });

        window.addEventListener('delete', event => {
            $("#delete_address_notification").modal("hide");
        });

        $(document).ready(function() {
            $('.close').click(function () {
                $("#delete_address_notification").modal("hide");
            });
        });


        </script>
    </x-slot>
</div>
