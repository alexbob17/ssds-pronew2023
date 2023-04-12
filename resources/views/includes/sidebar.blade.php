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
                    <i class="fa fa-mobile"></i> <span>Llamadas</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu menu-open" style="display: block">
                    @else
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-mobile"></i> <span>Llamadas</span> <i
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
                            <li>{!! Html::decode(link_to('/llamadashome/reportes','<i class="fa fa-file-excel-o"></i>
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
                                            class="fa fa-file-excel-o"></i> Reporte Atendidos'))
                                        !!}
                                    </li>
                                    @endrole
                                    @role(['admin'])
                                    <li>{!!
                                        Html::decode(link_to('/inconsistencias/reporte-pendientes','<i
                                            class="fa fa-file-excel-o"></i> Reporte
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
                                    <i class="fa fa-frown-o"></i> <span>Penalización 0</span> <i
                                        class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu menu-open" style="display: block">
                                    @else
                                    <li class="treeview">
                                        <a href="#">
                                            <i class="fa fa-frown-o"></i> <span>Penalización
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
                                                    class="fa fa-file-excel-o"></i> Reporte'))
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
                                                            class="fa fa-file-excel-o"></i>
                                                        Reporte
                                                        Atendidos'))
                                                        !!}
                                                    </li>
                                                    @endrole
                                                    @role(['admin', 'operador'])
                                                    <li>{!!
                                                        Html::decode(link_to('/reclamos/reporte-pendientes','<i
                                                            class="fa fa-file-excel-o"></i>
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
                                                                    class="fa fa-file-excel-o"></i>
                                                                Reporte
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
                                                                        Html::decode(link_to('/tecnicos/registro','<i
                                                                            class="fa-solid fa-helmet-safety"></i>
                                                                        Tecnicos'))
                                                                        !!}</li>
                                                                    @endrole
                                                                    @role(['admin'])
                                                                    <li>{!!
                                                                        Html::decode(link_to('/administracion/motivos','<i
                                                                            class="fa fa-commenting-o"></i>
                                                                        Motivos'))
                                                                        !!}</li>
                                                                    @endrole
                                                                </ul>


                                                            </li>
                                                            @endrole
                                                        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
@endif