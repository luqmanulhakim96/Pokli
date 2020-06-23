@component('shop::emails.layouts.master')
    <div style="text-align: center;">
        <a href="{{ config('app.url') }}">
            @include ('shop::emails.layouts.logo')
        </a>
    </div>

    <?php $result = $buyback ?>

    <div style="padding: 30px;">
        <div style="font-size: 17px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <span style="font-weight: bold;">
              {{ __('shop::app.mail.order.pokli-name') }}
            </span> <br>
            <div>
              {{ __('shop::app.mail.order.pokli-address') }}
            </div>
            <div>
              {{ __('shop::app.mail.order.pokli-tel') }}
            </div>
            <div>
              {{ __('shop::app.mail.order.pokli-email') }}
            </div>
            <div>
              {{ __('shop::app.mail.order.pokli-website') }}
            </div>
        </div>
        <div style="font-size: 20px;color: #242424;line-height: 30px;margin-bottom: 34px;">
            <span style="font-weight: bold;">
                {{ __('shop::app.mail.myuncang-buyback-invoice.heading') }}
            </span> <br>
        </div>

        <div style="display: flex;flex-direction: row;margin-top: 20px;justify-content: space-between;margin-bottom: 40px;">
            <div style="line-height: 25px;">
                <div>
                  {{ __('shop::app.mail.order.order-number') }} {{ $result->increment_id }}
                </div>

                <div>
                  {{ __('shop::app.mail.order.order-date') }} {{ $result->created_at }}
                </div>

                <div>
                  {{ __('shop::app.mail.order.customer-name') }}  {{ $result->customer->first_name }}  {{ $result->customer->last_name }}
                </div>

                <div>
                    {{ $result->customer->ic }}
                </div>

                <div>---</div>

                <div>
                      {{ __('shop::app.mail.order.customer-tel') }} {{ $result->customer->phone }}
                </div>

                <div style="margin-bottom: 40px;">
                      {{ __('shop::app.mail.order.customer-email') }} {{ $result->customer->email }}
                </div>
            </div>
        </div>

        <div class="section-content">
          <div  style="margin-top: 40px; text-align: center">
              <a href="{{ route('gapsap.buyback.print', $result->id) }}" style="font-size: 16px;
              color: #FFFFFF; text-align: center; background: #FF0000; padding: 10px 100px;text-decoration: none;">
                  Download Invoice
              </a>
          </div>
        </div>

        @if($result->payment_attachment)
        <div class="section-content">
          <div  style="margin-top: 40px; text-align: center">
              <a href="{{ asset('storage/'.$result->payment_attachment) }}" style="font-size: 16px;
              color: #FFFFFF; text-align: center; background: #FF0000; padding: 10px 100px;text-decoration: none;">
                  Download Bank Receipt
              </a>
          </div>
        </div>
        @endif

        <div style="margin-top: 65px;font-size: 16px;color: #5E5E5E;line-height: 24px;display: inline-block">
            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
                {{ __('shop::app.mail.order.terms-and-condition.kindly-remit') }}
                <br>
                <br>
                {{ __('shop::app.mail.order.terms-and-condition.account-name') }}<br>
                {{ __('shop::app.mail.order.terms-and-condition.bank-name') }}<br>
                {{ __('shop::app.mail.order.terms-and-condition.branch-name') }}<br>
                {{ __('shop::app.mail.order.terms-and-condition.account-number') }}<br>
                <br>
                {{ __('shop::app.mail.order.terms-and-condition.fast-cheque') }}
                <br><br>
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>{{ __('shop::app.mail.order.terms-and-condition.tnc') }}</b>
              <br>
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>{{ __('shop::app.mail.order.terms-and-condition.payment') }}</b>
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-1') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-2') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-3') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-4') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.tnc-5') }}
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>STOCK COLLECTION :</b>
              <br>
              i.)   Stock will only be released to customer after the full payment has been received.
              <br>
              ii.)  Customer is required to bring along the ORIGINAL payment slip for stock collection purpose.
                    The Company will not release the stock without the original payment slip as proof of payment.
                    Please contact the Bank to provide the proof of payment if you lost the original payment slip.
                    Alternatively, you may contact any Pokli Wealth Management Sdn Bhd (PWMSB) service branch if you require any further assistance.
              <br>
              iii.) To facilitate the transaction process, stock collection appointment has to be made with your preferred service branch at least
                    (3) working days prior to your visiting date.
              <br>
              iv.)  For those dealers who represent their customers to collect the stock on behalf of them, they are required to show the Authorization
                    Letter which is signed and approved by the customers. The stock will only be released to the representative after the verbal confirmation
                    from the customer via phone call verification. However, Pokli Wealth Management Sdn Bhd (PWMSB) reserves the right to reject the authorization
                    if the document needed are incomplete or feel suspicious along the process.
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>CANCELLATION OF ORDER :</b>

              i.) The Booking Order that has been placed is not allowed to be changed or cancelled by the customer.
                  Under unavoidable condition, a processing fee will be charged as a penalty (5% of Booking Order price; Or
                  Price discrepancy between Booking Order price and Current Gold selling price on cancellation date, whichever is higher)
                  and the customer trading account will be suspended until the payment has been made.
              <br>
              ii.) For the Easy Payment Purchase(EPP), customer has the right to sell back the stock to Pokli Wealth Management Sdn Bhd (PWMSB)
                  before the due date of final partial payment. Hence, stock will be considered as selling back to Pokli Wealth Management Sdn Bhd based on
                  current Buying Price on the date of selling back. The gain or lost will be calculated and the balance will be returned to customer.
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>IMPORTANT NOTICE :</b>

              The issuance of the Booking Order is subject to Pokli Wealth Management's (PWMSB) approval. PWMSB reserves the right at our discretion to
              nullify the order if the detail provided is incomplete or if there is any order dispute / discrepancy.
              <br>
              PWMSB reserves the right to amend the Terms and Conditions as above from time to time without prior notice.For more information and assistance,
              please contact our service branch or our Customer Service Hotline at +6010-3037 916, or any of PWM service branch during business hours.
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>{{ __('shop::app.mail.order.terms-and-condition.risk-disclosure') }}</b>
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-1') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-2') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-3') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-4') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.risk-desc-5') }}
              <br>
            </p>

            <p style="font-size: 12px;color: #5E5E5E;line-height: 24px;">
              <b>{{ __('shop::app.mail.order.terms-and-condition.disclaimer') }}</b>
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-1') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-2') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-3') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-4') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-5') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-6') }}
              <br>
              {{ __('shop::app.mail.order.terms-and-condition.disclaimer-7') }}
            </p>
        </div>
    </div>
@endcomponent
