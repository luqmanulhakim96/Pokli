@extends('gapsap::layouts.master')

@section('page_title')
    Purchase GAP/SAP
@endsection


@section('content-wrapper')
<div class="auth-content">
        <div class="sign-up-text">
            Purchase GAP/SAP
        </div>

        <form method="POST" action="{{ route('gapsap.form-submit') }}" @submit.prevent="onSubmit">
            {{ csrf_field() }}
            <div class="login-form">
                {{-- <div class="login-text">{{ __('shop::app.customer.login-form.title') }}</div> --}}

                <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                    <label for="first_name" class="">{{ __('gapsap::app.purchase.form-customer-name') }}</label>
                    <input type="text" class="control" name="first_name" value="{{ old('first_name') ?? $input['first_name'] }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-customer-name') }}&quot;" disabled="disabled">
                    <span class="control-error" v-if="errors.has('first_name')">@{{ errors.first('first_name') }}</span>
                </div>

                {{-- <div class="control-group" :class="[errors.has('product_type') ? 'has-error' : '']">
                    <div class="control-group"  :class="[errors.has('product_type') ? 'has-error' : '']">
                        <label for="product_type" class="required">Product Type</label>
                        <input type="number" v-validate="'numeric|min:0'" name="" class="control" value="" data-vv-as="&quot;{{ ('gapsap::app.purchase.form-customer-name') }}&quot;"/>
                        <span class="control-error" v-if="errors.has('product_type')">@{{ errors.first('product_type') }}</span>
                    </div>
                </div> --}}
                
                <div class="control-group" :class="[errors.has('product_type') ? 'has-error' : '']">
                    <label for="product_type" class="required">Product Type</label>
                    <div class="col-md-3">
                        <div id="gap-control" class="" style="padding:10px;">
                            <input name="product_type" id="gap-select" type="radio" value="1" v-validate="'required'" data-vv-as="&quot;Product Type&quot;"> <strong>Gold - GAP</strong> (Au 999.9)<br><br>
                            <input id="gappricepergram" type="hidden" value="207">
                            <span>MYR 100 = 0.4831 gm</span>
                            <br>
                            <span>MYR 207 = 1.0000 gm</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="sap-control" class="" style="padding:10px;">
                                <input name="product_type" id="sap-select" type="radio" value="2" v-validate="'required'" data-vv-as="&quot;Product Type&quot;"> <strong>Silver - SAP</strong> (Ag 999)<br><br>
                            <input id="sappricepergram" type="hidden" value="274">
                            <span>MYR 100 = 36.4964 gm</span>
                            <br>
                            <span>MYR 274 = 100.0000 gm</span>
                        </div>
                        
                    </div>
                    <span class="control-error" v-if="errors.has('product_type')">@{{ errors.first('product_type') }}</span>
                </div>

                
                <div class="control-group"  :class="[errors.has('purchase_amount') ? 'has-error' : '']">
                    <label for="purchase_amount" class="required">Purchase Amount</label>
                    {{-- <input id="purchase_amount" type="number" step="any" min="100" v-validate="'decimal:2|min_value:100|required'" name="purchase_amount" class="control" value="" data-vv-as="&quot;Purchase Amount&quot;"/>
                    <span class="control-error" v-if="errors.has('purchase_amount')">@{{ errors.first('purchase_amount') }}</span> --}}

                    <div class="input-group">
                        <div class="input-group-icon">RM</div>
                        <div class="input-group-area">
                            <input id="purchase_amount" type="number" step="any" min="100" v-validate="'decimal:2|min_value:100|required'" name="purchase_amount" class="" value="" data-vv-as="&quot;Purchase Amount&quot;"/>
                        </div>
                    </div>
                    <span class="control-error" v-if="errors.has('purchase_amount')">@{{ errors.first('purchase_amount') }}</span>
                </div>
                

                
                <div class="control-group"  :class="[errors.has('purchase_quantity') ? 'has-error' : '']">
                    <label for="purchase_quantity" class="required">Purchase Quantity</label>
                    {{-- <input id="purchase_quantity" type="number" step="any" v-validate="'decimal:4|min_value:0|required'" name="purchase_quantity" class="control" value="" data-vv-as="&quot;Purchase Quantity&quot;"/>
                    <span class="control-error" v-if="errors.has('purchase_quantity')">@{{ errors.first('purchase_quantity') }}</span> --}}

                    <div class="input-group">
                        <div class="input-group-area">
                            <input id="purchase_quantity" type="number" step="any" v-validate="'decimal:4|min_value:0|required'" name="purchase_quantity" class="" value="" data-vv-as="&quot;Purchase Quantity&quot;"/>
                            
                        </div>
                        <div class="input-group-icon">gm</div>
                    </div>
                    <span class="control-error" v-if="errors.has('purchase_quantity')">@{{ errors.first('purchase_quantity') }}</span>
                </div>
                
                <div class="control-group" :class="[errors.has('mode_of_payment') ? 'has-error' : '']">
                    <label for="mode_of_payment" class="required">{{ __('gapsap::app.purchase.form-mode-of-payment') }}</label>

                    <select disabled="disabled" id="mode_of_payment" name="mode_of_payment" class="control" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-mode-of-payment') }}&quot;">
                        <option  value="{{ old('mode_of_payment') ?? $input['mode_of_payment'] }}">{{ old('mode_of_payment') ?? ($input['mode_of_payment'] == 'fpx' ? 'FPX' : 'Bank In')  }}</option>
                    </select>
                    <span class="control-error" v-if="errors.has('mode_of_payment')">@{{ errors.first('mode_of_payment') }}</span>
                </div>

                @if($input['mode_of_payment']=='bankin')
                <div class="control-group"  :class="[errors.has('date_of_payment') ? 'has-error' : '']">
                    <label for="date_of_payment" class="required">{{ __('gapsap::app.purchase.form-payment-date') }}</label>
                    <input type="date" class="control" name="date_of_payment" value="{{ old('date_of_payment') ?? $input['date_of_payment'] }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;" disabled="disabled">
                    <input type="hidden" class="control" name="date_of_payment" value="{{ old('date_of_payment') ?? $input['date_of_payment'] }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;">
                    <span class="control-error" v-if="errors.has('date_of_payment')">@{{ errors.first('date_of_payment') }}</span>
                </div>
                <div class="control-group"  :class="[errors.has('attachment_bankin') ? 'has-error' : '']">
                    <label for="attachment_bankin" class="required">Attachment</label>
                    <input type="text" class="control" name="attachment_bankin" value="Attachment" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;" disabled="disabled">
                    <input type="hidden" class="control" name="attachment_bankin" value="Attachment" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;">
                    <span class="control-error" v-if="errors.has('attachment_bankin')">@{{ errors.first('attachment_bankin') }}</span>
                </div>
                @endif

                <div class="row">
                    {{-- <input name="submit-button" class="btn btn-default btn-lg" type="submit" value="Back"> --}}
                    <input name="submit-button" class="btn btn-primary btn-lg" type="submit" value="Next">
                </div>
            </div>
        </form>

    </div>
