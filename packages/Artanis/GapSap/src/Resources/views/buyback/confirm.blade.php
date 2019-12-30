@extends('gapsap::layouts.master')

@section('page_title')
    Purchase GAP/SAP
@endsection


@section('content-wrapper')
<div class="auth-content">
        <div class="sign-up-text">
            Buyback of GAP/SAP
        </div>

        <form method="POST" action="{{ route('gapsap.buyback.confirm-submit') }}" enctype="multipart/form-data" @submit.prevent="onSubmit">
            {{ csrf_field() }}
            <div class="login-form">
                <input name="customer_id" type="hidden" value="{{ $customer->id }}">
                <input id="product_type" name="product_type" value="{{$input['product_type']}}" type="hidden">
                <input id="current_price_per_gram" name="current_price_per_gram" value="{{$input['current_price_per_gram']}}" type="hidden">
                <input id="current_price_datetime" name="current_price_datetime" value="{{$input['current_price_datetime']}}" type="hidden">
                <input name="amount" type="hidden" value="{{ $input['amount'] }}">
                <input name="quantity" type="hidden" value="{{ $input['quantity'] }}">
                <input name="buyback_datetime" type="hidden" value="{{ $input['buyback_datetime'] }}">

                <div class="control-group" :class="[errors.has('first_name') ? 'has-error' : '']">
                    <label for="first_name" class="bold">{{ __('gapsap::app.purchase.form-customer-name') }}</label>
                    <p>{{ $customer->first_name.' '.$customer->last_name }}</p>
                </div>
                
                <div class="control-group" :class="[errors.has('product_type') ? 'has-error' : '']">
                    <label for="product_type" class="bold">Product Type</label>
                    <p>{{ $input['product_type']=='gold' ? 'Gold' : 'Silver' }}</p>
                </div>

                
                <div class="control-group"  :class="[errors.has('amount') ? 'has-error' : '']">
                    <label for="amount" class="bold">Buyback Amount</label>
                    <p>{{ 'RM '.$input['amount'] }}</p>
                </div>
                
                <div class="control-group"  :class="[errors.has('quantity') ? 'has-error' : '']">
                    <label for="quantity" class="bold">Buyback Quantity</label>
                    <p>{{ $input['quantity'].' gram' }}</p>
                </div>

                <div class="control-group"  :class="[errors.has('date_of_payment') ? 'has-error' : '']">
                    <label for="date_of_payment" class="bold">{{ __('gapsap::app.purchase.form-payment-date') }}</label>
                    <p>{{ $input['buyback_datetime'] }}</p>
                </div>

                <div class="row">
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
                    var silver_price = 1/$("#silver_price").val();
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
                    var silver_price = $("#silver_price").val();
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