@extends('admin::layouts.master')

@section('page_title')
    {{ __('Buyback #'.$purchase->increment_id) }}
@stop

@section('content-wrapper')

    <div class="content full-page">

        <div class="page-header">

            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link" onclick="window.location = '{{ url('admin/sales/buyback') }}';"></i>

                    {{ __('Buyback #'.$purchase->increment_id) }}
                </h1>
            </div>

            <div class="page-action">
                @if ($purchase->canCancel())
                    <a href="{{ route('admincustom.sales.buyback.cancel', $purchase->id) }}" class="btn btn-lg btn-primary" v-alert:message="'{{ __('Are you sure you want to cancel this buyback ?') }}'">
                        {{ __('admin::app.sales.orders.cancel-btn-title') }}
                    </a>
                @endif
                @if ($purchase->canConfirm())
                    <a href="{{ route('admincustom.sales.buyback.confirm', $purchase->id) }}" class="btn btn-lg btn-primary" v-alert:message="'{{ __('Are you sure you want to confirm this buyback ?') }}'">
                        {{ __('Confirm') }}
                    </a>
                @endif

                {{-- @if ($order->canInvoice())
                    <a href="{{ route('admin.sales.invoices.create', $purchase->id) }}" class="btn btn-lg btn-primary">
                        {{ __('admin::app.sales.orders.invoice-btn-title') }}
                    </a>
                @endif

                @if ($order->canRefund())
                    <a href="{{ route('admin.sales.refunds.create', $purchase->id) }}" class="btn btn-lg btn-primary">
                        {{ __('admin::app.sales.orders.refund-btn-title') }}
                    </a>
                @endif

                @if ($order->canShip())
                    <a href="{{ route('admin.sales.shipments.create', $purchase->id) }}" class="btn btn-lg btn-primary">
                        {{ __('admin::app.sales.orders.shipment-btn-title') }}
                    </a>
                @endif --}}
            </div>
        </div>

        <div class="page-content">

            <tabs>
                <tab name="{{ __('admin::app.sales.orders.info') }}" :selected="true">
                    <div class="sale-container">

                        <accordian :title="'{{ __('Buyback and Account') }}'" :active="true">
                            <div slot="body">

                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span>{{ __('Buyback Information') }}</span>
                                    </div>

                                    <div class="section-content">
                                        <div class="row">
                                            <span class="title">
                                                {{ __('Buyback Date') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->created_at }}
                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                {{ __('Buyback Status') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->status_label }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span>{{ __('admin::app.sales.orders.account-info') }}</span>
                                    </div>

                                    <div class="section-content">
                                        <div class="row">
                                            <span class="title">
                                                {{ __('admin::app.sales.orders.customer-name') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->customer_full_name }}
                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                {{ __('admin::app.sales.orders.email') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->customer->email }}
                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                {{ __('Bank Name') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->customer->bank_name }}
                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                {{ __('Bank Number') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->customer->bank_no }}
                                            </span>
                                        </div>
                                        
                                    </div>
                                </div>

                            </div>
                        </accordian>

                        <accordian :title="'{{ __('GAP/SAP Information') }}'" :active="true">
                            <div slot="body">

                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span>{{ __('Information') }}</span>
                                    </div>

                                    <div class="section-content">
                                        <div class="row">
                                            <span class="title">
                                                {{ __('Type') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->product_type_label }}
                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                {{ __('Price') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->product_price_per_rm_100 }}
                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                {{ __('Price Updated') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->current_price_datetime }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span>{{ __('Purchase') }}</span>
                                    </div>

                                    <div class="section-content">
                                        <div class="row">
                                            <span class="title">
                                                {{ __('Amount') }}
                                            </span>

                                            <span class="value">
                                                {{ 'RM '.$purchase->amount }}
                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                {{ __('Quantity') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->quantity.' gram' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </accordian>

                        <accordian :title="'{{ __('Payment') }}'" :active="true">
                            <div slot="body">

                                <div class="sale-section">
                                    <div class="secton-title">
                                        <span>{{ __('admin::app.sales.orders.payment-info') }}</span>
                                    </div>

                                    <div class="section-content">
                                        {{-- <div class="row">
                                            <span class="title">
                                                {{ __('admin::app.sales.orders.payment-method') }}
                                            </span>

                                            <span class="value">
                                                {{ $purchase->payment_method_label }}
                                            </span>
                                        </div> --}}

                                        <div class="row">
                                            <span class="title">
                                                {{ __('Total Paid') }}
                                            </span>

                                            <span class="value">
                                                {{ 'RM '.$purchase->amount }}
                                            </span>
                                        </div>

                                        <div class="row">
                                            <span class="title">
                                                {{ __('Payment Attachement') }}
                                            </span>

                                            <span class="value">
                                                {{-- <a href="http://127.0.0.1:8000/storage/{{$purchase->payment_attachment}}" target="_blank">  --}}
                                                    {{-- <img src="http://127.0.0.1:8000/storage/{{$purchase->payment_attachment}}" style="cursor: pointer" alt="Smiley face" height="50" width="50" @click="showModal('downloadDataGrid')">  --}}
                                                {{-- </a> --}}
                                                @if(!$purchase->payment_attachment==null)
                                                    <a style="cursor: pointer; color:red" @click="showModal('downloadDataGrid')">Available</a>
                                                @else
                                                    Not Available
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                {{-- @if ($order->shipping_address)
                                    <div class="sale-section">
                                        <div class="secton-title">
                                            <span>{{ __('admin::app.sales.orders.shipping-info') }}</span>
                                        </div>

                                        <div class="section-content">
                                            <div class="row">
                                                <span class="title">
                                                    {{ __('admin::app.sales.orders.shipping-method') }}
                                                </span>

                                                <span class="value">
                                                    {{ $order->shipping_title }}
                                                </span>
                                            </div>

                                            <div class="row">
                                                <span class="title">
                                                    {{ __('admin::app.sales.orders.shipping-price') }}
                                                </span>

                                                <span class="value">
                                                    {{ core()->formatBasePrice($order->base_shipping_amount) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif --}}
                            </div>
                        </accordian>

                    </div>
                </tab>

                {{-- <tab name="{{ __('admin::app.sales.orders.invoices') }}">

                    <div class="table" style="padding: 20px 0">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{ __('admin::app.sales.invoices.id') }}</th>
                                    <th>{{ __('admin::app.sales.invoices.date') }}</th>
                                    <th>{{ __('admin::app.sales.invoices.order-id') }}</th>
                                    <th>{{ __('admin::app.sales.invoices.customer-name') }}</th>
                                    <th>{{ __('admin::app.sales.invoices.status') }}</th>
                                    <th>{{ __('admin::app.sales.invoices.amount') }}</th>
                                    <th>{{ __('admin::app.sales.invoices.action') }}</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($order->invoices as $invoice)
                                    <tr>
                                        <td>#{{ $invoice->id }}</td>
                                        <td>{{ $invoice->created_at }}</td>
                                        <td>#{{ $invoice->order->increment_id }}</td>
                                        <td>{{ $invoice->address->name }}</td>
                                        <td>{{ $invoice->status_label }}</td>
                                        <td>{{ core()->formatBasePrice($invoice->base_grand_total) }}</td>
                                        <td class="action">
                                            <a href="{{ route('admin.sales.invoices.view', $invoice->id) }}">
                                                <i class="icon eye-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                @if (! $order->invoices->count())
                                    <tr>
                                        <td class="empty" colspan="7">{{ __('admin::app.common.no-result-found') }}</td>
                                    <tr>
                                @endif
                        </table>
                    </div>

                </tab> --}}

                {{-- @if ($order->shipping_address)
                    <tab name="{{ __('admin::app.sales.orders.shipments') }}">

                        <div class="table" style="padding: 20px 0">
                            <table>
                                <thead>
                                    <tr>
                                        <th>{{ __('admin::app.sales.shipments.id') }}</th>
                                        <th>{{ __('admin::app.sales.shipments.date') }}</th>
                                        <th>{{ __('admin::app.sales.shipments.order-id') }}</th>
                                        <th>{{ __('admin::app.sales.shipments.order-date') }}</th>
                                        <th>{{ __('admin::app.sales.shipments.customer-name') }}</th>
                                        <th>{{ __('admin::app.sales.shipments.total-qty') }}</th>
                                        <th>{{ __('admin::app.sales.shipments.action') }}</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($order->shipments as $shipment)
                                        <tr>
                                            <td>#{{ $shipment->id }}</td>
                                            <td>{{ $shipment->created_at }}</td>
                                            <td>#{{ $shipment->order->id }}</td>
                                            <td>{{ $shipment->order->created_at }}</td>
                                            <td>{{ $shipment->address->name }}</td>
                                            <td>{{ $shipment->total_qty }}</td>
                                            <td class="action">
                                                <a href="{{ route('admin.sales.shipments.view', $shipment->id) }}">
                                                    <i class="icon eye-icon"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @if (! $order->shipments->count())
                                        <tr>
                                            <td class="empty" colspan="7">{{ __('admin::app.common.no-result-found') }}</td>
                                        <tr>
                                    @endif
                            </table>
                        </div>

                    </tab>
                @endif --}}

                {{-- <tab name="{{ __('admin::app.sales.orders.refunds') }}">

                    <div class="table" style="padding: 20px 0">
                        <table>
                            <thead>
                                <tr>
                                    <th>{{ __('admin::app.sales.refunds.id') }}</th>
                                    <th>{{ __('admin::app.sales.refunds.date') }}</th>
                                    <th>{{ __('admin::app.sales.refunds.order-id') }}</th>
                                    <th>{{ __('admin::app.sales.refunds.customer-name') }}</th>
                                    <th>{{ __('admin::app.sales.refunds.status') }}</th>
                                    <th>{{ __('admin::app.sales.refunds.refunded') }}</th>
                                    <th>{{ __('admin::app.sales.refunds.action') }}</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($order->refunds as $refund)
                                    <tr>
                                        <td>#{{ $refund->id }}</td>
                                        <td>{{ $refund->created_at }}</td>
                                        <td>#{{ $refund->order->increment_id }}</td>
                                        <td>{{ $refund->order->customer_full_name }}</td>
                                        <td>{{ __('admin::app.sales.refunds.refunded') }}</td>
                                        <td>{{ core()->formatBasePrice($refund->base_grand_total) }}</td>
                                        <td class="action">
                                            <a href="{{ route('admin.sales.refunds.view', $refund->id) }}">
                                                <i class="icon eye-icon"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                @if (! $order->refunds->count())
                                    <tr>
                                        <td class="empty" colspan="7">{{ __('admin::app.common.no-result-found') }}</td>
                                    <tr>
                                @endif
                        </table>
                    </div>

                </tab> --}}
            </tabs>
        </div>

    </div>
    @if(!$purchase->payment_attachment==null)
        <modal id="downloadDataGrid" :is-open="modalIds.downloadDataGrid">
            <h3 slot="header">{{ __('Purchase Attachment') }}</h3>
            <div slot="body">
                <img src="http://127.0.0.1:8000/storage/{{$purchase->payment_attachment}}" alt="Smiley face" height="100%" width="100%" @click="showModal('downloadDataGrid')">
            </div>
        </modal>
    @endif

@stop