@endsection

@push('css')
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous"> --}}
@endpush

@push('scripts')
    {{-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/js/bootstrap.min.js" integrity="sha384-3qaqj0lc6sV/qpzrc1N5DC6i1VRn/HyX4qdPaiEFbn54VjQBEU341pvjz7Dv3n6P" crossorigin="anonymous"></script> --}}

    <script type="text/javascript">
        $(function () {
            $("#purchase_amount").on( "input", function() {
                var purchase_amount = $("#purchase_amount").val();
                var gold_per_gram = 0.004854;
                var total = purchase_amount*gold_per_gram;
                $("#purchase_quantity").val(total.toFixed(4));
            });

            $("#purchase_quantity").on( "input", function() {
                var purchase_quantity = $("#purchase_quantity").val();
                var gold_per_gram = 207;
                var total = purchase_quantity*gold_per_gram;
                $("#purchase_amount").val(total.toFixed(2));
            });

            $("#gap-control").on( "click", function() {
                $("#gap-select").prop("checked",true);
                $('#gap-control').attr('class','gap-container');
                $('#sap-control').removeAttr('class','sap-container');
                $("#sap-select").prop("checked",false);
                $("#purchase-amount").val('');
                $("#purchase-quantity").val('');
            });
        
            $("#sap-control").on( "click", function() {
                $("#sap-select").prop("checked",true);
                $('#sap-control').attr('class','sap-container');
                $('#gap-control').removeAttr('class','gap-container');
                $("#gap-select").prop("checked",false);
                $("#purchase-amount").val('');
                $("#purchase-quantity").val('');
            });
        
            $("#gap-select").change(function() {
            if(this.checked) {
                $('#gap-control').attr('class','gap-container');
                $('#sap-control').attr('class','');
                    $("#purchase-amount").val('');
                $("#purchase-quantity").val('');
                }
            });
        });
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