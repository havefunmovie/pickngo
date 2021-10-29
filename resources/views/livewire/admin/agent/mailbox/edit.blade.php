<div>
    <x-slot name="title">
        edit mailbox
    </x-slot>

    <x-slot name="styles">
        <link href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Mailboxes</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="">Mailboxes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Mailboxes</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="page-title">Edit Mailboxes</h4>
                        <h6 class="card-subtitle"></h6>
                        <div class="row mt-3" wire:ignore>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-span-12 sm:col-span-4">
                                        <x-jet-label for="from_line_1" value="{{ __('Users') }}"/>
                                        <x-jet-input id="from_line_1" type="hidden" wire:model.lazy="line_1"/>
                                        <div>
                                            <select data-livewire="@this" id="line_1" class="js-select rounded-md shadow-sm px-2 py-1 border mt-1 block w-100">
                                                <option selected value="">--{{__('Select a User')}}--</option>
                                                @foreach($users as $user)
                                                    <option value="{{$user->id}}">{{$user->email . ' - ' . $user->mobile}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <x-jet-input-error for="from_line_1" class="mt-2"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="text" wire:model.lazy="user_box.email" {{ !$userId ? '' : 'disabled' }} class="form-control {{ $errors->has('user_box.email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.email',$validated) ? 'is-valid' : '' }}" id="email">
                                    @error('user_box.email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name :</label>
                                    <input type="text" wire:model.lazy="user_box.name" {{ !$userId ? '' : 'disabled' }} class="form-control {{ $errors->has('user_box.name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.name',$validated) ? 'is-valid' : '' }}" id="name">
                                    @error('user_box.name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password :</label>
                                    <input type="password" wire:model.lazy="user_box.password" {{ !$userId ? '' : 'disabled' }} class="form-control {{ $errors->has('user_box.password') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.password',$validated) ? 'is-valid' : '' }}" id="password">
                                    @error('user_box.password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password :</label>
                                    <input type="password" wire:model.lazy="user_box.confirm_password" {{ !$userId ? '' : 'disabled' }} class="form-control {{ $errors->has('user_box.confirm_password') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.confirm_password',$validated) ? 'is-valid' : '' }}" id="password">
                                    @error('user_box.confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone :</label>
                                    <input type="phone" wire:model.lazy="user_box.phone" {{ !$userId ? '' : 'disabled' }} class="form-control {{ $errors->has('user_box.phone') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.phone',$validated) ? 'is-valid' : '' }}" id="phone">
                                    @error('user_box.phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer1">Full Name :</label>
                                    <input type="text" wire:model.lazy="user_box.customer1" class="form-control {{ $errors->has('user_box.customer1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.customer1',$validated) ? 'is-valid' : '' }}" id="customer1">
                                    @error('user_box.customer1') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer2">Additional Full Name :</label>
                                    <input type="text" wire:model.lazy="user_box.customer2" class="form-control {{ $errors->has('user_box.customer2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.customer2',$validated) ? 'is-valid' : '' }}" id="customer2">
                                    @error('user_box.customer2') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer3">Additional Full Name :</label>
                                    <input type="text" wire:model.lazy="user_box.customer3" class="form-control {{ $errors->has('user_box.customer3') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.customer3',$validated) ? 'is-valid' : '' }}" id="customer3">
                                    @error('user_box.customer3') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
{{--                                <div class="form-group">--}}
{{--                                    <label for="renewal_date">Renewal Date :</label>--}}
{{--                                    <input type="date" wire:model.lazy="user_box.renewal_date" class="form-control {{ $errors->has('user_box.renewal_date') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.renewal_date',$validated) ? 'is-valid' : '' }}" id="renewal_date">--}}
{{--                                    @error('user_box.renewal_date') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="mailbox_type">Usage Type :</label>
                                <select wire:model.lazy="user_box.mailbox_type" class="custom-select form-control {{ $errors->has('user_box.mailbox_type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.mailbox_type',$validated) ? 'is-valid' : '' }}" id="mailbox_type">
                                    <option hidden></option>
                                    <option value="personal">Personal</option>
                                    <option value="personal_plus">Personal Plus</option>
                                    <option value="business">Business</option>
                                    <option value="corporation">Corporation</option>
                                </select>
                                @error('user_box.mailbox_type') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="mailbox_type_id">Mailbox Type :</label>
                                <select wire:model.lazy="user_box.mailbox_type_id" class="custom-select form-control {{ $errors->has('user_box.mailbox_type_id') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('user_box.mailbox_type_id',$validated) ? 'is-valid' : '' }}" id="mailbox_type_id">
                                    <option hidden></option>
                                    @foreach($box_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->box_type . ' - ' . $type->expired_time . ' - ' . $type->expired_type }}</option>
                                    @endforeach
                                </select>
                                @error('user_box.mailbox_type_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="custom-control custom-checkbox">
                                    <input wire:model="key" type="checkbox" class="custom-control-input" id="key">
                                    <label class="custom-control-label" for="key">{{ __('This User wants a Key')}}</label>
                                </div>
                            </div>
                        </div>

                        <button wire:loading.remove wire:click="edit" type="button" class="btn btn-default waves-effect mt-3 w-100">Edit</button>
                        <button wire:loading wire:target="edit" class="btn btn-default waves-effect mt-3 w-100" type="button" disabled>
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#line_1').select2({
                    width: "100%"
                }).on('change', function (e) {
                    let livewire = $(this).data('livewire')
                    eval(livewire).set('userId', $(this).val());
                });
            });
        </script>
    </x-slot>
</div>
