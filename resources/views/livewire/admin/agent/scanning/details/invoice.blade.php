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
                max-width: 450px;
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
            <div>
                <img class="center" style="width:100px;margin-left: 100px" src="images/home/logo.png">
                <p style="text-align: center;margin-top:35px;">{{ $data->agent->address }}</p>
                <p style="text-align: center;margin-top:-10px;">{{ $data->agent->city }}, {{ $data->agent->province }} {{ $data->agent->postal }}</p>
                <p style="text-align: center; margin-top:-5px;">{{ $data->agent->mobile }}</p>
            </div>
            <div class="row">
                <div>
                    <p style="margin-left:10px; margin-top:-5px;" > Cashier : {{ $data->agent->name }}</p>
                    <p style="margin-left:10px; margin-top:-5px;" >Number : {{ $data->id }}</p>
                    <p style="margin-left:10px; margin-top:-5px;" >Date : {{ $data->created_at }}</p>
                </div>
            </div>
            <table>
                <thead>
                  <tr>
                    <th>{{ __('TR') }}</th>
                    <th>{{ __('Qty') }}</th>
                    <th>{{ __('Discount') }}</th>
                    <th>{{ __('Total') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-column={{ __('TR') }}>{{ $data->tracking_code }}</td>
                    <td data-column={{ __('Qty') }}>{{ $data->paper_count }}</td>
                    <td data-column={{ __('Discount') }}>0</td>
                    <td data-column={{ __('Price') }}>{{ abs($data->transaction->price) - $data->tax}}</td>
                  </tr>
                </tbody>
              </table>

            <div class="text-end m-5">
                <label class="me-5" style="margin-right: 8px"> Price: </label>
                <span>${{ abs($data->transaction->price) - $data->tax }}</span>
                <br>
                <label class="me-5" style="margin-right: 10px"> Tax: </label>
                <span>${{ abs($data->tax) }}</span>
                <br>
                <label class="me-4" style="margin-right: 10px"> Total: </label>
                <span>${{ abs($data->transaction->price) }}</span>
                <br>
                <label class="me-4" style="margin-right: 5px"> payed by: </label>
                <span>{{ substr($data->transaction->payed_by, 8 ) }}</span>
                <br>
            </div>
            @if(auth()->user()->province == 'QC')
                <div class="row">
                    <label class="me-5" style="margin-right: 5px"> # TPS/TVH</label>
                    <span>{{ $data->agent->tps }}</span>
                    <br>
                    <label class="me-5" style="margin-right: 5px"> # TVQ/TVP</label>
                    <span>{{ $data->agent->tvq }}</span>
                    <br>
                </div>
            @else
                <div class="row">
                    <label class="me-5" style="margin-right: 10px"> # TPS/TVH: </label>
                    <span>{{ $data->agent->tps }}</span>
                    <br>
                </div>
            @endif
            <div style="text-align: center;margin-top:10px;">
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
            </div>
        </div>
    </body>
</html>