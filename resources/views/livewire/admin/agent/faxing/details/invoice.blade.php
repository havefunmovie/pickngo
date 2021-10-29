<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ __('Invoice') }}</title>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- CSS only -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous"> --}}
        <style>
            .container{
                max-width: 1320px;
            }
            .text-center{
                text-align: center!important;
            }
            .row{
                --bs-gutter-x: 1.5rem;
                --bs-gutter-y: 0;
                display: flex;
                flex-wrap: wrap;
                margin-top: calc(var(--bs-gutter-y) * -1);
                margin-right: calc(var(--bs-gutter-x) * -.5);
                margin-left: calc(var(--bs-gutter-x) * -.5);
            }
            .col-12{
                flex: 0 0 auto;
                width: 100%;
            }
            .col-6{
                flex: 0 0 auto;
                width: 50%;
            }
            .mt-5{
                margin-top: 3rem!important;
            }
            img{
                vertical-align: middle;
            }
            .fw-bold{
                font-weight: 700!important;
            }
            .me-3{
                margin-right: 1rem!important;
            }
            .table{
                --bs-table-bg: transparent;
                --bs-table-accent-bg: transparent;
                --bs-table-striped-color: #212529;
                --bs-table-striped-bg: rgba(0, 0, 0, 0.05);
                --bs-table-active-color: #212529;
                --bs-table-active-bg: rgba(0, 0, 0, 0.1);
                --bs-table-hover-color: #212529;
                --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
                vertical-align: top;
                border-color: #dee2e6;
                caption-side: bottom;
                border-collapse: collapse;
                display: table;
            }
            
            .text-right{
                text-align: right!important;
            }
            .text-end{
                text-align: right!important;
            }
        </style>

    </head>
    <body>
        
        <div class="container"style="font-size:10;">
            <div class="row">
                <div style="margin-top:10px;">
                    <label class="fw-bold"> {{ __('Store address') }}: <span style="color:gray;">{{ $data->agent->address }},{{ $data->agent->city }}</span></label>
                </div>
                <div style="margin-top:10px;">
                    <label class="fw-bold"> {{ __('Date') }}: <span style="color:gray;">{{ $data->created_at }}</span></label>
                </div>
            </div>
            <hr>
            <div class="row" style="margin-top:20px;">
                <div style="margin-top:10px;">
                    <label class="fw-bold"> {{ __('Paper count') }}: <span style="color:gray;">{{ $data->paper_count }}</span></label>
                </div>
                <div style="margin-top:10px;">
                    <label class="fw-bold"> {{ __('Traking Number') }}: <span style="color:gray;">{{ $data->tracking_code }}</span></label>
                </div>
                <div style="margin-top:10px;">
                    <label class="fw-bold"> {{ __('Price') }}: <span style="color:gray;">${{ abs($data->transaction->price) }}</span></label>
                </div>
            </div>

            <div class="text-end m-5">
                <label class="me-5"> Price: </label>
                <span class="fw-bold" style="color:gray;">${{ abs($data->transaction->price) }}</span>
                <br>
                <label class="me-5"> Tax: </label>
                <span class="fw-bold" style="color:gray;">%15</span>
                <br>
                <label class="me-4"> Total: </label>
                <span class="fw-bold" style="color:gray;">${{ abs($data->transaction->price * 1.15) }}</span>
                <br>
            </div>

            <div style="text-align: center;margin-top:20px;">
                <p>
                    <small>
                        Thanks for using our services.
                    </small>
                </p>
            </div>
        </div>
    </body>
</html>