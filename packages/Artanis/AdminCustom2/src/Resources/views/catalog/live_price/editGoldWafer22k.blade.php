@extends('admin::layouts.content')

@section('page_title')
    Update Price
@stop

@section('css')
    <style>
        .table td .label {
            margin-right: 10px;
        }
        .table td .label:last-child {
            margin-right: 0;
        }
        .table td .label .icon {
            vertical-align: middle;
            cursor: pointer;
        }
    </style>
@stop

@section('content')
    <div class="content full-page">
        <form method="POST" action="{{ route('admincustom2.catalog.gold_live_price_gold_wafer_22k.update') }}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                        Gold Wafer - Dinar (22k) - Update Price
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        Update
                    </button>
                </div>
            </div>

            <div class="page-content">
                @csrf()
                <div slot="body">
                  @foreach($data as $gap)
                    <h3>{{$gap->gram}} gram</h3>
                    <div class="control-group" :class="[errors.has('{{$gap->gram}}sell') ? 'has-error' : '']">
                        <label for="{{$gap->gram}}sell" class="required">Sell (RM)</label>
                        <input type="text" v-validate="{ required: true, decimal:3 }" class="control" id="{{$gap->gram}}sell" name="{{$gap->gram}}sell" value="{{$gap->sell}}" data-vv-as="&quot;Price 1 gram&quot;"/>
                        <span class="control-error" v-if="errors.has('{{$gap->gram}}sell')">Only Numbers acceptable</span>
                    </div>
                    <div class="control-group" :class="[errors.has('{{$gap->gram}}buy') ? 'has-error' : '']">
                        <label for="{{$gap->gram}}buy" class="required">Buy (RM)</label>
                        <input type="text" v-validate="{ required: true, decimal:3 }" class="control" id="{{$gap->gram}}buy" name="{{$gap->gram}}buy" value="{{$gap->buy}}" data-vv-as="&quot;Price 1 gram&quot;"/>
                        <span class="control-error" v-if="errors.has('{{$gap->gram}}buy')">Only Numbers acceptable</span>
                    </div>
                  @endforeach
                </div>
            </div>

        </form>
    </div>
@stop
