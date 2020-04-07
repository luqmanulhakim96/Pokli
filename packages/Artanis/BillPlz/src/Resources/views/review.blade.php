<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

        <title>EPP 4 Months - Review</title>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="content-language" content="{{ app()->getLocale() }}">

        @stack('css1')

        <link rel="stylesheet" href="{{ asset('themes/pokli-default/assets/css/shop.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/webkul/ui/assets/css/ui.css') }}">

        @if ($favicon = core()->getCurrentChannel()->favicon_url)
            <!-- <link rel="icon" sizes="16x16" href="{{ $favicon }}" /> -->
            <link rel="icon" sizes="16x16" href="{{ asset('vendor/webkul/ui/assets/images/logo.png') }}" />
        @else
            <link rel="icon" sizes="16x16" href="{{ asset('vendor/webkul/ui/assets/images/logo.png') }}" />
            {{-- <link rel="icon" sizes="16x16" href="{{ bagisto_asset('images/favicon.ico') }}" /> --}}
        @endif

        @yield('head')

        @section('seo')
            @if (! request()->is('/'))
                <meta name="description" content="{{ core()->getCurrentChannel()->description }}"/>
            @endif
        @show

        <style>
        .center {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 10px;
        },
        .center-button {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 40px;
        }
        </style>

        @stack('css')

        {!! view_render_event('bagisto.shop.layout.head') !!}

  </head>
  <body @if (core()->getCurrentLocale()->direction == 'rtl') class="rtl" @endif style="scroll-behavior: smooth;">
    <div class="auth-content">
        <img class="center" src="{{asset('vendor/webkul/ui/assets/images/output-onlinepngtools-transparent.png')}}" />
        <div class="sign-up-text">
            <b>Easy Payment Purchase ({{$num_of_month}} Months) - Review</b>
        </div>
        <!-- <div class="login-form"> -->
        <div class="main-container-wrapper">
          <table style="width:100%;border: 1px solid black;padding:1%">
            <th>Product Total (RM)</th>
            <th>Premium (RM)</th>
            <th>Admin Fee (%)</th>
            <th>Total Purchase (RM)</th>
            <th>Payment/Month (RM)</th>


            <tr>
              <td>{{$cart->sub_total}}</td>
              <td>{{$cart->selected_shipping_rate->base_price}}</td>
              <td>5</td>
              <td>{{$total_price}}</td>
              <td>{{$monthly_price}}</td>
            </tr>
          </table>
          <br>
          <table style="width:100%;border: 1px solid black;padding:1%">
            <th>Date</th>
            <th>Amount (RM)</th>
            @for($i=0;$i<$num_of_month;$i++)
            <tr>
              <td>{{Carbon\Carbon::parse($date[$i])->format('d-m-Y')}}</td>
              <td>{{$monthly_price}}</td>
            </tr>
            @endfor
          </table>
          <br>
          @if($num_of_month == 4)
          <div class="center-button">
            <!-- <div class="button-group"> -->
              <button type="button" class="btn btn-lg btn-primary" id="accept-button-four">
                Proceed
              </button>
            <!-- </div> -->
            <!-- <div class="button-group"> -->
              <button type="button" class="btn btn-lg btn-primary" id="cancel-button-four">
                Cancel
              </button>
            <!-- </div> -->
          </div>
          @endif
          @if($num_of_month == 10)
          <div class="center-button">
            <!-- <div class="button-group"> -->
              <button type="button" class="btn btn-lg btn-primary" id="accept-button-ten">
                Proceed
              </button>
            <!-- </div> -->
            <!-- <div class="button-group"> -->
              <button type="button" class="btn btn-lg btn-primary" id="cancel-button-ten">
                Cancel
              </button>
            <!-- </div> -->
          </div>
          @endif
        </div>
    </div>
  </body>
  <script type="text/javascript">
    document.getElementById("accept-button-ten").onclick = function () {
        location.href = "{{ route('epptenmonths.store') }}";
    };
  </script>
  <script type="text/javascript">
    document.getElementById("accept-button-four").onclick = function () {
        location.href = "{{ route('eppfourmonths.store') }}";
    };
  </script>
  <script type="text/javascript">
    document.getElementById("cancel-button-ten").onclick = function () {
        location.href = "{{ route('epptenmonths.cancel') }}";
    };
  </script>
  <script type="text/javascript">
    document.getElementById("cancel-button-four").onclick = function () {
        location.href = "{{ route('eppfourmonths.cancel') }}";
    };
  </script>
</html>
