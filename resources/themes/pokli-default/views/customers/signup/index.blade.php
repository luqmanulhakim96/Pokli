@extends('shop::layouts.master')
@section('page_title')
    {{ __('shop::app.customer.signup-form.page-title') }}
@endsection
@section('content-wrapper')

<div class="auth-content">

    <div class="sign-up-text">
        {{ __('shop::app.customer.signup-text.account_exists') }} - <a href="{{ route('customer.session.index') }}">{{ __('shop::app.customer.signup-text.title') }}</a>
    </div>

    {!! view_render_event('bagisto.shop.customers.signup.before') !!}

    <form method="post" action="{{ route('customer.register.create') }}" @submit.prevent="onSubmit">

        {{ csrf_field() }}

        <div class="login-form">
            <div class="login-text">{{ __('shop::app.customer.signup-form.title') }}</div>

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.before') !!}

            <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                <label for="first_name" class="required">{{ __('shop::app.customer.signup-form.firstname') }}</label>
                <input type="text" class="control" name="first_name" v-validate="'required'" value="{{ old('first_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.firstname') }}&quot;">
                <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('last_name') ? 'has-error' : '']">
                <label for="last_name" class="required">{{ __('shop::app.customer.signup-form.lastname') }}</label>
                <input type="text" class="control" name="last_name" v-validate="'required'" value="{{ old('last_name') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.lastname') }}&quot;">
                <span class="control-error" v-if="errors.has('last_name')">@{{ errors.first('last_name') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('email') ? 'has-error' : '']">
                <label for="email" class="required">{{ __('shop::app.customer.signup-form.email') }}</label>
                <input type="email" class="control" name="email" v-validate="'required|email'" value="{{ old('email') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.email') }}&quot;">
                <span class="control-error" v-if="errors.has('email')">@{{ errors.first('email') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('password') ? 'has-error' : '']">
                <label for="password" class="required">{{ __('shop::app.customer.signup-form.password') }}</label>
                <input type="password" class="control" name="password" v-validate="'required|min:6'" ref="password" value="{{ old('password') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.password') }}&quot;">
                <span class="control-error" v-if="errors.has('password')">@{{ errors.first('password') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('password_confirmation') ? 'has-error' : '']">
                <label for="password_confirmation" class="required">{{ __('shop::app.customer.signup-form.confirm_pass') }}</label>
                <input type="password" class="control" name="password_confirmation"  v-validate="'required|min:6|confirmed:password'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.confirm_pass') }}&quot;">
                <span class="control-error" v-if="errors.has('password_confirmation')">@{{ errors.first('password_confirmation') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('referral_email') ? 'has-error' : '']">
                <label for="referral_email" class="">{{ __('shop::app.customer.signup-form.referral-code') }}</label>
                <input type="email" class="control" name="referral_email" v-validate="'email'" value="{{ old('referral_email') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.referral-code') }}&quot;">
                <span class="control-error" v-if="errors.has('referral_email')">@{{ errors.first('referral_email') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('ic') ? 'has-error' : '']">
                <label for="ic" class="required">{{ __('shop::app.customer.signup-form.ic') }}</label>
                <input id="ic" type="text" class="control" name="ic" v-validate="'required|numeric|min:12|max:12'" value="{{ old('ic') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.ic') }}&quot;">
                <span class="control-error" v-if="errors.has('ic')">@{{ errors.first('ic') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('bank_name') ? 'has-error' : '']">
                <label for="bank_name" class="required">{{ __('shop::app.customer.signup-form.bank-name') }}</label>
                <select name="bank_name" class="control" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.bank-name') }}&quot;">
                  <option value="">-</option>
                  <option value="Affin Bank" >Affin Bank</option>
                  <option value="Agrobank" >Agrobank</option>
                  <option value="Alliance Bank Malaysia">Alliance Bank Malaysia</option>
                  <option value="AmBank">AmBank</option>
                  <option value="Bank Islam Malaysia" >Bank Islam Malaysia</option>
                  <option value="Bank Muamalat Malaysia Berhad" >Bank Muamalat Malaysia Berhad</option>
                  <option value="Bank Rakyat" >Bank Rakyat</option>
                  <option value="Bank Simpanan Nasional (BSN)" >Bank Simpanan Nasional (BSN)</option>
                  <option value="CIMB Bank">CIMB Bank</option>
                  <option value="Citibank" >Citibank</option>
                  <option value="HSBC Bank" >HSBC Bank</option>
                  <option value="Hong Leong Bank" >Hong Leong Bank</option>
                  <option value="Public Bank" >Public Bank</option>
                  <option value="RHB Bank">RHB Bank</option>
                </select>
                <span class="control-error" v-if="errors.has('bank_name')">@{{ errors.first('bank_name') }}</span>
            </div>

            <div class="control-group" :class="[errors.has('bank_no') ? 'has-error' : '']">
                <label for="bank_no" class="required">{{ __('shop::app.customer.signup-form.bank-no') }}</label>
                <input type="bank_no" class="control" name="bank_no" v-validate="'required|numeric'" value="{{ old('bank_no') }}" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.bank-no') }}&quot;">
                <span class="control-error" v-if="errors.has('bank_no')">@{{ errors.first('bank_no') }}</span>
            </div>

            {{-- <div class="signup-confirm" :class="[errors.has('agreement') ? 'has-error' : '']">
                <span class="checkbox">
                    <input type="checkbox" id="checkbox2" name="agreement" v-validate="'required'">
                    <label class="checkbox-view" for="checkbox2"></label>
                    <span>{{ __('shop::app.customer.signup-form.agree') }}
                        <a href="">{{ __('shop::app.customer.signup-form.terms') }}</a> & <a href="">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.
                    </span>
                </span>
                <span class="control-error" v-if="errors.has('agreement')">@{{ errors.first('agreement') }}</span>
            </div> --}}

            {!! view_render_event('bagisto.shop.customers.signup_form_controls.after') !!}

            {{-- <div class="control-group" :class="[errors.has('agreement') ? 'has-error' : '']">

                <input type="checkbox" id="checkbox2" name="agreement" v-validate="'required'" data-vv-as="&quot;{{ __('shop::app.customer.signup-form.agreement') }}&quot;">
                <span>{{ __('shop::app.customer.signup-form.agree') }}
                    <a href="">{{ __('shop::app.customer.signup-form.terms') }}</a> & <a href="">{{ __('shop::app.customer.signup-form.conditions') }}</a> {{ __('shop::app.customer.signup-form.using') }}.
                </span>
                <span class="control-error" v-if="errors.has('agreement')">@{{ errors.first('agreement') }}</span>
            </div> --}}

            <button class="btn btn-primary btn-lg" type="submit">
                {{ __('shop::app.customer.signup-form.button_title') }}
            </button>

        </div>
    </form>

    {!! view_render_event('bagisto.shop.customers.signup.after') !!}
</div>
@endsection
