<?php $billplz = app('Artanis\BillPlz\Payment\BillPlz') ?>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
    You will be redirected to the FPX website in a few seconds.


    <form action="{{ $billplz->getBillPlzlUrl() }}" id="billplz_checkout" method="POST">
        <input value="Click here if you are not redirected within 10 seconds..." type="submit">

        @foreach ($billplz->getFormFields() as $name => $value)

            <input type="hidden" name="{{ $name }}" value="{{ $value }}">

        @endforeach
    </form>

    <script type="text/javascript">
        document.getElementById("billplz_checkout").submit();
    </script>
</body>
