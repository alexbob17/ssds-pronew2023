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
        <div class="box" style="border-top-color:#205295">
            <div class="box-header with-border">
                <h3 class="box-title" style="    display: inline-block;
				font-size: 19px;
				margin: 0;
				line-height: 1;
				font-weight: 500;
				font-family: 'Poppins';">Bienvenido, {{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}}.</h3>
                <!-- <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div> -->
            </div>

        </div>


        <div class="col-lg-12">
            <div class="single_element">
                <div class="quick_activity">
                    <div class="row">
                        <div class="col-12">
                            <div class="quick_activity_wrap">
                                <div class="single_quick_activity">
                                    <h4>Reclamos Pendientes</h4>
                                    <h3><span class="counter">{{ $Rpendientes[0]->{"COUNT(*)"} }}</span> </h3>
                                    <p> Enero 2023</p>
                                </div>
                                <div class="single_quick_activity">
                                    <h4>Inconsistencias Atendidas</h4>
                                    <h3><span class="counter">{{ $RAtendido[0]->{"COUNT(*)"} }}</span> </h3>
                                    <p>Enero 2023</p>
                                </div>
                                <div class="single_quick_activity">
                                    <h4>Total Penalizaciónes</h4>
                                    <h3><span class="counter">{{ $RPenalizacion[0]->{"COUNT(*)"} }}</span> </h3>
                                    <p>Año 2023</p>
                                </div>
                                <div class="single_quick_activity">
                                    <h4>Registro Llamadas</h4>
                                    <h3><span class="counter">0</span> </h3>
                                    <p>Año 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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