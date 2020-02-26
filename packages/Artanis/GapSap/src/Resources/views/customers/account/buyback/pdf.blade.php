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

        .header-red {
            border: 1px solid black;
            color: white;
            background-color: #B22222;
            width: 50%;
            margin-left: 40px;
            margin-top: 10px;
        }
    </style>

</head>
<body>

<div class="information">
    <table width="100%" class="header-red">
        <tr>
            <td align="center">
                Pokli Wealth Management SDN.BHD
            </td>
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td align="left">
                <pre style="font-size: 10px; margin-top: 40px;">
                POKLI WEALTH MANAGEMENT SDN.BHD
                </pre>
                <pre style="font-size: 10px">
                WISMA POKLI NO.101 JALAN S2 F2, 1 AVENUE, GARDEN HOMES, SEREMBAN 2,
                </pre>
                <pre style="font-size: 10px">
                70300 SEREMBAN NEGERI SEMBILAN MALAYSIA. TEL: 019-6645066 / 017-6665497
                </pre>
            </td>
            <td align="left">
                <img src="{{ public_path('themes/pokli-default/assets/images/pokli-logo-gold-big.png') }}" height="86.4px" width="238.08px"/>
                Website : www.pokli.com
            </td>
        </tr>
    </table>
</div>

<div class="information">
    <table width="100%">
        <tr style="top:10px;">
            <td align="center" style="width: 35%;"></td>
            <td align="center" style="width: 30%;">
                BUY BACK TAX INVOIS
            </td>
            <td align="right" style="width: 30%;">
                No:Buy Back {{ $purchase->invoice_id }}
            </td>
            <td align="center" style="width: 5%;"></td>
        </tr>

    </table>
</div>

<div class="information">
    <table width="100%" class="table-custom">
        <tr style="top:10px;">
            <td align="left" style="width: 60%;">
            <pre style="font-size: 10px; margin-left:-20px; margin-top:0px; margin-bottom:0px;">
            BUYBACK FROM: {{ $purchase->customer_full_name }}
            IC: {{ $purchase->customer->ic }}
            <br/><br/>
            Akaun: {{ $purchase->customer->bank_no }}
            Bank: {{ $purchase->customer->bank_name }}
            <br/><br/>
            Tel: {{ $purchase->customer->phone }}
            Fax: {{ $purchase->customer->phone }}
            </pre>
            </td>
            <td align="right" style="width: 40%;padding-right:20px;">
            <pre style="font-size: 10px;margin-bottom:0px;">

            <br/><br/><br/>

            <br/><br/><br/>


            Date: {{ date('d/m/Y', strtotime($purchase->created_at)) }}</pre>
            </td>
        </tr>
    </table>
</div>

<div class="">
    <table width="100%" style="margin-left:30px;margin-right:40px;">
        <tr>
            <td align="center" style="width: 5%;">No.</td>
            <td align="center" style="width: 35%;">Description</td>
            <td align="center" style="width: 12%;">Item Weight</td>
            <td align="center" style="width: 12%;">Qty Purchased</td>
            <td align="center" style="width: 12%;">Total Weight</td>
            <td align="center" style="width: 12%;">Price per.</td>
            <td align="center" style="width: 12%;">Total Price</td>
        </tr>
        {{-- <tr>
            <td align="center" style="width: 5%;border-top: 2px solid black;">1</td>
            <td align="center" style="width: 35%;border-top: 2px solid black;">{{ $purchase->product_type=='gold' ? 'PWM – Gold Purchase Program (Au 999.9)' : 'PWM – Silver Purchase Program (Au 999.9)' }}</td>
            <td align="center" style="width: 12%;border-top: 2px solid black;">{{ $purchase->quantity }}</td>
            <td align="center" style="width: 12%;border-top: 2px solid black;">{{ $purchase->quantity }}</td>
            <td align="center" style="width: 12%;border-top: 2px solid black;">{{ $purchase->quantity }}</td>
            <td align="center" style="width: 12%;border-top: 2px solid black;">{{ $purchase->current_price_per_gram }}</td>
            <td align="center" style="width: 12%;border-top: 2px solid black;">{{ $purchase->amount }}</td>
        </tr> --}}
    </table>
    <table width="100%" style="margin-left:30px;margin-right:40px;border-top:1px solid black">
        <tr>
            <td align="center" style="width: 5%;">1</td>
            <td align="center" style="width: 35%;">{{ $purchase->product_type=='gold' ? 'PWM – Gold Purchase Program (Au 999.9)' : 'PWM – Silver Purchase Program (Au 999.9)' }}</td>
            <td align="center" style="width: 12%;">{{ $purchase->quantity }}</td>
            <td align="center" style="width: 12%;">{{ $purchase->quantity }}</td>
            <td align="center" style="width: 12%;">{{ $purchase->quantity }}</td>
            <td align="center" style="width: 12%;">{{ $purchase->current_price_per_gram }}</td>
            <td align="center" style="width: 12%;">{{ $purchase->amount }}</td>
        </tr>
    </table>
</div>

<div class="information">
    <table width="100%" class="table-custom">
        <tr>
            <td align="left" style="width: 20%;border-right:1px solid black">
            <pre style="font-size: 10px;margin-left:-30px; margin-top: 0px;">
            Sold By:
            {{ auth()->guard('admin')->user()->name }}
            <!-- {{ $purchase->customer_full_name }} -->
            IC:
            </pre>
            </td>
            <td align="left" style="width: 40%;">
            <pre style="font-size: 10px;margin-left:-30px; margin-top: 0px;">
            Buyback From:
            {{ $purchase->customer_full_name }}
            IC:
            </pre>
            </td>
            <td align="right" style="width: 40%;padding-right:20px; margin-top: 0px;">
            <pre style="font-size: 12px;margin-top: -15px;">
                <b>GRAND TOTAL: RM {{ $purchase->amount }}</b>
            </pre>
            </td>
        </tr>

    </table>
</div>

</body>
</html>
