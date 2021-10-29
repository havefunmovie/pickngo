<div>
    @if($error)
        <div class="toastrMsg alert alert-danger mt-2">{{ $error }}</div>
    @endif
    <form wire:submit.prevent="create" class="needs-validation">
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="start_range">Start Range :</label>
                    <input type="text" wire:model.lazy="selection.start_range" class="form-control {{ $errors->has('selection.start_range') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('selection.start_range',$validated) ? 'is-valid' : '' }}" id="start_range">
                    @error('selection.start_range') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="end_range">End Range :</label>
                    <input type="text" wire:model.lazy="selection.end_range" class="form-control {{ $errors->has('selection.end_range') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('selection.end_range',$validated) ? 'is-valid' : '' }}" id="end_range">
                    @error('selection.end_range') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mailbox_type">Mailbox Type:</label>
                    <select wire:model.lazy="selection.mailbox_type" class="form-control custom-select {{ $errors->has('selection.mailbox_type') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('selection.mailbox_type',$validated) ? 'is-valid' : '' }}" id="mailbox_type">
                        <option hidden></option>
                        @foreach($box_types as $box_type)
                            <option value="{{ $box_type->id }}">{{ $box_type->box_type . ' - ' . $box_type->expired_time . ' - ' . $box_type->expired_type }}</option>
                        @endforeach
                    </select>
                    @error('selection.mailbox_type') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <button type="submit" id="shipping-next" class="btn btn-info w-100">{{ __('Next') }}</button>
            </div>
        </div>
    </form>
    <x-slot name="script">
        <script>
            $(document).ready(function() {
                window.livewire.on('alert_remove',()=> {
                    setTimeout(
                        function () {
                            $(".toastrMsg").fadeOut('fast');
                        }, 7000);
                });
            });
        </script>
    </x-slot>
</div>
