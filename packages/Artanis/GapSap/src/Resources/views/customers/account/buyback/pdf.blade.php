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
    <title>Invoice - BuyBack</title>

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
                Order Number: {{ $purchase->invoice_id }}
                <br /><br />
                Date: {{ date('d/m/Y', strtotime($purchase->created_at)) }}
                {{ $purchase->customer_full_name }}
                {{ $purchase->customer->ic }}
                {{ $purchase->customer->phone }}
                {{ $purchase->customer->email }}
                <br /><br />
                Bank: {{ $purchase->customer->bank_name }}
                Account Num: {{ $purchase->customer->bank_no }}
                {{-- <h3 style="margin-left:50px;">{{ $purchase->product_type=='gold' ? 'PWM – MY Uncang Emas (Au 999.9)' : 'PWM – MY Uncang Perak (Au 999.9)' }}</h3> --}}
                </pre>
            </td>
            <td align="left" style="width: 40%;">
                <pre style="font-size: 10px">

                <br/>

                </pre>
            </td>
        </tr>

    </table>
</div>

<div class="information">
    <table width="100%" class="" style="margin-left:30px;">
        <tr style="width: 5%;border: 1px solid white;">
            <td colspan="6"><b>{{ $purchase->product_type=='gold' ? 'PWM – MY Uncang Emas (Au 999.9)' : 'PWM – MY Uncang Perak (Au 999.9)' }}</b></td>
        </tr>
        <tr style="width: 5%;border: 1px solid white;">
            <td colspan="6">#Remark:</td>
        </tr>
    </table>
    <table width="100%" class="table-custom">
        <tr>
            <td align="center" style="width: 5%;border: 1px solid black;">
                No
            </td>
            <td align="center" style="width: 10%;border: 1px solid black;">
                Item Code
            </td>
            <td align="center" style="width: 40%;border: 1px solid black;">
                Description
            </td>
            <td align="center" style="width: 10%;border: 1px solid black;">
                Price / gram
            </td>
            <td align="center" style="width: 20%;border: 1px solid black;">
                Current Balance (Gram)
            </td>
            <td align="center" style="width: 20%;border: 1px solid black;">
                Total Weight (Gram)
            </td>
            <td align="center" style="width: 20%;border: 1px solid black;">
                Total Amount (RM)
            </td>
        </tr>
        <tr>
            <td align="center" style="width: 5%;border: 1px solid black;">
            <pre style="font-size: 10px">1</pre>
            </td>
            <td align="center" style="width: 10%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>PA0001</b></pre>
            </td>
            <td align="center" style="width: 40%;border: 1px solid black;">
            <pre style="font-size: 10px"><b> {{ $purchase->product_type=='gold' ? 'PWM – MY Uncang Emas (Au 999.9)' : 'PWM – MY Uncang Perak (Au 999.9)' }}</b></pre>
            </td>
            <td align="center" style="width: 10%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ $purchase->current_price_per_gram }}</b></pre>
            </td>
            <td align="center" style="width: 20%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ $purchase->product_type=='gold' ?  $balanceGold : $balanceSilver  }}</b></pre>
            </td>
            <td align="center" style="width: 20%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ $purchase->quantity }}</b></pre>
            </td>
            <td align="center" style="width: 20%;border: 1px solid black;">
            <pre style="font-size: 10px"><b>{{ $purchase->amount }}</b></pre>
            </td>
        </tr>
        <tr>
            <td colspan="5" style="border: 1px solid white; border-right:1px solid black;"></td>
            <td style="border: 1px solid black;border-right:0px  white;">
            <pre style="font-size: 10px">
            <b>Grand Total :</b>
            </pre>
            </td>
            <td style="border: 1px solid black;border-left:0px  white;">
            <pre style="font-size: 10px">
            <b>RM {{ $purchase->amount }}</b>
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
                  <b>TERMS & CONDITIONS:</b>
                  <br /></br>
                  PAYMENT
                  <br></br>

                  i.) The payment shall be made within 24 hours after the issuance of Booking Order. Customer's trading account will be suspended if failure to comply
                  with this term & condition.

                  ii.) After the payment has been made, the payment slip shall be whatsapp to +6010-3307916, Or email to admin@pokli.com attn to Pokli Wealth Management
                   Sdn Bhd (PWMSB) Account Receivable Division within 24 hours.

                  iii.) The Invoice number has to be stated clearly on the payment slip.

                  iv.) Payment via cheque, with amount MYR25,000.00 & below will require 5 Malaysia's bank working days to process.

                  v.) For Easy Payment Purchase (EPP), the customer is required to pay the monthly payment before the due date of each partial payment date. Pokli Wealth
                  Management Sdn Bhd (PWM) reserves the right to terminate the Booking Order and take any necessary actions that deemed appropriate if the customer failed
                   to comply with the terms and conditions.
                  <br /><br />
                  STOCK COLLECTION
                  <br /><br />
                  i.) Stock will only be released to customer after the full payment has been received.

                  ii.) Customer is required to bring along the ORIGINAL payment slip for stock collection purpose. The Company will not release the stock without the original
                  payment slip as proof of payment. Please contact the Bank to provide the proof of payment if you lost the original payment slip. Alternatively, you may contact
                  any Pokli Wealth Management Sdn Bhd (PWMSB) service branch if you require any further assistance.

                  iii.) To facilitate the transaction process, stock collection appointment has to be made with your preferred service branch at least (3) working days prior to
                  your visiting date.

                  iv.) For those dealers who represent their customers to collect the stock on behalf of them, they are required to show the Authorization Letter which is signed
                  and approved by the customers. The stock will only be released to the representative after the verbal confirmation from the customer via phone call verification.
                  However, Pokli Wealth Management Sdn Bhd (PWMSB) reserves the right to reject the authorization if the document needed are incomplete or feel suspicious
                  along the process.
                  <br /><br />
                </pre>
            </td>
        </tr>
    </table>
