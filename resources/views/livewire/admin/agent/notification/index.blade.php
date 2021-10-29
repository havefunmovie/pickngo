<div>
    <x-slot name="title">
        notifications
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center my-3">
                <h4 class="page-title">Notifications</h4>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if (count($notifications))
                        @foreach ($notifications as $notification)
                            <div class="alert alert-info" role="alert">
                                <i class="mdi mdi-bell-ring"></i>
                                <b> {{ $notification->data['user']['name'] .' '. $notification->data['user']['family'] }} </b> send a new <b>{{ $notification->data['order_type'] }} </b> to you at at  {{ substr($notification->created_at,0,10) }}
                                <span wire:click="seeNotificationDetails('{{ $notification->id }}')" class="ml-3 cursor-pointer hover:underline  hover:text-blue-500"> see details<i class="mdi mdi-chevron-right"></i></span>
                                <i wire:click="markAsRead('{{ $notification->id }}')" class="mdi mdi-close float-right"></i>
                            </div>        
                        @endforeach
                    @else
                        <div class="alert alert-info" role="alert"> You do not have notification</div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($notifications))
        <!-- Modal Show notification Details -->
        <div wire:ignore class="modal fade" data-backdrop="static" id="notification-info" tabindex="-1" aria-labelledby="notification-info" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h5 class="modal-title text-white text-lg" id="notification-info">Order Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="card border">
                                    <div class="card-header"><i class="text-lg mdi mdi-account"></i> Customer Info</div>
                                    <div class="card-body">
                                        <p class="my-2"><b>name:</b> <span id='customer_name' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>email:</b> <span id='customer_email' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>phone:</b> <span id='customer_phone' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>address type:</b> <span id='customer_address_type' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>address:</b> <span id='customer_address' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>city:</b> <span id='customer_city' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>province:</b> <span id='customer_province' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>country:</b> <span id='customer_country' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>postal code:</b> <span id='customer_postal_code' class="text-gray-600 ml-3"></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card border">
                                    <div class="card-header"><i class="text-lg mdi mdi-account"></i> Reciver Info</div>
                                    <div class="card-body">
                                        <p class="my-2"><b>name:</b> <span id='reciver_name' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>email:</b> <span id='reciver_email' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>phone:</b> <span id='reciver_phone' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>address type:</b> <span id='reciver_address_type' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>address:</b> <span id='reciver_address' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>city:</b> <span id='reciver_city' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>province:</b> <span id='reciver_province' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>country:</b> <span id='reciver_country' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>postal code:</b> <span id='reciver_postal_code' class="text-gray-600 ml-3"></span></p>
                                    </div>
                                </div>
                            </div>

                            
                            {{-- whene UPS API connct just uncomment this part --}}
                            {{--<div class="col-6">
                                <div class="card border">
                                    <div class="card-header"><i class="text-lg mdi mdi-package-variant-closed "></i> Package Info</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="my-2"><b>unit:</b> <span id='unit' class="text-gray-600 ml-3"></span></p>
                                                <p class="my-2"><b>value of content:</b> <span id='value_of_content' class="text-gray-600 ml-3"></span></p>
                                                <p class="my-2"><b>weight:</b> <span id='weight' class="text-gray-600 ml-3"></span></p>
                                                <p class="my-2"><b>dimentions:</b> <span id='dimentions' class="text-gray-600 ml-3"></span></p>
                                            </div>
                                            <div class="col-6">
                                                <p class="my-2"><b>breakable:</b> <span id='breakable' class="text-gray-600 ml-3"></span></p>
                                                <p class="my-2"><b>replaceable:</b> <span id='replaceable' class="text-gray-600 ml-3"></span></p>
                                                <p class="my-2"><b>protection:</b> <span id='protection' class="text-gray-600 ml-3"></span></p>
                                                <p class="my-2"><b>signature:</b> <span id='signature' class="text-gray-600 ml-3"></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="card border">
                                    <div class="card-header"><i class="text-lg mdi mdi-cash-multiple"></i> Service Info</div>
                                    <div class="card-body">
                                        <p class="my-2"><b>status:</b> <span class="text-red-600 ml-3"><i class="mdi mdi-alert text-lg"></i> WAITING FOR PAYMENT</span></p>
                                        <p class="my-2"><b>service Name:</b> <span id='service_name' class="text-gray-600 ml-3"></span></p>
                                        <p class="my-2"><b>price:</b> <span id='price' class="text-gray-600 ml-3"></span> CAD</p>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- whene UPS API connct just uncomment this part --}}

                            {{-- whene UPS API connct just DELETE this part --}}
                            <div class="col-12">
                                <div class="card border">
                                    <div class="card-header"><i class="text-lg mdi mdi-cash-multiple"></i> Please Add Tracking number and price</div>
                                    <p id="warning-price-tracking" class="alert alert-danger text-left hidden m-4"><i class="mdi mdi-alert text-lg"></i> Tracking number and Price is required</p>
                                    <div class="card-body">
                                        <label>Traking number :</label>
                                        <input wire:model="tracking_number" type="text" class="form-control" placeholder="tracking number">
                                        <label class="mt-3">Price :</label>
                                        <input wire:model="price" id='price' type="text" class="form-control" placeholder="price">
                                    </div>
                                </div>
                            </div>
                            {{-- whene UPS API connct just DELETE this part --}}

                            <div class="col-6">
                                <div id="showCash" class="card border">
                                    <div class="card-header">
                                        <b> Calculate return cash </b>
                                    </div>
                                    <div class="card-body">
                                            <input onkeyup="calculate()" id="amount" class="form-control" type="text" placeholder="insert customer paied amount">
                                            <p class="p-2">return amount : <b id="return_amount"></b> </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card border">
                                    <div class="card-header">
                                        <p><b> how do you want to pay?</b></p>
                                    </div>
                                    <div class="card-body">   
                                        <button wire:click="payedBy('Paypal')" style="background: none !important; border: none;"  class="py-0 mx-3">
                                        <img style="width: 25px;" src="{{ asset('images/logos/paypal.png') }}">
                                            <p>
                                                Paypal
                                            </p>
                                        </button>
                                        <button wire:click="payedBy('Visa')" style="background: none !important; border: none;"  class="py-0 mx-3">
                                            <svg style="width: 2.3rem;" xmlns:x="http://ns.adobe.com/Extensibility/1.0/" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/" xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 1000 1000" style="enable-background:new 0 0 1000 1000;" xml:space="preserve">
                                                <style type="text/css">
                                                    .st0{fill:none;stroke:#005596;stroke-width:10;stroke-miterlimit:10;}
                                                    .st1{fill:#005596;}
                                                    .st2{fill:#F2A713;}
                                                </style>
                                                <switch>
                                                    <g i:extraneous="self">
                                                        <g>
                                                            <path class="st0" d="M950,754.9c0,19.4-15.7,35.1-35.1,35.1H85.1C65.7,790,50,774.3,50,754.9V255.1c0-19.4,15.7-35.1,35.1-35.1     h829.9c19.4,0,35.1,15.7,35.1,35.1V754.9z"/>
                                                            <g>
                                                                <path class="st1" d="M372.2,389L320,495.6c-11.4,23.3-22.5,45.4-31.1,69.4h-0.7c-1.4-24-3.1-45.8-5.5-69.4l-5.4-55.8l-4.9-50.7      h-5.7H220v-0.7l-68.1,0.7H150v8h3.5c56.9,2,71.4,36.3,75.1,53.2l-6.8-53.2h0l7.1,54.6c-0.1-0.5-0.2-1.1-0.3-1.6l1.3,9.9      c0,0,0-0.2,0-1.1l20,154.3h57.7l120.3-224H372.2z M220.7,388.3L220.7,388.3L220.7,388.3L220.7,388.3z"/>
                                                                <path class="st1" d="M505.6,388.1l-44.3,224.1h-49.8l44.3-224.1H505.6z"/>
                                                                <path class="st1" d="M509,560.3c13.8,8,33.5,14.3,55,14.3c19.4,0,37-8.6,37-26.3c0-12.6-10-20.9-31.5-31.6      c-24.9-13-48.4-30.3-48.4-59.5c0-45.2,41.1-72.8,92-72.8c28.4,0,44.9,6,55,11.3l-22.2,39.9c-7.6-4-13.5-12-36.9-11.6      c-23.2,0.3-35.3,13-35.3,25.3c0,13,14.2,20.9,33.9,31.6c28.4,14.3,46.3,32.6,46.3,59.2c0,49.9-42.9,75.5-94.7,75.5      c-32.5,0-59-13-70.1-20.9L509,560.3z"/>
                                                                <path class="st1" d="M725.9,554l-27.7,58.2h-52.9l113.4-224.1h64l27.3,224.1h-52.2L793,554H725.9z M790.9,517.5l-4.5-48.2      c-1-12.3-2.4-30.3-3.5-43.9h-0.7c-5.9,13.6-12.4,30.9-18.7,43.9l-23.2,48.2H790.9z"/>
                                                            </g>
                                                            <path class="st1" d="M930,364.2H70V262.8c0-11.9,9.6-21.5,21.5-21.5h817c11.9,0,21.5,9.6,21.5,21.5V364.2z"/>
                                                            <path class="st2" d="M908.5,770.5h-817c-11.9,0-21.5-9.6-21.5-21.5V647.6h860V749C930,760.9,920.4,770.5,908.5,770.5z"/>
                                                        </g>
                                                    </g>
                                                </switch>
                                                
                                                </svg>
                                            <p>
                                                Visa
                                            </p>
                                        </button>
                                        <button wire:click="payedBy('Mastercard')" style="background: none !important; border: none;"  class="py-0 mx-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="2.3rem" viewBox="0 -140 780 780" enable-background="new 0 0 780 500" version="1.1" xml:space="preserve"><rect width="780" height="500" fill="#16366F"/><path d="m449.01 250c0 99.143-80.37 179.5-179.51 179.5s-179.5-80.361-179.5-179.5c0-99.133 80.362-179.5 179.5-179.5 99.137 0 179.51 80.37 179.51 179.5" fill="#D9222A"/><path d="m510.49 70.496c-46.38 0-88.643 17.596-120.5 46.466-6.49 5.889-12.548 12.237-18.125 18.996h36.266c4.966 6.037 9.536 12.388 13.685 19.013h-63.635c-3.827 6.121-7.28 12.469-10.341 19.008h84.312c2.893 6.185 5.431 12.53 7.6 19.004h-99.512c-2.091 6.235-3.832 12.581-5.217 19.009h109.94c2.689 12.49 4.044 25.231 4.041 38.008 0 19.934-3.254 39.113-9.254 57.02h-99.512c2.164 6.479 4.7 12.825 7.595 19.01h84.317c-3.064 6.54-6.52 12.889-10.347 19.013h-63.625c4.154 6.629 8.73 12.979 13.685 18.996h36.258c-5.57 6.772-11.63 13.126-18.13 19.012 31.86 28.867 74.118 46.454 120.5 46.454 99.138-1e-3 179.51-80.362 179.51-179.5 0-99.13-80.37-179.5-179.51-179.5" fill="#EE9F2D"/><path d="m666.08 350.06c0-3.201 2.592-5.801 5.796-5.801s5.796 2.6 5.796 5.801c0 3.199-2.592 5.799-5.796 5.799-3.202-1e-3 -5.797-2.598-5.796-5.799zm5.796 4.408c2.435-1e-3 4.407-1.975 4.408-4.408 0-2.433-1.972-4.404-4.404-4.404h-4e-3c-2.429-4e-3 -4.4 1.963-4.404 4.392v0.013c-3e-3 2.432 1.967 4.406 4.399 4.408 1e-3 -1e-3 3e-3 -1e-3 5e-3 -1e-3zm-0.783-1.86h-1.188v-5.094h2.149c0.45 0 0.908 0 1.305 0.254 0.413 0.278 0.646 0.77 0.646 1.278 0 0.57-0.337 1.104-0.883 1.312l0.937 2.25h-1.315l-0.78-2.016h-0.87v2.016h-1e-3zm0-2.89h0.658c0.246 0 0.504 0.02 0.725-0.1 0.196-0.125 0.296-0.359 0.296-0.584 0-0.195-0.12-0.42-0.288-0.516-0.207-0.131-0.536-0.101-0.758-0.101h-0.633v1.301zm-443.5-80.063c-2.045-0.237-2.945-0.301-4.35-0.301-11.045 0-16.637 3.789-16.637 11.268 0 4.611 2.73 7.546 6.987 7.546 7.938 0 13.659-7.56 14-18.513zm14.171 32.996h-16.146l0.371-7.676c-4.925 6.067-11.496 8.95-20.425 8.95-10.562 0-17.804-8.25-17.804-20.229 0-18.024 12.596-28.54 34.217-28.54 2.208 0 5.041 0.2 7.941 0.569 0.605-2.441 0.763-3.486 0.763-4.8 0-4.908-3.396-6.738-12.5-6.738-9.533-0.108-17.396 2.271-20.625 3.334 0.204-1.23 2.7-16.658 2.7-16.658 9.712-2.846 16.117-3.917 23.325-3.917 16.733 0 25.596 7.512 25.58 21.712 0.032 3.805-0.597 8.5-1.58 14.671-1.692 10.731-5.32 33.718-5.817 39.322zm-62.158 0h-19.488l11.163-69.997-24.925 69.997h-13.28l-1.64-69.597-11.734 69.597h-18.242l15.238-91.054h28.02l1.7 50.966 17.092-50.966h31.167l-15.071 91.054m354.98-32.996c-2.037-0.237-2.942-0.301-4.342-0.301-11.041 0-16.634 3.789-16.634 11.268 0 4.611 2.726 7.546 6.983 7.546 7.939 0 13.664-7.56 13.993-18.513zm14.183 32.996h-16.145l0.365-7.676c-4.925 6.067-11.5 8.95-20.42 8.95-10.566 0-17.8-8.25-17.8-20.229 0-18.024 12.587-28.54 34.212-28.54 2.208 0 5.037 0.2 7.934 0.569 0.604-2.441 0.763-3.486 0.763-4.8 0-4.908-3.392-6.738-12.496-6.738-9.533-0.108-17.388 2.271-20.63 3.334 0.205-1.23 2.709-16.658 2.709-16.658 9.713-2.846 16.113-3.917 23.312-3.917 16.741 0 25.604 7.512 25.588 21.712 0.032 3.805-0.597 8.5-1.58 14.671-1.682 10.731-5.32 33.718-5.812 39.322zm-220.39-1.125c-5.334 1.68-9.492 2.399-14 2.399-9.963 0-15.4-5.725-15.4-16.267-0.142-3.27 1.433-11.879 2.67-19.737 1.125-6.917 8.45-50.53 8.45-50.53h19.371l-2.262 11.209h11.7l-2.643 17.796h-11.742c-2.25 14.083-5.454 31.625-5.491 33.95 0 3.817 2.037 5.483 6.67 5.483 2.221 0 3.941-0.226 5.255-0.7l-2.578 16.397m59.391-0.6c-6.654 2.033-13.075 3.017-19.879 3-21.683-0.021-32.987-11.346-32.987-33.032 0-25.313 14.38-43.947 33.9-43.947 15.97 0 26.17 10.433 26.17 26.796 0 5.429-0.7 10.729-2.387 18.212h-38.575c-1.304 10.742 5.57 15.217 16.837 15.217 6.935 0 13.188-1.43 20.142-4.663l-3.221 18.417zm-10.887-43.9c0.107-1.543 2.054-13.217-9.013-13.217-6.171 0-10.583 4.704-12.38 13.217h21.393zm-123.42-5.017c0 9.367 4.541 15.825 14.841 20.676 7.892 3.709 9.113 4.809 9.113 8.17 0 4.617-3.48 6.7-11.192 6.7-5.812 0-11.22-0.907-17.458-2.92 0 0-2.563 16.32-2.68 17.101 4.43 0.966 8.38 1.861 20.28 2.19 20.562 0 30.058-7.829 30.058-24.75 0-10.175-3.975-16.146-13.737-20.633-8.171-3.75-9.109-4.588-9.109-8.046 0-4.004 3.238-6.046 9.538-6.046 3.825 0 9.05 0.408 14 1.113l2.775-17.175c-5.046-0.8-12.696-1.442-17.15-1.442-21.8 0-29.346 11.387-29.279 25.062m229.09-23.116c5.413 0 10.459 1.42 17.413 4.92l3.187-19.762c-2.854-1.12-12.904-7.7-21.416-7.7-13.042 0-24.066 6.47-31.82 17.15-11.31-3.746-15.959 3.825-21.659 11.367l-5.062 1.179c0.383-2.483 0.73-4.95 0.613-7.446h-17.896c-2.445 22.917-6.779 46.13-10.171 69.075l-0.884 4.976h19.496c3.254-21.143 5.038-34.681 6.121-43.842l7.342-4.084c1.096-4.08 4.529-5.458 11.416-5.292-0.926 5.008-1.389 10.09-1.383 15.184 0 24.225 13.071 39.308 34.05 39.308 5.404 0 10.042-0.712 17.221-2.657l3.431-20.76c-6.46 3.18-11.761 4.676-16.561 4.676-11.328 0-18.183-8.362-18.183-22.184-1e-3 -20.05 10.195-34.108 24.745-34.108"/><path d="m185.21 297.24h-19.491l11.17-69.988-24.925 69.988h-13.282l-1.642-69.588-11.733 69.588h-18.243l15.238-91.042h28.02l0.788 56.362 18.904-56.362h30.267l-15.071 91.042" fill="#fff"/><path d="m647.52 211.6l-4.319 26.308c-5.33-7.012-11.054-12.087-18.612-12.087-9.834 0-18.784 7.454-24.642 18.425-8.158-1.692-16.597-4.563-16.597-4.563l-4e-3 0.067c0.658-6.133 0.92-9.875 0.862-11.146h-17.9c-2.437 22.917-6.77 46.13-10.157 69.075l-0.893 4.976h19.492c2.633-17.097 4.65-31.293 6.133-42.551 6.659-6.017 9.992-11.267 16.721-10.917-2.979 7.206-4.725 15.504-4.725 24.017 0 18.513 9.367 30.725 23.534 30.725 7.141 0 12.62-2.462 17.966-8.17l-0.912 6.884h18.433l14.842-91.043h-19.222zm-24.37 73.942c-6.634 0-9.983-4.909-9.983-14.597 0-14.553 6.271-24.875 15.112-24.875 6.695 0 10.32 5.104 10.32 14.508 1e-3 14.681-6.369 24.964-15.449 24.964z"/><path d="m233.19 264.26c-2.042-0.236-2.946-0.3-4.346-0.3-11.046 0-16.634 3.788-16.634 11.267 0 4.604 2.73 7.547 6.98 7.547 7.945-1e-3 13.666-7.559 14-18.514zm14.179 32.984h-16.146l0.367-7.663c-4.921 6.054-11.5 8.95-20.421 8.95-10.567 0-17.804-8.25-17.804-20.229 0-18.032 12.591-28.542 34.216-28.542 2.209 0 5.042 0.2 7.938 0.571 0.604-2.442 0.762-3.487 0.762-4.808 0-4.908-3.391-6.73-12.496-6.73-9.537-0.108-17.395 2.272-20.629 3.322 0.204-1.226 2.7-16.638 2.7-16.638 9.709-2.858 16.121-3.93 23.321-3.93 16.738 0 25.604 7.518 25.588 21.705 0.029 3.82-0.605 8.512-1.584 14.675-1.687 10.725-5.32 33.725-5.812 39.317zm261.38-88.592l-3.192 19.767c-6.95-3.496-12-4.921-17.407-4.921-14.551 0-24.75 14.058-24.75 34.107 0 13.821 6.857 22.181 18.183 22.181 4.8 0 10.096-1.492 16.554-4.677l-3.42 20.75c-7.184 1.959-11.816 2.672-17.226 2.672-20.976 0-34.05-15.084-34.05-39.309 0-32.55 18.059-55.3 43.888-55.3 8.507 1e-3 18.562 3.609 21.42 4.73m31.442 55.608c-2.041-0.236-2.941-0.3-4.346-0.3-11.042 0-16.634 3.788-16.634 11.267 0 4.604 2.729 7.547 6.984 7.547 7.937-1e-3 13.662-7.559 13.996-18.514zm14.179 32.984h-16.15l0.37-7.663c-4.924 6.054-11.5 8.95-20.42 8.95-10.563 0-17.804-8.25-17.804-20.229 0-18.032 12.595-28.542 34.212-28.542 2.213 0 5.042 0.2 7.941 0.571 0.601-2.442 0.763-3.487 0.763-4.808 0-4.908-3.392-6.73-12.496-6.73-9.533-0.108-17.396 2.272-20.629 3.322 0.204-1.226 2.704-16.638 2.704-16.638 9.709-2.858 16.116-3.93 23.316-3.93 16.742 0 25.604 7.518 25.583 21.705 0.034 3.82-0.595 8.512-1.579 14.675-1.682 10.725-5.324 33.725-5.811 39.317zm-220.39-1.122c-5.338 1.68-9.496 2.409-14 2.409-9.963 0-15.4-5.726-15.4-16.266-0.138-3.281 1.437-11.881 2.675-19.738 1.12-6.926 8.446-50.533 8.446-50.533h19.367l-2.259 11.212h9.942l-2.646 17.788h-9.975c-2.25 14.091-5.463 31.619-5.496 33.949 0 3.83 2.042 5.483 6.671 5.483 2.22 0 3.938-0.217 5.254-0.692l-2.579 16.388m59.392-0.591c-6.65 2.033-13.08 3.013-19.88 3-21.684-0.021-32.987-11.346-32.987-33.033 0-25.321 14.38-43.95 33.9-43.95 15.97 0 26.17 10.429 26.17 26.8 0 5.433-0.7 10.733-2.382 18.212h-38.575c-1.306 10.741 5.569 15.221 16.837 15.221 6.93 0 13.188-1.434 20.137-4.676l-3.22 18.426zm-10.892-43.912c0.117-1.538 2.059-13.217-9.013-13.217-6.166 0-10.579 4.717-12.375 13.217h21.388zm-123.42-5.004c0 9.365 4.542 15.816 14.842 20.675 7.891 3.708 9.112 4.812 9.112 8.17 0 4.617-3.483 6.7-11.187 6.7-5.817 0-11.225-0.908-17.467-2.92 0 0-2.554 16.32-2.67 17.1 4.42 0.967 8.374 1.85 20.274 2.191 20.567 0 30.059-7.829 30.059-24.746 0-10.18-3.971-16.15-13.738-20.637-8.167-3.758-9.112-4.583-9.112-8.046 0-4 3.245-6.058 9.541-6.058 3.821 0 9.046 0.42 14.004 1.125l2.771-17.18c-5.041-0.8-12.691-1.441-17.146-1.441-21.804 0-29.345 11.379-29.283 25.067m398.45 50.629h-18.437l0.917-6.893c-5.347 5.717-10.825 8.18-17.967 8.18-14.168 0-23.53-12.213-23.53-30.725 0-24.63 14.521-45.393 31.709-45.393 7.558 0 13.28 3.088 18.604 10.096l4.325-26.308h19.221l-14.842 91.043zm-28.745-17.109c9.075 0 15.45-10.283 15.45-24.953 0-9.405-3.63-14.509-10.325-14.509-8.838 0-15.116 10.317-15.116 24.875-1e-3 9.686 3.357 14.587 9.991 14.587zm-56.843-56.929c-2.439 22.917-6.773 46.13-10.162 69.063l-0.891 4.975h19.491c6.971-45.275 8.658-54.117 19.588-53.009 1.742-9.266 4.982-17.383 7.399-21.479-8.163-1.7-12.721 2.913-18.688 11.675 0.471-3.787 1.334-7.466 1.163-11.225h-17.9m-160.42 0c-2.446 22.917-6.78 46.13-10.167 69.063l-0.887 4.975h19.5c6.962-45.275 8.646-54.117 19.569-53.009 1.75-9.266 4.992-17.383 7.4-21.479-8.154-1.7-12.716 2.913-18.678 11.675 0.47-3.787 1.325-7.466 1.162-11.225h-17.899m254.57 68.242c0-3.214 2.596-5.8 5.796-5.8 3.197-3e-3 5.792 2.587 5.795 5.785v0.015c-1e-3 3.2-2.595 5.794-5.795 5.796-3.2-2e-3 -5.794-2.596-5.796-5.796zm5.796 4.404c2.432 1e-3 4.403-1.97 4.403-4.401v-2e-3c3e-3 -2.433-1.968-4.406-4.399-4.408h-4e-3c-2.435 1e-3 -4.408 1.974-4.409 4.408 3e-3 2.432 1.976 4.403 4.409 4.403zm-0.784-1.87h-1.188v-5.084h2.154c0.446 0 0.908 8e-3 1.296 0.254 0.416 0.283 0.654 0.767 0.654 1.274 0 0.575-0.338 1.113-0.888 1.317l0.941 2.236h-1.319l-0.78-2.008h-0.87v2.008 3e-3zm0-2.88h0.654c0.245 0 0.513 0.018 0.729-0.1 0.195-0.125 0.295-0.361 0.295-0.587-9e-3 -0.21-0.115-0.404-0.287-0.524-0.204-0.117-0.542-0.085-0.763-0.085h-0.629v1.296h1e-3z" fill="#fff"/></svg>
                                            <p>
                                                Mastercard
                                            </p>
                                        </button>
                                        <button wire:click="payedBy('American Express')" style="background: none !important; border: none;"  class="py-0 mx-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="2.3rem" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 291.764 291.764" style="enable-background:new 0 0 291.764 291.764;" xml:space="preserve">
                                                <g>
                                                    <path style="fill:#26A6D1;" d="M18.235,41.025h255.294c10.066,0,18.235,8.169,18.235,18.244v173.235   c0,10.066-8.169,18.235-18.235,18.235H18.235C8.16,250.74,0,242.57,0,232.505V59.269C0,49.194,8.169,41.025,18.235,41.025z"/>
                                                    <path style="fill:#FFFFFF;" d="M47.047,113.966l-28.812,63.76h34.492l4.276-10.166h9.774l4.276,10.166h37.966v-7.759l3.383,7.759   h19.639l3.383-7.923v7.923h78.959l9.601-9.902l8.99,9.902l40.555,0.082l-28.903-31.784l28.903-32.058h-39.926l-9.346,9.719   l-8.707-9.719h-85.897l-7.376,16.457l-7.549-16.457h-34.42v7.495l-3.829-7.495C76.479,113.966,47.047,113.966,47.047,113.966z    M53.721,123.02h16.813l19.111,43.236V123.02h18.418l14.761,31l13.604-31h18.326v45.752h-11.151l-0.091-35.851l-16.257,35.851   h-9.975l-16.348-35.851v35.851h-22.94l-4.349-10.257H50.147l-4.34,10.248H33.516C33.516,168.763,53.721,123.02,53.721,123.02z    M164.956,123.02h45.342L224.166,138l14.315-14.98h13.868l-21.071,22.995l21.071,22.73h-14.497l-13.868-15.154l-14.388,15.154   h-44.64L164.956,123.02L164.956,123.02z M61.9,130.761l-7.741,18.272h15.473L61.9,130.761z M176.153,132.493v8.352h24.736v9.309   h-24.736v9.118h27.745l12.892-13.43l-12.345-13.357h-28.292L176.153,132.493z"/>
                                                </g>
                                            </svg>
                                            <p>
                                                American Express
                                            </p>
                                        </button>
                                        <button wire:click="payedBy('Debit')" style="background: none !important; border: none;"  class="py-0 mx-3">
                                            <svg style="width: 2rem;" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 174.271 174.27402"><defs><clipPath id="a" transform="translate(-0.0004)"><rect width="174.271" height="174.27399" fill="none"/></clipPath></defs><title>Asset 1</title><g clip-path="url(#a)"><path d="M16.99622,2.96921h140.277a14.029,14.029,0,0,1,14.029,14.029v140.279a14.028,14.028,0,0,1-14.028,14.028H16.9942a14.026,14.026,0,0,1-14.026-14.026V16.99722A14.028,14.028,0,0,1,16.99622,2.96921Z" fill="#fdb913"/><path d="M157.2764,2.969a14.03026,14.03026,0,0,1,14.026,14.029V157.277a14.02878,14.02878,0,0,1-14.026,14.028H16.99739a14.02473,14.02473,0,0,1-14.028-14.028V16.998a14.02622,14.02622,0,0,1,14.028-14.029h140.279m0-2.969H16.99739A17.01543,17.01543,0,0,0,.0004,16.998V157.277a17.01584,17.01584,0,0,0,16.997,16.997h140.279a17.01477,17.01477,0,0,0,16.995-16.997V16.998A17.01436,17.01436,0,0,0,157.2764,0" transform="translate(-0.0004)" fill="#fff"/><path d="M96.95889,88.95432l-.014-30.139,7.867-1.867v3.951s2.038-5.196,6.767-6.402a4.52753,4.52753,0,0,1,2.188-.147v7.69a11.02253,11.02253,0,0,0-4.122.858c-2.907,1.148-4.37,3.653-4.37,7.477l.005,16.642Z" transform="translate(-0.0004)" fill="#231f20"/><path d="M55.4872,98.75491s-1.279-1.918-1.279-8.699v-15.007l-4.048.963v-6.182l4.057-.958v-6.739l8.365-1.976v6.739l5.911-1.404v6.175l-5.911,1.403s-.009,12.295,0,15.281c0,6.948,1.844,8.282,1.844,8.282Z" transform="translate(-0.0004)" fill="#231f20"/><path d="M69.3675,80.82492c0-5.358.763-9.267,2.401-12.267,1.949-3.56,5.145-5.88,9.801-6.94,9.177-2.087,12.489,3.345,12.361,10.629-.049,2.605-.037,3.874-.037,3.874l-16.168,3.8v.261c0,5.089,1.067,7.504,4.292,6.82,2.786-.588,3.561-2.333,3.781-4.491.036-.348.053-1.233.053-1.233l7.574-1.815s.018.62.007,1.316c-.066,2.892-.907,10.066-11.434,12.555-9.972,2.367-12.631-3.723-12.631-12.509m12.538-13.593c-2.679.608-4.084,3.236-4.145,7.59l8.133-1.937c.014-.197.016-.631.014-1.311-.014-3.287-1.03-5.022-4.002-4.342" transform="translate(-0.0004)" fill="#231f20"/><path d="M142.07961,63.2c-.313-9.179,2.068-16.464,12.309-18.784,6.527-1.483,9.006.215,10.261,1.856,1.207,1.566,1.673,3.678,1.673,6.636l.007.543-8.012,1.904s-.006-1.08-.006-1.115c.006-3.508-.969-4.842-3.517-4.204-3.03.761-4.254,3.637-4.254,9.355,0,2.03.009,2.394.009,2.668,0,5.811.794,8.471,4.286,7.74,3.029-.626,3.444-3.286,3.493-5.618.006-.366.021-1.538.021-1.538l8-1.89s.008.591.008,1.248c-.02,7.62-4.036,12.422-11.56,14.173-10.366,2.43-12.396-3.56-12.718-12.974" transform="translate(-0.0004)" fill="#231f20"/><path d="M114.38309,76.051c0-6.982,4.09-9.19,10.246-11.737,5.536-2.29,5.656-3.427,5.679-5.417.031-1.675-.746-3.108-3.502-2.405a4.15967,4.15967,0,0,0-3.336,3.943,14.36836,14.36836,0,0,0-.052,1.547l-7.762,1.833a15.44174,15.44174,0,0,1,.536-4.586c1.241-4.175,4.923-6.984,11.279-8.455,8.258-1.903,11.011,1.721,11.021,7.358V71.481c0,6.456,1.198,7.402,1.198,7.402l-7.62,1.803a16.55966,16.55966,0,0,1-1.021-2.737s-1.669,4.204-7.423,5.556c-6.043,1.425-9.243-2.32-9.243-7.454m15.872-9.534a28.771,28.771,0,0,1-4.054,2.374c-2.54,1.241-3.688,2.772-3.688,5.13,0,2.042,1.265,3.383,3.564,2.815,2.466-.622,4.178-2.923,4.178-6.12Z" transform="translate(-0.0004)" fill="#231f20"/><path d="M11.749,119.88239a4.83715,4.83715,0,0,1-4.053-7.468l.054-.07.091-.024,11.378-2.686v8.641l-.177.041c-2.581.621-5.666,1.328-6.301,1.463a4.75831,4.75831,0,0,1-.992.103" transform="translate(-0.0004)" fill="#231f20"/><path d="M11.749,130.93631a4.82982,4.82982,0,0,1-4.831-4.825,4.77892,4.77892,0,0,1,.778-2.627l.054-.081.091-.023,11.378-2.685v8.641l-.177.046c-2.581.619-5.666,1.334-6.301,1.461a5.11572,5.11572,0,0,1-.992.093" transform="translate(-0.0004)" fill="#231f20"/><path d="M11.749,142.01151a4.83388,4.83388,0,0,1-4.831-4.829,4.76191,4.76191,0,0,1,.778-2.627l.054-.087,11.469-2.703v8.641l-.177.046c-2.726.656-5.753,1.34-6.301,1.461a5.04086,5.04086,0,0,1-.992.098" transform="translate(-0.0004)" fill="#231f20"/><polygon points="10.406 109.294 10.403 60.945 19.218 58.862 19.218 107.21 10.406 109.294" fill="#231f20"/><path d="M32.3625,105.18069a5.4385,5.4385,0,1,0-10.877,0l.009,45.189a14.74433,14.74433,0,0,0,14.716,14.726c4.117,0,15.395-.02,15.395-.02l.005-18.852c.003-10.3.005-20.784.005-21.023a7.11906,7.11906,0,0,0-3.163-5.927l-13.721-9.319s-.003,20.232-.003,21.162a1.17,1.17,0,1,1-2.34,0c0-.227-.026-23.141-.026-25.936" transform="translate(-0.0004)" fill="#231f20"/><path d="M39.7075,71.4653a11.89208,11.89208,0,0,0-7.846,6.066v-3.398l-7.937,1.878.009,21.7a8.12,8.12,0,0,1,8.357,1.461v-14.011c0-3.356,1.67-6.037,4.056-6.563,1.795-.394,3.294.248,3.294,3.445l.006,20.442,8.36-1.96v-21.625c0-5.243-2.019-8.908-8.299-7.435" transform="translate(-0.0004)" fill="#231f20"/><path d="M161.17329,40.52094a5.16751,5.16751,0,1,1,5.163-5.165,5.17,5.17,0,0,1-5.163,5.165m0-9.685a4.519,4.519,0,1,0,4.518,4.52,4.52365,4.52365,0,0,0-4.518-4.52" transform="translate(-0.0004)" fill="#231f20"/><path d="M159.2916,32.27661h2.227a1.45621,1.45621,0,0,1,1.601,1.621c0,.818-.363,1.447-1.051,1.554v.012c.626.064.955.409.987,1.296.012.4.018.896.037,1.282a.6492.6492,0,0,0,.299.545h-1.138a1.05074,1.05074,0,0,1-.17-.56c-.035-.377-.026-.733-.043-1.191-.017-.688-.228-.989-.919-.989h-.824v2.74h-1.006Zm1.812,2.81a.92762.92762,0,0,0,1.007-1.023c0-.673-.291-1.027-.954-1.027h-.859v2.05Z" transform="translate(-0.0004)" fill="#231f20"/></g></svg>
                                            <p>
                                                debit
                                            </p>
                                        </button>
                                        <button wire:click="payedBy('cash')" style="background: none !important; border: none;"  class="py-0 mx-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; width:2.3rem" xml:space="preserve">
                                                <rect y="112.219" style="fill:#75EF84;" width="512" height="287.566"/>
                                                <rect y="112.219" style="fill:#B7FFB9;" width="256" height="287.566"/>
                                                <circle style="fill:#75EF84;" cx="77.667" cy="255.997" r="24.871"/>
                                                <g>
                                                    <circle style="fill:#3AB94B;" cx="434.333" cy="255.997" r="24.871"/>
                                                    <path style="fill:#3AB94B;" d="M0,112.215v287.563h512V112.215H0z M31.347,316.008V195.985   c26.828-4.426,47.996-25.596,52.423-52.423h103.044c-37.692,23.243-62.819,64.902-62.819,112.435s25.128,89.191,62.819,112.435   H83.769C79.343,341.604,58.175,320.435,31.347,316.008z M480.653,316.008c-26.828,4.426-47.996,25.596-52.423,52.423H325.187   c37.692-23.243,62.819-64.902,62.819-112.435s-25.128-89.191-62.819-112.435h103.044c4.426,26.828,25.596,47.996,52.423,52.423   V316.008z"/>
                                                </g>
                                                <path style="fill:#75EF84;" d="M256,112.215H0v287.563h256V112.215z M83.769,368.432c-4.426-26.828-25.596-47.996-52.423-52.423  V195.985c26.828-4.426,47.996-25.596,52.423-52.423h103.044c-37.692,23.243-62.819,64.902-62.819,112.435  s25.128,89.191,62.819,112.435H83.769V368.432z"/>
                                                <path style="fill:#B7FFB9;" d="M301.485,251.928c-8.122-5.419-18.114-8.949-29.812-10.57V194.18  c4.987,1.065,9.18,2.689,12.417,4.847c3.846,2.566,8.262,6.872,8.262,17.481h31.347c0-18.802-7.681-33.864-22.214-43.559  c-8.122-5.418-18.114-8.949-29.812-10.57v-18.818h-31.347v18.818c-11.698,1.622-21.69,5.152-29.812,10.57  c-14.532,9.695-22.213,24.757-22.213,43.559c0,18.801,7.681,33.863,22.213,43.558c8.122,5.419,18.114,8.949,29.812,10.57v47.178  c-4.987-1.065-9.18-2.689-12.417-4.847c-3.846-2.566-8.262-6.872-8.262-17.481h-31.347c0,18.802,7.681,33.864,22.213,43.559  c8.122,5.418,18.114,8.948,29.812,10.57v18.818h31.347v-18.818c11.698-1.622,21.69-5.152,29.812-10.57  c14.532-9.695,22.214-24.757,22.214-43.559C323.699,276.685,316.018,261.623,301.485,251.928z M227.911,233.989  c-3.847-2.566-8.263-6.872-8.263-17.481c0-10.609,4.416-14.915,8.262-17.481c3.236-2.159,7.429-3.781,12.417-4.847v44.656  C235.339,237.771,231.146,236.147,227.911,233.989z M284.09,312.967c-3.236,2.159-7.429,3.781-12.417,4.847v-44.656  c4.987,1.065,9.18,2.689,12.415,4.846c3.847,2.566,8.263,6.872,8.263,17.481C292.352,306.095,287.936,310.401,284.09,312.967z"/>
                                            </svg>
                                            <p>
                                                cash
                                            </p>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card border">
                                    <div class="card-header">
                                        <b>Print</b>
                                    </div>
                                    <div class="card-body text-center">
                                        <p id="payment_first_warninig" class="alert alert-warning text-left hidden"><i class="mdi mdi-alert text-lg"></i> Please choose PAYMENT method at first</p>
                                        <p id="warninig_invoice" class="alert alert-warning text-left hidden"><i class="mdi mdi-alert text-lg"></i> Invoice is not available for inside the Canada</p>
                                        <button wire:click="print_label" class="p-3 mx-3 text-gray-600 hover:shadow hover:text-gray-800"><i class="text-lg mdi mdi-label"></i> Label</button>
                                        <button wire:click="print_shipment" class="p-3 mx-3 text-gray-600 hover:shadow hover:text-gray-800"><i class="text-lg mdi mdi-truck-delivery"></i> Shipment</button>
                                        <button wire:click="print_invoice" class="p-3 mx-3 text-gray-600 hover:shadow hover:text-gray-800"><i class="text-lg mdi mdi-note-plus"></i> Invoice</button>
                                        <button wire:click="print_bill" class="p-3 mx-3 text-gray-600 hover:shadow hover:text-gray-800"><i class="text-lg mdi mdi-code-not-equal"></i> Bill</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger" wire:click="markAsRead('{{ $notification->id }}')" data-dismiss="modal"><i class="text-lg mdi mdi-eye-off"></i> Mark as read </button>
                    </div>
                </div>
            </div>
        </div>
    @endif 

    <script>
        window.addEventListener('notificationDetails', event => {
            console.log(event.detail.data);
            $('#customer_name').text(event.detail.data.order.name_from);
            $('#customer_email').text(event.detail.data.order.email_from);
            $('#customer_phone').text(event.detail.data.order.phone_from);
            $('#customer_address').text(event.detail.data.order.line_1_from);
            $('#customer_city').text(event.detail.data.order.city_from);
            $('#customer_province').text(event.detail.data.order.province_from);
            $('#customer_country').text(event.detail.data.order.country_from);
            $('#customer_postal_code').text(event.detail.data.order.postal_code_from);
            $('#customer_address_type').text(event.detail.data.order.trans_type_from);

            $('#reciver_name').text(event.detail.data.order.name_to);
            $('#reciver_email').text(event.detail.data.order.email_to);
            $('#reciver_phone').text(event.detail.data.order.phone_to);
            $('#reciver_address').text(event.detail.data.order.line_1_to);
            $('#reciver_city').text(event.detail.data.order.city_to);
            $('#reciver_province').text(event.detail.data.order.province_to);
            $('#reciver_country').text(event.detail.data.order.country_to);
            $('#reciver_postal_code').text(event.detail.data.order.postal_code_to);
            $('#reciver_address_type').text(event.detail.data.order.trans_type_to);

            $('#value_of_content').text(event.detail.data.order.value_of_content );
            $('#weight').text(event.detail.data.order.weight + ' ' + event.detail.data.order.weight_type);
            $('#dimentions').text(event.detail.data.order.length + 'x' + event.detail.data.order.width + 'x' + event.detail.data.order.height + ' ' + event.detail.data.order.dimen_type );
    
            $('#breakable').text(event.detail.data.order.breakable);
            $('#replaceable').text(event.detail.data.order.replaceable);
            $('#protection').text(event.detail.data.order.protection);
            $('#signature').text(event.detail.data.order.signature);
            $('#unit').text(event.detail.data.order.unit);

            $('#service_name').text(event.detail.data.order.service_name);
            $('#price').text(event.detail.data.transaction.price);

            $("#notification-info").modal("show");
        });
        
        window.addEventListener('warning', event => {
            $('#payment_first_warninig').removeClass('hidden');
        });

        window.addEventListener('warning-invoice', event => {
            $('#warninig_invoice').removeClass('hidden');
        });

        window.addEventListener('warning-price-tracking', event => {
            $('#warning-price-tracking').removeClass('hidden');
        });

        function calculate() {
            // var price = document.getElementById("price").innerText;


            // whene UPS API connct just DELETE this part
            var price = document.getElementById("price").value;
            // whene UPS API connct just DELETE this part
            var amount = document.getElementById("amount");
            var return_amount = amount.value - price;
            if((return_amount < 0) && (amount != ''))
                document.getElementById("return_amount").innerHTML = 'Customer should pay <span class="text-red-600">$'+ Math.abs(return_amount) + '</span> more';
            else
                document.getElementById("return_amount").innerHTML = return_amount;
                
        }
    </script>
</div>

