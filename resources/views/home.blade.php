@extends('app')

@section('content')

<div class="row">
	<!-- left column -->
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
				<h3 class="box-title">Bienvenido, {{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}}.</h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
			</div>
			<div class="box-body">
				<p>Tu IP actual es: {{{ $ip_direction }}}</p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<!-- Select2 -->
<script src="{{ asset('/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
@endsection
