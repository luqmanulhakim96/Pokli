<?php $billplz = app('Artanis\BillPlz\Controller\StandardController');?>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
    You will be redirected to the FPX website in a few seconds.

    <form action="{{ route('billplz.redirectAway') }}" id="billplz_checkout" method="POST">

    </form>

    <script type="text/javascript">
        document.getElementById("billplz_checkout").submit();
    </script>
</body>
