<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('Shipment') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .tbl-text-size {
            font-size: 10px;
        }
        .tbl-header-text-size {
            font-size: 8px;
        }
        .inp-non-border {
            border:none;
            outline: none;
            padding: 0px;
            margin: 0px;
            font-weight: bold;
        }
        .inp-non-border .inp-underline {
            border-bottom: 1px solid #000;
        }
    </style>

</head>


<body>
<div class="row">
    <div style="margin-top: -35px">
        <strong>{{ $service_name }}</strong>
        <span style="margin-left: 5px;">
            <img src="{{ public_path($service_logo['image']) }}" width="{{ $service_logo['x'] }}" height="{{ $service_logo['y'] }}"/>
        </span>
    </div>
    <span>
        {{ __('parcel 1 of 1 Shipment Date ') . date('d/m/Y') }}
    </span>
    <span style="float: right; margin-right: 130px; font-size: large; color: red;">
        {{ __('Parcel Shipping Order MM') }}
    </span>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; margin-top: 5px;" class="tbl-text-size">
        <tr style="font-size: 10px; background: {{ $service_logo['color'] }};" class="tbl-header-text-size">
            <td style="border: 1px solid #000;" colspan="2">
                <span>
                    {{ __('Parcel Shipping Order MM') }}
                </span>
                <span style="float: right">
                    {{ __('Parcel Shipping Order MM') }}
                </span>
            </td>
            <td style="border: 1px solid #000;" colspan="2">
                <span>
                    {{ __('Ship to - Please Print') }}
                </span>
                <span style="float: right">
                    {{ __('Save for future shipments') }}
                </span>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;" colspan="2">
                <table>
                    <tr>
                        <td>{{ __('Company Name') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $name_from }}" type="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;" colspan="2">
                <table>
                    <tr>
                        <td>{{ __('Company Name') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $name_to }}" type="text"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;" colspan="2">
                <table>
                    <tr>
                        <td>{{ __('Contact Name') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $name_from }}" type="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;" colspan="2">
                <table>
                    <tr>
                        <td>{{ __('Contact Name') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $name_to }}" type="text"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;" colspan="2">
                <table>
                    <tr>
                        <td>{{ __('Telephone Number (Business Hours)') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $phone_from }}" type="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;">
                <table>
                    <tr>
                        <td>{{ __('Telephone Number (Business Hours)') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $phone_to }}" type="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;">
                <table>
                    <tr>
                        <td>{{ __('Country') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $country_to }}" type="text"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;" colspan="2">
                <table>
                    <tr>
                        <td>{{ __('Street Address') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $line_1_from }}" type="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;" colspan="2">
                <table>
                    <tr>
                        <td>{{ __('Street Address') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $line_1_to }}" type="text"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">
                <table>
                    <tr>
                        <td>{{ __('City - Province') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $city_from . ' ' . $province_from }}" type="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;">
                <table>
                    <tr>
                        <td>{{ __('Postal Code') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $postal_code_from }}" type="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;">
                <table>
                    <tr>
                        <td>{{ __('City - Province/State') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $city_to . ' ' . $province_to }}" type="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;">
                <table>
                    <tr>
                        <td>{{ __('Postal Code/Zip Code') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $postal_code_to }}" type="text"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;" colspan="2">
                <table>
                    <tr>
                        <td>{{ __('Email Address (Shipment traking information availabe via email)') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $email_from }}" type="text"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;" colspan="2">
                <table>
                    <tr>
                        <td>{{ __('Email Address (Shipment traking information availabe via email)') }}</td>
                    </tr>
                    <tr>
                        <td><input class="inp-non-border" value="{{ $email_to }}" type="text"></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; margin-top: 1px;" class="tbl-text-size">
        <tr>
            <td style="border: 1px solid #000;" width="10%">
                <input type="checkbox" style="margin: auto; width: 27%;">
            </td>
            <td width="55%" style="text-align: center; vertical-align: middle; background: {{ $service_logo['color'] }};">
                {{ __('Express Envlope Quick Shipment - Documents Only, $0.00 value for loss or damage') }}
            </td>
            <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                <span>
                    <input type="text" class="inp-underline">
                </span>
                <strong>
                    {{ __("(Customer's initials)") }}
                </strong>
            </td>
        </tr>
    </table>
    <table style="border-collapse: collapse; width: 100%; margin: 1px 1px 0px;" class="tbl-text-size">
        <tr class="tbl-header-text-size" style="background: {{ $service_logo['color'] }};">
            <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" width="10%;">
                {{ __('Unit of Measure') }}
            </td>
            <td width="40%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('Description of Content') }}
            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('Origin Country') }}
                <br>
                <small>{{ __('(If shiping internationally)') }}</small>
            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('Unit Value') }}
            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('Value of Contents') }}
            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('Remarks') }}
                <br>
                <small>{{ __('(If shiping internationally)') }}</small>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" width="10%;" height="20px">

            </td>
            <td width="40%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" width="10%;" height="20px">

            </td>
            <td width="40%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" width="10%;" height="20px">

            </td>
            <td width="40%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" width="10%;" height="20px">

            </td>
            <td width="40%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" width="10%;" height="20px">

            </td>
            <td width="40%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                {{ __('$') }}
            </td>
            <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">

            </td>
        </tr>
        <tfoot>
            <tr>
                <th style="text-align: right; vertical-align: middle;" colspan="4" height="20px">
                    {{ __('Total Value of Contents in Canadian Currency:') }}
                </th>
                <th style="text-align: left; vertical-align: middle;" colspan="2">
                    {{ __('$') }}
                </th>
            </tr>
        </tfoot>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; margin-top: 1px;" class="tbl-header-text-size">
        <tr class="tbl-header-text-size" >
            <td colspan="4" style="border: 1px solid #000; text-align: left; vertical-align: middle; background: {{ $service_logo['color'] }};">
                {{ __('Shipment Protection Details') }}
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;" width="25%">
                {{ __('Are the content of the Parcel breakable?') }}
                <div style="margin-top: 5px;">
                    <span style="margin-right: 15px; margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Yes ') }}</span>
                    <span style="margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' No ') }}</span>
                </div>
            </td>
            <td style="border: 1px solid #000;" width="25%">
                {{ __('Are the content of the Parcel replaceable?') }}
                <div style="margin-top: 5px;">
                    <span style="margin-right: 15px;"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Yes ') }}</span>
                    <span><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' No ') }}</span>
                </div>
            </td>
            <td rowspan="2" style="border: 1px solid #000;" width="20%">
                {{ __('Do you wish to purchase Shipment Protection coverage?') }}
                <div style="margin-top: 10px">
                    <span style="margin-right: 15px;"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Yes ') }}</span>
                    <span><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' No ') }}</span>
                </div>
            </td>
            <td rowspan="2" style="border: 1px solid #000;">
                {{ __('What is the total value of Shipment Protection purchased for the Parcel?') }}
                <div style="margin-top: 10px">
                    <span>{{ __('$ ') }}<input type="text" class="inp-underline" style="width: 65px;">{{ __(' (Availabel in whole units of $100)') }}</span>
                </div>
                <div style="margin-top: 10px; margin-left: 60px;">
                    <span><input type="text" class="inp-underline" style="width: 65px;"><strong>{{ __(" (Customer's initials)") }}</strong></span>
                </div>
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">
                {{ __('Please describe the delivery address') }}
                <div style="margin-top: 5px">
                    <span style="margin-right: 15px;"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Residential ') }}</span>
                    <span><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Commercial ') }}</span>
                </div>
            </td>
            <td style="border: 1px solid #000;">
                {{ __('Do you require a signature on Delivery?') }}
                <div style="margin-top: 5px">
                    <span style="margin-right: 15px;"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Yes ') }}</span>
                    <span><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' No (Additional fees apply) ') }}</span>
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-top: none; border-collapse: collapse; width: 100%; margin-top: -1px;" class="tbl-text-size">
        <tr>
            <td width="35%" style="border: 1px solid #000;">
                {{ __('General Classificaion of the Contents of the Parcel') }}
                <div style="margin-top: 5px; margin-left: 3px;">
                    <span><img style="margin-top: 1px; margin-right: 2px" src="{{ public_path('images/home/uncheck.png') }}" width="9px" height="9px" />{{ __('General merchandise (new or used commercial) $50,000') }}</span>
                </div>
                <div style="margin-top: 1px; margin-left: 3px;">
                    <span><img style="margin-top: 1px; margin-right: 2px" src="{{ public_path('images/home/uncheck.png') }}" width="9px" height="9px" />{{ __('Presonal effects/breakables $2,500') }}</span>
                </div>
                <div style="margin-top: 1px; margin-left: 3px;">
                    <span><img style="margin-top: 1px; margin-right: 2px" src="{{ public_path('images/home/uncheck.png') }}" width="9px" height="9px" />{{ __('Artwork/antiques $2,500') }}</span>
                </div>
                <div style="margin-top: 1px; margin-left: 3px;">
                    <span><img style="margin-top: 1px; margin-right: 2px" src="{{ public_path('images/home/uncheck.png') }}" width="9px" height="9px" />{{ __('*Jewellery and watches $2,500/$500') }}</span>
                </div>
                <div style="margin-top: 1px; margin-left: 3px;">
                    <span><img style="margin-top: 1px; margin-right: 2px" src="{{ public_path('images/home/uncheck.png') }}" width="9px" height="9px" />{{ __('Document reconstruction $200') }}</span>
                </div>

                <div style="margin-top: 5px; margin-left: 0px;">
                    {{ __('The maximum shipment protection coverage for the Parcel when packed by the UPS store personnel is listed above.') }}
                </div>
                <div style="margin-top: 5px; margin-left: 0px;">
                    {{ __('Jewellery and watches shipped to the US and other international desctinations are limited to $500') }}
                </div>
            </td>
            <td style="border: 1px solid #000; padding-top: 4px;">
                {{ __('Were the contents of the Parcel packed by the UPS Store personnal?') }}
                <span><img style="margin-left: 20px; margin-right: 3px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __('Yes') }}</span>
                <span><img style="margin-left: 5px; margin-right: 3px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __('No') }}</span>
                <div style="margin-top: 15px;">
                    {{ __('Per-Pack Waiver') }}
                    <span style="margin-left: 50px;"><input type="text" class="inp-underline" style="width: 70px;"></span>
                    <strong>{{ __("(Customer's initials)") }}</strong>
                </div>
                <div style="margin-top: 15px; text-align: justify;">
                    {{ __("I have declined packing service offered by The UPS Store and acknowledge that the coverage for the Parcel is limited to loss as provided herein, and that the Carrier's packing standards for Shock, Vibration, and Compression have been explained to me by The UPS Store personnel.") }}
                </div>
                <div style="margin-top: 15px;">
                    {{ __("Shipper's Risk") }}
                    <span style="margin-left: 50px;"><input type="text" class="inp-underline" style="width: 70px;"></span>
                    <strong>{{ __("(Customer's initials)") }}</strong>
                </div>
                <div style="margin-top: 15px;">
                    {{ __("I have declined shipment protection or the carrier's declared value for the loss or damage of the contents of the Parcel and agree that any loss or damage of the contents shall be at my sole risk.") }}
                </div>
            </td>
        </tr>
    </table>
    <table style="border: 1px solid #000; border-collapse: collapse; width: 100%; margin-top: 1px;" class="tbl-text-size">
        <tr class="tbl-header-text-size">
            <td colspan="5" style="border: 1px solid #000; text-align: left; vertical-align: middle; background: {{ $service_logo['color'] }};">
                {{ __('Shipment Detail and Charges') }}
            </td>
        </tr>
        <tr>
            <td colspan="2" rowspan="2" style="border: 1px solid #000;" width="30%">
                {{ __('Are the content of the Parcel breakable?') }}
                <div style="margin-top: 5px;">
                    {{ __('L') }}
                    <input type="text" class="inp-underline" style="width: 25px;">
                    {{ __(' x W') }}
                    <input type="text" class="inp-underline" style="width: 25px;">
                    {{ __(' x H') }}
                    <input type="text" class="inp-underline" style="width: 25px;">
                </div>
                <div style="margin-top: 5px;">
                    <span style="margin-right: 15px; margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __('Express Envelope') }}</span>
                    <span style="margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __('Express Pack') }}</span>
                </div>
            </td>
            <td style="border: 1px solid #000;" width="40%">
                <div style="margin-top: 0px;">
                    <span style="margin-right: 15px; margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Express Service ') }}</span>
                    <span style="margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Expedited Service ') }}</span>
                    <span style="margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Ground Service ') }}</span>
                </div>
                <div style="margin-top: 5px;">
                    <span style="margin-right: 15px; margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Other ') }}</span>
                    <span style="margin-top: 5px"><input type="text" class="inp-underline" style="width: 65px;"></span>
                </div>
            </td>
            <td style="border: 1px solid #000;" width="20%">
                {{ __('Freight Charges') }}
            </td>
            <td style="border: 1px solid #000;" width="10%">
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; text-align: left; vertical-align: top;" height="30px;">
                {{ __("Carrier's tracking identification number") }}
                <div style="margin-top: 15px;">
                    <span style="margin-right: 15px; margin-top: 15px"><input type="text" class="inp-underline" style="width: 100px;"></span>
                </div>
            </td>
            <td style="border: 1px solid #000;">
                {{ __('Shipment protection charges') }}
                <br>
                {{ __('(USP Shipment Only)') }}
            </td>
            <td style="border: 1px solid #000;">

            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">
                {{ __('Actual Weight') }}
                <br>
                <input type="text" class="inp-underline" style="width: 60px;">
                {{ __(' Lbs') }}
            </td>
            <td style="border: 1px solid #000;">
                {{ __('Dimensional Weight') }}
                <br>
                <input type="text" class="inp-underline" style="width: 60px;">
                {{ __(' Lbs') }}
            </td>
            <td style="border: 1px solid #000;">
                {{ __('Carrier') }}
                <div style="margin-top: 5px;">
                    <span style="margin-right: 15px; margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' UPS ') }}</span>
                    <span style="margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Other ') }}</span>
                    <span style="margin-top: 5px"><input type="text" class="inp-underline" style="width: 100px;"></span>
                </div>
            </td>
            <td style="border: 1px solid #000;">
                <div style="margin-top: 0px;">
                    <span style="margin-right: 22px; margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(" Sig Req'd") }}</span>
                    <span style="margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' Sat Del') }}</span>
                </div>
                <div style="margin-top: 5px;">
                    <span style="margin-right: 15px; margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(" Add'l Hand") }}</span>
                    <span style="margin-top: 5px"><img style="margin-top: 1px;" src="{{ public_path('images/home/uncheck.png') }}" width="12px" height="12px" />{{ __(' COD ') }}</span>
                </div>
            </td>
            <td style="border: 1px solid #000;">
            </td>
        </tr>
        <tr>
            <td rowspan="4" colspan="3" style="border: 1px solid #000;">
                {{ __("Customer's Acknowledgement") }}
                <br>
                {{ __('I certify that I agree to the terms and condition included on both sides of this form, and that the stated contents and their value as recorded in the spaces above are truthful and complete.') }}
                <br>
                <table>
                    <tr>
                        <td width="150px" height="50px" style="text-align: left; vertical-align: top;">{{ __("Customer Signature") }}</td>
                        <td width="150px" style="text-align: left; vertical-align: top;">{{ __("Date") }}</td>
                    </tr>
                    <tr>
                        <td><input type="text" class="inp-underline" style="width: 100px;"></td>
                        <td><input type="text" class="inp-underline" style="width: 100px;"></td>
                    </tr>
                </table>
            </td>
            <td style="border: 1px solid #000;">
                {{ __('Packing Cartons and Materials') }}
            </td>
            <td style="border: 1px solid #000;">
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">
                {{ __('Packing Labour') }}
            </td>
            <td style="border: 1px solid #000;">
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">
                {{ __('Taxes') }}
            </td>
            <td style="border: 1px solid #000;">
            </td>
        </tr>
        <tr>
            <td style="border: 1px solid #000;">
                {{ __('Total Charges') }}
            </td>
            <td style="border: 1px solid #000;">
            </td>
        </tr>
    </table>
    <table style="width: 100%; margin-top: -1px;" class="tbl-text-size">
        <tr>
            <td style="text-align: center; vertical-align: middle; border: 5px solid {{ $service_logo['color'] }}; color: {{ $service_logo['color'] }};" width="50%">
                <h2 style="margin: 0px; padding: 0px;">{{ __('The UPS Store #370') }}</h2>
                <h4 style="margin: 0px; padding: 0px;">{{ __('845 Cure-Labelle Chomedy, QC H7V2V2') }}</h4>
                <h4 style="margin: 0px; padding: 0px;">{{ __('Tel. 450.934.8066, Fax. 450.934.8065, E. store370@theupsstore.ca') }}</h4>
                <h6 style="margin: 0px; padding: 0px;">{{ __('theupsstore.ca/370') }}</h6>
            </td>
            <td style="text-align: left; vertical-align: middle; font-size: 10px">
                <div><small>{{ __('The UPS Store&reg; locations in Canada are independently owned and operated by licensed franchisees of MBEC Communications L.P., master licensee of Mail Boxes Etc., Inc., a subsidiary of United Parcel Service of America, Inc. The UPS Store&reg; and other UPS&reg; trademarks are owned by United Parcel Service of America, Inc. and used under license. Services and hours of opration may vary.') }}</small></div>
                <div><small>{{ __('Claims for guaranteed service refunds offered by the Carrier not made in writing within 10 days after the Parcel was shipped are waived. Climes for loss or damage not made in writing within 30 days after the Parcel was shipped are hereby waived.') }}</small></div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
