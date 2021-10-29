<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ __('Invoice') }}</title>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <style>
   
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
        
        <div class="container"style="margin-left:5px;font-size:10;">
            <div style="margin-right:25px;">
                <img style="width:100px;margin-left: 35px" src="images/home/logo.png">
                <p style="text-align: center;margin-top:15px;margin-right: 100px">{{ $agent->address }}</p>
                <p style="text-align: center;margin-top:-10px;margin-right: 100px">{{ $agent->city }}, {{ $agent->province }} {{ $agent->postal }}</p>
                <p style="text-align: center; margin-top:-5px;margin-right: 100px">{{ $agent->mobile }}</p>
            </div>
            <div class="row">
                <div>
                    <p style="margin-top:5px;" > Cashier : {{ $agent->name .' '. $agent->family}}</p>
                    {{-- <p style="margin-top:-5px;" >Number : {{ $data['id'] }}</p> --}}
                    <p style="margin-top:-5px;" >Date : {{ substr($date,0,10)}} &nbsp; {{ substr($date,10) }}</p>
                </div>
            </div>
            <div class="row" style="margin-top:10px; margin-right:20px;">
                <div>
                    <p style="margin-top:-5px;" >Customer : {{ strtoupper($name)  }}</p>
                    <p style="margin-top:-5px;" > TR : 
                        @foreach ( $tracking_numbers as $tracking_number )
                            {{ $tracking_number }} <br>
                        @endforeach</p>
                    <p style="margin-top:-5px;margin-bottom:5px;" >QTY : {{ $qty }}</p>
                    <p>Price : <span style="margin-left:5px;">${{ $price  }}</span> </p>
                    <p style="margin-top:-5px;" >Tax : <span style="margin-left:12px;">${{ $tax_price  }}</span></p>
                    <p style="margin-top:-5px;" >Total : <span style="margin-left:5px;">${{ $total_price  }}</span></p>
                </div>
            </div>
            <div style="margin-right: 130px">
                <p style="text-align: center;margin-top:5px;">
                    <small>
                        Thanks for using our services.
                    </small>
                </p>
                <p style="text-align: center;">
                    <small>
                        www.pickngo.com
                    </small>
                </p>
                <div style="margin-left:5px">
                    <img style="width:15px;margin-left: 5px" src="images/logos/ups-logo.png">
                    <img style="width:30px;margin-left: 5px;height: 8px;" src="images/logos/dhl_logo_icon.png">
                    <img style="width:32px;margin-left: 5px;height: 21px;" src="images/logos/fedex_logo_icon.png">
                    <img style="width:40px;margin-left: 5px;height: 30px;" src="images/logos/1874485.jpg">
                </div>
            </div>
        </div>
    </body>
</html>
