@extends('admin::layouts.content')

@section('page_title')
    Live Pricing
@stop

@section('content')
<div class="tabs">
  <ul>
    <li>
        <a href="{{ route('admincustom2.catalog.gold_live_price_gap.index')}}">
            Gold
        </a>
    </li>
    <li class="active">
        <a href="{{ route('admincustom2.catalog.gold_live_price_sap.index')}}">
          Silver
        </a>
    </li>
  </ul>
  <ul>
    <li>
          <a href="{{ route('admincustom2.catalog.gold_live_price_sap.index')}}">
              MY Uncang
          </a>
      </li>
      <li>
          <a href="{{ route('admincustom2.catalog.silver_live_price_silver_bar_24k.index')}}">
            Silver Bar (999)
          </a>
      </li>
      <li class="active">
          <a href="{{ route('admincustom2.catalog.silver_live_price_silver_dirham_24k.index')}}">
            Silver Wafer - Dirham (999)
          </a>
      </li>
  </ul>
</div>
    <div class="content" style="height: 100%;">
        <div class="page-header">
          <div class="page-title">
              <h1>Silver Wafer - Dirham (999)</h1>
          </div>

            <div class="page-action">
                <!-- <div class="export-import" @click="showModal('downloadDataGrid')">
                    <i class="export-icon"></i>
                    <span >
                        {{ __('admin::app.export.export') }}
                    </span>
                </div> -->
                <a href="{{ route('admincustom2.catalog.silver_live_price_silver_dirham_24k.edit') }}" class="btn btn-lg btn-primary">
                    Edit Price
                </a>
            </div>
        </div>

        {!! view_render_event('bagisto.admin.catalog.emas.list.before') !!}

        <div class="page-content">
            @inject('emas', 'Artanis\AdminCustom2\DataGrids\SilverDirham24kDataGrid')
            {!! $emas->render() !!}
        </div>

        {!! view_render_event('bagisto.admin.catalog.emas.list.after') !!}

    </div>
@stop
