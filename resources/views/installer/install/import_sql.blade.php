@extends('installer.layouts.app_install', ['title' => @$data['title']])
@section('content')
<!-- from section -->
<div class="px-5 py-4 d-flex flex-column justify-content-left  gap-3 content-body">

    <h3>{{ _trans('installer.Open Database') }}</h3>
    <img src="{{ asset('public/installer/images/Import.png') }}" alt="">

    <h3>{{ _trans('installer.Find SQL') }}</h3>
    <p>{{ _trans('installer.01)') }} {{ _trans('installer.Find the sql file, go to ') }} <code>Main_File/database/crm.sql</code> </p>
    <p>{{ _trans('installer.02)') }} {{ _trans('installer.Login into your ') }} <code>{{ _trans('installer.phpMyAdmin') }}</code> </p>
    <p>{{ _trans('installer.03)') }} {{ _trans('installer.Create and Select your ') }} <code>{{ _trans('installer.Database') }}</code> {{ _trans('installer.If aleady exist any data then truncate database') }} </p>
    <p>{{ _trans('installer.04)') }} {{ _trans('installer.Import SQL file ') }} <code>Main_File/database/crm.sql</code> </p>
    <p>{{ _trans('installer.05)') }} {{ _trans('installer.Disbale - Partial import & Enable foreign key checks ') }}  </p>
    <p>{{ _trans('installer.06)') }} {{ _trans('installer.Click Import button to import sql') }}  </p>


    <h4 class="mt-3">{{ _trans('installer.After Import SQL') }}</h4>
    <form action="{{ route('service.import_sql') }}" method="POST">
    @csrf 

    <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn color mb-3 btn-primary px-5 py-3 align-items-start follow-next-step submit"> {{ @$data['button_text'] }}  </button>
    </div>
    </form>

</div>
    
@stop