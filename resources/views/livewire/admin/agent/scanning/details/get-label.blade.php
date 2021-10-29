<div class="border-1 p-3 mt-3">
    <div>
        <div class="row">
            <div class="col-md-6 mb-0">
                <img src="{{ asset('images/home/logo.png') }}" class="w-25 text-start" />
            </div>
        </div>
        <table class="table table-striped mt-3 text-center">
            <thead>
            <tr>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Paper Count') }}</th>
                <th>{{ __('tracking_code') }}</th>
            </tr>
            </thead>
            <tbody>
            @isset($data)
                <tr>
                    <td>{{ $data['email'] }}</td>
                    <td>{{ $data['paper_count'] }}</td>
                    <td><b>{{ $data['tracking_code'] }}</b></td>
                </tr>
            @endisset
            </tbody>
            <tfoot>
            <tr>
                <th class="text-end">
                    {{ __('Total Price:') }} @isset($data) {{ '$'.$data['price'] }} @endisset
                </th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{action('App\Http\Livewire\Admin\Agent\Parcel\Details\PrintLabel@printPDF')}}" class="btn btn-outline-info" id="">{{ __('Print Lable') }}</a>
        </div>
    </div>
</div>
