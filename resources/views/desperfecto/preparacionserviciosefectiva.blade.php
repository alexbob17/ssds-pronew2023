@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('success_message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ session('success_message') }}</p>
        </div>
        @endif
        <!-- general form elements -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Datos del Caso</h3>
            </div>

        </div>
    </div>
    @endsection

    @section('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
    <!-- User definided -->
    <link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}">
    <style>
    [type="submit"]:disabled {
        cursor: default;
    }
    </style>
    @endsection

    @section('scripts')
    <!-- datepicker -->
    <script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.es.js') }}" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="{{ asset('/plugins/input-mask/inputmask.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/input-mask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/input-mask/inputmask.regex.extensions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>

    <!-- boostrap-fileinput -->
    <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/bootstrap-fileinput/js/fileinput_locale_es.js') }}" type="text/javascript"></script>
    <!-- User definided -->
    <script src="{{ asset('/js/qflows/registro.js?2.4.0') }}" type="text/javascript"></script>
    @endsection