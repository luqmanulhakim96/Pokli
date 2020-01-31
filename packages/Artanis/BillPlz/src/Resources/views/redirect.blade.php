<?php $billplz = app('Artanis\BillPlz\Http\Controllers\StandardController');?>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
    You will be redirected to the FPX website in a few seconds.
    @csrf
    <form action="{{ route('billplz.redirectBillPlz') }}" id="billplz_checkout" method="POST">

    </form>

    <script type="text/javascript">
        document.getElementById("billplz_checkout").submit();
    </script>
</body>
