<?php $billplz = app('Artanis\BillPlz\Http\Controllers\StandardController');?>

<body data-gr-c-s-loaded="true" cz-shortcut-listen="true">
    You will be redirected to the FPX website in a few seconds.

    <form action="{{ route('billplz.redirectBillPlz') }}" id="billplz_checkout" method="GET">
      @csrf
    </form>

    <script type="text/javascript">
        // document.getElementById("billplz_checkout").submit();
        window.location.replace("{{ route('billplz.redirectBillPlz') }}");
    </script>
</body>
