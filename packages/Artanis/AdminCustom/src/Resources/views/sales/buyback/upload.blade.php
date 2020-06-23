@extends('admin::layouts.content')

@section('page_title')
    {{ __('Buyback #'.$purchase->increment_id) }}
@stop

  @section('content')
    <div class="content">

        <form method="POST" action="{{ route('admincustom.sales.buyback.upload.update', $purchase->id) }}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link"
                           onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                        Upload Payment Receipt
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                       Save
                    </button>
                </div>
            </div>

            <div class="page-content">
                @csrf()

                <input name="_method" type="hidden" value="PUT">
                <div class="control-group"  :class="[errors.has('payment_attachment') ? 'has-error' : '']">
                    <label for="payment_attachment" class="required">Bank Receipt Attachement</label>
                    <input type="file" class="form-control-file mt-10" id="image" v-validate="'required|ext:jpeg,jpg,png,pdf,doc,docx|size:1000'" name="payment_attachment" multiple data-vv-as="&quot;Receipt Required&quot;">
                    <span class="control-error" v-if="errors.has('payment_attachment')">@{{ errors.first('payment_attachment') }}</span>
                </div>
            </div>
        </form>
    </div>
@stop
