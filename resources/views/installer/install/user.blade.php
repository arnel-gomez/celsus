@extends('installer.layouts.app_install', ['title' => @$data['title']])
@section('content')

<!-- from section -->

<form class="pb-3 content-body" method="post" action="{{ route('service.user_post') }}" id="content_form">
    @csrf
    <div class="mb-3 px-5 pt-5">
        <label class="form-label"><b>{{ _trans('installer.Email') }}<span class="star">*</span></b></label>
        <input type="email" class="form-control" name="email" id="email" required="required"
            placeholder="{{ _trans('installer.Email') }}">
    </div>
    <div class="mb-3 px-5">
        <label class="form-label" for="password"><b>{{ _trans('installer.Password') }}<span
                    class="star">*</span></b></label>
        <input type="password" class="form-control" name="password" id="password"
            placeholder="{{ _trans('installer.Password') }}" required>

    </div>
    <div class="mb-3 px-5 pb-3">
        <label class="form-label" for="password_confirmation"><b>{{ _trans('installer.Password Confirmation') }}<span
                    class="star">*</span></b></label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required
            placeholder="{{ _trans('installer.Password Confirmation') }}" data-parsley-equalto="#password">
    </div>
    @if ((env('APP_CRM')==true) && ( env('APP_ENV')=='local') )
    <div class="px-5 pb-4 d-flex align-items-center gap-2">
        <input class="form-check-input" type="checkbox" name="seed" id="flexRadioDefault2" />
        <label class="form-check-label" for="flexRadioDefault2">
            {{ _trans('installer.Install With Demo Data') }}
        </label>
    </div>
    @endif
    <div class="px-5 pb-4 d-flex flex-column  gap-3">

        <div class="d-flex justify-content-between mt-4">
         
            <button type="submit"
                class="btn color btn-primary px-5 mb-3  py-3 align-items-start follow-next-step submit bc-color">{{
                _trans('installer.Ready To Go') }}</button>
        </div>
        <button type="button"
            class="btn color btn-primary px-5 py-3 align-items-start follow-next-step submitting bc-color" disabled
            style="display:none">{{ _trans('installer.submitting') }} »</button>
    </div>
</form>
@stop
@push('js')
<script>
    _formValidation('content_form');
        $(document).ready(function() {
            setTimeout(function() {
                $('.preloader h2').text('{{ _trans('installer.Please do not refresh or close the browser') }}');
            }, 2000);
        })
</script>
@endpush