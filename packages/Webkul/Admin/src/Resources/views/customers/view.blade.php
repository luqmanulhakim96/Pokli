@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.customers.customers.view-title') }}
@stop

@section('content')
<div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>
                    <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                    {{ __('admin::app.customers.customers.title') }}
                </h1>
            </div>
        </div>

        <div class="page-content">

            <div class="form-container">

                <accordian :title="'{{ __('admin::app.account.general') }}'" :active="true">
                    <div slot="body">
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

                          </tbody>
                      </table>
                    </div>
                </accordian>

            </div>
        </div>
</div>
@endsection
