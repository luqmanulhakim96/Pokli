@extends('shop::layouts.master')

@section('page_title')
    {{ __('shop::app.customer.account.profile.edit-profile.page-title') }}
@endsection

@section('content-wrapper')
    <div class="account-content">

        @include('shop::customers.account.partials.sidemenu')

        <div class="account-layout">

            <div class="account-head mb-10">
                <span class="back-icon"><a href="{{ route('customer.account.index') }}"><i class="icon icon-menu-back"></i></a></span>

                <span class="account-heading">{{ __('shop::app.customer.account.profile.edit-profile.title') }}</span>

                <span></span>
            </div>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit.before', ['customer' => $customer]) !!}

            <form method="post" action="{{ route('customer.profile.edit') }}" @submit.prevent="onSubmit">

                <div class="edit-form">
                    @csrf

                    {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.before', ['customer' => $customer]) !!}

                    <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                        <label for="first_name" class="required">{{ __('shop::app.customer.account.profile.fname') }}</label>

                        <input type="text" class="control" name="first_name" value="{{ old('first_name') ?? $customer->first_name }}" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.fname') }}&quot;">
                        <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                        <label for="last_name" class="required">{{ __('shop::app.customer.account.profile.lname') }}</label>

                        <input type="text" class="control" name="last_name" value="{{ old('last_name') ?? $customer->last_name }}" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.lname') }}&quot;">
                        <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('gender') ? 'has-error' : '']">
                        <label for="gender" class="required">{{ __('shop::app.customer.account.profile.gender') }}</label>

                        <select name="gender" class="control" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.gender') }}&quot;">
                            <option value=""  @if ($customer->gender == "") selected @endif></option>
                          {{-- <option value="Other"  @if ($customer->gender == "Other") selected @endif>Other</option> --}}
                            <option value="Male"  @if ($customer->gender == "Male") selected @endif>Male</option>
                            <option value="Female" @if ($customer->gender == "Female") selected @endif>Female</option>
                        </select>
                        <span class="control-error" v-if="errors.has('gender')">@{{ errors.first('gender') }}</span>
                    </div>

                    <div class="control-group"  :class="[errors.has('date_of_birth') ? 'has-error' : '']">
                        <label for="date_of_birth">{{ __('shop::app.customer.account.profile.dob') }}</label>
                        <input type="date" class="control" name="date_of_birth" value="{{ old('date_of_birth') ?? $customer->date_of_birth }}" v-validate="" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.dob') }}&quot;">
                        <span class="control-error" v-if="errors.has('date_of_birth')">@{{ errors.first('date_of_birth') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('job_description') ? 'has-error' : '']">
                        <label for="phone" class="">{{ __('shop::app.customer.account.profile.phone') }}</label>
                        <input type="text" class="control" name="phone" v-validate="'numeric'" value="{{ old('phone') ?? $customer->phone }}" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.phone') }}&quot;">
                        <span class="control-error" v-if="errors.has('phone')">@{{ errors.first('phone') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('ic') ? 'has-error' : '']">
                        @if($customer->ic)
                            <label for="ic" class="">{{ __('shop::app.customer.account.profile.ic') }}</label>
                            <input type="text" class="control" name="ic" value="{{ old('ic') ?? $customer->ic }}" v-validate="'required|numeric|min:12|max:12'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.ic') }}&quot;" disabled="disabled">
                        @else
                            <label for="ic" class="required">{{ __('shop::app.customer.account.profile.ic') }}</label>
                            <input type="text" class="control" name="ic" value="{{ old('ic') ?? $customer->ic }}" v-validate="'required|numeric|min:12|max:12'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.ic') }}&quot;">
                        @endif
                        <span class="control-error" v-if="errors.has('ic')">@{{ errors.first('ic') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('bank_name') ? 'has-error' : '']">
                        <label for="bank_name" class="">{{ __('shop::app.customer.account.profile.bank-name') }}</label>
                        <select name="bank_name" class="control" v-validate="''" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.bank-name') }}&quot;">
                            <option value="Affin Bank" @if ($customer->bank_name == "Affin Bank") selected @endif>Affin Bank</option>
                            <option value="Agrobank" @if ($customer->bank_name == "Agrobank") selected @endif>Agrobank</option>
                            <option value="Alliance Bank Malaysia" @if ($customer->bank_name == "Alliance Bank Malaysia") selected @endif>Alliance Bank Malaysia</option>
                            <option value="AmBank" @if ($customer->bank_name == "AmBank") selected @endif>AmBank</option>
                            <option value="Bank Islam Malaysia" @if ($customer->bank_name == "Bank Islam Malaysia") selected @endif>Bank Islam Malaysia</option>
                            <option value="Bank Muamalat Malaysia Berhad" @if ($customer->bank_name == "Bank Muamalat Malaysia Berhad") selected @endif>Bank Muamalat Malaysia Berhad</option>
                            <option value="Bank Rakyat" @if ($customer->bank_name == "Bank Rakyat") selected @endif>Bank Rakyat</option>
                            <option value="Bank Simpanan Nasional (BSN)" @if ($customer->bank_name == "Bank Simpanan Nasional (BSN)") selected @endif>Bank Simpanan Nasional (BSN)</option>
                            <option value="CIMB Bank" @if ($customer->bank_name == "CIMB Bank") selected @endif>CIMB Bank</option>
                            <option value="Citibank" @if ($customer->bank_name == "Citibank") selected @endif>Citibank</option>
                            <option value="HSBC Bank" @if ($customer->bank_name == "HSBC Bank") selected @endif>HSBC Bank</option>
                            <option value="Hong Leong Bank" @if ($customer->bank_name == "Hong Leong Bank") selected @endif>Hong Leong Bank</option>
                            <option value="Public Bank" @if ($customer->bank_name == "Public Bank") selected @endif>Public Bank</option>
                            <option value="RHB Bank" @if ($customer->bank_name == "RHB Bank") selected @endif>RHB Bank</option>
                        </select>
                        <span class="control-error" v-if="errors.has('bank_name')">@{{ errors.first('bank_name') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('bank_no') ? 'has-error' : '']">
                        <label for="bank_no" class="">{{ __('shop::app.customer.account.profile.bank-no') }}</label>
                        <input type="bank_no" class="control" name="bank_no" v-validate="'numeric'" value="{{ old('bank_no') ?? $customer->bank_no }}" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.bank-no') }}&quot;">
                        <span class="control-error" v-if="errors.has('bank_no')">@{{ errors.first('bank_no') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('branch') ? 'has-error' : '']">
                        <label for="branch" class="">{{ __('shop::app.customer.account.profile.branch-name') }}</label>
                        <select name="branch" class="control" v-validate="''" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.branch-name') }}&quot;">
                            <option value="seremban" @if ($customer->branch == "seremban") selected @endif>Seremban</option>
                        </select>
                        <span class="control-error" v-if="errors.has('bank_name')">@{{ errors.first('bank_name') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('job_description') ? 'has-error' : '']">
                        <label for="job_description" class="">{{ __('shop::app.customer.account.profile.job-description') }}</label>
                        <input type="text" class="control" name="job_description" v-validate="''" value="{{ old('job_description') ?? $customer->job_description }}" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.job-description') }}&quot;">
                        <span class="control-error" v-if="errors.has('job_description')">@{{ errors.first('job_description') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('heir_name') ? 'has-error' : '']">
                        <label for="heir_name" class="">{{ __('shop::app.customer.account.profile.heir-name') }}</label>
                        <input type="text" class="control" name="heir_name" v-validate="''" value="{{ old('heir_name') ?? $customer->heir_name }}" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.heir-name') }}&quot;">
                        <span class="control-error" v-if="errors.has('heir_name')">@{{ errors.first('heir_name') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('heir_ic') ? 'has-error' : '']">
                        <label for="heir_ic" class="">{{ __('shop::app.customer.account.profile.heir-ic') }}</label>
                        <input type="text" class="control" name="heir_ic" v-validate="''" value="{{ old('heir_name') ?? $customer->heir_ic }}" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.heir-ic') }}&quot;">
                        <span class="control-error" v-if="errors.has('heir_ic')">@{{ errors.first('heir_ic') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('heir_relation') ? 'has-error' : '']">
                        <label for="heir_relation" class="">{{ __('shop::app.customer.account.profile.heir-relation') }}</label>
                        <select name="heir_relation" class="control" v-validate="''" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.heir-relation') }}&quot;">
                            <option value="">-</option>
                            <option value="Grandfather/Grandmother" @if ($customer->heir_relation == "Grandfather/Grandmother") selected @endif>Grandfather/Grandmother</option>
                            <option value="Father/Mother" @if ($customer->heir_relation == "Father/Mother") selected @endif>Father/Mother</option>
                            <option value="Son/Daughter" @if ($customer->heir_relation == "Son/Daughter") selected @endif>Son/Daughter</option>
                            <option value="Siblings" @if ($customer->heir_relation == "Siblings") selected @endif>Siblings</option>
                            <option value="Grandchild" @if ($customer->heir_relation == "Grandchild") selected @endif>Grandchild</option>
                        </select>
                        <span class="control-error" v-if="errors.has('heir_relation')">@{{ errors.first('heir_relation') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('heir_phone_no') ? 'has-error' : '']">
                        <label for="heir_phone_no" class="">{{ __('shop::app.customer.account.profile.heir-phone-no') }}</label>
                        <input type="text" class="control" name="heir_phone_no" v-validate="'numeric|min:10|max:13'" value="{{ old('heir_phone_no') ?? $customer->heir_phone_no }}" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.heir-phone-no') }}&quot;">
                        <span class="control-error" v-if="errors.has('heir_phone_no')">@{{ errors.first('heir_phone_no') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                        <label for="email" class="required">{{ __('shop::app.customer.account.profile.email') }}</label>
                        <input type="email" class="control" name="email" value="{{ old('email') ?? $customer->email }}" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.email') }}&quot;">
                        <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('oldpassword') ? 'has-error' : '']">
                        <label for="password">{{ __('shop::app.customer.account.profile.opassword') }}</label>
                        <input type="password" class="control" name="oldpassword" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.opassword') }}&quot;" v-validate="'min:6'">
                        <span class="control-error" v-if="errors.has('oldpassword')">@{{ errors.first('oldpassword') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                        <label for="password">{{ __('shop::app.customer.account.profile.password') }}</label>

                        <input type="password" id="password" class="control" name="password" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.password') }}&quot;" v-validate="'min:6'">
                        <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
                    </div>

                    <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                        <label for="password">{{ __('shop::app.customer.account.profile.cpassword') }}</label>

                        <input type="password" id="password_confirmation" class="control" name="password_confirmation" data-vv-as="&quot;{{ __('shop::app.customer.account.profile.cpassword') }}&quot;" v-validate="'min:6|confirmed:password'">
                        <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
                    </div>

                    {!! view_render_event('bagisto.shop.customers.account.profile.edit_form_controls.after', ['customer' => $customer]) !!}

                    <div class="button-group">
                        <input class="btn btn-primary btn-lg" type="submit" value="{{ __('shop::app.customer.account.profile.submit') }}">
                    </div>
                </div>

            </form>

            {!! view_render_event('bagisto.shop.customers.account.profile.edit.after', ['customer' => $customer]) !!}

        </div>

    </div>
@endsection
