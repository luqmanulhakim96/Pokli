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
                Tel : +6019-664 5066
                Email : admin@pokli.com
                Website : www.pokli.com.my
                </pre>
            </td>
        </tr>


    </table>
</div>

<div class="information">
    <table width="100%">
        <tr style="top:10px;">
            <td align="left" style="width: 60%;">
                <pre style="font-size: 10px">

                Order Number: {{ $invoice->order->increment_id }}
                <br /><br />
                Date: {{ date('d/m/Y', strtotime($invoice->created_at)) }}
                {{ $invoice->order->billing_address->name }}
                {{ $invoice->order->customer->ic }}
                {{ $invoice->order->customer->phone }}
                {{ $invoice->order->customer->email }}
                <br /><br />
                {{ $invoice->order->billing_address->address1 }}
                {{ $invoice->order->billing_address->city }}, {{ $invoice->order->billing_address->state }}
                </pre>
            </td>
            <td align="left" style="width: 40%;">
                <pre style="font-size: 10px">

                <br/>

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

        </tr>
        <tr style="width: 5%;border: 1px solid white;">
            <!-- <td colspan="6">#Remark:</td> -->
        </tr>
    </table>
    <table width="100%" class="table-custom">
        <tr>
            <td align="center" style="width: 10%;border: 1px solid black;">
                Item Code
            </td>
            <td align="center" style="width: 40%;border: 1px solid black;">
                Description
            </td>
            <td align="center" style="width: 10%;border: 1px solid black;">
                Price
            </td>
            <td align="center" style="width: 20%;border: 1px solid black;">
                Quantity
            </td>
            <td align="center" style="width: 20%;border: 1px solid black;">
                Total Amout (RM)
            </td>
        </tr>
        @foreach ($invoice->items as $item)
        <tr>
            <td align="center" style="width: 20%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ $item->getTypeInstance()->getOrderedItem($item)->sku }}</b></pre>
            </td>
            <td align="center" style="width: 50%;border: 1px solid black;">
            <pre style="font-size: 10px"><b> {{ $item->name }}</b></pre>
            </td>
            <td align="center" style="width: 20%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ core()->formatBasePrice($item->base_price) }}</b></pre>
            </td>
            <td align="center" style="width: 30%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ $item->qty }}</b></pre>
            </td>
            <td align="center" style="width: 30%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ core()->$item->base_total }}</b></pre>
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
            <td style="border: 1px solid black;border-left:0px  white;">
            <pre style="font-size: 10px">
            <b>RM {{ core()->$item->base_total + $item->base_tax_amount }}</b>
            </pre>
            </td>
        </tr>
    </table>
</div>

<div class="information">
    <table width="100%">
        <tr style="top:10px;">
            <td align="left" style="width: 60%;">
                <pre style="font-size: 10px">
                <b>Risk Disclosure:</b>
                <br /><br />
                You are considering dealing with Pokli Wealth Management Sdn Bhd, trading in bullion involves the potential for profit as
                well as the risk of loss. Movements in the price of bullion rates are influenced by a variety of factors of global origin which are
                unpredictable. Violent movement in the price of bullion rates may result in action by the market as a result of which you may be
                incurring extra loss. However, please note that this disclosure cannot and does not explain all the risks involved. Some of the risks
                associated with using our bullion trading facilities include:-
                <br />
                1. Customer should read through all the related sales literature, prospectuses or other offering documents before making purchase.
                2. Customer should carefully consider all precious metals risks and/ or considerations contained in the documents.
                3. There is no assurance that the acquisition of precious metals will achieve your monetary gain objectives.
                4. Customer should make certain that they understand the correlation between risk and return.
                5. PWM will follow Public Gold margin spread and it will be maintained under normal political and social circumstances except for
                extreme market conditions, such as financial and economic crisis, social unrest, political instability, war which can cause extreme
                volatility of precious metal price in international market.
                <br /><br />
                Disclaimer:
                <br /><br />
                1. Pokli Wealth Management Sdn Bhd. (Pokli) does not offer any investment advice or promises/forecasts any assured return
                through this program while promoting the product.
                2. Pokli management reserves the right to amend the terms and conditions without prior notice.
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
                Prepared By: {{ auth()->guard('admin')->user()->name }}
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
