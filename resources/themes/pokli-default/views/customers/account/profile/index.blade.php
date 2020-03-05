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

        <div class="account-table-content">
            <table style="color: #5E5E5E;">
                <tbody>
                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.fname') }}</td></b>
                        <td>{{ $customer->first_name ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.lname') }}</td></b>
                        <td>{{ $customer->last_name ?? '' }}</td>
                    </tr>

                    <tr>
                      <b>  <td>{{ __('shop::app.customer.account.profile.gender') }}</td></b>
                        <td>{{ $customer->gender ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.dob') }}</td></b>
                        <td>{{ $customer->date_of_birth ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.email') }}</td></b>
                        <td>{{ $customer->email ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.phone') }}</td></b>
                        <td>{{ $customer->phone ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.ic') }}</td></b>
                        <td>{{ $customer->ic ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.bank-name') }}</td></b>
                        <td>{{ $customer->bank_name ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.bank-no') }}</td></b>
                        <td>{{ $customer->bank_no ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.job-description') }}</td></b>
                        <td>{{ $customer->job_description ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.heir-name') }}</td></b>
                        <td>{{ $customer->heir_name ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.heir-relation') }}</td></b>
                        <td>{{ $customer->heir_relation ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.heir-phone-no') }}</td></b>
                        <td>{{ $customer->heir_phone_no ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.referral') }}</td></b>
                        <td>{{ $countReferral ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.upline-name') }}</td></b>
                        <td>{{ $uplineDetails->first_name ?? '' }} {{ $uplineDetails->last_name ?? '' }}</td>
                    </tr>

                    <tr>
                        <b><td>{{ __('shop::app.customer.account.profile.upline-email') }}</td></b>
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
                                    <span class="font-weight-bold title-small" style="line-height:1.5em"><u>GAP (gm)</u><br>
                                    {{$gold_balance==0 ? '0.0000' : $gold_balance}}</span>
                                </div>
                                <div class="account-balance-right">
                                    <img class="mobile-hide" src="https://gap.publicgold.com.my/assets/images/singlesilverbar.png" alt="" style="float:left;">
                                    <span class="font-weight-bold title-small" style="line-height:1.5em"><u>SAP (gm)</u><br>
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
