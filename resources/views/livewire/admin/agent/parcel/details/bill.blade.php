<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ __('Invoice') }}</title>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <style>
            body{
                margin: -40px;
            }
            .container{
                max-width: 300px;
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
            
            .text-right{
                text-align: right!important;
            }
            .text-end{
                text-align: right!important;
            }
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
            }
            table { 
                width: 230px; 
                border-collapse: collapse; 
                margin:10px auto;
                }

            td, th { 
                padding: 10px; 
                border: 1px solid #ccc; 
                text-align: left; 
                }

            /* 
            Max width before this PARTICULAR table gets nasty
            This query will take effect for any screen smaller than 760px
            and also iPads specifically.
            */
            @media 
            only screen and (max-width: 260px),
            (min-device-width: 768px) and (max-device-width: 1024px)  {

                table { 
                    width: 100%; 
                }

                /* Force table to not be like tables anymore */
                table, thead, tbody, th, td, tr { 
                    display: block; 
                }
                
                /* Hide table headers (but not display: none;, for accessibility) */
                thead tr { 
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }
                
                tr { border: 1px solid #ccc; }
                
                td { 
                    /* Behave  like a "row" */
                    border: none;
                    border-bottom: 1px solid #eee; 
                    position: relative;
                    padding-left: 50%; 
                }

                td:before { 
                    /* Now like a table header */
                    position: absolute;
                    /* Top/left values mimic padding */
                    top: 6px;
                    left: 6px;
                    width: 45%; 
                    padding-right: 10px; 
                    white-space: nowrap;
                    /* Label the data */
                    content: attr(data-column);

                    color: #000;
                }

            }
        </style>

    </head>
    <body>
        <div class="container"style="font-size:10;">
            <div style="margin-left:55px;">
                <img style="width:100px;margin-left: 35px" src= {{ asset('images/home/logo.png') }}>
                <p style="text-align: center;margin-top:15px;margin-right: 100px">{{ $data->agent->address }}</p>
                <p style="text-align: center;margin-top:-10px;margin-right: 100px">{{  $data->agent->city  }}, {{ $data->agent->province }} {{ $data->agent->postal }}</p>
                <p style="text-align: center; margin-top:-5px;margin-right: 100px">{{ $data->agent->mobile }}</p>
            </div>
            <div class="row">
                <div>
                    <p style="margin-top:-5px;" > Cashier :  {{ $data->agent->name .' '. $data->agent->family}}</p>
                    <p style="margin-top:-5px;" >Date : {{ substr($data->date,0,10)}} &nbsp; {{ substr($data->date,10) }}</p>
                </div>
            </div>
            <div class="row" style="margin-top:15px margin-bottom:15px; margin-right:20px;">
                <div>
                    <p style="margin-top:-5px;" > TR : {{ $data->tracking_code }}</p>
                    {{-- un commnet this part when UPS API connected --}}
                    {{-- <p style="margin-top:-5px;" >Service : {{ $data->service_name }}</p> --}}
                    <p style="margin-top:-5px;" >Weight : {{ $data->weight.' '.$data->weight_type }}</p>
                </div>
            </div>
            <div class="text-end" style="margin-top:15px margin-bottom:15px;">
                <label class="me-5" style="margin-right: 15px"> Price: </label>
                <span style="margin-right: 35px">${{ abs($data->transaction->price) - $data->tax }}</span>
                <br>
                <label class="me-5" style="margin-right: 10px"> Tax: </label>
                <span style="margin-right: 35px">${{ abs($data->tax) }}</span>
                <br>
                <label class="me-4" style="margin-right: 10px"> Total: </label>
                <span style="margin-right: 35px">${{ abs($data->transaction->price) }}</span>
                <br>
                <label class="me-4" style="margin-right: 5px"> payed by: </label>
                <span style="margin-right: 35px">{{ substr($data->transaction->payed_by, 8 ) }}</span>
                <br>
            </div>
            @if(auth()->user()->province == 'QC')
                <div class="row" style="margin-top:25px;">
                    <label class="me-5" style="margin-right: 5px"> # TPS/TVH</label>
                    <span>{{ $data->agent->tps }}</span>
                    <br>
                    <label class="me-5" style="margin-right: 5px"> # TVQ/TVP</label>
                    <span>{{ $data->agent->tvq }}</span>
                    <br>
                </div>
            @else
                <div class="row" style="margin-top:25px;">
                    <label class="me-5" style="margin-right: 10px"> # TPS/TVH: </label>
                    <span>{{ $data->agent->tps }}</span>
                    <br>
                </div>
            @endif
            <div style="text-align:center;margin-top:10px;margin-right:40px">
                <p>
                    <small>
                        Thanks for using our services.
                    </small>
                </p>
                <p>
                    <small>
                        www.pickngo.com
                    </small>
                </p>
                <div>
                    <img style="width:20px;margin-left: 5px" src={{ asset('images/logos/ups-logo.png') }}>
                    <img style="width:35px;margin-left: 5px;height: 8px;" src={{ asset('images/logos/dhl_logo_icon.png') }}>
                    <img style="width:37px;margin-left: 5px;height: 24px;" src={{ asset('images/logos/fedex_logo_icon.png') }}>
                    <img style="width:45px;margin-left: 5px;height: 30px;" src={{ asset('images/logos/1874485.jpg') }}>
                </div>
            </div>
        </div>
    </body>
</html>