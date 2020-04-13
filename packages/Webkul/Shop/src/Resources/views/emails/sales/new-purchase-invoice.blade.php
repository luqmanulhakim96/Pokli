@component('shop::emails.layouts.master')
    <div style="text-align: center;">
        <a href="{{ config('app.url') }}">
            @include ('shop::emails.layouts.logo')
        </a>
    </div>

    <?php $result = $purchase ?>

    <div style="padding: 30px;">
        <div style="font-size: 17px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <span style="font-weight: bold;">
              {{ __('shop::app.mail.order.pokli-name') }}
            </span> <br>
            <div>
              {{ __('shop::app.mail.order.pokli-address') }}
            </div>
            <div>
              {{ __('shop::app.mail.order.pokli-tel') }}
            </div>
            <div>
              {{ __('shop::app.mail.order.pokli-email') }}
            </div>
            <div>
              {{ __('shop::app.mail.order.pokli-website') }}
            </div>
        </div>
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <span style="font-weight: bold;">
                {{ __('shop::app.mail.myuncang-purchase-invoice.heading') }}
            </span> <br>
            <!-- <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!! __('shop::app.mail.order.greeting', [
                    'order_id' => '<a href="' . route('customer.orders.view', $order->id) . '" style="color: #0041FF; font-weight: bold;">#' . $order->increment_id . '</a>',
                    'created_at' => $order->created_at
                    ])
                !!}
            </p> -->
        </div>

        <!-- <div style="font-weight: bold;font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 20px !important;">
            {{ __('shop::app.mail.invoice.summary') }}
        </div> -->

        <div style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
            <!-- @if ($order->shipping_address)
                <div style="line-height: 25px;">
                    <div style="font-weight: bold;font-size: 16px;color: #242424;">
                        {{ __('shop::app.mail.order.shipping-address') }}
                    </div>

                    <div>
                        {{ $order->shipping_address->name }}
                    </div>

                    <div>
                        {{ $order->shipping_address->address1 }}, {{ $order->shipping_address->state }}
                    </div>

                    <div>
                        {{ core()->country_name($order->shipping_address->country) }} {{ $order->shipping_address->postcode }}
                    </div>

                    <div>---</div>

                    <div style="margin-bottom: 40px;">
                        {{ __('shop::app.mail.order.contact') }} : {{ $order->shipping_address->phone }}
                    </div>

                    <div style="font-size: 16px;color: #242424;">
                        {{ __('shop::app.mail.order.shipping') }}
                    </div>

                    <div style="font-weight: bold;font-size: 16px;color: #242424;">
                        {{ $order->shipping_title }}
                    </div>
                </div>
            @endif -->

            <!-- <div style="line-height: 25px;">
                <div style="font-weight: bold;font-size: 16px;color: #242424;">
                    {{ __('shop::app.mail.order.billing-address') }}
                </div>

                <div>
                    {{ $order->billing_address->name }}
                </div>

                <div>
                    {{ $order->billing_address->address1 }}, {{ $order->billing_address->state }}
                </div>

                <div>
                    {{ core()->country_name($order->billing_address->country) }} {{ $order->billing_address->postcode }}
                </div>

                <div>---</div>

                <div style="margin-bottom: 40px;">
                    {{ __('shop::app.mail.order.contact') }} : {{ $order->billing_address->phone }}
                </div>

                <div style="font-size: 16px; color: #242424;">
                    {{ __('shop::app.mail.order.payment') }}
                </div>

                <div style="font-weight: bold;font-size: 16px; color: #242424;">
                    {{ core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title') }}
                </div>
            </div> -->
            <div style="line-height: 25px;">
                <!-- <div style="font-weight: bold;font-size: 16px;color: #242424;">
                    {{ __('shop::app.mail.order.billing-address') }}
                </div> -->
                <div>
                  {{ __('shop::app.mail.order.order-number') }} {{ $result->increment_id }}
                </div>

                <div>
                  {{ __('shop::app.mail.order.order-date') }} {{ $result->created_at }}
                </div>

                <div>
                  {{ __('shop::app.mail.order.customer-name') }}  {{ $result->customer->billing_address->name }}
                </div>

                <div>
                    {{ $result->customer->ic }}
                </div>

                <div>---</div>

                <div>
                      {{ __('shop::app.mail.order.customer-tel') }} {{ $result->customer->phone }}
                </div>

                <div style="margin-bottom: 40px;">
                      {{ __('shop::app.mail.order.customer-email') }} {{ $result->customer->email }}
                </div>

                <!-- <div style="font-size: 16px; color: #242424;">
                    {{ __('shop::app.mail.order.payment') }}
                </div>

                <div style="font-weight: bold;font-size: 16px; color: #242424;">
                    {{ core()->getConfigData('sales.paymentmethods.' . $order->payment->method . '.title') }}
                </div> -->
            </div>
        </div>

        <div class="section-content">
          <div  style="margin-top: 40px; text-align: center">
              <a href="{{ route('gapsap.purchase.print', $result=>invoice_id) }}" style="font-size: 16px;
              color: #FFFFFF; text-align: center; background: #FF0000; padding: 10px 100px;text-decoration: none;">
                  Download Invoice
              </a>
          </div>
        </div>

        <!-- <div class="section-content">
            <div class="table mb-20">
                <table style="overflow-x: auto; border-collapse: collapse;
                border-spacing: 0;width: 100%">
                    <thead>
                        <tr style="background-color: #f2f2f2">
                            <th style="text-align: left;padding: 8px">{{ __('shop::app.customer.account.order.view.product-name') }}</th>
                            <th style="text-align: left;padding: 8px">{{ __('shop::app.customer.account.order.view.price') }}</th>
                            <th style="text-align: left;padding: 8px">{{ __('shop::app.customer.account.order.view.qty') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($invoice->items as $item)
                            <tr>
                                <td data-value="{{ __('shop::app.customer.account.order.view.product-name') }}" style="text-align: left;padding: 8px">
                                    {{ $item->name }}

                                    @if (isset($item->additional['attributes']))
                                        <div class="item-options">

                                            @foreach ($item->additional['attributes'] as $attribute)
                                                <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                            @endforeach

                                        </div>
                                    @endif
                                </td>

                                <td data-value="{{ __('shop::app.customer.account.order.view.price') }}" style="text-align: left;padding: 8px">{{ core()->formatPrice($item->price, $order->order_currency_code) }}
                                </td>

                                <td data-value="{{ __('shop::app.customer.account.order.view.qty') }}" style="text-align: left;padding: 8px">{{ $item->qty }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> -->

        <!-- <div style="font-size: 16px;color: #242424;line-height: 30px;float: right;width: 40%;margin-top: 20px;">
            <div>
                <span>{{ __('shop::app.mail.order.subtotal') }}</span>
                <span style="float: right;">
                    {{ core()->formatPrice($invoice->sub_total, $invoice->order_currency_code) }}
                </span>
            </div>

            @if ($order->shipping_address)
                <div>
                    <span>{{ __('shop::app.mail.order.shipping-handling') }}</span>
                    <span style="float: right;">
                        {{ core()->formatPrice($invoice->shipping_amount, $invoice->order_currency_code) }}
                    </span>
                </div>
            @endif

            <div>
                <span>{{ __('shop::app.mail.order.tax') }}</span>
                <span style="float: right;">
                    {{ core()->formatPrice($invoice->tax_amount, $invoice->order_currency_code) }}
                </span>
            </div>

            @if ($invoice->discount_amount > 0)
                <div>
                    <span>{{ __('shop::app.mail.order.discount') }}</span>
                    <span style="float: right;">
                        {{ core()->formatPrice($invoice->discount_amount, $invoice->order_currency_code) }}
                    </span>
                </div>
            @endif

            <div style="font-weight: bold">
                <span>{{ __('shop::app.mail.order.grand-total') }}</span>
                <span style="float: right;">
                    {{ core()->formatPrice($invoice->grand_total, $invoice->order_currency_code) }}
                </span>
            </div>
        </div> -->

        <div style="margin-top: 65px;font-size: 16px;color: #5E5E5E;line-height: 24px;display: inline-block">
            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
                {{ __('shop::app.mail.order.terms-and-condition.kindly-remit') }}
                <br>
                <br>
                {{ __('shop::app.mail.order.terms-and-condition.account-name') }}<br>
                {{ __('shop::app.mail.order.terms-and-condition.bank-name') }}<br>
                {{ __('shop::app.mail.order.terms-and-condition.branch-name') }}<br>
                {{ __('shop::app.mail.order.terms-and-condition.account-number') }}<br>
                <br>
                {{ __('shop::app.mail.order.terms-and-condition.fast-cheque') }}
                <br><br>
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>{{ __('shop::app.mail.order.terms-and-condition.tnc') }}</b>
              <br>
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>{{ __('shop::app.mail.order.terms-and-condition.payment') }}</b>
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-1') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-2') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-3') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-4') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-5') }}
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>STOCK COLLECTION :</b>
              <br>
              i.)   Stock will only be released to customer after the full payment has been received.
              <br>
              ii.)  Customer is required to bring along the ORIGINAL payment slip for stock collection purpose.
                    The Company will not release the stock without the original payment slip as proof of payment.
                    Please contact the Bank to provide the proof of payment if you lost the original payment slip.
                    Alternatively, you may contact any Pokli Wealth Management Sdn Bhd (PWMSB) service branch if you require any further assistance.
              <br>
              iii.) To facilitate the transaction process, stock collection appointment has to be made with your preferred service branch at least
                    (3) working days prior to your visiting date.
              <br>
              iv.)  For those dealers who represent their customers to collect the stock on behalf of them, they are required to show the Authorization
                    Letter which is signed and approved by the customers. The stock will only be released to the representative after the verbal confirmation
                    from the customer via phone call verification. However, Pokli Wealth Management Sdn Bhd (PWMSB) reserves the right to reject the authorization
                    if the document needed are incomplete or feel suspicious along the process.
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>CANCELLATION OF ORDER :</b>

              i.) The Booking Order that has been placed is not allowed to be changed or cancelled by the customer.
                  Under unavoidable condition, a processing fee will be charged as a penalty (5% of Booking Order price; Or
                  Price discrepancy between Booking Order price and Current Gold selling price on cancellation date, whichever is higher)
                  and the customer trading account will be suspended until the payment has been made.
              <br>
              ii.) For the Easy Payment Purchase(EPP), customer has the right to sell back the stock to Pokli Wealth Management Sdn Bhd (PWMSB)
                  before the due date of final partial payment. Hence, stock will be considered as selling back to Pokli Wealth Management Sdn Bhd based on
                  current Buying Price on the date of selling back. The gain or lost will be calculated and the balance will be returned to customer.
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>IMPORTANT NOTICE :</b>

              The issuance of the Booking Order is subject to Pokli Wealth Management's (PWMSB) approval. PWMSB reserves the right at our discretion to
              nullify the order if the detail provided is incomplete or if there is any order dispute / discrepancy.
              <br>
              PWMSB reserves the right to amend the Terms and Conditions as above from time to time without prior notice.For more information and assistance,
              please contact our service branch or our Customer Service Hotline at +6010-3037 916, or any of PWM service branch during business hours.
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>{{ __('shop::app.mail.order.terms-and-condition.risk-disclosure') }}</b>
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-1') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-2') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-3') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-4') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-5') }}
              <br>
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>{{ __('shop::app.mail.order.terms-and-condition.disclaimer') }}</b>
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-1') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-2') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-3') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-4') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-5') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-6') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-7') }}
            </p>
        </div>
    </div>
@endcomponent
