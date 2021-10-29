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
                width: 250px; 
                border-collapse: collapse; 
                margin:50px auto;
                }

            th { 

                font-weight: bold; 
                }

            td, th { 
                padding: 10px; 
                border: 1px solid #ccc; 
                text-align: left; 
                font-size: 18px;
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
                    font-weight: bold;
                }

            }
        </style>

    </head>
    <body>
        
        <div class="container"style="font-size:10;">
            <div>
                <img class="center" style="width:160px;" src="images/home/logo.png">
                <p style="text-align: center;">1225 rue saint marc</p>
                <p style="text-align: center;">Montreal, QC H3H2E7</p>
                <p style="text-align: center;">4388665270</p>
            </div>
            <div class="row">
                <div style="margin-top:10px;">
                    <p style="margin-left:10px" > Cashier : Agent Name</p>
                    <p style="margin-left:10px" >Number : 12345</p>
                    <p style="margin-left:10px" >Date : 09/23/2021</p>
                </div>
            </div>
            <hr>
            <table>
                <thead>
                  <tr>
                    <th>{{ __('Traking Number') }}</th>
                    <th>{{ __('Paper count') }}</th>
                    <th>{{ __('Discount') }}</th>
                    <th>{{ __('Price') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td data-column="First Name">H9G123K45h6</td>
                    <td data-column="Last Name">1</td>
                    <td data-column="Job Title">0</td>
                    <td data-column="Twitter">10</td>
                  </tr>
                </tbody>
              </table>

            <div class="text-end m-5">
                <label class="me-5" style="margin-right: 10px"> Price: </label>
                <span>$10</span>
                <br>
                <label class="me-5" style="margin-right: 10px"> Tax: </label>
                <span>$1.49</span>
                <br>
                <label class="me-4" style="margin-right: 10px"> Total: </label>
                <span>$11.49</span>
                <br>
                <label class="me-4" style="margin-right: 10px"> payed by: </label>
                <span>mastercard</span>
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