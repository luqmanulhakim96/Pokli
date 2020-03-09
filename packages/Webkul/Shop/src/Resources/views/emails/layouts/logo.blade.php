@if (core()->getConfigData('general.design.admin_logo.logo_image'))
    <img src="{{ \Illuminate\Support\Facades\Storage::url(core()->getConfigData('general.design.admin_logo.logo_image')) }}" alt="pokli" style="height: 40px; width: 110px;"/>
@else
    <img src="{{ asset('vendor/webkul/ui/assets/images/output-onlinepngtools-transparent.png') }}">
@endif
