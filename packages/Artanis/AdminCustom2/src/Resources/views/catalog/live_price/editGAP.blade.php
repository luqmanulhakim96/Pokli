@extends('admin::layouts.content')

@section('page_title')
    My Uncang Emas - Update Price
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
        <form method="POST" action="{{ route('admincustom2.catalog.gold_live_price_gap.update') }}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                        My Uncang Emas - Update Price
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
                    @if($gap->gram == 1)
                    <div class="control-group" :class="[errors.has('price_buyback') ? 'has-error' : '']">
                        <label for="price_buyback" class="required">Buyback Price (RM) (1 gram)</label>
                        <input type="text" v-validate="{ required: true, decimal:5 }" class="control" id="price_buyback" name="price_buyback" value="{{$gap->buyback}}" data-vv-as="&quot;Buyback Price (RM)&quot;"/>
                        <span class="control-error" v-if="errors.has('price_buyback')">Only Numbers acceptable</span>
                    </div>
                    <div class="control-group" :class="[errors.has('price_1_gram') ? 'has-error' : '']">
                        <label for="price_1_gram" class="required">{{$gap->gram}} gram (Sell Price)</label>
                        <input type="text" v-validate="{ required: true, decimal:3 }" class="control" id="price_1_gram" name="price_1_gram" value="{{$gap->price}}" data-vv-as="&quot;Price 1 gram&quot;"/>
                        <span class="control-error" v-if="errors.has('price_1_gram')">Only Numbers acceptable</span>
                    </div>
                    @endif
                    @if($gap->gram != 1)
                    <div class="control-group" :class="[errors.has('price_100_price') ? 'has-error' : '']">
                        <label for="price_100_price" class="required">RM {{$gap->price}} (Sell Price)</label>
                        <input type="text" v-validate="{ required: true, decimal:5 }" class="control" id="price_100_price" name="price_100_price" value="{{$gap->gram}}" data-vv-as="&quot;Price RN100&quot;"/>
                        <span class="control-error" v-if="errors.has('price_100_price')">Only Numbers acceptable</span>
                    </div>
                    @endif
                  @endforeach
                </div>
            </div>

        </form>
    </div>
@stop
