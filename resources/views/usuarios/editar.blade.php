@extends('app')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('error_message'))
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>{{ session('error_message') }}</p>
            </div>
        </div>
        @endif
        @if (session()->has('success_message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ session('success_message') }}</p>
        </div>
        @endif
        <!-- general form elements -->
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Datos del Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['url' => '/usuarios/editar/' . $id, 'autocomplete' => 'off', 'enctype' =>
            'multipart/form-data', 'method' => 'put']) !!}
            {!! Form::hidden('id', $id) !!}
            <div class="box-body">
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-user', 6, 'username', $errors, trans('usuarios/registro.username'),
                    $username) !!}
                    {!! Form::inputWithIcon('fa-envelope', 6, 'email', $errors, trans('usuarios/registro.email'),
                    $email) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-file', 6, 'first_name', $errors, trans('usuarios/registro.first_name'),
                    $first_name) !!}
                    {!! Form::inputWithIcon('fa-file', 6, 'last_name', $errors, trans('usuarios/registro.last_name'),
                    $last_name) !!}
                </div>
                <div class="form-group-container">
                    {!! Form::inputWithIcon('fa-file', 6, 'organizational_area', $errors,
                    trans('usuarios/registro.organizational_area'), $organizational_area) !!}
                    @if (Auth::user()->username != $username)
                    {!! Form::selection(6, 'role', $errors, $roles, $role, trans('usuarios/registro.role'),
                    trans('usuarios/registro.ph_role')) !!}
                    @endif
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.box -->
    </div>
</div>
@endsection

@section('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('/plugins/bootstrap-fileinput/css/fileinput.min.css') }}" type="text/css"
    media="all" />
<!-- User definided -->
<link rel="stylesheet" href="{{ asset('/css/center-modal.css') }}">
<style>
[name="username"]:disabled {
    cursor: default;
}
</style>
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
<!-- InputMask -->
<script src="{{ asset('/plugins/input-mask/inputmask.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/inputmask.regex.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>
<script type="text/javascript">
$(function() {
    $('[name="username"]').attr('disabled', 'disabled');
});
</script>
@endsection