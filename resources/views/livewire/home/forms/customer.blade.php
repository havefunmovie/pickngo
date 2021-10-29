<div class="card">
    <div class="card-header">
        <p class="text-success">Please fill form below with <span class="fw-bold">YOUR</span> information</p>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="saveCustomerInfo">
            <div class="row">
                <div class="col-4">
                    <label class="mb-2">First name</label>
                    <input type="text" wire:model.lazy='customer_name' class="form-control" placeholder="First name">
                    @error('customer_name') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Last name</label>
                    <input type="text" wire:model.lazy='customer_family' class="form-control" placeholder="Last name">
                    @error('customer_family') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Company <span class="text-info">(optional)</span></label>
                    <input type="text" wire:model.lazy='customer_company' class="form-control" placeholder="Company">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label class="mb-2">Phone Number</label>
                    <input type="tel" wire:model.lazy='customer_phone' class="form-control" placeholder="Phone Number">
                    @error('customer_phone') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Email</label>
                    <input type="email" wire:model.lazy='customer_email' class="form-control" placeholder="Email">
                    @error('customer_email') <span class="error fs-7">! {{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Attention <span class="text-info">(optional)</span></label>
                    <input type="text" wire:model.lazy='customer_attention' class="form-control" placeholder="Attention">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-8">
                    <label class="mb-2">Address</label>
                    <input type="text" wire:model.lazy='customer_address' class="form-control" placeholder="Address">
                    @error('customer_address') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">City</label>
                    <input type="text" wire:model.lazy='customer_city' class="form-control" placeholder="City">
                    @error('customer_city') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label class="mb-2">Province</label>
                    <input type="text" wire:model.lazy='customer_province' class="form-control" placeholder="Province">
                    @error('customer_province') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Country</label>
                    <select wire:model.lazy='customer_country' class="form-control" name="" id="">
                        <option selected>select country</option>
                        @foreach ($countries as $country)
                            <option value={{ $country->code }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    @error('customer_country') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-4">
                    <label class="mb-2">Postal Code</label>
                    <input type="text" wire:model.lazy='customer_postalcode' class="form-control" placeholder="Postal Code">
                    @error('customer_postalcode') <span class="error fs-7">!{{ $message }}</span> @enderror
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
