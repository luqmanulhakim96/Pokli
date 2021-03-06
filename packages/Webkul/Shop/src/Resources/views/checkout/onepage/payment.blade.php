<form data-vv-scope="payment-form">
    <div class="form-container">
        <div class="form-header mb-30">
            <span class="checkout-step-heading">{{ __('shop::app.checkout.onepage.payment-methods') }}</span>
        </div>

        <div class="payment-methods">

            <div class="control-group" :class="[errors.has('payment-form.payment[method]') ? 'has-error' : '']">

                @foreach ($paymentMethods as $payment)

                    {!! view_render_event('bagisto.shop.checkout.payment-method.before', ['payment' => $payment]) !!}

                    <div class="checkout-method-group mb-20">
                        <div class="line-one">
                            <label class="radio-container">
                                <input v-validate="'required'" type="radio" id="{{ $payment['method'] }}" name="payment[method]" value="{{ $payment['method'] }}" v-model="payment.method" @change="methodSelected()" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.payment-method') }}&quot;">

                                <span class="checkmark"></span>

                                {{-- <label class="radio-view" for="{{ $payment['method'] }}"></label> --}}
                            </label>

                            <span class="payment-method method-label">
                                <b>{{ $payment['method_title'] }}</b>
                            </span>
                        </div>

                        <div class="line-two mt-5">
                            <span class="method-summary">{{ __($payment['description']) }}</span>
                            <!-- <br> -->
                            @if($payment['method_title'] == "Cash On Delivery")
                            <div class="control-group" :class="[errors.has('cod_branch') ? 'has-error' : '']">
                                <!-- <label for="cod_branch" class="required">{{ __('shop::app.checkout.onepage.cod-branch') }}</label> -->
                                <select id="cod_branch" name="cod_branch" class="control" data-vv-as="&quot;{{ __('shop::app.checkout.onepage.cod-branch') }}&quot;">
                                    <!-- <option value="">Please Select Branch for Pickup</option> -->
                                    <option value="seremban">Seremban</option>
                                </select>
                                <span class="control-error" v-if="errors.has('cod_branch')">@{{ errors.first('cod_branch') }}</span>
                            </div>
                            @endif

                        </div>

                    </div>

                    {!! view_render_event('bagisto.shop.checkout.payment-method.after', ['payment' => $payment]) !!}

                @endforeach

                <span class="control-error" v-if="errors.has('payment-form.payment[method]')">
                    @{{ errors.first('payment-form.payment[method]') }}
                </span>

            </div>
        </div>
    </div>
</form>
