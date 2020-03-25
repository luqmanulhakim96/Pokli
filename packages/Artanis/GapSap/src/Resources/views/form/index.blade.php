@extends('gapsap::layouts.master')

@section('page_title')
    Purchase MYUncang Emas / MYUncang Perak
@endsection


@section('content-wrapper')
<div class="auth-content">
        <div class="sign-up-text">
            Purchase MYUncang Emas / MYUncang Perak
        </div>

        <form method="POST" action="{{ route('gapsap.form-submit') }}" enctype="multipart/form-data" @submit.prevent="onSubmit">
            {{ csrf_field() }}
            <div class="login-form">
                {{-- <div class="login-text">{{ __('shop::app.customer.login-form.title') }}</div> --}}
                <input id="product_type" name="product_type" type="hidden">
                <input id="current_price_per_gram" name="current_price_per_gram" type="hidden">
                <input id="current_price_datetime" name="current_price_datetime" type="hidden">
                <input id="gold_datetime" name="gold_datetime" value="{{ $gold_datetime }}" type="hidden">
                <input id="silver_datetime" name="silver_datetime" value="{{ $silver_datetime }}" type="hidden">
                <input name="customer_id" type="hidden" value="{{ $customer->id }}">
                <input name="payment_method" type="hidden" value="{{ $input['mode_of_payment'] }}">
                <input name="increment_id" type="hidden" value="">


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
                            <input name="product_type" id="gap-select" type="radio" value="gold" v-validate="'required'" data-vv-as="&quot;Product Type&quot;"> <strong>Gold - My Uncang Emas</strong> (Au 999.9)<br><br>
                            <input id="gold_price" name="gold_price" type="hidden" value="{{ $gold_price }}">
                            <span>MYR 100 = {{ round(100/$gold_price,4) }} gm</span>
                            <br>
                            <span>MYR {{ round($gold_price, 0) }} = 1.0000 gm</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div id="sap-control" class="" style="padding:10px;">
                                <input name="product_type" id="sap-select" type="radio" value="silver" v-validate="'required'" data-vv-as="&quot;Product Type&quot;"> <strong>Silver - My Uncang Perak</strong> (Ag 999)<br><br>
                            <input id="silver_price" name="silver_price" type="hidden" value="{{ $silver_price }}">
                            <span>MYR 100 = {{ round(10000/$silver_price, 4) }} gm</span>
                            {{-- <span>MYR 100 = 36.4964 gm</span> --}}
                            <br>
                            <span>MYR {{ round($silver_price, 0) }} = 100.0000 gm</span>
                        </div>
                    </div>
                    <span class="control-error" v-if="errors.has('product_type')">@{{ errors.first('product_type') }}</span>
                </div>


                <div class="control-group"  :class="[errors.has('amount') ? 'has-error' : '']">
                    <label for="amount" class="required">Purchase Amount</label>
                    {{-- <input id="amount" type="number" step="any" min="100" v-validate="'decimal:2|min_value:100|required'" name="amount" class="control" value="" data-vv-as="&quot;Purchase Amount&quot;"/>
                    <span class="control-error" v-if="errors.has('amount')">@{{ errors.first('amount') }}</span> --}}

                    <div class="input-group">
                        <div class="input-group-icon">RM</div>
                        <div class="input-group-area">
                            <input id="amount" type="number" step="any" min="100" v-validate="'decimal:2|min_value:100|required'" name="amount" class="" value="" data-vv-as="&quot;Purchase Amount&quot;"/>
                        </div>
                    </div>
                    <span class="control-error" v-if="errors.has('amount')">@{{ errors.first('amount') }}</span>
                </div>



                <div class="control-group"  :class="[errors.has('quantity') ? 'has-error' : '']">
                    <label for="quantity" class="required">Purchase Quantity</label>
                    {{-- <input id="quantity" type="number" step="any" v-validate="'decimal:4|min_value:0|required'" name="quantity" class="control" value="" data-vv-as="&quot;Purchase Quantity&quot;"/>
                    <span class="control-error" v-if="errors.has('quantity')">@{{ errors.first('quantity') }}</span> --}}

                    <div class="input-group">
                        <div class="input-group-area">
                            <input id="quantity" type="number" step="any" v-validate="'decimal:4|min_value:0|required'" name="quantity" class="" value=""
                            data-vv-as="&quot;Purchase Quantity&quot;"/>
                        </div>
                        <div class="input-group-icon">gm</div>
                    </div>
                    <span class="control-error" v-if="errors.has('quantity')">@{{ errors.first('quantity') }}</span>
                </div>

                <div class="control-group" :class="[errors.has('mode_of_payment') ? 'has-error' : '']">
                    <label for="mode_of_payment" class="required">{{ __('gapsap::app.purchase.form-mode-of-payment') }}</label>

                    <select disabled="disabled" id="mode_of_payment" name="mode_of_payment" class="control" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-mode-of-payment') }}&quot;">
                        <option  value="{{ old('mode_of_payment') ?? $input['mode_of_payment'] }}">{{ old('mode_of_payment') ?? ($input['mode_of_payment'] == 'fpx' ? 'FPX' : 'Bank In')  }}</option>
                    </select>
                    <span class="control-error" v-if="errors.has('mode_of_payment')">@{{ errors.first('mode_of_payment') }}</span>
                </div>

                @if($input['mode_of_payment']=='bankin')
                <div class="control-group"  :class="[errors.has('payment_on') ? 'has-error' : '']">
                    <label for="payment_on" class="required">{{ __('gapsap::app.purchase.form-payment-date') }}</label>
                    <input type="datetime" class="control" name="payment_on" value="{{ old('payment_on') ?? $input['payment_on'] }}" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;" disabled="disabled">
                    <input type="hidden" name="payment_on" value="{{ old('payment_on') ?? $input['payment_on'] }}">
                    <span class="control-error" v-if="errors.has('payment_on')">@{{ errors.first('payment_on') }}</span>
                </div>
                <div class="control-group"  :class="[errors.has('payment_attachment') ? 'has-error' : '']">
                    {{-- <label for="payment_attachment" class="required">Attachment</label>
                    <input type="text" class="control" name="payment_attachment" value="Attachment" v-validate="'required'" data-vv-as="&quot;{{ __('gapsap::app.purchase.form-payment-date') }}&quot;" disabled="disabled">
                    <input type="hidden" name="payment_attachment" value="Attachment">
                    <span class="control-error" v-if="errors.has('payment_attachment')">@{{ errors.first('payment_attachment') }}</span> --}}
                    <label for="payment_attachment" class="required">Attachment</label>
                    <input type="file" class="form-control-file mt-10" id="image" v-validate="'required|ext:jpeg,jpg,png,pdf,doc,docx|size:1000'" name="payment_attachment" data-vv-as="&quot;Attachment Bankin&quot;">
                    <span class="control-error" v-if="errors.has('payment_attachment')">@{{ errors.first('payment_attachment') }}</span>
                    {{-- @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif --}}
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

            $("#amount").on( "input", function() {
                var amount = $("#amount").val();

                if ($('input[name=product_type]:checked').val() == 'gold'){
                    var gold_price = 1/$("#gold_price").val();
                    var total = amount*gold_price;
                    $("#quantity").val(total.toFixed(4));
                }
                else if ($('input[name=product_type]:checked').val() == 'silver'){
                    var silver_price = 100/$("#silver_price").val();
                    var total = amount*silver_price;
                    $("#quantity").val(total.toFixed(4));
                }

            });

            $("#quantity").on( "input", function() {
                var quantity = $("#quantity").val();
                if ($('input[name=product_type]:checked').val() == 'gold'){
                    var gold_price = $("#gold_price").val();
                    var total = quantity*gold_price;
                    $("#amount").val(total.toFixed(2));
                }
                else if ($('input[name=product_type]:checked').val() == 'silver'){
                    var silver_price = $("#silver_price").val()/100;
                    var total = quantity*silver_price;
                    $("#amount").val(total.toFixed(2));
                }

            });

            $("#gap-control").on( "click", function() {
                $("#gap-select").prop("checked",true);
                $('#gap-control').attr('class','gap-container');
                $('#sap-control').removeAttr('class','sap-container');
                $("#sap-select").prop("checked",false);
                $("#amount").val('');
                $("#quantity").val('');
                $("#current_price_per_gram").val($("#gold_price").val());
                $("#current_price_datetime").val($("#gold_datetime").val());
                $("#product_type").val('gold');
            });

            $("#sap-control").on( "click", function() {
                $("#sap-select").prop("checked",true);
                $('#sap-control').attr('class','sap-container');
                $('#gap-control').removeAttr('class','gap-container');
                $("#gap-select").prop("checked",false);
                $("#amount").val('');
                $("#quantity").val('');
                $("#current_price_per_gram").val($("#silver_price").val()/100);
                $("#current_price_datetime").val($("#silver_datetime").val());
                $("#product_type").val('silver');
            });

            $("#gap-select").change(function() {
            if(this.checked) {
                $('#gap-control').attr('class','gap-container');
                $('#sap-control').attr('class','');
                    $("#amount").val('');
                $("#quantity").val('');
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
