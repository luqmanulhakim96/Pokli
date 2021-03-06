@extends('shop::layouts.master')

@section('page_title')
    {{ __('Customer - Easy Purchase Payment Record') }}
@endsection

@section('content-wrapper')

    <div class="account-content">
        @include('shop::customers.account.partials.sidemenu')

        <div class="account-layout">

            <div class="account-head mb-10">
                <!-- <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span> -->
                <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/customer/account') }}';"></i>
                <span class="account-heading">
                    {{ __('Easy Purchase Payment Records') }}
                </span>

                <div class="horizontal-rule"></div>
            </div>

            {{-- {!! view_render_event('bagisto.shop.customers.account.orders.list.before') !!} --}}

            <div class="account-items-list">
                <div class="account-table-content">
                  {!! app('Artanis\GapSap\DataGrids\EasyPurchasePaymentRecordCustomerOrderDataGrid')->render() !!}
                </div>
            </div>

            {{-- {!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!} --}}

        </div>

    </div>

@endsection
