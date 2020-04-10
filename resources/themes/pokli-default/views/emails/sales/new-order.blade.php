@component('shop::emails.layouts.master')
    <div style="text-align: center;">
        <a href="{{ config('app.url') }}">
            @include ('shop::emails.layouts.logo')
        </a>
    </div>

    <div style="padding: 30px;">
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <span style="font-weight: bold;">
                {{ __('shop::app.mail.order.heading') }}
            </span> <br>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {{ __('shop::app.mail.order.dear', ['customer_name' => $order->customer_full_name]) }},
            </p>

            <p style="font-size: 16px;color: #5E5E5E;line-height: 24px;">
                {!! __('shop::app.mail.order.greeting', [
                    'order_id' => '<a href="' . route('customer.orders.view', $order->id) . '" style="color: #0041FF; font-weight: bold;">#' . $order->increment_id . '</a>',
                    'created_at' => $order->created_at
                    ])
                !!}
            </p>
        </div>

        <div style="font-weight: bold;font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 20px !important;">
            {{ __('shop::app.mail.order.summary') }}
        </div>

        <div style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
            @if ($order->shipping_address)
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
            @endif

            <div style="line-height: 25px;">
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
            </div>
        </div>

        <div class="section-content">
            <div class="table mb-20">
                <table style="overflow-x: auto; border-collapse: collapse;
                border-spacing: 0;width: 100%">
                    <thead>
                        <tr style="background-color: #f2f2f2">
                            <th style="text-align: left;padding: 8px">{{ __('shop::app.customer.account.order.view.SKU') }}</th>
                            <th style="text-align: left;padding: 8px">{{ __('shop::app.customer.account.order.view.product-name') }}</th>
                            <th style="text-align: left;padding: 8px">{{ __('shop::app.customer.account.order.view.price') }}</th>
                            <th style="text-align: left;padding: 8px">{{ __('shop::app.customer.account.order.view.qty') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td data-value="{{ __('shop::app.customer.account.order.view.SKU') }}" style="text-align: left;padding: 8px">{{ $item->getTypeInstance()->getOrderedItem($item)->sku }}</td>

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

                                <td data-value="{{ __('shop::app.customer.account.order.view.qty') }}" style="text-align: left;padding: 8px">{{ $item->qty_ordered }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div style="font-size: 16px;color: #242424;line-height: 30px;float: right;width: 40%;margin-top: 20px;">
            <div>
                <span>{{ __('shop::app.mail.order.subtotal') }}</span>
                <span style="float: right;">
                    {{ core()->formatPrice($order->sub_total, $order->order_currency_code) }}
                </span>
            </div>

            @if ($order->shipping_address)
                <div>
                    <span>{{ __('shop::app.mail.order.shipping-handling') }}</span>
                    <span style="float: right;">
                        {{ core()->formatPrice($order->shipping_amount, $order->order_currency_code) }}
                    </span>
                </div>
            @endif

            <div>
                <span>{{ __('shop::app.mail.order.tax') }}</span>
                <span style="float: right;">
                    {{ core()->formatPrice($order->tax_amount, $order->order_currency_code) }}
                </span>
            </div>

            @if ($order->discount_amount > 0)
                <div>
                    <span>{{ __('shop::app.mail.order.discount') }}</span>
                    <span style="float: right;">
                        {{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}
                    </span>
                </div>
            @endif

            <div style="font-weight: bold">
                <span>{{ __('shop::app.mail.order.grand-total') }}</span>
                <span style="float: right;">
                    {{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}
                </span>
            </div>
        </div>

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
            </p>
        </div>
    </div>
@endcomponent
