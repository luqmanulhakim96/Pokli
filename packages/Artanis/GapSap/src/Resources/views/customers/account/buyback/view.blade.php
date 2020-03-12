@extends('shop::layouts.master')

@section('page_title')
    {{-- {{ __('shop::app.customer.account.order.view.page-tile', ['order_id' => $order->increment_id]) }} --}}
    {{ __('Buyback #'.$purchase->increment_id) }}
@endsection

@section('content-wrapper')

    <div class="account-content">
        @include('shop::customers.account.partials.sidemenu')

        <div class="account-layout">

            <div class="account-head">
                <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span>
                <span class="account-heading">
                    {{-- {{ __('shop::app.customer.account.order.view.page-tile', ['order_id' => $order->increment_id]) }} --}}
                    {{ __('Buyback #'.$purchase->increment_id) }}
                </span>
                <span></span>
            </div>

            {{-- {!! view_render_event('bagisto.shop.customers.account.orders.view.before', ['order' => $order]) !!} --}}

            <div class="sale-container">

                <tabs>
                    <tab name="{{ __('shop::app.customer.account.order.view.info') }}" :selected="true">

                        <div class="sale-section">
                            <div class="section-content">
                                <div class="row">
                                    <span class="title">
                                        {{ __('shop::app.customer.account.order.view.placed-on') }}
                                    </span>

                                    <span class="value">
                                        {{ core()->formatDate($purchase->created_at, 'd M Y H:m:s') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="sale-section">
                            <div class="section-content">
                                <div class="row">
                                    <span class="title">
                                        {{ __('Status') }}
                                    </span>

                                    <span class="value">
                                        {{ $purchase->status_label }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="sale-section">
                            <div class="secton-title">
                                <span>{{ __('Purchase Informations') }}</span>
                            </div>

                            <div class="section-content">
                                <div class="table">
                                    <table>
                                        <thead>
                                            <tr>
                                                {{-- <th>{{ __('shop::app.customer.account.order.view.SKU') }}</th> --}}
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Price') }}</th>
                                                <th>{{ __('Quantity') }}</th>
                                                <th>{{ __('Subtotal') }}</th>
                                                {{-- <th>{{ __('shop::app.customer.account.order.view.tax-percent') }}</th>
                                                <th>{{ __('shop::app.customer.account.order.view.tax-amount') }}</th>
                                                <th>{{ __('shop::app.customer.account.order.view.grand-total') }}</th> --}}
                                            </tr>
                                        </thead>

                                        <tbody>

                                            {{-- @foreach ($order->items as $item) --}}
                                                <tr>
                                                    {{-- <td data-value="{{ __('shop::app.customer.account.order.view.SKU') }}">
                                                        {{ $item->getTypeInstance()->getOrderedItem($item)->sku }}
                                                    </td> --}}

                                                    <td data-value="{{ __('Name') }}">
                                                        {{ $purchase->product_type_label }}

                                                        {{-- @if (isset($item->additional['attributes']))
                                                            <div class="item-options">

                                                                @foreach ($item->additional['attributes'] as $attribute)
                                                                    <b>{{ $attribute['attribute_name'] }} : </b>{{ $attribute['option_label'] }}</br>
                                                                @endforeach

                                                            </div>
                                                        @endif --}}
                                                    </td>

                                                    <td data-value="{{ __('shop::app.customer.account.order.view.price') }}">
                                                        {{ $purchase->product_price_per_rm_100 }}
                                                    </td>

                                                    <td data-value="{{ __('shop::app.customer.account.order.view.item-status') }}">
                                                        {{ $purchase->quantity.'(g)' }}
                                                    </td>

                                                    <td data-value="{{ __('Subtotal') }}">
                                                        {{ 'RM'.$purchase->amount }}
                                                    </td>

                                                    {{-- <td data-value="{{ __('shop::app.customer.account.order.view.tax-percent') }}">
                                                        {{ number_format($item->tax_percent, 2) }}%
                                                    </td>

                                                    <td data-value="{{ __('shop::app.customer.account.order.view.tax-amount') }}">
                                                        {{ core()->formatPrice($item->tax_amount, $order->order_currency_code) }}
                                                    </td>

                                                    <td data-value="{{ __('shop::app.customer.account.order.view.grand-total') }}">
                                                        {{ core()->formatPrice($item->total + $item->tax_amount - $item->discount_amount, $order->order_currency_code) }}
                                                    </td> --}}
                                                </tr>
                                            {{-- @endforeach --}}
                                        </tbody>

                                    </table>
                                </div>

                                {{-- <div class="totals">
                                    <table class="sale-summary">
                                        <tbody>
                                            <tr>
                                                <td>{{ __('shop::app.customer.account.order.view.subtotal') }}</td>
                                                <td>-</td>
                                                <td>{{ core()->formatPrice($order->sub_total, $order->order_currency_code) }}</td>
                                            </tr>

                                            @if ($order->haveStockableItems())
                                                <tr>
                                                    <td>{{ __('shop::app.customer.account.order.view.shipping-handling') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($order->shipping_amount, $order->order_currency_code) }}</td>
                                                </tr>
                                            @endif

                                            @if ($order->base_discount_amount > 0)
                                                <tr>
                                                    <td>{{ __('shop::app.customer.account.order.view.discount') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}</td>
                                                </tr>
                                            @endif

                                            <tr class="border">
                                                <td>{{ __('shop::app.customer.account.order.view.tax') }}</td>
                                                <td>-</td>
                                                <td>{{ core()->formatPrice($order->tax_amount, $order->order_currency_code) }}</td>
                                            </tr>

                                            <tr class="bold">
                                                <td>{{ __('shop::app.customer.account.order.view.grand-total') }}</td>
                                                <td>-</td>
                                                <td>{{ core()->formatPrice($order->grand_total, $order->order_currency_code) }}</td>
                                            </tr>

                                            <tr class="bold">
                                                <td>{{ __('shop::app.customer.account.order.view.total-paid') }}</td>
                                                <td>-</td>
                                                <td>{{ core()->formatPrice($order->grand_total_invoiced, $order->order_currency_code) }}</td>
                                            </tr>

                                            <tr class="bold">
                                                <td>{{ __('shop::app.customer.account.order.view.total-refunded') }}</td>
                                                <td>-</td>
                                                <td>{{ core()->formatPrice($order->grand_total_refunded, $order->order_currency_code) }}</td>
                                            </tr>

                                            <tr class="bold">
                                                <td>{{ __('shop::app.customer.account.order.view.total-due') }}</td>
                                                <td>-</td>
                                                <td>{{ core()->formatPrice($order->total_due, $order->order_currency_code) }}</td>
                                            </tr>
                                        <tbody>
                                    </table>
                                </div> --}}
                            </div>
                        </div>
                    </tab>

                    @if ($purchase->invoice_id)
                        <tab name="{{ __('shop::app.customer.account.order.view.invoices') }}">



                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span>{{ __('Invoice #'.$purchase->invoice_id) }}</span>

                                        <a href="{{ route('gapsap.buyback.print', $purchase->id) }}" class="pull-right">
                                            {{ __('shop::app.customer.account.order.view.print') }}
                                        </a>
                                    </div>

                                </div>
                        </tab>
                    @endif

                    {{-- @if ($order->invoices->count())
                        <tab name="{{ __('shop::app.customer.account.order.view.invoices') }}">

                            @foreach ($order->invoices as $invoice)

                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span>{{ __('shop::app.customer.account.order.view.individual-invoice', ['invoice_id' => $invoice->id]) }}</span>

                                        <a href="{{ route('customer.orders.print', $invoice->id) }}" class="pull-right">
                                            {{ __('shop::app.customer.account.order.view.print') }}
                                        </a>
                                    </div>

                                    <div class="section-content">
                                        <div class="table">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('shop::app.customer.account.order.view.SKU') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.product-name') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.price') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.qty') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.subtotal') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.tax-amount') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.grand-total') }}</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @foreach ($invoice->items as $item)
                                                        <tr>
                                                            <td data-value="{{ __('shop::app.customer.account.order.view.SKU') }}">
                                                                {{ $item->getTypeInstance()->getOrderedItem($item)->sku }}
                                                            </td>

                                                            <td data-value="{{ __('shop::app.customer.account.order.view.product-name') }}">
                                                                {{ $item->name }}
                                                            </td>

                                                            <td data-value="{{ __('shop::app.customer.account.order.view.price') }}">
                                                                {{ core()->formatPrice($item->price, $order->order_currency_code) }}
                                                            </td>

                                                            <td data-value="{{ __('shop::app.customer.account.order.view.qty') }}">
                                                                {{ $item->qty }}
                                                            </td>

                                                            <td data-value="{{ __('shop::app.customer.account.order.view.subtotal') }}">
                                                                {{ core()->formatPrice($item->total, $order->order_currency_code) }}
                                                            </td>

                                                            <td data-value="{{ __('shop::app.customer.account.order.view.tax-amount') }}">
                                                                {{ core()->formatPrice($item->tax_amount, $order->order_currency_code) }}
                                                            </td>

                                                            <td data-value="{{ __('shop::app.customer.account.order.view.grand-total') }}">
                                                                {{ core()->formatPrice($item->total + $item->tax_amount, $order->order_currency_code) }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="totals">
                                            <table class="sale-summary">
                                                <tr>
                                                    <td>{{ __('shop::app.customer.account.order.view.subtotal') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($invoice->sub_total, $order->order_currency_code) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>{{ __('shop::app.customer.account.order.view.shipping-handling') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($invoice->shipping_amount, $order->order_currency_code) }}</td>
                                                </tr>

                                                @if ($order->base_discount_amount > 0)
                                                    <tr>
                                                        <td>{{ __('shop::app.customer.account.order.view.discount') }}</td>
                                                        <td>-</td>
                                                        <td>{{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}</td>
                                                    </tr>
                                                @endif

                                                <tr>
                                                    <td>{{ __('shop::app.customer.account.order.view.tax') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($invoice->tax_amount, $order->order_currency_code) }}</td>
                                                </tr>

                                                <tr class="bold">
                                                    <td>{{ __('shop::app.customer.account.order.view.grand-total') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($invoice->grand_total, $order->order_currency_code) }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </tab>
                    @endif

                    @if ($order->shipments->count())
                        <tab name="{{ __('shop::app.customer.account.order.view.shipments') }}">

                            @foreach ($order->shipments as $shipment)

                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span>{{ __('shop::app.customer.account.order.view.individual-shipment', ['shipment_id' => $shipment->id]) }}</span>
                                    </div>

                                    <div class="section-content">

                                        <div class="table">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('shop::app.customer.account.order.view.SKU') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.product-name') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.qty') }}</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @foreach ($shipment->items as $item)

                                                        <tr>
                                                            <td data-value="{{  __('shop::app.customer.account.order.view.SKU') }}">{{ $item->sku }}</td>
                                                            <td data-value="{{  __('shop::app.customer.account.order.view.product-name') }}">{{ $item->name }}</td>
                                                            <td data-value="{{  __('shop::app.customer.account.order.view.qty') }}">{{ $item->qty }}</td>
                                                        </tr>

                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </tab>
                    @endif

                    @if ($order->refunds->count())
                        <tab name="{{ __('shop::app.customer.account.order.view.refunds') }}">

                            @foreach ($order->refunds as $refund)

                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span>{{ __('shop::app.customer.account.order.view.individual-refund', ['refund_id' => $refund->id]) }}</span>
                                    </div>

                                    <div class="section-content">
                                        <div class="table">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('shop::app.customer.account.order.view.SKU') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.product-name') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.price') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.qty') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.subtotal') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.tax-amount') }}</th>
                                                        <th>{{ __('shop::app.customer.account.order.view.grand-total') }}</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    @foreach ($refund->items as $item)
                                                        <tr>
                                                            <td data-value="{{ __('shop::app.customer.account.order.view.SKU') }}">{{ $item->child ? $item->child->sku : $item->sku }}</td>
                                                            <td data-value="{{ __('shop::app.customer.account.order.view.product-name') }}">{{ $item->name }}</td>
                                                            <td data-value="{{ __('shop::app.customer.account.order.view.price') }}">{{ core()->formatPrice($item->price, $order->order_currency_code) }}</td>
                                                            <td data-value="{{ __('shop::app.customer.account.order.view.qty') }}">{{ $item->qty }}</td>
                                                            <td data-value="{{ __('shop::app.customer.account.order.view.subtotal') }}">{{ core()->formatPrice($item->total, $order->order_currency_code) }}</td>
                                                            <td data-value="{{ __('shop::app.customer.account.order.view.tax-amount') }}">{{ core()->formatPrice($item->tax_amount, $order->order_currency_code) }}</td>
                                                            <td data-value="{{ __('shop::app.customer.account.order.view.grand-total') }}">{{ core()->formatPrice($item->total + $item->tax_amount, $order->order_currency_code) }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @if (! $refund->items->count())
                                                        <tr>
                                                            <td class="empty" colspan="7">{{ __('admin::app.common.no-result-found') }}</td>
                                                        <tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="totals">
                                            <table class="sale-summary">
                                                <tr>
                                                    <td>{{ __('shop::app.customer.account.order.view.subtotal') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($refund->sub_total, $order->order_currency_code) }}</td>
                                                </tr>

                                                @if ($refund->shipping_amount > 0)
                                                    <tr>
                                                        <td>{{ __('shop::app.customer.account.order.view.shipping-handling') }}</td>
                                                        <td>-</td>
                                                        <td>{{ core()->formatPrice($refund->shipping_amount, $order->order_currency_code) }}</td>
                                                    </tr>
                                                @endif

                                                @if ($refund->discount_amount > 0)
                                                    <tr>
                                                        <td>{{ __('shop::app.customer.account.order.view.discount') }}</td>
                                                        <td>-</td>
                                                        <td>{{ core()->formatPrice($order->discount_amount, $order->order_currency_code) }}</td>
                                                    </tr>
                                                @endif

                                                @if ($refund->tax_amount > 0)
                                                    <tr>
                                                        <td>{{ __('shop::app.customer.account.order.view.tax') }}</td>
                                                        <td>-</td>
                                                        <td>{{ core()->formatPrice($refund->tax_amount, $order->order_currency_code) }}</td>
                                                    </tr>
                                                @endif

                                                <tr>
                                                    <td>{{ __('shop::app.customer.account.order.view.adjustment-refund') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($refund->adjustment_refund, $order->order_currency_code) }}</td>
                                                </tr>

                                                <tr>
                                                    <td>{{ __('shop::app.customer.account.order.view.adjustment-fee') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($refund->adjustment_fee, $order->order_currency_code) }}</td>
                                                </tr>

                                                <tr class="bold">
                                                    <td>{{ __('shop::app.customer.account.order.view.grand-total') }}</td>
                                                    <td>-</td>
                                                    <td>{{ core()->formatPrice($refund->grand_total, $order->order_currency_code) }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </tab>
                    @endif --}}
                </tabs>

                <div class="sale-section">
                    <div class="section-content" style="border-bottom: 0">
                        <div class="order-box-container">
                            {{-- <div class="box">
                                <div class="box-title">
                                    {{ __('shop::app.customer.account.order.view.billing-address') }}
                                </div>

                                <div class="box-content">

                                    @include ('admin::sales.address', ['address' => $order->billing_address])

                                </div>
                            </div>

                            @if ($order->shipping_address)
                                <div class="box">
                                    <div class="box-title">
                                        {{ __('shop::app.customer.account.order.view.shipping-address') }}
                                    </div>

                                    <div class="box-content">

                                        @include ('admin::sales.address', ['address' => $order->shipping_address])

                                    </div>
                                </div>

                                <div class="box">
                                    <div class="box-title">
                                        {{ __('shop::app.customer.account.order.view.shipping-method') }}
                                    </div>

                                    <div class="box-content">

                                        {{ $order->shipping_title }}

                                    </div>
                                </div>
                            @endif --}}

                            <div class="box">
                                <div class="box-title">
                                    {{ __('Payment Method') }}
                                </div>

                                <div class="box-content">
                                    {{ $purchase->payment_method_label }}
                                </div>
                            </div>

                            <!-- <div class="box">
                                <div class="box-title">
                                    {{ __('Payment Attachement') }}
                                </div>

                                <div class="box-content">
                                    @if(!$purchase->payment_attachment==null)
                                        <a style="cursor: pointer; color:red" @click="showModal('downloadDataGrid')">Available</a>
                                    @else
                                        Not Available
                                    @endif
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

            </div>

            {{-- {!! view_render_event('bagisto.shop.customers.account.orders.view.after', ['order' => $order]) !!} --}}

        </div>

    </div>

    @if(!$purchase->payment_attachment==null)
        <modal id="downloadDataGrid" :is-open="modalIds.downloadDataGrid" style="overflow-y: hidden">
            <h3 slot="header">{{ __('Purchase Attachment') }}</h3>
            <div slot="body">
                <img src="http://127.0.0.1:8000/storage/{{$purchase->payment_attachment}}" alt="Smiley face" height="100%" width="100%" @click="showModal('downloadDataGrid')">
            </div>
        </modal>
    @endif

@endsection
