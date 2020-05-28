@extends('gapsap::layouts.master')

@section('page_title')
    Purchase MYUncang Emas / MYUncang Perak
@endsection


@section('content-wrapper')
    <purchase></purchase>
@endsection

@push('scripts')
    <script type="text/x-template" id="purchase-template">
        <section id="purchase" class="review">
            <div class="title">
                {{ __('gapsap::app.purchase.form-title') }}
            </div>
            <div class="review-layouter mt-30">

                @include('gapsap::gap.product-info')
                <form class="purchase-form" data-vv-scope="purchase-form">
                    <div class="review-form" v-show="current_step == 1" id="form-one-section">
                        <div class="gap-sap-container">
                            <div class="row">
                                <div class="control-group" :class="[errors.has('product_type') ? 'has-error' : '']">
                                    <label for="product_type" class="required">{{ __('gapsap::app.purchase.product-type') }}</label>
                                    <select name="product_type" class="control" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.product-type') }}&quot;">
                                        <option value="">Please Select Product Type</option>
                                        <option value="gap">Gold - MYUncang Emas</option>
                                        <option value="sap">Silver - MYUncang Perak</option>
                                    </select>
                                    <span class="control-error" v-if="errors.has('product_type')">@{{ errors.first('product_type') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                                    <label for="first_name" class="required">{{ __('gapsap::app.purchase.form-customer-name') }}</label>
                                    <input type="text" class="control" name="first_name" value="{{ old('first_name') ?? $customer->first_name." ".$customer->last_name }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-customer-name') }}&quot;" disabled="disabled">
                                    <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="control-group" :class="[errors.has('mode_of_payment') ? 'has-error' : '']">
                                    <label for="mode_of_payment" class="required">{{ __('gapsap::app.purchase.form-mode-of-payment') }}</label>

                                    <select name="mode_of_payment" class="control" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-mode-of-payment') }}&quot;">
                                        <option value="">Please Select Payment Method</option>
                                        <option value="fpx">FPX</option>
                                        <!-- <option value="bankin">Bank In</option> -->
                                    </select>
                                    <span class="control-error" v-if="errors.has('mode_of_payment')">@{{ errors.first('mode_of_payment') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="control-group"  :class="[errors.has('date_of_payment') ? 'has-error' : '']">
                                    <label for="date_of_payment" class="required">{{ __('gapsap::app.purchase.form-payment-date') }}</label>
                                    <input type="date" class="control" name="date_of_payment" value="{{ old('date_of_payment') ?? $customer->date_of_payment }}" v-validate="" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;">
                                    <span class="control-error" v-if="errors.has('date_of_payment')">@{{ errors.first('date_of_payment') }}</span>
                                </div>
                            </div>
                            <div class="row">
                            <div class="button-group">
                                <button type="button" :class="[current_step == 1 ? 'btn btn-lg btn-default' : 'btn btn-lg btn-primary']" :disabled="disable_button"  id="back-button">
                                    Back
                                </button>
                            </div>
                            <div class="button-group">
                                    <button type="button" class="btn btn-lg btn-primary" @click="validateForm('purchase-form')" id="next-button">
                                        Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="review-form" v-show="current_step == 2" id="form-one-section">
                    <div class="gap-sap-container">
                        <div class="row">
                            <div class="control-group" :class="[errors.has('product_type') ? 'has-error' : '']">
                                <label for="product_type" class="required">{{ __('gapsap::app.purchase.product-type') }}</label>
                                <select name="product_type" class="control" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.product-type') }}&quot;">
                                    <option value="">Please Select Product Type</option>
                                    <option value="gap">Gold - MYUncang Emas</option>
                                    <option value="sap">Silver - MYUncang Perak</option>
                                </select>
                                <span class="control-error" v-if="errors.has('product_type')">@{{ errors.first('product_type') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                                <label for="first_name" class="required">{{ __('gapsap::app.purchase.form-customer-name') }}</label>
                                <input type="text" class="control" name="first_name" value="{{ old('first_name') ?? $customer->first_name." ".$customer->last_name }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-customer-name') }}&quot;" disabled="disabled">
                                <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group" :class="[errors.has('purchase_amount') ? 'has-error' : '']">
                                <label for="purchase_amount" class="required">Purchase Amount</label>

                                <input type="text" v-validate="'numeric|min:0'" name="" class="control" value="" data-vv-as="&quot;{{ ('gapsap::app.purchase.form-customer-name') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('purchase_amount')">@{{ errors.first('purchase_amount') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="control-group"  :class="[errors.has('date_of_payment') ? 'has-error' : '']">
                                <label for="date_of_payment" class="required">Purchase Quantity</label>
                                <input type="number" v-validate="'numeric|min:0'" name="" class="control" value="" data-vv-as="&quot;{{ ('gapsap::app.purchase.form-customer-name') }}&quot;"/>
                                <span class="control-error" v-if="errors.has('purchase_amount')">@{{ errors.first('purchase_amount') }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="button-group">
                                <button type="button" class="btn btn-lg btn-primary" @click="validateForm('back-form')" id="back-button">
                                    Back
                                </button>
                            </div>
                            <div class="button-group">
                                <button type="button" class="btn btn-lg btn-primary" id="next-button">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </script>

    <script>
        var paymentTemplateRenderFns = [];

        Vue.component('purchase', {
            template: '#purchase-template',
            inject: ['$validator'],

            data: function() {
                return {
                    current_step: 1,
                    disable_button: true,
                }
            },

            methods: {
                validateForm: function(scope) {
                    var this_this = this;

                    this.$validator.validateAll(scope).then(function (result) {
                        if (result) {
                            if (scope == 'purchase-form') {
                                this_this.validateStepOne();
                            }
                            else if (scope == 'back-form') {
                                this_this.backToStepOne();
                            }
                        }
                    });
                },

                validateStepOne: function() {
                    var this_this = this;

                    // this.current_step = 2;
                    this.$http.post("{{ route('gapsap.stepOne') }}")
                    .then(function(response) {
                        this_this.disable_button = false;

                        this_this.current_step = 2;
                    })
                    .catch(function (error) {
                        this_this.disable_button = false;

                        this_this.handleErrorResponse(error.response, 'payment-form')
                    });
                },
                backToStepOne: function() {
                    var this_this = this;

                    this.current_step = 1;
                },

            },


        })

        var paymentTemplateRenderFns = [];

        Vue.component('payment-section', {
            inject: ['$validator'],

            data: function() {
                return {
                    templateRender: null,

                    payment: {
                        method: ""
                    },

                    first_iteration : true,
                }
            },


        })
    </script>
@endpush
