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

@section('content')
    <div class="content">
        <form method="POST" action="{{ route('admincustom2.catalog.products.form-submit') }}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        Add Delivery Order
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
                              <div class="control-group" :class="[errors.has('sku') ? 'has-error' : '']">
                                  <label for="type" class="required">Product SKU</label>
                                  <select class="control" v-validate="'required'" id="type" name="product_id" data-vv-as="&quot; SKU &quot;">

                                      @foreach($product as $key => $data)
                                          <option value="{{ $data->id }}" {{ request()->input('sku') == $key ? 'selected' : '' }}>
                                              {{ $data->sku }}
                                          </option>
                                      @endforeach

                                  </select>
                                  <span class="control-error" v-if="errors.has('type')">@{{ errors.first('type') }}</span>
                              </div>
                              <div class="control-group"  :class="[errors.has('delivery_attachment') ? 'has-error' : '']">
                                  <label for="delivery_attachment" class="required">Attachment</label>
                                  <input type="file" class="form-control-file mt-10" id="attachment" v-validate="'required|mimes:pdf,jpeg,jpg,png|max:100000'" name="delivery_attachment" data-vv-as="&quot;Attachement&quot;">
                                  <span class="control-error" v-if="errors.has('delivery_attachment')">@{{ errors.first('delivery_attachment') }}</span>
                                  {{-- @if ($errors->has('attachment'))
                                      <strong>{{ $errors->first('attachment') }}</strong>
                                  @endif --}}
                              </div>
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
