@extends('installer.layouts.app_install', ['title' => @$data['title']])

@section('content')

<!-- from section -->

<form class="pb-3" data-parsley-validate method="post" action="{{ route('service.license_post') }}" id="content_form">
    @csrf

    <div class="mb-3 px-5 pt-5">
        <label class="form-label" for="access_code"><b>{{ _trans('installer.Access Code') }}
                <span class="star">*</span>
            </b></label>
        <input type="text" name="access_code" id="access_code" class="form-control" required="required" autofocus=""
            value="{{ old('access_code', request('access_code')) }}" placeholder="{{ _trans('installer.Access Code') }}" />
        <p class="mt-1">ⓘ  {{ _trans('installer.Enter your purchase code to verify your license, the temporary code for your license is') }} <strong>123-456-789</strong></p>

        @if (request('message'))
        <span class="text-danger">{{ request('message') }}</span>
        @endif
    </div>
    <div class="mb-3 px-5">
        <label class="form-label" for="envato_email"><b>{{ _trans('installer.Envato Email') }}<span class="star">*</span></b></label>
        <input type="email" class="form-control" data-parsley-type="email" name="envato_email" id="envato_email"
            value="{{ old('envato_email', request('envato_email')) }}" required="email"
            placeholder="{{ _trans('installer.Envato Email') }}">

            <p class="mt-2">ⓘ {{ _trans('installer.To verify your authorization, use your Envato account email address')}}</p>

            
    </div>
    <div class="mb-3 px-5 pb-3">
        <label class="form-label" for="installed_domain"><b>{{ _trans('installer.Installed Domain') }}<span
                    class="star">*</span></b></label>
        <input type="text" class="form-control" name="installed_domain" id="installed_domain" required="required" value="{{ url('/') }}">
        <p class="mt-2">
            ⓘ {{ _trans('installer.What domain or subdomain are you using to access this project?') }} {{ _trans('installer. It depends on whether you want to install this project in the main domain like')}} example.com  {{ _trans('installer.or in a subdomain like ') }} sub.example.com </p>
    </div>
    @if ($reinstall)
    <div class="form-group">
        <label data-id="bg_option" class="primary_checkbox d-flex mr-12 ">
            <input name="re_install" type="checkbox">
            <span class="checkmark"></span>
            <span class="ml-2">{{_trans('installer.Re-install System')}}</span>
        </label>
    </div>
    @endif
    <div class="px-5 pb-4 d-flex flex-column  gap-3">

    <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn color mb-3 btn-primary px-5 py-3 align-items-start follow-next-step submit"> {{ @$data['button_text'] }}  </button>
    </div>
        <button type="button" class="btn color btn-primary px-5 py-3 align-items-start follow-next-step submitting"
            disabled style="display:none"> <b>{{ _trans('installer.Submitting') }}</b> </button>
    </div>

</form>

@stop
@push('js')
<script>
    _formValidation('content_form');
        $(document).ready(function() {
            setTimeout(function() {
                $('.preloader h2').text('Wait for a moment...');
            }, 2000);
        })
</script>
@endpush