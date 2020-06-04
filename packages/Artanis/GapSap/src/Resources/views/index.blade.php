@extends('gapsap::layouts.master')

@section('page_title')
    Purchase MYUncang Emas / MYUncang Perak
@endsection


@section('content-wrapper')
    <div class="auth-content">
        <div class="sign-up-text">
            Purchase MYUncang Emas / MYUncang Perak
        </div>

        <form method="POST" action="{{ route('gapsap.form') }}" @submit.prevent="onSubmit">
            {{ csrf_field() }}
            <div class="login-form">
                {{-- <div class="login-text">{{ __('shop::app.customer.login-form.title') }}</div> --}}

                <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                    <label for="first_name" class="required">{{ __('gapsap::app.purchase.form-customer-name') }}</label>
                    <input type="text" class="control" name="first_name" value="{{ old('first_name') ?? $customer->first_name." ".$customer->last_name }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-customer-name') }}&quot;" disabled="disabled">
                    <input  type="hidden" class="control" name="first_name" value="{{ old('first_name') ?? $customer->first_name." ".$customer->last_name }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-customer-name') }}&quot;">
                    <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                </div>

                <div class="control-group" :class="[errors.has('mode_of_payment') ? 'has-error' : '']">
                    <label for="mode_of_payment" class="required">{{ __('gapsap::app.purchase.form-mode-of-payment') }}</label>

                    <select id="mode_of_payment" name="mode_of_payment" class="control" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-mode-of-payment') }}&quot;">
                        <option value="">Please Select Payment Method</option>
                        <option value="fpx">FPX</option>
                        <option value="bankin">Bank In</option>
                    </select>
                    <span class="control-error" v-if="errors.has('mode_of_payment')">@{{ errors.first('mode_of_payment') }}</span>
                </div>

                <div class="details" style="display:none">HIDDEN CONTENT
                <div id="date_of_payment_container" class="control-group"  :class="[errors.has('payment_on') ? 'has-error' : '']" style="display:none">
                    <label for="payment_on" class="required">{{ __('gapsap::app.purchase.form-payment-date') }}</label>
                    {{-- <input id="payment_on" type="date" class="control" name="payment_on" value="{{ old('payment_on') }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;"> --}}
                    <div class='input-group date' id='payment_on'>
                        <input type='hidden' class="form-control" name="payment_on" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                     </div>
                    <span class="control-error" v-if="errors.has('payment_on')">@{{ errors.first('payment_on') }}</span>
                </div>
              </div>

                {{-- <div class="control-group"  :class="[errors.has('payment_on') ? 'has-error' : '']">
                    <datetime>
                        <label for="payment_on" class="required">{{ __('gapsap::app.purchase.form-payment-date') }}</label>
                        <input id="payment_on" type="text" class="control" name="payment_on" value="{{ old('payment_on') ?? $customer->payment_on }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;">
                        <span class="control-error" v-if="errors.has('payment_on')">@{{ errors.first('payment_on') }}</span>
                    </datetime>
                </div> --}}

                <input class="btn btn-primary btn-lg" type="submit" value="Next">
            </div>
        </form>

    </div>
@endsection

@push('css')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@endpush

@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script> --}}

    <script type="text/javascript">
        $(function () {
            $('#payment_on').datetimepicker({
                useCurrent: true,
                defaultDate: new Date(),
                // showTodayButton: true,
                format: "DD-MM-YYYY HH:mm:ss",
                maxDate: new Date(),

            });
        });

        $(function () {

            $("#date_of_payment_container").hide();
            $("#mode_of_payment").on( "change", function() {
                var mode_of_payment = $("#mode_of_payment").val();
                if(mode_of_payment == 'fpx') {
                    $("#date_of_payment_container").hide();
                    $("#payment_on").prop( "disabled", true );
                }
                else if(mode_of_payment == 'bankin') {
                    $("#date_of_payment_container").show();
                    $("#payment_on").prop( "disabled", false );
                }
            });
        });
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

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
                                        <option value="bankin">Bank In</option>
                                    </select>
                                    <span class="control-error" v-if="errors.has('mode_of_payment')">@{{ errors.first('mode_of_payment') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="control-group"  :class="[errors.has('payment_on') ? 'has-error' : '']">
                                    <label for="payment_on" class="required">{{ __('gapsap::app.purchase.form-payment-date') }}</label>
                                    <input type="date" class="control" name="payment_on" value="{{ old('payment_on') ?? $customer->payment_on }}" v-validate="" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;">
                                    <span class="control-error" v-if="errors.has('payment_on')">@{{ errors.first('payment_on') }}</span>
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
                                    <option value="sap">Silver - MYUncange Perak</option>
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
                            <div class="control-group"  :class="[errors.has('payment_on') ? 'has-error' : '']">
                                <label for="payment_on" class="required">Purchase Quantity</label>
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
                    this.$http.post("{{ route('gapsap.form') }}")
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
