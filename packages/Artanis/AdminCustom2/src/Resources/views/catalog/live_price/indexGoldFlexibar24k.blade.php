@extends('admin::layouts.content')

@section('page_title')
    Live Pricing
@stop

@section('content')
    <div class="tabs">
      <ul>
        <li class="active">
            <a href="{{ route('admincustom2.catalog.gold_live_price_gap.index')}}">
                Gold
            </a>
        </li>
        <li>
            <a href="{{ route('admincustom2.catalog.gold_live_price_sap.index')}}">
              Silver
            </a>
        </li>
      </ul>
      <ul>
        <li>
              <a href="{{ route('admincustom2.catalog.gold_live_price_gap.index')}}">
                  MY Uncang
              </a>
          </li>
          <li>
              <a href="{{ route('admincustom2.catalog.gold_live_price_gold_bar_24k.index')}}">
                LMBA Gold Bar (24k)
              </a>
          </li>
          <li>
              <a href="{{ route('admincustom2.catalog.gold_live_price_gold_wafer_24k.index')}}">
                LBMA Gold Wafer - Dinar (24k)
              </a>
          </li>
          <li>
              <a href="{{ route('admincustom2.catalog.gold_live_price_gold_smallbar_24k.index')}}">
                LBMA Small Bar / Wafer (24k)
              </a>
          </li>
          <li>
              <a href="{{ route('admincustom2.catalog.gold_live_price_gold_classic_24k.index')}}">
                Classic / Bungamas / Tai Fook (24k)
              </a>
          </li>
          <li class="active">
              <a href="{{ route('admincustom2.catalog.gold_live_price_gold_flexibar_24k.index')}}">
                Flexibar (24k)
              </a>
          </li>
          <li>
              <a href="{{ route('admincustom2.catalog.gold_live_price_gold_wafer_22k.index')}}">
                Gold Wafer - Dinar (22k)
              </a>
          </li>
          <li>
              <a href="{{ route('admincustom2.catalog.gold_live_price_gold_jewellary_22k.index')}}">
                Gold Jewellary (22k)
              </a>
          </li>
      </ul>
    </div>
    <div class="content" style="height: 100%;">
        <div class="page-header">
          <div class="page-title">
              <h1>Flexibar (24k)</h1>
          </div>

            <div class="page-action">
                <!-- <div class="export-import" @click="showModal('downloadDataGrid')">
                    <i class="export-icon"></i>
                    <span >
                        {{ __('admin::app.export.export') }}
                    </span>
                </div> -->
                <a href="{{ route('admincustom2.catalog.gold_live_price_gold_flexibar_24k.edit') }}" class="btn btn-lg btn-primary">
                    Edit Price
                </a>
            </div>
        </div>

        {!! view_render_event('bagisto.admin.catalog.emas.list.before') !!}

        <div class="page-content">
            @inject('emas', 'Artanis\AdminCustom2\DataGrids\GoldFlexibar24kDataGrid')
            {!! $emas->render() !!}
        </div>

        {!! view_render_event('bagisto.admin.catalog.emas.list.after') !!}

    </div>
@stop
