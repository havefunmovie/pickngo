<div>
    <div class="mt-3"></div>
    <iframe src="{{ asset('assets/documents/signature.txt') }}" width="100%" height="250">
        This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('assets/documents/signature.txt') }}">Download PDF</a>
    </iframe>

    <div class="mt-3">
        <span class="ms-3">
            <input wire:model="sign" class="form-check-input me-1 checkbox" id="residential" type="radio" name="" value="agree" checked aria-label="...">
            <label for="residential">{{ __('Agree') }}</label>
        </span>
        <span class="ms-3">
            <input wire:model="sign" class="form-check-input me-1 checkbox" id="business" type="radio" name="" value="disagree" aria-label="...">
            <label for="business">{{ __('Disagree') }}</label>
        </span>
    </div>
    <div class="mt-3 ms-3 me-3">
        <button wire:loading.remove  wire:click="next" class="btn btn-pink text-white" {{ $sign === 'agree' ? '' : 'disabled' }}>{{ __('Next') }}</button>
        <div wire:loading wire:target="next">
            <div class="btn btn-pink btn-blockl">
                <span>{{ __('Loading...') }}</span>
                <span class="spinner-grow spinner-grow-sm ms-1" role="status" aria-hidden="true"></span>
            </div>
        </div>
    </div>
</div>
