@extends('shop::layouts.master')

@section('page_title')
    {{ __('Customer - Purchase') }}
@endsection

@section('content-wrapper')

    <div class="account-content">
        @include('shop::customers.account.partials.sidemenu')

        <div class="account-layout">

            <div class="account-head mb-10">
                <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span>
                <span class="account-heading">
                    {{ __('Purchase') }}
                </span>

                <div class="horizontal-rule"></div>
            </div>

            {{-- {!! view_render_event('bagisto.shop.customers.account.orders.list.before') !!} --}}

            <div class="account-items-list">
                <div class="account-table-content">

                    {{-- {!! app('Webkul\Shop\DataGrids\OrderDataGrid')->render() !!} --}}
                    {!! app('Artanis\GapSap\DataGrids\PurchaseDataGrid')->render() !!}
                    
                </div>
            </div>

            {{-- {!! view_render_event('bagisto.shop.customers.account.orders.list.after') !!} --}}

        </div>

    </div>

@endsection