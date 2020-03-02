@extends('admin::layouts.content')

@section('page_title')
    Delivery Order - Add Document
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

@section('content-wrapper')
    <div class="content full-page">
        <form method="POST" action="{{ route('admincustom2.catalog.serial.form-submit') }}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>
                        Add Serial Number
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
                        <div slot="body">
                          <input type="hidden" name="product_id" value="{{$product_id}}" />
                          <input type="hidden" name="inventory" value="{{$inventory}}" />
                                    @if($inventory == 0)

                                    @endif
                                    @if($inventory > 0)
                                      @for($i=0;$i<$inventory;$i++)
                                      <div class="control-group" :class="[errors.has('serial-number{{$i}}') ? 'has-error' : '']">
                                          <label for="serial-number{{$i}}" class="required">Item {{$i+1}} : Serial Number</label>
                                          <input type="text" v-validate="{ required: true, regex: /^[a-z0-9]+(?:-[a-z0-9]+)*$/ }" class="control" id="serial-number{{$i}}" name="serial-number{{$i}}" value="" data-vv-as="&quot;Serial Number&quot;"/>
                                          <span class="control-error" v-if="errors.has('serial-number{{$i}}')">Non-Characters are not acceptable</span>
                                      </div>
                                      @endfor
                                    @endif

                        </div>
            </div>

        </form>
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.label .cross-icon').on('click', function(e) {
                $(e.target).parent().remove();
            })

            $('.actions .trash-icon').on('click', function(e) {
                $(e.target).parents('tr').remove();
            })
        });
    </script>
@endpush
