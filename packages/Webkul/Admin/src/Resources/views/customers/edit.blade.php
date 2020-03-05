@extends('admin::layouts.content')

@section('page_title')
    {{ __('admin::app.customers.customers.edit-title') }}
@stop

@section('content')
    <div class="content">
        {!! view_render_event('bagisto.admin.customer.edit.before', ['customer' => $customer]) !!}

        <form method="POST" action="{{ route('admin.customer.update', $customer->id) }}">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="history.length > 1 ? history.go(-1) : window.location = '{{ url('/admin/dashboard') }}';"></i>

                        {{ __('admin::app.customers.customers.title') }}
                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        {{ __('admin::app.customers.customers.save-btn-title') }}
                    </button>
                </div>
            </div>

            <div class="page-content">

                <div class="form-container">
                    @csrf()

                    <input name="_method" type="hidden" value="PUT">

                    <accordian :title="'{{ __('admin::app.account.general') }}'" :active="true">
                        <div slot="body">



                          <div class="control-group">
                              <label for="status" class="required">{{ __('admin::app.customers.customers.status') }}</label>
                              <select name="status" class="control" value="{{ $customer->status }}" v-validate="'required'" data-vv-as="&quot;{{ __('admin::app.customers.customers.status') }}&quot;">
                                  <option value="1" {{ $customer->status == "1" ? 'selected' : '' }}>{{ __('admin::app.customers.customers.active') }}</option>
                                  <option value="0" {{ $customer->status == "0" ? 'selected' : '' }}>{{ __('admin::app.customers.customers.in-active') }}</option>
                              </select>
                              <span class="control-error" v-if="errors.has('status')">@{{ errors.first('status') }}</span>
                          </div>


                        </div>
                    </accordian>

                </div>
            </div>
        </form>

        {!! view_render_event('bagisto.admin.customer.edit.after', ['customer' => $customer]) !!}
    </div>
@stop
