@if(Auth::check())
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MENÚ</li>
            @role(['admin','operador'])
            @if(isset($navigation) && $navigation == 'llamadashome')
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-phone"></i> <span>Llamadas</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu menu-open" style="display: block">
                    @else
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-phone"></i> <span>Llamadas</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            @endif

                            @role(['admin', 'operador'])
                            <li>{!! Html::decode(link_to('/llamadashome/busqueda','<i class="fa fa-search"></i>
                                Busqueda'))
                                !!}</li>
                            @endrole

                            @role(['admin', 'operador'])
                            <li>{!! Html::decode(link_to('/llamadashome/registro','<i class="fa fa-book"></i>
                                Registro'))
                                !!}</li>
                            @endrole

                            @role(['admin', 'operador'])
                            <li>{!! Html::decode(link_to('/llamadashome/reportes','<i
                                    class="fa-solid fa-file-excel"></i>
                                Reportes'))
                                !!}</li>
                            @endrole

                        </ul>
                    </li>

                    @endrole
                    <!-- @role(['admin','operador'])
                    @if(isset($navigation) && $navigation == 'postventastraslados')
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-wrench"></i> <span>PostVentas</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu menu-open" style="display: block">
                            @else
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-tty"></i> <span>PostVentas</span> <i
                                        class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    @endif

                                    @role(['admin', 'operador'])
                                    <li>{!! Html::decode(link_to('/postventas/registro','<i class="fa fa-book"></i>
                                        Registro'))
                                        !!}</li>
                                    @endrole
                                </ul>
                            </li>
                            @endrole -->

                    <!-- 
                    @role(['admin','operador'])
                    @if(isset($navigation) && $navigation == 'desperfecto')
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-life-ring"></i> <span>Daños</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu menu-open" style="display: block">
                            @else
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-life-ring"></i> <span>Daños</span> <i
                                        class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    @endif

                                    @role(['admin', 'operador'])
                                    <li>{!! Html::decode(link_to('/desperfecto/preparacionserviciosefectiva','<i
                                            class="fa fa-book"></i>
                                        P.Servicios Efectiva'))
                                        !!}</li>
                                    @endrole
                                    @role(['admin', 'operador'])
                                    <li>{!!
                                        Html::decode(link_to('/desperfecto/preparacionserviciotransferencia','<i
                                            class="fa fa-book"></i>
                                        P.Servicios Transferencia'))
                                        !!}</li>
                                    @endrole

                                </ul>
                            </li>
                            @endrole -->

                    <!-- 
                    @role(['admin','operador'])
                    @if(isset($navigation) && $navigation == 'consulta')
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-search"></i> <span>Consultas</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu menu-open" style="display: block">
                            @else
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-search"></i> <span>Consultas</span> <i
                                        class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    @endif

                                    @role(['admin', 'operador'])
                                    <li>{!!
                                        Html::decode(link_to('/consulta/buscar','<i class="fa fa-book"></i>
                                        Buscar'))
                                        !!}</li>
                                    @endrole
                                </ul>
                            </li>
                            @endrole -->
                    @role(['admin','operador', 'operador_n2'])
                    @if(isset($navigation) && $navigation == 'inconsistencias')
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-bug"></i> <span>Inconsistencias</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu menu-open" style="display: block">
                            @else
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-bug"></i> <span>Inconsistencias</span> <i
                                        class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    @endif
                                    @role(['admin','operador'])
                                    <li>{!! Html::decode(link_to('/inconsistencias/buscar','<i class="fa fa-search"></i>
                                        Búsqueda de Casos')) !!}</li>
                                    @endrole
                                    @role(['admin', 'operador'])
                                    <li>{!! Html::decode(link_to('/inconsistencias/registro','<i class="fa fa-book"></i>
                                        Registro')) !!}</li>
                                    @endrole
                                    @role(['admin'])
                                    <li>{!!
                                        Html::decode(link_to('/inconsistencias/reporte-atendidos','<i
                                            class="fa-solid fa-file-excel"></i> Reporte Atendidos'))
                                        !!}
                                    </li>
                                    @endrole
                                    @role(['admin'])
                                    <li>{!!
                                        Html::decode(link_to('/inconsistencias/reporte-pendientes','<i
                                            class="fa-solid fa-file-excel"></i> Reporte
                                        Pendientes')) !!}
                                    </li>
                                    @endrole
                                </ul>
                            </li>
                            @endrole
                            @role(['admin','operador'])
                            @if(isset($navigation) && $navigation == 'penalizaciones')
                            <li class="treeview active">
                                <a href="#">
                                    <i class="fa fa-exclamation-triangle"></i> <span>Penalización 0</span> <i
                                        class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu menu-open" style="display: block">
                                    @else
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-exclamation-triangle"></i> <span>Penalización
                                                0</span> <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu">
                                            @endif
                                            @role(['admin', 'operador'])
                                            <li>{!!
                                                Html::decode(link_to('/penalizaciones/registro','<i
                                                    class="fa fa-book"></i>
                                                Registro')) !!}</li>
                                            @endrole
                                            @role(['admin'])
                                            <li>{!!
                                                Html::decode(link_to('/penalizaciones/reportes','<i
                                                    class="fa-solid fa-file-excel"></i> Reporte'))
                                                !!}</li>
                                            @endrole
                                            @role(['admin'])
                                            <li>{!!
                                                Html::decode(link_to('/penalizaciones/administrar-agentes','<i
                                                    class="fa fa-users"></i> Agentes')) !!}</li>
                                            @endrole
                                        </ul>
                                    </li>
                                    @endrole
                                    @role(['admin','operador'])
                                    @if(isset($navigation) && $navigation == 'reclamos')
                                    <li class="treeview active">
                                        <a href="#">
                                            <i class="fa fa-wrench"></i> <span>Reclamos
                                                Tecnica</span> <i class="fa fa-angle-left pull-right"></i>
                                        </a>
                                        <ul class="treeview-menu menu-open" style="display: block">
                                            @else
                                            <li class="treeview">
                                                <a href="#">
                                                    <i class="fa fa-wrench"></i> <span>Reclamos

                                                        Tecnica</span> <i class="fa fa-angle-left pull-right"></i>
                                                </a>
                                                <ul class="treeview-menu">
                                                    @endif
                                                    @role(['admin', 'operador'])
                                                    <li>{!!
                                                        Html::decode(link_to('/reclamos/buscar','<i
                                                            class="fa fa-search"></i> Buscar'))
                                                        !!}</li>
                                                    @endrole
                                                    @role(['admin', 'operador'])
                                                    <li>{!!
                                                        Html::decode(link_to('/reclamos/registro','<i
                                                            class="fa fa-book"></i> Registro'))
                                                        !!}</li>
                                                    @endrole
                                                    @role(['admin'])
                                                    <li>{!!
                                                        Html::decode(link_to('/reclamos/reporte-atendidos','<i
                                                            class="fa-solid fa-file-excel"></i>
                                                        Reporte
                                                        Atendidos'))
                                                        !!}
                                                    </li>
                                                    @endrole
                                                    @role(['admin', 'operador'])
                                                    <li>{!!
                                                        Html::decode(link_to('/reclamos/reporte-pendientes','<i
                                                            class="fa-solid fa-file-excel"></i>
                                                        Reporte
                                                        Pendientes')) !!}
                                                    </li>
                                                    @endrole
                                                </ul>
                                            </li>
                                            @endrole
                                            @role(['admin','operador'])
                                            @if(isset($navigation) && $navigation == 'qflows')
                                            <li class="treeview active">
                                                <a href="#">
                                                    <i class="fa fa-tags"></i>
                                                    <span>Qflow</span> <i class="fa fa-angle-left pull-right"></i>
                                                </a>
                                                <ul class="treeview-menu menu-open" style="display: block">
                                                    @else
                                                    <li class="treeview">
                                                        <a href="#">
                                                            <i class="fa fa-tags"></i>
                                                            <span>Qflow</span> <i
                                                                class="fa fa-angle-left pull-right"></i>
                                                        </a>
                                                        <ul class="treeview-menu">
                                                            @endif
                                                            @role(['admin', 'operador'])
                                                            <li>{!!
                                                                Html::decode(link_to('/qflows/registro','<i
                                                                    class="fa fa-book"></i>
                                                                Registro'))
                                                                !!}</li>
                                                            @endrole
                                                            @role(['admin'])
                                                            <li>{!!
                                                                Html::decode(link_to('/qflows/reporte-atendidos','<i
                                                                    class="fa-solid fa-file-excel"></i>
                                                                Atendidos'))
                                                                !!}
                                                            </li>
                                                            @endrole
                                                        </ul>
                                                    </li>
                                                    @endrole
                                                    @role(['admin'])
                                                    @if(isset($navigation) && $navigation ==
                                                    'configuracion')
                                                    <li class="treeview active">
                                                        <a href="#">
                                                            <i class="fa fa-wrench"></i>
                                                            <span>Configuración</span> <i
                                                                class="fa fa-angle-left pull-right"></i>
                                                        </a>
                                                        <ul class="treeview-menu menu-open" style="display: block">
                                                            @else
                                                            <li class="treeview">
                                                                <a href="#">
                                                                    <i class="fa fa-wrench"></i>
                                                                    <span>Configuración</span>
                                                                    <i class="fa fa-angle-left pull-right"></i>
                                                                </a>
                                                                <ul class="treeview-menu">
                                                                    @endif
                                                                    @role(['admin'])
                                                                    <li>{!!
                                                                        Html::decode(link_to('/usuarios','<i
                                                                            class="fa fa-users"></i>
                                                                        Usuarios'))
                                                                        !!}
                                                                    </li>
                                                                    @endrole

                                                                    @role(['admin'])
                                                                    <li>{!!
                                                                        Html::decode(link_to('/tecnicos/registro','<svg
                                                                            width="15" height="15" viewBox="0 0 576 512"
                                                                            style="color: #777777">
                                                                            <!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                                            <path fill="#777777"
                                                                                d="M256 32c-17.7 0-32 14.3-32 32v2.3 99.6c0 5.6-4.5 10.1-10.1 10.1c-3.6 0-7-1.9-8.8-5.1L157.1 87C83 123.5 32 199.8 32 288v64H544l0-66.4c-.9-87.2-51.7-162.4-125.1-198.6l-48 83.9c-1.8 3.2-5.2 5.1-8.8 5.1c-5.6 0-10.1-4.5-10.1-10.1V66.3 64c0-17.7-14.3-32-32-32H256zM16.6 384C7.4 384 0 391.4 0 400.6c0 4.7 2 9.2 5.8 11.9C27.5 428.4 111.8 480 288 480s260.5-51.6 282.2-67.5c3.8-2.8 5.8-7.2 5.8-11.9c0-9.2-7.4-16.6-16.6-16.6H16.6z" />
                                                                        </svg>
                                                                        Tecnicos'))
                                                                        !!}</li>
                                                                    @endrole
                                                                    @role(['admin'])
                                                                    <!-- <li>{!!
                                                                        Html::decode(link_to('/administracion/motivos','<i
                                                                            class="fa fa-commenting-o"></i>
                                                                        Motivos'))
                                                                        !!}</li> -->
                                                                    @endrole
                                                                </ul>


                                                            </li>
                                                            @endrole
                                                        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@endif