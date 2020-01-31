<?php// $billplz = app('Artanis\GapSap\Payment\BillPlz');?>
<?php $billplz = app('Artanis\GapSap\Http\Controllers\StandardController');?>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
    You will be redirected to the FPX website in a few seconds.


    <form action="{{  route('gapsap.redirectBillPlz') }}" id="billplz_checkout" method="GET">

    </form>

    <script type="text/javascript">
        // document.getElementById("billplz_checkout").submit();
        window.location.replace("{{ route('gapsap.redirectBillPlz') }}");
    </script>
</body>
