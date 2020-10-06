@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.index.title') }}
@endsection

@section('content-wrapper')

<div class="account-content">

    @include('shop::customers.account.partials.sidemenu')

    <div class="account-layout">

        <div class="account-head">

            <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span>

            <span class="account-heading">{{ __('shop::app.customer.account.profile.index.title') }}</span>

            <span class="account-action">
                <a href="{{ route('customer.profile.edit') }}">{{ __('shop::app.customer.account.profile.index.edit') }}</a>
            </span>

            <div class="horizontal-rule"></div>
        </div>

         {!! view_render_event('bagisto.shop.customers.account.profile.view.before', ['customer' => $customer]) !!}

        <div class="account-table-content" style="width:50%">
            <table style="color: #5E5E5E;">
                <tbody>
                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.fname') }}<b></td>
                        <td>{{ $customer->first_name ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.lname') }}<b></td>
                        <td>{{ $customer->last_name ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.gender') }}<b></td>
                        <td>{{ $customer->gender ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.dob') }}<b></td>
                        <td>{{ $customer->date_of_birth ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.email') }}<b></td>
                        <td>{{ $customer->email ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.phone') }}<b></td>
                        <td>{{ $customer->phone ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.ic') }}<b></td>
                        <td>{{ $customer->ic ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.bank-name') }}<b></td>
                        <td>{{ $customer->bank_name ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.bank-no') }}<b></td>
                        <td>{{ $customer->bank_no ?? '' }}</td>
                    </tr>

                    <tr>
                      <td><b>{{ __('shop::app.customer.account.profile.branch-name') }}<b></td>
                      <td>{{ $customer->branch ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.job-description') }}<b></td>
                        <td>{{ $customer->job_description ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.heir-name') }}<b></td>
                        <td>{{ $customer->heir_name ?? '' }}</td>
                    </tr>

                    <tr>
                      <td><b>{{ __('shop::app.customer.account.profile.heir-ic') }}<b></td>
                      <td>{{ $customer->heir_ic ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.heir-relation') }}<b></td>
                        <td>{{ $customer->heir_relation ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.heir-phone-no') }}<b></td>
                        <td>{{ $customer->heir_phone_no ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.referral') }}<b></td>
                        <td>{{ $countReferral ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.upline-name') }}<b></td>
                        <td>{{ $uplineDetails->first_name ?? '' }} {{ $uplineDetails->last_name ?? '' }}</td>
                    </tr>

                    <tr>
                        <td><b>{{ __('shop::app.customer.account.profile.upline-email') }}<b></td>
                        <td>{{ $uplineDetails->email ?? '' }}</td>
                    </tr>

                    {{-- @if ($customer->subscribed_to_news_letter == 1)
                        <tr>
                            <td> {{ __('shop::app.footer.subscribe-newsletter') }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ route('shop.unsubscribe', $customer->email) }}">{{ __('shop::app.subscription.unsubscribe') }} </a>
                            </td>
                        </tr>
                    @endif --}}
                </tbody>
            </table>
        </div>

        {{-- <accordian :title="'{{ __('shop::app.customer.account.profile.index.title') }}'" :active="true">
            <div slot="body">
                <div class="page-action">
                    <form method="POST" action="{{ route('customer.profile.destroy') }}">
                        @csrf
                        <input type="submit" class="btn btn-lg btn-primary mt-10" value="Delete">
                    </form>
                </div>

            </div>
        </accordian> --}}
        {{-- <accordian :title="'Referral'">
            <div slot="body">
                <div class="account-items-list">
                    <div class="account-table-content">

                        {!! app('Webkul\Shop\DataGrids\ReferralDataGrid')->render() !!}

                    </div>
                </div>
            </div>
        </accordian> --}}
        <accordian :title="'Account Balance'" :active="true">
            <div slot="body">
                    <div class="account-items-list">
                        <div class="account-table-content">

                            <div class="row mb-20">
                                <div class="account-balance-left ">
                                    &nbsp;<br>
                                    <span>Available Balance</span>
                                </div>
                                <div class="account-balance-right ">
                                    <img class="mobile-hide" src="https://gap.publicgold.com.my/assets/images/singlegoldbar.png" alt="" style="float:left;">
                                    <span class="font-weight-bold title-small" style="line-height:1.5em"><u>My Uncang Emas (gm)</u><br>
                                    {{$gold_balance==0 ? '0.0000' : $gold_balance}}</span>
                                </div>
                                <div class="account-balance-right">
                                    <img class="mobile-hide" src="https://gap.publicgold.com.my/assets/images/singlesilverbar.png" alt="" style="float:left;">
                                    <span class="font-weight-bold title-small" style="line-height:1.5em"><u>My Uncang Perak (gm)</u><br>
                                    {{$silver_balance==0 ? '0.0000' : $silver_balance}}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-20">
                                <h2>History</h2>
                            </div>

                            <div class="row ">
                                {!! app('Webkul\Shop\DataGrids\GapSapBalanceDataGrid')->render() !!}
                            </div>

                        </div>
                    </div>
            </div>
        </accordian>

        {{-- <accordian :title="'{{ __('shop::app.customer.account.profile.index.sap.title') }}'">
            <div slot="body">
                    <div class="account-items-list">
                        <div class="account-table-content">

                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    &nbsp;<br>
                                    <span>Available Balance</span>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <img class="mobile-hide" src="https://gap.publicgold.com.my/assets/images/singlesilverbar.png" alt="" style="float:left;">
                                    <span class="font-weight-bold title-small" style="line-height:1.5em"><u>SAP (gm)</u><br>
                                    0.0000</span>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
        </accordian> --}}

        {{-- <accordian :title="'History'">
            <div slot="body">
                    <div class="account-items-list">
                        <div class="account-table-content">

                        </div>
                    </div>
            </div>
        </accordian> --}}

         {!! view_render_event('bagisto.shop.customers.account.profile.view.after', ['customer' => $customer]) !!}
    </div>
</div>
@endsection
