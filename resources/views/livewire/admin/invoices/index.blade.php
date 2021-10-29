<div>
    <x-slot name="title">
        invoices
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Invoices</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Invoices</li>
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
                        <h4 class="page-title">Invoices</h4>
                        <h6 class="card-subtitle"></h6>

{{--                        <input type="text" class="form-control w-25 mt-3" placeholder="Search" wire:model="searchTerm" />--}}

{{--                        <div class="table-responsive mt-3">--}}
{{--                            <table class="table-hover table-info table" width="100%">--}}
{{--                                <thead class="bg-info text-white">--}}
{{--                                    <tr>--}}
{{--                                        <th>Balance</th>--}}
{{--                                        <th>Agent</th>--}}
{{--                                        <th></th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                @if($trans)--}}
{{--                                    @foreach($trans as $tran)--}}
{{--                                        <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td class="@if($tran->m_price > 200) text-danger text-bold @endif">{{ '$'.$tran->m_price }}</td>--}}
{{--                                                <td>{{ $tran->agent->name }}</td>--}}
{{--                                            </tr>--}}
{{--                                        </tbody>--}}
{{--                                    @endforeach--}}
{{--                                @else--}}
{{--                                    <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td colspan="2" class="text-center">{{ __('Not found any value!') }}</td>--}}
{{--                                        </tr>--}}
{{--                                    </tbody>--}}
{{--                                @endif--}}
{{--                            </table>--}}
{{--                            @if($trans) {{ $trans->links() }} @endif--}}
{{--                        </div>--}}

                        <div class="table-responsive mt-3">
                            <livewire:admin.invoices.invoice-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
