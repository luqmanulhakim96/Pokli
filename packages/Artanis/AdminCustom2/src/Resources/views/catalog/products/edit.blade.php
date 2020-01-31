<?php
  $db = mysqli_connect("localhost","root","","local");
  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $sql = "SELECT * FROM product_flat";
  $query = mysqli_query($db,$sql)or Die("Sorry, dead query");
  $row = mysqli_fetch_array($query);

?>

@extends('admin::layouts.content')

@section('page_title')
    Delivery Order - Add Document
@stop

@section('content')
    <div class="content">
        <?php $locale = request()->get('locale') ?: app()->getLocale(); ?>
        <?php $channel = request()->get('channel') ?: core()->getDefaultChannelCode(); ?>

        {!! view_render_event('bagisto.admin.catalog.product.edit.before', ['product' => $product]) !!}

        <form method="POST" action="" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link"
                           onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                        Edit Delivery Order
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
                    <label for="payment_attachment" class="required">Attachment</label>
                    <input type="file" class="form-control-file mt-10" id="image" v-validate="'required|image|size:100'" name="delivery_attachment" multiple data-vv-as="&quot;Attachment Bankin&quot;">
                    <span class="control-error" v-if="errors.has('payment_attachment')">@{{ errors.first('payment_attachment') }}</span>
                    {{-- @if ($errors->has('image'))
                        <strong>{{ $errors->first('image') }}</strong>
                    @endif --}}
                </div>
            </div>
        </form>
    </div>
@stop
