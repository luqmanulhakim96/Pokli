@component('shop::emails.layouts.master')

    <div>
        <div style="text-align: center;">
                @include ('shop::emails.layouts.logo')
        </div>

        <div  style="font-size:16px; color:#242424; font-weight:600; margin-top: 60px; margin-bottom: 15px">
                {!! __('shop::app.mail.customer.verification.heading') !!}
        </div>

        <div>
            {!! __('shop::app.mail.customer.verification.summary') !!}
        </div>

        <div  style="margin-top: 40px; text-align: center">
            <a href="{{ route('customer.verify', $data['token']) }}" style="font-size: 16px;
            color: #FFFFFF; text-align: center; background: #FF0000; padding: 10px 100px;text-decoration: none;">
                {!! __('shop::app.mail.customer.verification.verify') !!}
            </a>
            <br>
            <br>
            <br>

            {!! __('shop::app.mail.customer.verification.click-here') !!}
            <br>
            <p style="color:#FF0000;font-size: 16px;padding: 10px 100px;">{{ route('customer.verify', $data['token']) }}</p>

        </div>
    </div>

@endcomponent
