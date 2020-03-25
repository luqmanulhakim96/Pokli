@extends('admin::layouts.content')

@section('page_title')
    Serial Number
@stop

@section('content-wrapper')
    <div class="content full-page">
        <div class="page-header">
            <div class="page-title">
              <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                <h1>Serial Number</h1>
            </div>

            <div class="page-action">
                <div class="export-import" @click="showModal('downloadDataGrid')">
                    <i class="export-icon"></i>
                    <span >
                        {{ __('admin::app.export.export') }}
                    </span>
                </div>
                @if($inventory!=0)
                <a href="{{ route('admincustom2.catalog.serial.create', [$product->id]) }}" class="btn btn-lg btn-primary">
                    Add Serial Number
                </a>
                @endif
            </div>
        </div>

        {!! view_render_event('bagisto.admin.catalog.products.list.before') !!}

        <div class="page-content">
            @inject('products', 'Artanis\AdminCustom2\DataGrids\ProductSerialNumberDataGrid')
            {!! $products->render() !!}
        </div>

        {!! view_render_event('bagisto.admin.catalog.products.list.after') !!}

    </div>

    <modal id="downloadDataGrid" :is-open="modalIds.downloadDataGrid">
        <h3 slot="header">{{ __('admin::app.export.download') }}</h3>
        <div slot="body">
            <export-form></export-form>
        </div>
    </modal>
@stop

@push('scripts')
    @include('admin::export.export', ['gridName' => $products])
@endpush
