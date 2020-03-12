{{-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Cache-control" content="no-cache">

        <style type="text/css">
            body, th, td, h5 {
                font-size: 12px;
                color: #000;
            }

            .container {
                padding: 20px;
                display: block;
            }

            .invoice-summary {
                margin-bottom: 20px;
            }

            .table {
                margin-top: 20px;
            }

            .table table {
                width: 100%;
                border-collapse: collapse;
                text-align: left;
            }

            .table thead th {
                font-weight: 700;
                border-top: solid 1px #d3d3d3;
                border-bottom: solid 1px #d3d3d3;
                border-left: solid 1px #d3d3d3;
                padding: 5px 10px;
                background: #F4F4F4;
            }

            .table thead th:last-child {
                border-right: solid 1px #d3d3d3;
            }

            .table tbody td {
                padding: 5px 10px;
                border-bottom: solid 1px #d3d3d3;
                border-left: solid 1px #d3d3d3;
                color: $font-color;
                vertical-align: middle;
                font-family: DejaVu Sans; sans-serif;
            }

            .table tbody td p {
                margin: 0;
            }

            .table tbody td:last-child {
                border-right: solid 1px #d3d3d3;
            }

           .sale-summary {
                margin-top: 40px;
                float: right;
            }

            .sale-summary tr td {
                padding: 3px 5px;
                font-family: DejaVu Sans; sans-serif;
            }

            .sale-summary tr.bold {
                font-weight: 600;
            }

            .label {
                color: #000;
                font-weight: 600;
            }

        </style>
    </head>

    <body style="background-image: none;background-color: #fff;">
        <div class="container">

            <div class="invoice-summary">

                <div class="row">
                    <span class="label">{{ __('shop::app.customer.account.order.view.invoice-id') }} -</span>
                    <span class="value">#{{ $invoice->id }}</span>
                </div>

                <div class="row">
                    <span class="label">{{ __('shop::app.customer.account.order.view.order-id') }} -</span>
                    <span class="value">#{{ $invoice->increment_id }}</span>
                </div>

                <div class="row">
                    <span class="label">{{ __('shop::app.customer.account.order.view.order-date') }} -</span>
                    <span class="value">{{ core()->formatDate($invoice->created_at, 'd M Y') }}</span>
                </div>

            </div>

        </div>
    </body>
</html> --}}

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #ffffff;
            color: #000000;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        hr.blackSolid {
            border-top: 1px solid black;
        }
        .table-custom {
            margin-left: 30px;
            margin-right: 50px;
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="center">
                {{-- <img src="{{asset('themes/pokli-default/assets/images/pokli-logo-gold-big.png')}}" alt="Logo" width="64" class="logo"/> --}}
                {{-- <img src="{{ public_path('themes/pokli-default/assets/images/pokli-logo-gold-big.png') }}" alt="Logo" height="86.4px" width="238.08px" class=""/> --}}
                <img src="{{ public_path('themes/pokli-default/assets/images/pokli-logo-gold-big.png') }}" height="86.4px" width="238.08px"/>
            </td>
        </tr>
        <tr style="top:10px;">
            <td align="center">
                <h2>Pokli Wealth Management Sdn Bhd (1349069-M)</h2>
                <pre style="font-size: 10px">
                Wisma Pokli,101A- 1 Avenue,Jalan S2F2,Garden Homes, Seremban 270300 Seremban, Negeri Sembilan
                Tel :  +6019-664 5066
                Email : admin@pokli.com
                Website : www.pokli.com.my
                </pre>
            </td>
        </tr>


    </table>
</div>

<div class="information">
    <table width="100%" class="" style="margin-left:30px; padding-top:0px; padding-bottom:0px;">
        <tr style="width: 5%;">
            <td align="center" colspan="6"><b style="font-size: 14px">SALES ORDER</b></td>
        </tr>
    </table>
    <table width="100%" style="padding-top:0px; padding-bottom:0px;">
        <tr style="top:10px;">
            <td align="left" style="width: 60%;">
            <pre style="font-size: 12px; margin-top:0px; margin-bottom:0px;">
            Order Number: {{ $invoice->order->increment_id }}
            Date: {{ core()->formatDate($invoice->order->created_at, 'd/m/Y') }}
            Customer: {{ $invoice->order->billing_address->name }}
            {{$invoice->order->customer->ic}}
            Tel: {{$invoice->order->customer->phone}}
            Email: {{ $invoice->order->customer->email }}

            {{-- <h3 style="margin-left:50px;">{{ $purchase->product_type=='gold' ? 'PWM – Gold Purchase Program (Au 999.9)' : 'PWM – Silver Purchase Program (Au 999.9)' }}</h3> --}}
            </pre>
            </td>
            <td align="left" style="width: 40%;">
                <pre style="font-size: 12px; margin-top:0px; margin-bottom:0px;">

                <br/>

                <!-- Ordered By: -->
                @if ($invoice->order->shipping_address)
                    Payment By: {{ core()->getConfigData('sales.paymentmethods.' . $invoice->order->payment->method . '.title') }}
                @endif


                </pre>
            </td>
        </tr>

    </table>
</div>

<div class="information">
    <table width="100%" class="" style="margin-left:30px;">
        <tr style="width: 5%;border: 1px solid white;">
            {{-- <td colspan="6"><b>{{ $purchase->product_type=='gold' ? 'PWM – Gold Purchase Program (Au 999.9)' : 'PWM – Silver Purchase Program (Au 999.9)' }}</b></td> --}}
            <td colspan="6"><b style="font-size:12px;text-transform: uppercase;text-decoration: underline;">PURCHASE OF GOLD PRODUCT</b></td>
        </tr>
    </table>
    <table width="100%" class="table-custom">
        <tr>
            <td align="center" style="width: 5%;border: 1px solid black;">
                No
            </td>
            <td align="center" style="width: 35%;border: 1px solid black;">
                Description
            </td>
            <td align="center" style="width: 15%;border: 1px solid black;">
                Price/Item <br> (RM)
            </td>
            <td align="center" style="width: 15%;border: 1px solid black;">
                Gold Premium <br>(RM)
            </td>
            <td align="center" style="width: 15%;border: 1px solid black;">
                Quantity<br> (Gram)
            </td>
            <td align="center" style="width: 15%;border: 1px solid black;">
                Total Amout<br> (RM)
            </td>
        </tr>
        {{-- <tr>
            <td align="center" style="width: 5%;border: 1px solid black;">
            <pre style="font-size: 10px">1</pre>
            </td>
            <td align="center" style="width: 35%;border: 1px solid black;">
            <pre style="font-size: 10px"><b> {{ $purchase->product_type=='gold' ? 'PWM – Gold Purchase Program (Au 999.9)' : 'PWM – Silver Purchase Program (Au 999.9)' }}</b></pre>
            </td>
            <td align="center" style="width: 15%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ $purchase->current_price_per_gram }}</b></pre>
            </td>
            <td align="center" style="width: 15%;border: 1px solid black;">
                <pre style="font-size: 10px"><b>5</b></pre>
            </td>
            <td align="center" style="width: 15%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ $invoice->total_qty }}</b></pre>
            </td>
            <td align="center" style="width: 15%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ {{ core()->formatPrice($invoice->sub_total, $invoice->order->order_currency_code) }} }}</b></pre>
            </td>
        </tr> --}}
        @foreach ($invoice->items as $item)
            <tr>
                <td align="center" style="width: 5%;border: 1px solid black;">
                    <pre style="font-size: 10px">1</pre>
                </td>
                <td align="center" style="width: 35%;border: 1px solid black;">
                    <pre style="font-size: 10px"><b> {{ $item->name }}</b></pre>
                </td>
                <td align="center" style="width: 15%;border: 1px solid black;">
                    <pre style="font-size: 10px"><b>{{ core()->formatPrice($item->price, $invoice->order->order_currency_code) }}</b></pre>
                </td>
                <td align="center" style="width: 15%;border: 1px solid black;">
                    <pre style="font-size: 10px"><b>5</b></pre>
                </td>
                <td align="center" style="width: 15%;border: 1px solid black;">
                    <pre style="font-size: 10px"><b>{{ $item->qty }}</b></pre>
                </td>
                <td align="center" style="width: 15%;border: 1px solid black;">
                    <pre style="font-size: 10px"><b>{{ core()->formatPrice($invoice->grand_total, $invoice->order->order_currency_code) }}</b></pre>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" style="border: 1px solid white; border-right:1px solid black;"></td>
            <td style="border: 1px solid black;border-right:0px  white;">
            <pre style="font-size: 10px">
            <b>Grand Total :</b>
            </pre>
            </td>
            <td align="right" colspan="2" style="border: 1px solid black;border-left:0px solid  white;padding-right:15px;">
            <pre style="font-size: 10px">
            <b>{{ core()->formatPrice($invoice->grand_total, $invoice->order->order_currency_code) }}</b>
            </pre>
            </td>
        </tr>
    </table>
</div>

<div class="information">
    <table width="100%" style="padding-top:0px; padding-bottom:0px;">
        <tr style="top:10px;">
            <td align="left" style="width: 60%;">
                <pre style="font-size: 10px">
                Kindly remit the payment to ONE of our bank accounts as below:
                Acc Name      : Pokli Wealth Management
                Bank              : Malayan Banking Berhad (Maybank)
                Branch           : Seremban 2, NSDK
                Acc No.          : 555171003253
                                    :
                (*Fast Cheque is NOT accepted.)
                </pre>
            </td>
        </tr>
    </table>
</div>

<div class="information">
    <table width="100%" style="padding-top:0px; padding-bottom:0px;">
        <tr style="top:10px;">
            <td align="left" style="width: 60%;">
                <pre style="font-size: 10px">
                <b>TERMS &amp; CONDITIONS:</b>
                <b>PAYMENT</b>
                i.) The payment shall be made within 24 hours after the issuance of Sales Order. Customer&#39;s trading account will be suspended if
                failure to comply with this term &amp; condition.
                ii.) After the payment has been made, the payment slip shall be faxed to +604-7753868, Or email to admin@pokli.com attn to Pokli
                Wealth Management Receivable Division within 24 hours. iii.) The Order number and account Code (PWM******/ TEMP********) has to
                be stated clearly on the payment slip. iv.) Payment via cheque, with amount RM25,000&amp; below will require 5 Malaysia&#39;s bank working
                days to process.
                v.) For Easy Payment Purchase (EPP), the customer is required to pay the monthly payment before the due date of each partial
                payment date. Pokli Wealth Management reserves the right to terminate the Sales Order and take any necessary actions that deemed
                appropriate if the customer failed to comply with the terms and conditions.
                </pre>
            </td>
        </tr>
    </table>
</div>

<hr class="blackSolid" width="85%" style="margin-top:0px;margin-bottom:0px;">

<div class="information" style="margin-left:5px; margin-right:5px;">
    <table width="100%" style="padding-top:0px;">
        <tr style="border-top: 1px solid black;">
            <td align="left" style="width: 50%;">
            <pre style="font-size: 10px; margin-top:0px;">
                Prepared By: Website
            </pre>
            </td>
            <td align="left" style="width: 50%;">
            <pre style="font-size: 10px; margin-top:0px;">
            <b>
                I hereby agree to purchase the above
                mentioned
                item(s) and abide with the terms and
                conditions above,
            </b>
            </pre>
            </td>
        </tr>
    </table>
</div>

<div class="information" style="margin-top:-10px">
    <table width="100%">
        <tr style="top:10px;">
            <td align="left" style="width: 50%;">
            <pre style="font-size: 10px">
            <b>
                This is a computer generated sales order, therefore no
                signature is required.
            </b>
            </pre>
            </td>
            <td align="left" style="width: 50%;">
            <pre style="font-size: 10px">
                <hr align="left" class="blackSolid" style="margin-left:40px;" width="75%">
                Name:
                IC No:
                Date:
            </pre>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