</div><div class="information">
    <table width="100%" style="padding-top:0px; padding-bottom:0px;">
        <tr style="top:10px;">
            <td align="left" style="width: 60%;">
                <pre style="font-size: 10px">
                Kindly remit the payment to ONE of our bank accounts as below:
                Acc Name      : Pokli Wealth Management
                Bank              : Malayan Banking Berhad (Maybank)
                Branch           : Seremban 2, NSDK
                Acc No.          : 555171527846
                                    <!-- : -->
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
                i.)   The payment shall be made within 24 hours after the issuance of Booking Order.
                      Customer's trading account will be suspended if failure to comply with this term & condition.

                ii.)  After the payment has been made, the payment slip shall be whatsapp to +6010-3307916, Or
                      email to admin@pokli.com attn to Pokli Wealth Management Sdn Bhd (PWMSB) Account Receivable Division within 24 hours.

                iii.) The Invoice number has to be stated clearly on the payment slip.

                iv.)  Payment via cheque, with amount MYR25,000.00 & below will require 5 Malaysia's bank working days to process.

                v.)   For Easy Payment Purchase (EPP), the customer is required to pay the monthly payment
                      before the due date of each partial payment date. Pokli Wealth Management Sdn Bhd (PWM) reserves the right to terminate
                      the Booking Order and take any necessary actions that deemed appropriate if the customer failed to comply with the terms and conditions.
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
                <b>STOCK COLLECTION :</b>

                i.)   Stock will only be released to customer after the full payment has been received.

                ii.)  Customer is required to bring along the ORIGINAL payment slip for stock collection purpose.
                      The Company will not release the stock without the original payment slip as proof of payment.
                      Please contact the Bank to provide the proof of payment if you lost the original payment slip.
                      Alternatively, you may contact any Pokli Wealth Management Sdn Bhd (PWMSB) service branch if you require any further assistance.

                iii.) To facilitate the transaction process, stock collection appointment has to be made with your preferred service branch at least
                      (3) working days prior to your visiting date.

                iv.)  For those dealers who represent their customers to collect the stock on behalf of them, they are required to show the Authorization
                      Letter which is signed and approved by the customers. The stock will only be released to the representative after the verbal confirmation
                      from the customer via phone call verification. However, Pokli Wealth Management Sdn Bhd (PWMSB) reserves the right to reject the authorization
                      if the document needed are incomplete or feel suspicious along the process.
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
                <b>CANCELLATION OF ORDER :</b>

                i.) The Booking Order that has been placed is not allowed to be changed or cancelled by the customer.
                    Under unavoidable condition, a processing fee will be charged as a penalty (5% of Booking Order price; Or
                    Price discrepancy between Booking Order price and Current Gold selling price on cancellation date, whichever is higher)
                    and the customer trading account will be suspended until the payment has been made.

                ii.) For the Easy Payment Purchase(EPP), customer has the right to sell back the stock to Pokli Wealth Management Sdn Bhd (PWMSB)
                    before the due date of final partial payment. Hence, stock will be considered as selling back to Pokli Wealth Management Sdn Bhd based on
                    current Buying Price on the date of selling back. The gain or lost will be calculated and the balance will be returned to customer.
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
                <b>IMPORTANT NOTICE :</b>

                The issuance of the Booking Order is subject to Pokli Wealth Management's (PWMSB) approval. PWMSB reserves the right at our discretion to
                nullify the order if the detail provided is incomplete or if there is any order dispute / discrepancy.

                PWMSB reserves the right to amend the Terms and Conditions as above from time to time without prior notice.For more information and assistance,
                please contact our service branch or our Customer Service Hotline at +6010-3037 916, or any of PWM service branch during business hours.

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
                <b>Risk Disclosure :</b>

                You are considering dealing with Pokli Wealth Management Sdn Bhd (PWMSB) ,trading in bullion involves the potential for profit as
                well as the risk of loss.Movements in the price of bullion rates are influenced by a variety of factors of global origin which are
                unpredictable.Violent movement in the price of bullion rates may result in action by the market as a result of which you may be incurring extra loss.
                However, please note that this disclosure cannot and does not explain all the risks involved. Some of the risks associated with using our bullion trading
                facilities include:-

                1. Customer should read through all the related sales literature, prospectuses or other offering documents before making purchase.

                2. Customer should carefully consider all precious metals risks and/ or considerations contained in the documents.

                3. There is no assurance that the acquisition of precious metals will achieve your monetary gain objectives.

                4. Customer should make certain that they understand the correlation between risk and return.

                5. PWM will follow margin spread and it will be maintained under normal political and social circumstances except for extreme market conditions,
                   such as financial and economic crisis, social unrest, political instability, war which can cause extreme volatility of precious metal price in international market.

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
                <b>Disclaimer :</b>

                1. Pokli Wealth Management Sdn Bhd (PWMSB) – Gold Purchase (AU 999.9) is neither a financial product nor a deposit but a method of purchasing gold
                  through periodic accumulations for the personal needs of the customer.

                2. Pokli Wealth Management Sdn Bhd(PWMSB) does not offer any investment advice or promises/forecasts any assured return
                through this program while promoting the product.

                3. Pokli Wealth Management Sdn Bhd (PWMSB) reserves the right to amend the terms and conditions without prior notice.

                All IPM gold and silver products are SST exempted and not permitted for manufacturing.

                Prepared By: Website

                P/S - Join PWMSB Group Sahabat Telegram https://tinyurl.com/pokliwealth
                www.pokli.com.my
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
