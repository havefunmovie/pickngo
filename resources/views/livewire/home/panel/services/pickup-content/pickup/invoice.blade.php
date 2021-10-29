<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ __('Invoice') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
{{--    <meta name="csrf" content="{{ csrf_token() }}"/>--}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

{{--    <link rel="stylesheet" href="{{ public_path('css/app.css') }}" type="text/css" >--}}
{{--    <link rel="stylesheet" href="{{ public_path('assets/css/home.css') }}" type="text/css" >--}}

    <style>
        .tbl-text-size {
            font-size: 12px;
        }
        .tbl-header-text-size {
            font-size: 12px;
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
        <span style="font-weight: bolder; font-size: larger;">
            {{ __('Invoice') }}
        </span>
        <span style="float: right; margin-right: 100px;">
            {{ __('PrintShipment ID:') }}
        </span>
        <table style="border: 3px solid #000; border-collapse: collapse; width: 100%;" class="tbl-text-size">
            <tr>
                <td style="border: 1px solid #000; vertical-align:top;">
                    <table>
                        <tr>
                            <td width="100">
                                {{ __('Date:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ date('d/m/Y') }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100" class="tbl-header-text-size">
                                {{ __('Bill of Ladine/Air Wavbill No.:') }}
                            </td>
                            <td style="float: right;">
                                <input value="" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Invoice Number:') }}
                            </td>
                            <td style="float: right;">
                                <input value="" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Purchase Order No.:') }}
                            </td>
                            <td style="float: right;">
                                <input value="" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Terms of Sale (Incoterm):') }}
                            </td>
                            <td style="float: right;">
                                <input value="" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Reason for Export:') }}
                            </td>
                            <td style="float: right;">
                                <input value="" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('EEI Status:') }}
                            </td>
                            <td style="float: right;">
                                <input value="" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border: 1px solid #000; vertical-align:top">
                    <table>
                        <tr>
                            <td colspan="2">
                                <strong style="font-size: 15px;">
                                    {{ __('Shipper Information') }}
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Tax ID/VAT No.:') }}
                            </td>
                            <td style="float: right;">
                                <input value="" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px; font-size: 12px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Contact Name:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['name_from'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Company Name:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['name_from'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr><tr>
                            <td width="100">
                                {{ __('Company Address:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['line_1_from'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('City:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['city_from'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('State/Province:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['province_from'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr><tr>
                            <td width="100">
                                {{ __('Country:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['country_from'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Telephone No.:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['phone_from'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('E-Mail ID:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['email_from'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; vertical-align:top">
                    <table>
                        <tr>
                            <td colspan="2">
                                <strong style="font-size: 15px;">
                                    {{ __('Ship To') }}
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Tax ID/VAT No.:') }}
                            </td>
                            <td style="float: right;">
                                <input value="" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Contact Name:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['name_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Company Name:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['name_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr><tr>
                            <td width="100">
                                {{ __('Company Address:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['line_1_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('City:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['city_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('State/Province:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['province_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr><tr>
                            <td width="100">
                                {{ __('Country:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['country_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Telephone No.:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['phone_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('E-Mail ID:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['email_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border: 1px solid #000; vertical-align:top">
                    <table>
                        <tr>
                            <td colspan="2" style="font-size: 15px;">
                                <strong>
                                    {{ __('Sold To') }}
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Tax ID/VAT No.:') }}
                            </td>
                            <td style="float: right;">
                                <input value="" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Contact Name:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['name_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Company Name:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['name_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr><tr>
                            <td width="100">
                                {{ __('Company Address:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['line_1_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('City:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['city_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('State/Province:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['province_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr><tr>
                            <td width="100">
                                {{ __('Country:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['country_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('Telephone No.:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['phone_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td width="100">
                                {{ __('E-Mail ID:') }}
                            </td>
                            <td style="float: right;">
                                <input value="{{ $content['email_to'] }}" type="text" style="border:none; border-bottom: 1px solid #a0a0a0; outline: none; padding: 2px;">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table style="border-collapse: collapse; width: 100%; margin-top: -1px; margin-left: 2px; margin-right: 2px;" class="tbl-header-text-size">
            <tr class="tbl-header-text-size">
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" width="10%;">
                    {{ __('No. Unit') }}
                </td>
                <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                    {{ __('Unit of Measure') }}
                </td>
                <td width="30%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                    {{ __('Description of Goods') }}
                    <br>
                    <small>{{ __('(include Harmonized Traffic Number if Known)') }}</small>
                </td>
                <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                    {{ __('Country of Origin') }}
                </td>
                <td width="15%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                    {{ __('Unit of Value') }}
                </td>
                <td width="10%" style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                    {{ __('Total Value') }}
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" height="20px">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" height="20px">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" height="20px">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" height="20px">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;" height="20px">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">

                </td>
            </tr>
        </table>
        <table style="border-collapse: collapse; border-top: none; width: 100%; margin-top: 0px; margin-left: 2px; margin-right: 2px;" class="tbl-header-text-size">
            <tr>
                <td style="border: 1px solid #000; text-align: left; vertical-align: top;" rowspan="3" width="57%">
                    <strong>{{ __('Addtional Comment:') }}</strong>
                    <div>
                        <input type="text" class="inp-non-border" style="width: 100%; height: 50px;">
                    </div>
                </td>
                <td style="border: 1px solid #000; text-align: right; vertical-align: middle;" colspan="2">
                    {{ __('Invoice Line Total:') }}
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: right; vertical-align: middle;" colspan="2">
                    {{ __('Discount/Rebate:') }}
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: right; vertical-align: middle;" colspan="2">
                    {{ __('Invoice Sub-Total:') }}
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: left; vertical-align: top;" rowspan="5">
                    <strong>{{ __('Declaration Statement:') }}</strong>
                    <div>
                        <input type="text" class="inp-non-border" style="width: 100%; height: 81px;">
                    </div>
                </td>
                <td style="border: 1px solid #000; text-align: right; vertical-align: middle;" colspan="2">
                    {{ __('Frieght Charges:') }}
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: right; vertical-align: middle;" colspan="2">
                    {{ __('Insurance:') }}
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: right; vertical-align: middle;" colspan="2">
                    {{ __('Other (Specify Type)') }}
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: right; vertical-align: middle;" colspan="2">
                    {{ __('Invoice Total Amount:') }}
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid #000; text-align: right; vertical-align: middle;" width="15%">
                    {{ __('CAD') }}
                </td>
                <td style="border: 1px solid #000; text-align: right; vertical-align: middle;" width="15%">
                    {{ __('Currency Code:') }}
                </td>
                <td style="border: 1px solid #000; text-align: center; vertical-align: middle;">
                </td>
            </tr>
        </table>
        <table style="border-collapse: collapse; width: 100%; margin-top: 0px; margin-left: 2px; margin-right: 2px;" class="tbl-header-text-size">
            <tr>
                <td rowspan="2" width="29%" style="border-bottom: 1px solid #000;">
                    <strong>{{ __('Shipper Signture/Title:') }}</strong>
                    <div>
                        <input type="text" class="inp-non-border" style="width: 100%; height: 50px;">
                    </div>
                </td>
                <td rowspan="2" width="28%" style="border-bottom: 1px solid #000;">
                    <strong>{{ __('Date:') }}</strong>
                    <div>
                        <input type="text" class="inp-non-border" value="{{ date('d/m/Y') }}" style="width: 100%; height: 50px;">
                    </div>
                </td>
                <td width="30%" style="text-align: right; vertical-align: middle;">
                    {{ __('Total Number of Packages:') }}
                </td>
                <td style="border-bottom: 1px solid #000;">
                    <input type="text" class="inp-non-border" style="width: 100%;">
                </td>
            </tr>
            <tr>
                <td style="text-align: right; vertical-align: middle;">
                    {{ __('Total Weight (indicate LBS or KGS):') }}
                </td>
                <td style="border-bottom: 1px solid #000;">
                    <input type="text" class="inp-non-border" style="width: 100%;">
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
