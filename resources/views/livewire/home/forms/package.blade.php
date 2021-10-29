<div class="card">
    <div class="card-header">
        <p class="text-success">Please fill form below with <span class="fw-bold">PACKAGE</span> information</p>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="savePackageInfo">

            <div class="row">
                <div class="col-3">
                    <label class="mb-2">Package Type <span class="fs-8">(Parcel / Envelop)</span></label>
                    <select wire:model="package_type" class="form-control">
                        <option value="parcel" selected>Parcel</option>
                        <option value="envelop" selected>Envelop</option>
                    </select>
                    @error('package_type') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-6">
                    <label class="mb-2">Weight</label>
                    <input type="text" wire:model.lazy='package_weight' class="form-control" placeholder="Package Weight">
                    @error('package_weight') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-3">
                    <label class="mb-2">Weight Type</label>
                    <select wire:model.lazy='weight_type' class="form-control">
                        <option>Please select weight type</option>
                        <option value="LBS">LB</option>
                        <option value="KG">KG</option>
                    </select>
                    @error('weight_type') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mt-4">
                @if ($package_type == 'parcel')
                    <div class="col-3">
                        <label class="mb-2">Dimensions <span class="fs-8">(height)</span></label>
                        <input type="number" wire:model.lazy='package_height' class="form-control" placeholder="Package Height">
                        @error('package_height') <span class="error fs-7">!{{ $message }}</span> @enderror
                    </div>
                    <div class="col-3">
                        <label class="mb-2 fs-8">Length</label>
                        <input type="number" wire:model.lazy='package_length' class="form-control" placeholder="Package Length">
                        @error('package_length') <span class="error fs-7">! {{ $message }}</span> @enderror
                    </div>
                    <div class="col-3">
                        <label class="mb-2 fs-8">Width</label>
                        <input type="number" wire:model.lazy='package_width' class="form-control" placeholder="Package Width">
                        @error('package_width') <span class="error fs-7">! {{ $message }}</span> @enderror
                    </div>
                    <div class="col-3">
                        <label class="mb-2">Dimensions Type</label>
                        <select wire:model.lazy='dimensions_type' class="form-control">
                            <option>Please select dimensions type</option>
                            <option value="IN">INCH</option>
                            <option value="CM">CM</option>
                        </select>
                        @error('dimensions_type') <span class="error fs-7">!{{ $message }}</span> @enderror
                    </div>
                @else
                    <div class="col-12">
                        <label class="mb-2">Envelop Size</label>
                        <select wire:model.lazy='envelop_size' class="form-control">
                            <option>Please select envelop size</option>
                            <option value="standard" selected>Standard</option>
                            <option value="A5">A5</option>
                            <option value="A4">A4</option>
                        </select>
                    </div>
                @endif
                    
            </div>
            <div class="row mt-4">
                <div class="col-6">
                    <label class="mb-2">Unit</label>
                    <input type="number" wire:model.lazy='package_unit' class="form-control" value="1" placeholder="Unit">
                    @error('package_unit') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
                <div class="col-6">
                    <label class="mb-2">Value of Content </label>
                    <input type="number" wire:model.lazy='package_value' class="form-control" value='0' placeholder="Value">
                    @error('package_value') <span class="error fs-7">!{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <label class="mb-2">Description <span class="text-info">(optional)</span></label>
                    <textarea wire:model.lazy='package_description' class="form-control" id="" cols="30" rows="5"></textarea>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-4">
                    <label class="mb-2">Are the content of the Parcel <b>breakable</b>? </label> 
                    @error('breakable') <p class="text-danger fs-7">!{{ $message }}</p> @enderror
                    <div class="form-check">
                        <input wire:click='Breakable("yes")' wire:model='breakable' class="form-check-input" type="radio" name="breakable" value="yes">
                        <label class="form-check-label">
                          yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:click='Breakable("no")' wire:model='breakable' class="form-check-input" type="radio" name="breakable" value="no">
                        <label class="form-check-label">
                          no
                        </label>
                    </div>
                </div>

                <div class="col-4">
                    <label class="mb-2">Are the content of the Parcel <b>replaceable</b>? </label>
                    @error('replaceable') <p class="text-danger fs-7">!{{ $message }}</p> @enderror
                    <div class="form-check">
                        <input wire:click='Replaceable("yes")' wire:model='replaceable' class="form-check-input" type="radio" name="replaceable" value="yes">
                        <label class="form-check-label">
                          yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:click='Replaceable("no")' wire:model='replaceable' class="form-check-input" type="radio" name="replaceable" value="no">
                        <label class="form-check-label">
                          no
                        </label>
                    </div>
                </div>

                <div class="col-4">
                    <label class="mb-2">Do you require a <b>Signature</b> on Delivery? </label>
                    @error('signature') <p class="text-danger fs-7">!{{ $message }}</p> @enderror
                    <div class="form-check">
                        <input wire:click='Signature("yes")' wire:model='signature' class="form-check-input" type="radio" name="Signature" value="yes">
                        <label class="form-check-label">
                          yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:click='Signature("no")' wire:model='signature' class="form-check-input" type="radio" name="Signature" value="no">
                        <label class="form-check-label">
                          no
                        </label>
                    </div>
                </div>

                <div class="col-4 mt-5">
                    <label class="mb-2">Do you wish to purchase shipment <b>Protection Coverage</b>? </label>
                    @error('protection') <p class="text-danger fs-7">!{{ $message }}</p> @enderror
                    <div class="form-check">
                        <input wire:click='Protection("yes")' wire:model='protection' class="form-check-input" type="radio" name="Protection" value="yes">
                        <label class="form-check-label">
                          yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:click='Protection("no")' wire:model='protection' class="form-check-input" type="radio" name="Protection" value="no">
                        <label class="form-check-label">
                          no
                        </label>
                    </div>
                </div>

                <div class="col-4 mt-5">
                    <label class="mb-2">which one <b>describe</b> delivery address?</label>
                    @error('description') <p class="text-danger fs-7">!{{ $message }}</p> @enderror
                    <div class="form-check">
                        <input wire:click='Description("resedential")' wire:model='description' class="form-check-input" type="radio" name="Description" value="resedential">
                        <label class="form-check-label">
                          Resedential
                        </label>
                    </div>
                    <div class="form-check">
                        <input wire:click='Description("commercial")' wire:model='description' class="form-check-input" type="radio" name="Description" value="commercial">
                        <label class="form-check-label">
                          Commercial
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="float-right">
                    @if(!$this->loadingMode)
                        <button class="btn btn-success" id="Test"><i class="mdi mdi-star"></i> Next</button>
                    @else 
                    <button class="btn btn-success" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
