<?php $paypalStandard = app('Artanis\BillPlz\Payment\Billplz') ?>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
    You will be redirected to the FPX website in a few seconds.


    <form action="{{ $paypalStandard->getPaypalUrl() }}" id="billplz_checkout" method="POST">
        <input value="Click here if you are not redirected within 10 seconds..." type="submit">

        @foreach ($paypalStandard->getFormFields() as $name => $value)

            <input type="hidden" name="{{ $name }}" value="{{ $value }}">

        @endforeach
    </form>

    <script type="text/javascript">
        document.getElementById("billplz_checkout").submit();
    </script>
</body>
