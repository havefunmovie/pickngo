<div class="card">
    <div class="card-header">
        <p class="text-success">Please fill form below with <span class="fw-bold">RECIVER</span> information</p>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="saveReciverInfo">
            <div class="row">
                <div class="col-4">
                    <label class="mb-2">First name</label>
                    <input type="text" wire:model.lazy='reciver_name' class="form-control" placeholder="First name">
                    @error('reciver_name') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Last name</label>
                    <input type="text" wire:model.lazy='reciver_family' class="form-control" placeholder="Last name">
                    @error('reciver_family') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Company <span class="text-info">(optional)</span></label>
                    <input type="text" wire:model.lazy='reciver_company' class="form-control" placeholder="Company">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label class="mb-2">Phone Number</label>
                    <input type="tel" wire:model.lazy='reciver_phone' class="form-control" placeholder="Phone Number">
                    @error('reciver_phone') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Email</label>
                    <input type="email" wire:model.lazy='reciver_email' class="form-control" placeholder="Email">
                    @error('reciver_email') <span class="error fs-7">! {{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Attention <span class="text-info">(optional)</span></label>
                    <input type="text" wire:model.lazy='reciver_attention' class="form-control" placeholder="Attention">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-8">
                    <label class="mb-2">Address</label>
                    <input type="text" wire:model.lazy='reciver_address' class="form-control" placeholder="Address">
                    @error('reciver_address') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">City</label>
                    <input type="text" wire:model.lazy='reciver_city' class="form-control" placeholder="City">
                    @error('reciver_city') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label class="mb-2">Province</label>
                    <input type="text" wire:model.lazy='reciver_province' class="form-control" placeholder="Province">
                    @error('reciver_province') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Country</label>
                    <select wire:model.lazy='reciver_country' class="form-control" name="" id="">
                        <option selected>select country</option>
                        @foreach ($countries as $country)
                            <option value={{ $country->code }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('reciver_country') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Postal Code</label>
                    <input type="text" wire:model.lazy='reciver_postalcode' class="form-control" placeholder="Postal Code">
                    @error('reciver_postalcode') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mt-4">
                <div class="float-right">
                    <button class="btn btn-success"><i class="mdi mdi-star"></i> Next</button>
                </div>
            </div>
        </form>
    </div>
</div>
