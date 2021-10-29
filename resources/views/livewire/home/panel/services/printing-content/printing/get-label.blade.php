<div class="border-1 p-3 mt-3">
    <div>
        <div class="row">
            <div class="col-md-6 mb-0">
                <img src="{{ asset('images/home/logo.png') }}" class="w-25 text-start" />
            </div>
            <div class="col-md-6 text-end">
                {{ __('Tracking Number:') }}
                <span style="font-weight: bolder;">
                    @isset($data) {{ $data['tracking_code'] }} @endisset
                </span>
            </div>
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>{{ __('Paper Type') }}</th>
                    <th>{{ __('Color Type') }}</th>
                    <th>{{ __('Paper Count') }}</th>
                    <th>{{ __('File Name') }}</th>
                </tr>
            </thead>
            <tbody>
                @isset($data)
                <tr>
                    <td>{{ $data['paper_type'] }}</td>
                    <td>{{ $data['color_type'] }}</td>
                    <td>{{ $data['paper_count'] }}</td>
                    <td>{{ $data['uploaded_file'] }}</td>
                </tr>
                @endisset
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">
                        {{ __('Total Price:') }}
                    </th>
                    <th class="">
                        @isset($data) {{ '$'.$data['price'] }} @endisset
                    </th>
                </tr>
            </tfoot>
        </table>
        <div class="row mt-3">
            <div class="col-md-3">
                <span style="font-weight: bolder">{{ __('Agent Address:') }}</span>
            </div>
            <div class="col-md-9">
                @isset($data) <span>{{ $data['agent']['address'] }}</span> @endisset
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <span style="font-weight: bolder">{{ __('Agent Name:') }}</span>
            </div>
            <div class="col-md-3">
                @isset($data) <span>{{ $data['agent']['name'] }}</span> @endisset
            </div>
            <div class="col-md-3">
                <span style="font-weight: bolder">{{ __('Agent Phone:') }}</span>
            </div>
            <div class="col-md-3">
                @isset($data) <span>{{ $data['agent']['mobile'] }}</span> @endisset
            </div>
        </div>
    </div>
</div>
