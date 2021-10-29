<div>
        @if($error)
                <div id="toastrMsg" class="alert alert-warning mt-2">{{ $error }}</div>
        @endif
    @if ($isUp)
        <div class="row justify-content-center mt-3">
{{--                {{ dd(asset('images/uploads/'.$photo->getClientOriginalName())) }}--}}
                <iframe src="{{ asset('images/uploads/'.$photo->getClientOriginalName()) }}" width="50%" height="600">
                        This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('images/uploads/'.$photo->getClientOriginalName()) }}">Download PDF</a>
                </iframe>
                <div class="row">
                        <div class="col-md-6">
                                <button type="button" wire:click="back" class="btn btn-outline-pink w-100 mt-3">Back</button>
                        </div>
                        <div class="col-md-6 ">
                                <button type="button" wire:click="next" class="btn btn-pink w-100 mt-3">Next</button>
                        </div>
                </div>
        </div>
    @else
        <form wire:submit.prevent="save" class="mt-3">
                <div class="row">
                        <div class="col-md-6 mb-0">
                                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Paper Type') }}</label>
                                <select wire:model.lazy="upload.paper" class="form-control fw-lighter fs-8 {{ $errors->has('upload.paper') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('upload.paper',$validated) ? 'is-valid' : '' }}" id="paper" aria-label="Default select example"  >
                                        <option value="">{{ __('Select Paper Type') }}</option>
                                        @foreach($services as $service)
                                                <option value="{{ $service['paper_type'] }}">{{ $service['paper_type'] }}</option>
                                        @endforeach
                                </select>
                                @error('upload.paper') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-0">
                                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Color Type') }}</label>
                                <select wire:model.lazy="upload.color" class="form-control fw-lighter fs-8 {{ $errors->has('upload.color') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('upload.color',$validated) ? 'is-valid' : '' }}" id="color" aria-label="Default select example"  >
                                        <option value="">{{ __('Select Color Type') }}</option>
                                        <option value="colorful">{{ __('Colorful') }}</option>
                                        <option value="grey">{{ __('Black & white') }}</option>
                                </select>
                                @error('upload.color') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 mb-0">
                                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Paper Count') }}</label>
                                <input type="text" wire:model.lazy="upload.count" class="form-control fw-lighter fs-8 {{ $errors->has('upload.count') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('upload.count',$validated) ? 'is-valid' : '' }}" id="count" aria-label="Default select example" placeholder="{{ __('Paper Count') }}">
                                @error('upload.count') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-12 mb-0">
                                <hr>
                        </div>
                        <div class="col-md-6 mb-0">
                                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Upload file') }}</label>
                                <input type="file" wire:model="photo" class="form-control fw-lighter fs-8">
                                @error('photo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-6">
                                <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Agent') }}</label>
                                <select wire:model.lazy="upload.agent" class="form-control fw-lighter fs-8 {{ $errors->has('upload.agent') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('upload.agent',$validated) ? 'is-valid' : '' }}" id="agent" aria-label="Default select example"  >
                                        <option value="">{{ __('Select Agent') }}</option>
                                        @foreach($agents as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                        @endforeach
                                </select>
                                @error('upload.agent') <span class="error">{{ $message }}</span> @enderror
                        </div>
                </div>
                <button type="submit" class="btn btn-pink w-100 mt-3">Save File</button>
        </form>
    @endif
        <x-slot name="script">
                <script>
                        $(document).ready(function() {
                                window.livewire.on('alert_remove',()=> {
                                        setTimeout(
                                                function () {
                                                        $("#toastrMsg").fadeOut('fast');
                                                }, 5000)
                                });
                        });
                </script>
        </x-slot>
</div>