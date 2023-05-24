<?php
namespace SSD\Http\Controllers;


use SSD\Models\consultasRealizada;
use SSD\Models\agendamientosRealizados;

use SSD\Models\Instalaciones\InstalacionDthAnulada;
use SSD\Models\Instalaciones\InstalacionDthObjetada;
use SSD\Models\Instalaciones\InstalacionDthRealizada;
use SSD\Models\Instalaciones\InstalacionesDthRefresh;


use SSD\Models\Instalaciones\InstalacionCobreAnulada;
use SSD\Models\Instalaciones\InstalacionCobreObjetada;
use SSD\Models\Instalaciones\InstalacionCobreRealizada;

use SSD\Models\Instalaciones\InstalacionAdslAnulada;
use SSD\Models\Instalaciones\InstalacionAdslObjetada;
use SSD\Models\Instalaciones\InstalacionAdslRealizada;


use SSD\Models\Instalaciones\InstalacionGponAnulada;
use SSD\Models\Instalaciones\InstalacionGponTransferida;
use SSD\Models\Instalaciones\InstalacionGponObjetada;
use SSD\Models\Instalaciones\InstalacionGponRealizada;


use SSD\Models\Instalaciones\InstalacionHfcRealizada;
use SSD\Models\Instalaciones\InstalacionHfcObjetada;
use SSD\Models\Instalaciones\InstalacionHfcTransferida;
use SSD\Models\Instalaciones\InstalacionHfcAnulada;
use SSD\Models\Instalaciones\InstalacionesRefresh;


use SSD\Models\Reparaciones\repacionesDth_Transferido;
use SSD\Models\Reparaciones\repacionesDth_Realizado;
use SSD\Models\Reparaciones\repacionesDth_Objetado;


use SSD\Models\Reparaciones\repacionesCobre_Realizado;
use SSD\Models\Reparaciones\repacionesCobre_Objetado;
use SSD\Models\Reparaciones\repacionesCobre_Transferido;


use SSD\Models\Reparaciones\repacionesAdsl_Realizado;
use SSD\Models\Reparaciones\repacionesAdsl_Objetado;
use SSD\Models\Reparaciones\repacionesAdsl_Transferido;


use SSD\Models\Reparaciones\repacionesGpon_Realizado;
use SSD\Models\Reparaciones\reparacionesGpon_Objetado;
use SSD\Models\Reparaciones\reparacionesGpon_Transferido;


use SSD\Models\Reparaciones\reparacionesHfc_Realizado;
use SSD\Models\Reparaciones\reparacionesHfc_Objetado;
use SSD\Models\Reparaciones\reparacionesHfc_Transferido;

use SSD\Models\Postventas\PostventaCambioNumeroCobreRealizada;
use SSD\Models\Postventas\PostventaCambioNumeroCobreObjetada;
use SSD\Models\Postventas\PostventaCambioNumeroCobreAnulada;

use SSD\Models\Postventas\PostventaRetiroHfcRealizada;
use SSD\Models\Postventas\PostventaRetiroHfcObjetada;
use SSD\Models\Postventas\PostventaRetiroHfcAnulada;

use SSD\Models\Postventas\PostventaRetiroDthRealizada;
use SSD\Models\Postventas\PostventaRetiroDthAnulada;


use SSD\Models\Postventas\PostventaMigracionTransferida;
use SSD\Models\Postventas\PostventaMigracionAnulada;
use SSD\Models\Postventas\PostventaMigracionObjetada;
use SSD\Models\Postventas\PostventaMigracionRealizada;

use SSD\Models\Postventas\PostventaCambioEquipoDthAnulada;
use SSD\Models\Postventas\PostventaCambioEquipoDthObjetado;
use SSD\Models\Postventas\PostventaCambioEquipoDthRealizada;

use SSD\Models\Postventas\PostventaCambioEquipoAdslAnulada;
use SSD\Models\Postventas\PostventaCambioEquipoAdslObjetado;
use SSD\Models\Postventas\PostventaCambioEquipoAdslRealizado;

use SSD\Models\Postventas\PostventaCambioEquipoGpon_Anulado;
use SSD\Models\Postventas\PostventaCambioEquipoGpon_Objetado;
use SSD\Models\Postventas\PostventaCambioEquipoGpon_Realizado;

use SSD\Models\Postventas\PostventaCambioEquipoHfc_Anulado;
use SSD\Models\Postventas\PostventaCambioEquipoHfc_Objetado;
use SSD\Models\Postventas\PostventaCambioEquipoHfc_Realizado;

use SSD\Models\Postventas\PostventaAdicionDth_Anulado;
use SSD\Models\Postventas\PostventaAdicionDth_Objetado;
use SSD\Models\Postventas\PostventaAdicionDth_Realizado;

use SSD\Models\Postventas\PostventaAdicionGpon_Anulada;
use SSD\Models\Postventas\PostventaAdicionGpon_Objetado;
use SSD\Models\Postventas\PostventaAdicionGpon_Realizado;

use SSD\Models\Postventas\PostventaAdicionHfc_Anulada;
use SSD\Models\Postventas\PostventaAdicionHfc_Objetado;
use SSD\Models\Postventas\PostventaAdicionHfc_Realizado;

use SSD\Models\Postventas\PostventaTrasladoAdsl_Anulada;
use SSD\Models\Postventas\PostventaTrasladoAdsl_Realizado;
use SSD\Models\Postventas\PostventaTrasladoAdsl_Objetado;

use SSD\Models\Postventas\PostventaTrasladoDthAnulada;
use SSD\Models\Postventas\PostventaTrasladoDth_Objetado;
use SSD\Models\Postventas\PostventaTrasladoDth_Realizado;

use SSD\Models\Postventas\PostventaTrasladoCobre_Anulada;
use SSD\Models\Postventas\PostventaTrasladoCobre_Objetado;
use SSD\Models\Postventas\PostventaTrasladoCobre_Realizado;

use SSD\Models\Postventas\PostventaTrasladoGpon_Anulado;
use SSD\Models\Postventas\PostventaTrasladoGpon_Transferido;
use SSD\Models\Postventas\PostventaTrasladoGpon_Objetado;
use SSD\Models\Postventas\PostventaTrasladoGpon_Realizado;

use SSD\Models\Postventas\PostventaTrasladoHfc_Transferido;
use SSD\Models\Postventas\PostventaTrasladoHfc_Anulado;
use SSD\Models\Postventas\PostventaTrasladoHfc_Objetado;
use SSD\Models\Postventas\PostventaTrasladoHfc_Realizado;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use SSD\User;
use Illuminate\Support\Facades\DB;




class ReportesController extends Controller
{
    public function showReporte(Request $request)
    {       
        $breadcrumb = [
            ['name' => 'Reportes - Saturado' ]
        ];        
        $resultados =null;
        $llamada_motivo =null;
        $tecnologia =null;
        $tipo_postventa =null;
        $tipo_actividad =null;
        $users =null;


            
        return view('llamadashome/reportes', [
            'resultados' => $resultados,
            'llamada_motivo' => $llamada_motivo,
            'tecnologia' => $tecnologia,
            'tipo_postventa'=>$tipo_postventa,
            'tipo_actividad' => $tipo_actividad,
            'users' => User::pluck('username')
        ])
        ->with('page_title', 'Generar - Reporte')    
        ->with('navigation', 'Generar - Reporte'); 
    }

    public function usersAll()
    {
        $users = User::pluck('first_name');

        // dd($users);

        $resultados =null;
        $llamada_motivo =null;
        $tecnologia =null;
        $tipo_postventa =null;
        $tipo_actividad =null;

        return view('llamadashome/reportes', [
            'resultados' => $resultados,
            'llamada_motivo' => $llamada_motivo,
            'tecnologia' => $tecnologia,
            'tipo_postventa'=>$tipo_postventa,
            'tipo_actividad' => $tipo_actividad,
            'users' => User::pluck('username')
        ])
        ->with('page_title', 'Generar - Reporte')    
        ->with('navigation', 'Generar - Reporte'); 
    }


 public function generarReporte(Request $request)
    {
        $tecnologia = $request->input('tecnologia');
        $tipo_actividad = $request->input('tipo_actividad');
        $tipo_postventa = $request->input('tipo_postventa');
        $llamada_motivo = $request->input('motivo_llamada');
        $selected_user = $request->input('usersall');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        
    
        if ($llamada_motivo === 'CONSULTAS') {
            $resultados = consultasRealizada::when($llamada_motivo !== 'CONSULTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        } else if ($llamada_motivo === 'AGENDAMIENTOS') {
            $resultados = agendamientosRealizados::when($llamada_motivo !== 'AGENDAMIENTOS', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        } else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'ANULADA') {
            $resultados = InstalacionDthAnulada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'OBJETADA') {
            $resultados = InstalacionDthObjetada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = InstalacionDthRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadDth','ordenTv_Dth as N_Orden','ObservacionesDth as Comentarios', 'TrabajadoDthRealizado as Trabajado','username_creacion','created_at')
            ->where('TrabajadoDthRealizado', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_objetada_pendiente = InstalacionDthObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadDth','OrdenObj_Dth as N_Orden','ComentarioObjetado_Dth as Comentarios','TrabajadoObj_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObj_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = InstalacionDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadDth','OrdenAnulada_Dth as N_Orden','ComentarioAnulada_Dth as Comentarios','TrabajadoAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_dth_realizada_pendiente->union($instalacion_dth_anulada_pendiente)
                ->union($instalacion_dth_objetada_pendiente)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'REALIZADA') {
            $resultados = InstalacionDthRealizada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'COBRE' && $tipo_actividad === 'ANULADA') {
            $resultados = InstalacionCobreAnulada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'COBRE' && $tipo_actividad === 'OBJETADA') {
            $resultados = InstalacionCobreObjetada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'COBRE' && $tipo_actividad === 'REALIZADA') {
            $resultados = InstalacionCobreRealizada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'COBRE' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = InstalacionCobreRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadCobre','OrdenLineaCobre as N_Orden','ObservacionesCobre as Comentarios', 'TrabajadoCobre as Trabajado','username_creacion','created_at')
            ->where('TrabajadoCobre', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = InstalacionCobreObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadCobre','OrdenCobre_Objetada as N_Orden','ComentariosCobre_Objetados as Comentarios','TrabajadoCobre_Objetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoCobre_Objetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = InstalacionCobreAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadCobre','OrdenAnuladaCobre as N_Orden','ComentarioAnulada_Cobre as Comentarios','TrabajadoAnulada_Cobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Cobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'ADSL' && $tipo_actividad === 'ANULADA') {
            $resultados = InstalacionAdslAnulada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'ADSL' && $tipo_actividad === 'OBJETADA') {
            $resultados = InstalacionAdslObjetada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'ADSL' && $tipo_actividad === 'REALIZADA') {
            $resultados = InstalacionAdslRealizada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'ADSL' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = InstalacionAdslRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadAdsl','orden_internet_adsl as N_Orden','Obvservaciones_Adsl as Comentarios', 'TrabajadoAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_objetada_pendiente = InstalacionAdslObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadAdsl','OrdenAdsl_Objetada as N_Orden','ComentariosObjetada_Adsl as Comentarios','TrabajadoAdslObjetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdslObjetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = InstalacionAdslAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadAdsl','OrdenAnuladaAdsl as N_Orden','ComentarioAnulada_Adsl as Comentarios','TrabajadoAnulada_Adsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Adsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'ANULADA') {
            $resultados = InstalacionGponAnulada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'OBJETADA') {
            $resultados = InstalacionGponObjetada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = InstalacionGponTransferida::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'REALIZADA') {
            $resultados = InstalacionGponRealizada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'GPON' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_gpon_realizada_pendiente = InstalacionGponRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon','OrdenInternet_Gpon as N_OrdenInternet','OrdenTv_Gpon as N_OrdenTv','OrdenLinea_Gpon as N_OrdenLinea','ObservacionesGpon as Comentarios', 'TrabajadoGpon as Trabajado','username_creacion','created_at')
            ->where('TrabajadoGpon', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_gpon_objetada_pendiente = InstalacionGponObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon','OrdenInternet_Gpon as N_OrdenInternet','OrdenTv_Gpon as N_OrdenTv','OrdenLinea_Gpon as N_OrdenLinea','ComentariosGpon_Objetada as Comentarios','TrabajadoGpon_Objetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoGpon_Objetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_gpon_anulada_pendiente = InstalacionGponAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadGpon','OrdenInternet_Gpon as N_OrdenInternet','OrdenTv_Gpon as N_OrdenTv','OrdenLinea_Gpon as N_OrdenLinea','ComentarioAnulada_Gpon as Comentarios','TrabajadoAnulada_Gpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Gpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_gpon_transferida_pendiente = InstalacionGponTransferida::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadGpon','OrdenInternet_Gpon as N_OrdenInternet','OrdenTv_Gpon as N_OrdenTv','OrdenLinea_Gpon as N_OrdenLinea','ComentarioTransferido_Gpon as Comentarios','TrabajadoTransferido_Gpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferido_Gpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });   

            $resultados = $instalacion_gpon_realizada_pendiente->union($instalacion_gpon_anulada_pendiente)
                ->union($instalacion_gpon_objetada_pendiente)->union($instalacion_gpon_transferida_pendiente)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'ANULADA') {
            $resultados = InstalacionHfcAnulada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'OBJETADA') {
            $resultados = InstalacionHfcObjetada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = InstalacionHfcTransferida::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'REALIZADA') {
            $resultados = InstalacionHfcRealizada::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'REFRESH') {
            $resultados = InstalacionesRefresh::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_hfc_realizada_pendiente = InstalacionHfcRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ObservacionesHfc as Comentarios', 'TrabajadoHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_hfc_objetada_pendiente = InstalacionHfcObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentariosObjetados_Hfc as Comentarios','TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_hfc_anulada_pendiente = InstalacionHfcAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentarioAnulada_Hfc as Comentarios','TrabajadoAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_hfc_transferida_pendiente = InstalacionHfcTransferida::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentariosTransferida_Hfc as Comentarios','TrabajadoTransferido_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferido_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });   

            $resultados = $instalacion_hfc_realizada_pendiente->union($instalacion_hfc_anulada_pendiente)
                ->union($instalacion_hfc_objetada_pendiente)->union($instalacion_hfc_transferida_pendiente)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }
        else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad === 'REALIZADA') {
            $instalacion_hfc_realizada_todos = InstalacionHfcRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ObservacionesHfc as Comentarios', 'TrabajadoHfc as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_gpon_realizada_todos = InstalacionGponRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon as tipo_actividad ','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','ObservacionesGpon as Comentarios','TrabajadoGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_realizada_todos = InstalacionCobreRealizada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadCobre as tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),'OrdenLineaCobre as N_OrdenLinea','ObservacionesCobre as Comentarios','TrabajadoCobre as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_realizada_todos = InstalacionDthRealizada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadDth as tipo_actividad','ordenTv_Dth as N_OrdenTv',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ObservacionesDth as Comentarios','TrabajadoDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });
                
            $instalacion_adsl_realizada_todos = InstalacionAdslRealizada::select('codigo_tecnico', 'tecnico', 'telefono', 'motivo_llamada', 'select_orden', 'dpto_colonia', 'tecnologia', 'tipo_actividadAdsl as tipo_actividad', DB::raw('NULL as N_OrdenTv'), 'orden_internet_adsl as N_OrdenInternet', DB::raw('NULL as N_OrdenLinea'), 'Obvservaciones_Adsl as Comentarios', 'TrabajadoAdsl as Trabajado', 'username_creacion', 'created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });
   

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_cobre_realizada_todos)
                ->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)->union($instalacion_adsl_realizada_todos)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad === 'OBJETADA') {
            $instalacion_hfc_realizada_todos = InstalacionHfcObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','MotivoObjetada_Hfc as Motivo_Objetada','ComentariosObjetados_Hfc as Comentarios', 'TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = InstalacionGponObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon as tipo_actividad ','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','MotivoObjetado_Gpon as Motivo_Objetada','ComentariosGpon_Objetada as Comentarios','TrabajadoGpon_Objetado as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_realizada_todos = InstalacionCobreObjetada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadCobre as tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),'OrdenCobre_Objetada as N_OrdenLinea','MotivoObjetada_Cobre as Motivo_Objetada ','ComentariosCobre_Objetados as Comentarios','TrabajadoCobre_Objetado as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_realizada_todos = InstalacionDthObjetada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadDth as tipo_actividad','OrdenObj_Dth as N_OrdenTv',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'MotivoObjetada_Dth as Motivo_Objetada','ComentarioObjetado_Dth as Comentarios','TrabajadoObj_Dth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });
            $instalacion_adsl_realizada_todos = InstalacionAdslObjetada::select('codigo_tecnico', 'tecnico', 'telefono', 'motivo_llamada', 'select_orden', 'dpto_colonia', 'tecnologia', 'tipo_actividadAdsl as tipo_actividad', DB::raw('NULL as N_OrdenTv'), 'OrdenAdsl_Objetada as N_OrdenInternet', DB::raw('NULL as N_OrdenLinea'),'MotivoObjetada_Adsl as Motivo_Objetada', 'ComentariosObjetada_Adsl as Comentarios', 'TrabajadoAdslObjetado as Trabajado', 'username_creacion', 'created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });
   

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_cobre_realizada_todos)
                ->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)->union($instalacion_adsl_realizada_todos)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad === 'ANULADA') {
            $instalacion_hfc_realizada_todos = InstalacionHfcAnulada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','MotivoAnulada_Hfc as Motivo_Anulada','ComentarioAnulada_Hfc as Comentarios', 'TrabajadoAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_gpon_realizada_todos = InstalacionGponAnulada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon as tipo_actividad ','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','MotivoAnulada_Gpon as Motivo_Anulada','ComentarioAnulada_Gpon as Comentarios','TrabajadoAnulada_Gpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_realizada_todos = InstalacionCobreAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadCobre as tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),'OrdenAnuladaCobre as N_OrdenLinea','MotivoAnulada_Cobre as Motivo_Anulada ','ComentarioAnulada_Cobre as Comentarios','TrabajadoAnulada_Cobre as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_realizada_todos = InstalacionDthAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadDth as tipo_actividad','OrdenAnulada_Dth as N_OrdenTv',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'MotivoAnulada_Dth as Motivo_Anulada','ComentarioAnulada_Dth as Comentarios','TrabajadoAnulada_Dth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });
            $instalacion_adsl_realizada_todos = InstalacionAdslAnulada::select('codigo_tecnico', 'tecnico', 'telefono', 'motivo_llamada', 'select_orden', 'dpto_colonia', 'tecnologia', 'tipo_actividadAdsl as tipo_actividad', DB::raw('NULL as N_OrdenTv'), 'OrdenAnuladaAdsl as N_OrdenInternet', DB::raw('NULL as N_OrdenLinea'),'MotivoAnulada_Adsl as Motivo_Anulada','ComentarioAnulada_Adsl as Comentarios', 'TrabajadoAnulada_Adsl as Trabajado', 'username_creacion', 'created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });  
   

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_cobre_realizada_todos)
                ->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)->union($instalacion_adsl_realizada_todos)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad === 'TRANSFERIDA') {
            $instalacion_hfc_realizada_todos = InstalacionHfcTransferida::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','MotivoTransferidoHfc as Motivo_Transferido','ComentariosTransferida_Hfc as Comentarios', 'TrabajadoTransferido_Hfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_gpon_realizada_todos = InstalacionGponTransferida::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon as tipo_actividad ','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','MotivoTransferidoGpon as Motivo_Transferido','ComentarioTransferido_Gpon as Comentarios','TrabajadoTransferido_Gpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'TODOS' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_hfc_realizada_pendiente = InstalacionHfcRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ObservacionesHfc as Comentarios', 'TrabajadoHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });

            $instalacion_hfc_objetada_pendiente = InstalacionHfcObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentariosObjetados_Hfc as Comentarios','TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });

            $instalacion_hfc_anulada_pendiente = InstalacionHfcAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentarioAnulada_Hfc as Comentarios','TrabajadoAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });

            $instalacion_hfc_transferida_pendiente = InstalacionHfcTransferida::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentariosTransferida_Hfc as Comentarios','TrabajadoTransferido_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferido_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });  

            $instalacion_dth_realizada_pendiente = InstalacionDthRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadDth as tipo_actividad','ordenTv_Dth as N_OrdenTv',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ObservacionesDth as Comentarios', 'TrabajadoDthRealizado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoDthRealizado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
    
            $instalacion_dth_objetada_pendiente = InstalacionDthObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadDth as tipo_actividad','OrdenObj_Dth as N_OrdenTv',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentarioObjetado_Dth as Comentarios','TrabajadoObj_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObj_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
    
            $instalacion_dth_anulada_pendiente = InstalacionDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadDth as tipo_actividad','OrdenAnulada_Dth as N_OrdenTv',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentarioAnulada_Dth as Comentarios','TrabajadoAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_realizada_pendiente = InstalacionCobreRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadCobre as tipo_actividad',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenTv'),'OrdenLineaCobre as N_OrdenLinea','ObservacionesCobre as Comentarios', 'TrabajadoCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
        
            $instalacion_cobre_objetada_pendiente = InstalacionCobreObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadCobre as tipo_actividad',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenTv'),'OrdenCobre_Objetada as N_OrdenLinea','ComentariosCobre_Objetados as Comentarios','TrabajadoCobre_Objetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoCobre_Objetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
        
            $instalacion_cobre_anulada_pendiente = InstalacionCobreAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadCobre as tipo_actividad',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenTv'),'OrdenAnuladaCobre as N_OrdenLinea','ComentarioAnulada_Cobre as Comentarios','TrabajadoAnulada_Cobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Cobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });

            $instalacion_adls_realizada_pendiente = InstalacionAdslRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadAdsl as tipo_actividad','orden_internet_adsl as N_OrdenInternet',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenLinea'),'Obvservaciones_Adsl as Comentarios', 'TrabajadoAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
        
            $instalacion_adsl_objetada_pendiente = InstalacionAdslObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadAdsl as tipo_actividad','OrdenAdsl_Objetada as N_OrdenInternet',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenLinea'),'ComentariosObjetada_Adsl as Comentarios','TrabajadoAdslObjetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdslObjetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                            return $query->whereDate('created_at', '>=', $fecha_inicio);
                        })
                        ->when($fecha_fin, function ($query) use ($fecha_fin) {
                            return $query->whereDate('created_at', '<=', $fecha_fin);
                        });
        
            $instalacion_adsl_anulada_pendiente = InstalacionAdslAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadAdsl as tipo_actividad','OrdenAnuladaAdsl as N_OrdenInternet',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenLinea'),'ComentarioAnulada_Adsl as Comentarios','TrabajadoAnulada_Adsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Adsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });
                        
            $instalacion_gpon_realizada_pendiente = InstalacionGponRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon as tipo_actividad','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','ObservacionesGpon as Comentarios', 'TrabajadoGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                            return $query->whereDate('created_at', '>=', $fecha_inicio);
                        })
                        ->when($fecha_fin, function ($query) use ($fecha_fin) {
                            return $query->whereDate('created_at', '<=', $fecha_fin);
                        });
            
             $instalacion_gpon_objetada_pendiente = InstalacionGponObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon as tipo_actividad','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','ComentariosGpon_Objetada as Comentarios','TrabajadoGpon_Objetado as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoGpon_Objetado', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });
            
            $instalacion_gpon_anulada_pendiente = InstalacionGponAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadGpon as tipo_actividad','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','ComentarioAnulada_Gpon as Comentarios','TrabajadoAnulada_Gpon as Trabajado','username_creacion','created_at')
                 ->where('TrabajadoAnulada_Gpon', 'PENDIENTE')
                 ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                                return $query->whereDate('created_at', '>=', $fecha_inicio);
                            })
                            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                                return $query->whereDate('created_at', '<=', $fecha_fin);
                            });
            
            $instalacion_gpon_transferida_pendiente = InstalacionGponTransferida::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadGpon as tipo_actividad','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','ComentarioTransferido_Gpon as Comentarios','TrabajadoTransferido_Gpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoTransferido_Gpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                                return $query->whereDate('created_at', '>=', $fecha_inicio);
                            })
                            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                                return $query->whereDate('created_at', '<=', $fecha_fin);
                            });

            $resultados = $instalacion_hfc_realizada_pendiente->union($instalacion_hfc_anulada_pendiente)
                ->union($instalacion_hfc_objetada_pendiente)->union($instalacion_hfc_transferida_pendiente)->union($instalacion_dth_realizada_pendiente)->union($instalacion_dth_objetada_pendiente)
                ->union($instalacion_dth_anulada_pendiente)->union($instalacion_cobre_realizada_pendiente)->union($instalacion_cobre_objetada_pendiente)->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_adls_realizada_pendiente)->union($instalacion_adsl_objetada_pendiente)->union($instalacion_adsl_anulada_pendiente)->union($instalacion_gpon_realizada_pendiente)
                ->union($instalacion_gpon_objetada_pendiente)->union($instalacion_gpon_anulada_pendiente)->union($instalacion_gpon_transferida_pendiente)
                ->when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'DTH' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = repacionesDth_Transferido::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'DTH' && $tipo_actividad === 'OBJETADA') {
            $resultados = repacionesDth_Objetado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'DTH' && $tipo_actividad === 'REALIZADA') {
            $resultados = repacionesDth_Realizado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'DTH' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = repacionesDth_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth','OrdenDthRealizada as N_Orden','ObservacionesDth as Comentarios','TrabajadoDth as Trabajado','username_creacion','created_at')
            ->where('TrabajadoDth', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_dth_objetada_pendiente = repacionesDth_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth','OrdenObjDth as N_Orden','ComentariosObjetadosDth as Comentarios','TrabajadoObjetadaDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = repacionesDth_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReparacionDth','OrdenTransferidoDth as N_Orden','ComentarioTransferidoDth as Comentarios','TrabajadoTransferidoDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferidoDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_dth_realizada_pendiente->union($instalacion_dth_anulada_pendiente)
                ->union($instalacion_dth_objetada_pendiente)
                ->when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'DTH' && $tipo_actividad === 'REFRESH') {
            $resultados = InstalacionesDthRefresh::when($llamada_motivo !== 'INSTALACION', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = repacionesCobre_Transferido::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad === 'OBJETADA') {
            $resultados = repacionesCobre_Objetado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad === 'REALIZADA') {
            $resultados = repacionesCobre_Realizado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = repacionesCobre_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre','OrdenReparacionCobre as N_Orden','ObservacionesCobre as Comentarios','TrabajadoCobre as Trabajado','username_creacion','created_at')
            ->where('TrabajadoCobre', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_dth_objetada_pendiente = repacionesCobre_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre','OrdenObjReparacionCobre as N_Orden','ComentariosObjetados_Cobre as Comentarios','TrabajadoObjetadaCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = repacionesCobre_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReparacionCobre','OrdenTransfCobre as N_Orden','ComentarioCobreTransferido as Comentarios','TrabajadoCobreTransferido as Trabajado','username_creacion','created_at')
                ->where('TrabajadoCobreTransferido', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_dth_realizada_pendiente->union($instalacion_dth_anulada_pendiente)
                ->union($instalacion_dth_objetada_pendiente)
                ->when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = repacionesAdsl_Transferido::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad === 'OBJETADA') {
            $resultados = repacionesAdsl_Objetado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad === 'REALIZADA') {
            $resultados = repacionesAdsl_Realizado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = repacionesAdsl_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl','OrdenAdslRealizado as N_Orden','ObservacionesAdsl as Comentarios','TrabajadoAdsl as Trabajado','username_creacion','created_at')
            ->where('TrabajadoAdsl', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_dth_objetada_pendiente = repacionesAdsl_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl','OrdenObjAdsl as N_Orden','ComentsObjAdsl as Comentarios','TrabajadoObjetadaAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = repacionesAdsl_Transferido::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReparacionAdsl','OrdenTransferidoAdsl as N_Orden','ComentsTransferidoAdsl as Comentarios','TrabajadoTransferidoAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferidoAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_dth_realizada_pendiente->union($instalacion_dth_anulada_pendiente)
                ->union($instalacion_dth_objetada_pendiente)
                ->when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = reparacionesGpon_Transferido::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad === 'OBJETADA') {
            $resultados = reparacionesGpon_Objetado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad === 'REALIZADA') {
            $resultados = repacionesGpon_Realizado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = repacionesGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon','OrdenRealizadoGpon as N_Orden','ObservacionesGpon as Comentarios','TrabajadoGpon as Trabajado','username_creacion','created_at')
            ->where('TrabajadoGpon', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_dth_objetada_pendiente = reparacionesGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon','OrdenObjGpon as N_Orden','ComentariosObjGpon as Comentarios','TrabajadoObjetadaGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = reparacionesGpon_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReparacionGpon','OrdenTransGpon as N_Orden','ComentarioTransfGpon as Comentarios','TrabajadoTransfGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransfGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_dth_realizada_pendiente->union($instalacion_dth_anulada_pendiente)
                ->union($instalacion_dth_objetada_pendiente)
                ->when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = reparacionesHfc_Transferido::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad === 'OBJETADA') {
            $resultados = reparacionesHfc_Objetado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad === 'REALIZADA') {
            $resultados = reparacionesHfc_Realizado::when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = reparacionesHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc','OrdenHfc as N_Orden','ObservacionesHfc as Comentarios','TrabajadoHfcRealizado as Trabajado','username_creacion','created_at')
            ->where('TrabajadoHfcRealizado', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_objetada_pendiente = reparacionesHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc','OrdenObjHfc as N_Orden','ComentariosObjetados_Hfc as Comentarios','TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = reparacionesHfc_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReparacionHfc','OrdenTransfHfc as N_Orden','ComentarioTransfHfc as Comentarios','TrabajadoTransfHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransfHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_dth_realizada_pendiente->union($instalacion_dth_anulada_pendiente)
                ->union($instalacion_dth_objetada_pendiente)
                ->when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();

        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'TODOS' && $tipo_actividad === 'REALIZADA') {
            $instalacion_hfc_realizada_todos = reparacionesHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenHfc as N_Orden','CodigoCausaHfc as Codigo_Causa','DescripcionCausaDañoHfc as Descripcion_Causa','DescripcionTipoDañoHfc as Descripcion_Tipo_Daño','DescripcionUbicacionHfc as Descripcion_Ubicacion_Daño','ObservacionesHfc as Comentarios','RecibeHfc as Recibe', 'TrabajadoHfcRealizado as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = repacionesGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad ','OrdenRealizadoGpon as N_Orden','CodigoCausaGpon as Codigo_Causa','DescripcionCausaDañoGpon as Descripcion_Causa','DescripcionTipoDañoGpon as Descripcion_Tipo_Daño','DescripcionUbicacionGpon as Descripcion_Ubicacion_Daño','ObservacionesGpon as Comentarios','RecibeGpon as Recibe', 'TrabajadoGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_cobre_realizada_todos = repacionesCobre_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad ','OrdenReparacionCobre as N_Orden','CodigoCausaCobre as Codigo_Causa','DescripcionCausaCobre as Descripcion_Causa','DescripcionTipoDañoCobre as Descripcion_Tipo_Daño','DescripcionUbicacionDañoCobre as Descripcion_Ubicacion_Daño','ObservacionesCobre as Comentarios','RecibeCobre as Recibe', 'TrabajadoCobre as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = repacionesDth_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad ','OrdenDthRealizada as N_Orden','CodigoCausaDth as Codigo_Causa','DescripcionCausaDth as Descripcion_Causa','DescripcionTipoDañoDth as Descripcion_Tipo_Daño','DescripcionUbicacionDañoDth as Descripcion_Ubicacion_Daño','ObservacionesDth as Comentarios','RecibeDth as Recibe', 'TrabajadoDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            $instalacion_adsl_realizada_todos = repacionesAdsl_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad ','OrdenAdslRealizado as N_Orden','CodigoCausaAdsl as Codigo_Causa','DescripcionCausaAdsl as Descripcion_Causa','DescripcionTipoDañoAdsl as Descripcion_Tipo_Daño','DescripcionUbicacionDañoAdsl as Descripcion_Ubicacion_Daño','ObservacionesAdsl as Comentarios','RecibeAdsl as Recibe', 'TrabajadoAdsl as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });    
   

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_cobre_realizada_todos)
                ->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)->union($instalacion_adsl_realizada_todos)
                ->when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();

        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'TODOS' && $tipo_actividad === 'OBJETADA') {
            $instalacion_hfc_realizada_todos = reparacionesHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenObjHfc as N_Orden','MotivoObjetada_Hfc as Motivo_Objetada','ComentariosObjetados_Hfc as Comentarios', 'TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = reparacionesGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad','OrdenObjGpon as N_Orden','MotivoObjetada_Gpon as Motivo_Objetada','ComentariosObjGpon as Comentarios', 'TrabajadoObjetadaGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_cobre_realizada_todos = repacionesCobre_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad','OrdenObjReparacionCobre as N_Orden','MotivoObjetada_Cobre as Motivo_Objetada','ComentariosObjetados_Cobre as Comentarios', 'TrabajadoObjetadaCobre as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = repacionesDth_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad','OrdenObjDth as N_Orden','MotivoObjetada_Dth as Motivo_Objetada','ComentariosObjetadosDth as Comentarios', 'TrabajadoObjetadaDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            $instalacion_adsl_realizada_todos = repacionesAdsl_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad','OrdenObjAdsl as N_Orden','MotivoObjetada_Adsl as Motivo_Objetada','ComentsObjAdsl as Comentarios', 'TrabajadoObjetadaAdsl as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });    
   

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_cobre_realizada_todos)
                ->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)->union($instalacion_adsl_realizada_todos)
                ->when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();

        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'TODOS' && $tipo_actividad === 'TRANSFERIDA') {
            $instalacion_hfc_realizada_todos = reparacionesHfc_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenTransfHfc as N_Orden','ComentarioTransfHfc as Comentarios', 'TrabajadoTransfHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = reparacionesGpon_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad','OrdenTransGpon as N_Orden','ComentarioTransfGpon as Comentarios', 'TrabajadoTransfGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_cobre_realizada_todos = repacionesCobre_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad','OrdenTransfCobre as N_Orden','ComentarioCobreTransferido as Comentarios', 'TrabajadoCobreTransferido as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = repacionesDth_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad','OrdenTransferidoDth as N_Orden','ComentarioTransferidoDth as Comentarios', 'TrabajadoTransferidoDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            $instalacion_adsl_realizada_todos = repacionesAdsl_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad','OrdenTransferidoAdsl as N_Orden','ComentsTransferidoAdsl as Comentarios', 'TrabajadoTransferidoAdsl as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });  
         

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)->union($instalacion_cobre_realizada_todos)
            ->union($instalacion_dth_realizada_todos)->union($instalacion_adsl_realizada_todos)
                ->when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();

        }else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'TODOS' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_hfc_realizada_pendiente = reparacionesHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenHfc as N_Orden','ObservacionesHfc as Comentarios','TrabajadoHfcRealizado as Trabajado','username_creacion','created_at')
            ->where('TrabajadoHfcRealizado', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_objetada_pendiente =  reparacionesHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenObjHfc as N_Orden','ComentariosObjetados_Hfc as Comentarios', 'TrabajadoReparacionesObjetadaHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoReparacionesObjetadaHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_transferida_pendiente = reparacionesHfc_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenTransfHfc as N_Orden','ComentarioTransfHfc as Comentarios', 'TrabajadoTransfHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransfHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });    

            $instalacion_dth_realizada_pendiente = repacionesDth_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad ','OrdenDthRealizada as N_Orden','ObservacionesDth as Comentarios', 'TrabajadoDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });
    
            $instalacion_dth_objetada_pendiente = repacionesDth_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad','OrdenObjDth as N_Orden','ComentariosObjetadosDth as Comentarios', 'TrabajadoObjetadaDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_dth_transferida_pendiente = repacionesDth_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad','OrdenTransferidoDth as N_Orden','ComentarioTransferidoDth as Comentarios', 'TrabajadoTransferidoDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferidoDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    });
    

            $instalacion_cobre_realizada_pendiente = repacionesCobre_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad ','OrdenReparacionCobre as N_Orden','ObservacionesCobre as Comentarios', 'TrabajadoReparacionCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoReparacionCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });
        
            $instalacion_cobre_objetada_pendiente = repacionesCobre_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad','OrdenObjReparacionCobre as N_Orden','ComentariosObjetados_Cobre as Comentarios', 'TrabajadoObjetadaCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    });
                    
            $instalacion_cobre_transferida_pendiente = repacionesCobre_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad','OrdenTransfCobre as N_Orden','ComentarioCobreTransferido as Comentarios', 'TrabajadoCobreTransferido as Trabajado','username_creacion','created_at')
            ->where('TrabajadoCobreTransferido', 'PENDIENTE')    
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_adls_realizada_pendiente =repacionesAdsl_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad ','OrdenAdslRealizado as N_Orden','ObservacionesAdsl as Comentarios', 'TrabajadoReparacionAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoReparacionAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });
        
            $instalacion_adsl_objetada_pendiente = repacionesAdsl_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad','OrdenObjAdsl as N_Orden','ComentsObjAdsl as Comentarios', 'TrabajadoObjetadaAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });
            $instalacion_adsl_transferida_pendiente = repacionesAdsl_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad','OrdenTransferidoAdsl as N_Orden','ComentsTransferidoAdsl as Comentarios', 'TrabajadoTransferidoAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferidoAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });

            $instalacion_gpon_realizada_pendiente =  repacionesGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad ','OrdenRealizadoGpon as N_Orden','ObservacionesGpon as Comentarios', 'TrabajadoReparacionesGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoReparacionesGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });
            
             $instalacion_gpon_objetada_pendiente = reparacionesGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad','OrdenObjGpon as N_Orden','ComentariosObjGpon as Comentarios', 'TrabajadoObjetadaGpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoObjetadaGpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            });
            
            $instalacion_gpon_transferida_pendiente = reparacionesGpon_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad','OrdenTransGpon as N_Orden','ComentarioTransfGpon as Comentarios', 'TrabajadoTransfGpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoTransfGpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 

            $resultados = $instalacion_hfc_realizada_pendiente->union($instalacion_hfc_objetada_pendiente)
                ->union($instalacion_hfc_transferida_pendiente)->union($instalacion_dth_realizada_pendiente)->union($instalacion_dth_objetada_pendiente)->union($instalacion_dth_transferida_pendiente)
                ->union($instalacion_cobre_realizada_pendiente)->union($instalacion_cobre_objetada_pendiente)->union($instalacion_cobre_transferida_pendiente)->union($instalacion_adls_realizada_pendiente)
                ->union($instalacion_adsl_objetada_pendiente)->union($instalacion_adsl_transferida_pendiente)->union($instalacion_gpon_realizada_pendiente)->union($instalacion_gpon_objetada_pendiente)
                ->union($instalacion_gpon_transferida_pendiente)
                ->when($llamada_motivo !== 'REPARACIONES', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();

        }
        else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO NUMERO COBRE' && $tecnologia === 'COBRE' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaCambioNumeroCobreAnulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO NUMERO COBRE' && $tecnologia === 'COBRE' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaCambioNumeroCobreObjetada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO NUMERO COBRE' && $tecnologia === 'COBRE' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaCambioNumeroCobreRealizada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO NUMERO COBRE' && $tecnologia === 'COBRE' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaCambioNumeroCobreRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioNumeroCobre','OrdenCambioCobre as N_Orden','ObvsCambioCobre as Comentarios', 'TrabajadoCambioCobre as Trabajado','username_creacion','created_at')
            ->where('TrabajadoCambioCobre', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaCambioNumeroCobreObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioNumeroCobre','OrdenObjCambioCobre as N_Orden','ComentariosCambioCobre as Comentarios','TrabajadoObjCambioCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjCambioCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaCambioNumeroCobreAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadCambioNumeroCobre','OrdenAnuladaCambioCobre as N_Orden','ComentarioAnuladaCambioCobre as Comentarios','TrabajadoAnuladaCambioCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnuladaCambioCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'HFC' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaRetiroHfcAnulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'HFC' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaRetiroHfcObjetada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'HFC' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaRetiroHfcRealizada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'DTH' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaRetiroDthRealizada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'DTH' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaRetiroDthAnulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'DTH' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaRetiroDthRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionDth as tipo_actividad','OrdenRetiroDth as N_Orden','ObvsRetiroDth as Comentarios', 'TrabajadoRetiroDth as Trabajado','username_creacion','created_at')
            ->where('TrabajadoRetiroDth', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

         

            $instalacion_cobre_anulada_pendiente = PostventaRetiroDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReconexionDth as tipo_actividad','OrdenRetiroAnulacionDth as N_Orden','ComentsRetiroAnulada_Dth as Comentarios','TrabajadoRetiroAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoRetiroAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaRetiroHfcRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionHfc','OrdenRetiroHfc as N_Orden','ObvsRetiroHfc as Comentarios', 'TrabajadoRetiroHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoRetiroHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

         

            $instalacion_cobre_anulada_pendiente = PostventaRetiroHfcAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReconexionHfc','OrdenRetiroAnulacionHfc as N_Orden','ComentsRetiroAnulada_Hfc as Comentarios','TrabajadoRetiroAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoRetiroAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'TODOS' && $tipo_actividad === 'REALIZADA') {
            $instalacion_hfc_realizada_todos = PostventaRetiroHfcRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionHfc as tipo_actividad','OrdenRetiroHfc as N_Orden','ObvsRetiroHfc as Comentarios', 'TrabajadoRetiroHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = PostventaRetiroDthRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionDth as tipo_actividad','OrdenRetiroDth as N_Orden','ObvsRetiroDth as Comentarios', 'TrabajadoRetiroDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'TODOS' && $tipo_actividad === 'ANULACION') {
            $instalacion_hfc_realizada_todos = PostventaRetiroHfcAnulada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionHfc as tipo_actividad','OrdenRetiroAnulacionHfc as N_Orden','ComentsRetiroAnulada_Hfc as Comentarios', 'TrabajadoRetiroAnulada_Hfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = PostventaRetiroDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionDth as tipo_actividad','OrdenRetiroAnulacionDth as N_Orden','ComentsRetiroAnulada_Dth as Comentarios', 'TrabajadoRetiroAnulada_Dth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'TODOS' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_hfc_realizada_pendiente = PostventaRetiroHfcRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionHfc as tipo_actividad','OrdenRetiroHfc as N_Orden','ObvsRetiroHfc as Comentarios','TrabajadoRetiroHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoRetiroHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_objetada_pendiente =  PostventaRetiroHfcAnulada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionHfc as tipo_actividad','OrdenRetiroAnulacionHfc as N_Orden','ComentsRetiroAnulada_Hfc as Comentarios', 'TrabajadoRetiroAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoRetiroAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_transferida_pendiente = PostventaRetiroDthRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionDth as tipo_actividad','OrdenRetiroDth as N_Orden','ObvsRetiroDth as Comentarios', 'TrabajadoRetiroDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoRetiroDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });    

            $instalacion_dth_realizada_pendiente = PostventaRetiroDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionDth as tipo_actividad ','OrdenRetiroAnulacionDth as N_Orden','ComentsRetiroAnulada_Dth as Comentarios', 'TrabajadoRetiroAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoRetiroAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });
    
          

            $resultados = $instalacion_hfc_realizada_pendiente->union($instalacion_hfc_objetada_pendiente)
                ->union($instalacion_hfc_transferida_pendiente)->union($instalacion_dth_realizada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'MIGRACION' && $tecnologia === 'HFC' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaMigracionObjetada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'MIGRACION' && $tecnologia === 'HFC' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = PostventaMigracionTransferida::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'MIGRACION' && $tecnologia === 'HFC' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaMigracionRealizada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'MIGRACION' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaMigracionRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadMigracionHfc as Tipo_actividad','NOrdenMigracionHfc as N_Orden','SapMigracionHfc as sap','ObvsMigracionHfc as Comentarios', 'TrabajadoMigracionHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoMigracionHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaMigracionObjetada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadMigracionHfc as Tipo_actividad','OrdenMigracionHfcObj as N_Orden',DB::raw('NULL as sap'),'ComentsMigracionObjHfc as Comentarios','TrabajadoMigracionObjHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoMigracionObjHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaMigracionAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadMigracionHfc as Tipo_actividad','NOrdenMigracionAnuladaHfc as N_Orden',DB::raw('NULL as sap'),'ComentarioMigracionAnulada_Hfc as Comentarios','TrabajadoMigracionAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoMigracionAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


            $instalacion_cobre_transferida_pendiente = PostventaMigracionTransferida::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadMigracionHfc as Tipo_actividad','OrdenMigracionTranfHfc as N_Orden',DB::raw('NULL as sap'),'ComentsMigracionTransHfc as Comentarios','TrabajadoMigracionTransHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoMigracionTransHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)->union($instalacion_cobre_transferida_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'DTH' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaCambioEquipoDthAnulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'DTH' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaCambioEquipoDthObjetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'DTH' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaCambioEquipoDthRealizada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'DTH' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaCambioEquipoDthRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioDth as Tipo_actividad','OrdenEquipoDth as N_Orden','ObvsEquipoDth as Comentarios', 'TrabajadoEquipoDth as Trabajado','username_creacion','created_at')
            ->where('TrabajadoEquipoDth', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaCambioEquipoDthObjetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioDth as Tipo_actividad','OrdenEquipoObjDth as N_Orden','ComentsEquipoObjDth as Comentarios','TrabajadoEquipoObjDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoObjDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaCambioEquipoDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadCambioDth as Tipo_actividad','OrdenEquipoAnulada_Dth as N_Orden','ComentarioEquipoAnulada_Dth as Comentarios','TrabajadoEquipoAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'ADSL' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaCambioEquipoAdslAnulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'ADSL' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaCambioEquipoAdslObjetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'ADSL' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaCambioEquipoAdslRealizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'ADSL' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaCambioEquipoAdslRealizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioAdsl as Tipo_actividad','OrdenEquipoAdsl as N_Orden','ObvsEquipoAdsl as Comentarios', 'TrabajadoEquipoAdsl as Trabajado','username_creacion','created_at')
            ->where('TrabajadoEquipoAdsl', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaCambioEquipoAdslObjetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioAdsl as Tipo_actividad','OrdenEquipoObjAdsl as N_Orden','ComentsEquipoObjAdsl as Comentarios','TrabajadoEquipoObjAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoObjAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaCambioEquipoAdslAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadCambioAdsl as Tipo_actividad','OrdenAnuladaEquipoAdsl as N_Orden','ComentsEquipoAnulada_Adsl as Comentarios','TrabajadoEquipoAnulada_Adsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoAnulada_Adsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'GPON' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaCambioEquipoGpon_Anulado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'GPON' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaCambioEquipoGpon_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'GPON' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaCambioEquipoGpon_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'GPON' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaCambioEquipoGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioGpon as Tipo_actividad','NOrdenEquipoGpon as N_Orden','ObvsEquipoGpon as Comentarios', 'TrabajadoEquipoGpon as Trabajado','username_creacion','created_at')
            ->where('TrabajadoEquipoGpon', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaCambioEquipoGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioGpon as Tipo_actividad','NOrdenObjEquipoGpon as N_Orden','ComentsEquipoObjGpon as Comentarios','TrabajadoObjEquipoGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjEquipoGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaCambioEquipoGpon_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadCambioGpon as Tipo_actividad','OrdenEquipoAnuladaGpon as N_Orden','ComentarioEquipoAnulada_Gpon as Comentarios','TrabajadoEquipoAnulada_Gpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoAnulada_Gpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'HFC' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaCambioEquipoHfc_Anulado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'HFC' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaCambioEquipoHfc_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'HFC' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaCambioEquipoHfc_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaCambioEquipoHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioHfc as Tipo_actividad','NOrdenEquipoHfc as N_Orden','ObvsEquipoHfc as Comentarios', 'TrabajadoEquipoHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoEquipoHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaCambioEquipoHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioHfc as Tipo_actividad','NordenObjEquipoHfc as N_Orden','ComentsEquipoObjHfc as Comentarios','TrabajadoObjEquipoHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjEquipoHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaCambioEquipoHfc_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadCambioHfc as Tipo_actividad','OrdenAnuladaEquipoHfc as N_Orden','ComentarioAnuladaEquipoHfc as Comentarios','TrabajadoEquipoAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'TODOS' && $tipo_actividad === 'REALIZADA') {
            $instalacion_hfc_realizada_todos = PostventaCambioEquipoHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioHfc as tipo_actividad','NOrdenEquipoHfc as N_Orden','ObvsEquipoHfc as Comentarios','RecibeEquipoHfc as Recibe', 'TrabajadoEquipoHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = PostventaCambioEquipoGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioGpon as tipo_actividad ','NOrdenEquipoGpon as N_Orden','ObvsEquipoGpon as Comentarios','RecibeEquipoGpon as Recibe', 'TrabajadoEquipoGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = PostventaCambioEquipoDthRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioDth as tipo_actividad ','OrdenEquipoDth as N_Orden','ObvsEquipoDth as Comentarios','RecibeEquipoDth as Recibe', 'TrabajadoEquipoDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            $instalacion_adsl_realizada_todos = PostventaCambioEquipoAdslRealizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioAdsl as tipo_actividad ','OrdenEquipoAdsl as N_Orden','ObvsEquipoAdsl as Comentarios','RecibeEquipoAdsl as Recibe', 'TrabajadoEquipoAdsl as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });    
   

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)->union($instalacion_adsl_realizada_todos)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'TODOS' && $tipo_actividad === 'OBJETADA') {
            $instalacion_hfc_realizada_todos = PostventaCambioEquipoHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioHfc as tipo_actividad','NordenObjEquipoHfc as N_Orden','MotivoEquipoObjHfc as Motivo_Objetado','ComentsEquipoObjHfc as Comentarios', 'TrabajadoObjEquipoHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = PostventaCambioEquipoGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioGpon as tipo_actividad ','NOrdenObjEquipoGpon as N_Orden','MotivoObjEquipoGpon as Motivo_Objetado','ComentsEquipoObjGpon as Comentarios','TrabajadoObjEquipoGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = PostventaCambioEquipoDthObjetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioDth as tipo_actividad ','OrdenEquipoObjDth as N_Orden','MotivoObjEquipoDth as Motivo_Objetado','ComentsEquipoObjDth as Comentarios', 'TrabajadoEquipoObjDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            $instalacion_adsl_realizada_todos = PostventaCambioEquipoAdslObjetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioAdsl as tipo_actividad ','OrdenEquipoObjAdsl as N_Orden','MotivoEquipoObjAdsl as Motivo_Objetado ','ComentsEquipoObjAdsl as Comentarios', 'TrabajadoEquipoObjAdsl as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });    
   

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)->union($instalacion_adsl_realizada_todos)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'TODOS' && $tipo_actividad === 'ANULADA') {
            $instalacion_hfc_realizada_todos = PostventaCambioEquipoHfc_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioHfc as tipo_actividad','OrdenAnuladaEquipoHfc as N_Orden','MotivoEquipoAnulada_Hfc as Motivo_Anulada','ComentarioAnuladaEquipoHfc as Comentarios', 'TrabajadoEquipoAnulada_Hfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = PostventaCambioEquipoGpon_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioGpon as tipo_actividad ','OrdenEquipoAnuladaGpon as N_Orden','MotivoAnuladaObj_Gpon as Motivo_Anulada','ComentarioEquipoAnulada_Gpon as Comentarios','TrabajadoEquipoAnulada_Gpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = PostventaCambioEquipoDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioDth as tipo_actividad ','OrdenEquipoAnulada_Dth as N_Orden','MotivoEquipoAnulada_Dth as Motivo_Anulada','ComentarioEquipoAnulada_Dth as Comentarios', 'TrabajadoEquipoAnulada_Dth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            $instalacion_adsl_realizada_todos = PostventaCambioEquipoAdslAnulada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioAdsl as tipo_actividad ','OrdenAnuladaEquipoAdsl as N_Orden','MotivoEquipoAnulada_Adsl as Motivo_Anulada ','ComentsEquipoAnulada_Adsl as Comentarios', 'TrabajadoEquipoAnulada_Adsl as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });    
   

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)->union($instalacion_adsl_realizada_todos)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'CAMBIO DE EQUIPO' && $tecnologia === 'TODOS' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_hfc_realizada_pendiente =  PostventaCambioEquipoHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioHfc as tipo_actividad','NOrdenEquipoHfc as N_Orden','ObvsEquipoHfc as Comentarios', 'TrabajadoEquipoHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoEquipoHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_objetada_pendiente =  PostventaCambioEquipoHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioHfc as tipo_actividad','NordenObjEquipoHfc as N_Orden','ComentsEquipoObjHfc as Comentarios', 'TrabajadoObjEquipoHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjEquipoHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_transferida_pendiente = PostventaCambioEquipoHfc_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioHfc as tipo_actividad','OrdenAnuladaEquipoHfc as N_Orden','ComentarioAnuladaEquipoHfc as Comentarios', 'TrabajadoEquipoAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });    

            $instalacion_dth_realizada_pendiente = PostventaCambioEquipoDthRealizada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioDth as tipo_actividad ','OrdenEquipoDth as N_Orden','ObvsEquipoDth as Comentarios', 'TrabajadoEquipoDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });
    
            $instalacion_dth_objetada_pendiente = PostventaCambioEquipoDthObjetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioDth as tipo_actividad ','OrdenEquipoObjDth as N_Orden','ComentsEquipoObjDth as Comentarios', 'TrabajadoEquipoObjDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoObjDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_dth_transferida_pendiente = PostventaCambioEquipoDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioDth as tipo_actividad ','OrdenEquipoAnulada_Dth as N_Orden','ComentarioEquipoAnulada_Dth as Comentarios', 'TrabajadoEquipoAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    });
    

            $instalacion_adls_realizada_pendiente =PostventaCambioEquipoAdslRealizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioAdsl as tipo_actividad ','OrdenEquipoAdsl as N_Orden','ObvsEquipoAdsl as Comentarios', 'TrabajadoEquipoAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });
        
            $instalacion_adsl_objetada_pendiente = PostventaCambioEquipoAdslObjetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioAdsl as tipo_actividad ','OrdenEquipoObjAdsl as N_Orden','ComentsEquipoObjAdsl as Comentarios', 'TrabajadoEquipoObjAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoObjAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });
            $instalacion_adsl_transferida_pendiente = PostventaCambioEquipoAdslAnulada::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioAdsl as tipo_actividad ','OrdenAnuladaEquipoAdsl as N_Orden','ComentsEquipoAnulada_Adsl as Comentarios', 'TrabajadoEquipoAnulada_Adsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoAnulada_Adsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });

            $instalacion_gpon_realizada_pendiente =  PostventaCambioEquipoGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioGpon as tipo_actividad ','NOrdenEquipoGpon as N_Orden','ObvsEquipoGpon as Comentarios', 'TrabajadoEquipoGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoEquipoGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });
            
             $instalacion_gpon_objetada_pendiente =PostventaCambioEquipoGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioGpon as tipo_actividad ','NOrdenObjEquipoGpon as N_Orden','ComentsEquipoObjGpon as Comentarios','TrabajadoObjEquipoGpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoObjEquipoGpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            });
            
            $instalacion_gpon_transferida_pendiente = PostventaCambioEquipoGpon_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioGpon as tipo_actividad ','OrdenEquipoAnuladaGpon as N_Orden','ComentarioEquipoAnulada_Gpon as Comentarios','TrabajadoEquipoAnulada_Gpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoEquipoAnulada_Gpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 

            $resultados = $instalacion_hfc_realizada_pendiente->union($instalacion_hfc_objetada_pendiente)
                ->union($instalacion_hfc_transferida_pendiente)->union($instalacion_dth_realizada_pendiente)->union($instalacion_dth_objetada_pendiente)->union($instalacion_dth_transferida_pendiente)->union($instalacion_adls_realizada_pendiente)
                ->union($instalacion_adsl_objetada_pendiente)->union($instalacion_adsl_transferida_pendiente)->union($instalacion_gpon_realizada_pendiente)->union($instalacion_gpon_objetada_pendiente)
                ->union($instalacion_gpon_transferida_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();

        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'HFC' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaAdicionHfc_Anulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'HFC' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaAdicionHfc_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'HFC' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaAdicionHfc_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaAdicionHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionHfc as Tipo_actividad','NOrdenAdicionHfc as N_Orden','obvsAdicionHfc as Comentarios', 'TrabajadoAdicionHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoAdicionHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaAdicionHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionHfc as Tipo_actividad','OrdenAdicionObjHfc as N_Orden','ComentariosObjAdicionHfc as Comentarios','TrabajadoObjAdicionHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjAdicionHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaAdicionHfc_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadAdicionHfc as Tipo_actividad','NOrdenAdicionAnuladaHfc as N_Orden','ComentarioAdicionAnulada_Hfc as Comentarios','TrabajadoAdicionAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'GPON' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaAdicionGpon_Anulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'GPON' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaAdicionGpon_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'GPON' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaAdicionGpon_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'GPON' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaAdicionGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionGpon as Tipo_actividad','NOrdenAdicionGpon as N_Orden','ObvsAdicionGpon as Comentarios', 'TrabajadoAdicionGpon as Trabajado','username_creacion','created_at')
            ->where('TrabajadoAdicionGpon', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaAdicionGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionGpon as Tipo_actividad','NOrdenAdicionObjGpon as N_Orden','ComentariosAdicionObjGpon as Comentarios','TrabajadoAdicionObjGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionObjGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaAdicionGpon_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadAdicionGpon as Tipo_actividad','NOrdenAdicionAnuladaGpon as N_Orden','ComentarioAdicionAnulada_Gpon as Comentarios','TrabajadoAdicionAnulada_Gpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionAnulada_Gpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'DTH' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaAdicionDth_Anulado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'DTH' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaAdicionDth_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'DTH' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaAdicionDth_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'DTH' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaAdicionDth_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionDth as Tipo_actividad','NOrdenAdicionDth as N_Orden','ObvsAdicionDth as Comentarios', 'TrabajadoAdicionDth as Trabajado','username_creacion','created_at')
            ->where('TrabajadoAdicionDth', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaAdicionDth_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionDth as Tipo_actividad','NOrdenAdicionObjDth as N_Orden','ComentariosAdicionObjDth as Comentarios','TrabajadoAdicionObjDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionObjDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaAdicionDth_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadAdicionDth as Tipo_actividad','OrdenAdicionAnulada_Dth as N_Orden','ComentarioAdicionAnulada_Dth as Comentarios','TrabajadoAdicionAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'TODOS' && $tipo_actividad === 'REALIZADA') {
            $instalacion_hfc_realizada_todos = PostventaAdicionHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionHfc as tipo_actividad','NOrdenAdicionHfc as N_Orden','obvsAdicionHfc as Comentarios','RecibeAdicionHfc as Recibe', 'TrabajadoAdicionHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = PostventaAdicionGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionGpon as tipo_actividad ','NOrdenAdicionGpon as N_Orden','ObvsAdicionGpon as Comentarios','RecibeAdicionGpon as Recibe', 'TrabajadoAdicionGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = PostventaAdicionDth_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionDth as tipo_actividad ','NOrdenAdicionDth as N_Orden','ObvsAdicionDth as Comentarios','RecibeAdicionDth as Recibe', 'TrabajadoAdicionDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
      

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'TODOS' && $tipo_actividad === 'OBJETADA') {
            $instalacion_hfc_realizada_todos = PostventaAdicionHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionHfc as Tipo_actividad','OrdenAdicionObjHfc as N_Orden','ComentariosObjAdicionHfc as Comentarios','TrabajadoObjAdicionHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = PostventaAdicionGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionGpon as Tipo_actividad','NOrdenAdicionObjGpon as N_Orden','ComentariosAdicionObjGpon as Comentarios','TrabajadoAdicionObjGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = PostventaAdicionDth_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionDth as Tipo_actividad','NOrdenAdicionObjDth as N_Orden','ComentariosAdicionObjDth as Comentarios','TrabajadoAdicionObjDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
      

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'TODOS' && $tipo_actividad === 'ANULADA') {
            $instalacion_hfc_realizada_todos = PostventaAdicionHfc_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadAdicionHfc as Tipo_actividad','NOrdenAdicionAnuladaHfc as N_Orden','ComentarioAdicionAnulada_Hfc as Comentarios','TrabajadoAdicionAnulada_Hfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = PostventaAdicionGpon_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadAdicionGpon as Tipo_actividad','NOrdenAdicionAnuladaGpon as N_Orden','ComentarioAdicionAnulada_Gpon as Comentarios','TrabajadoAdicionAnulada_Gpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos =  PostventaAdicionDth_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadAdicionDth as Tipo_actividad','OrdenAdicionAnulada_Dth as N_Orden','ComentarioAdicionAnulada_Dth as Comentarios','TrabajadoAdicionAnulada_Dth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
      

            $resultados = $instalacion_hfc_realizada_todos->union($instalacion_gpon_realizada_todos)->union($instalacion_dth_realizada_todos)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'ADICION' && $tecnologia === 'TODOS' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_hfc_realizada_pendiente =  PostventaAdicionHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionHfc as tipo_actividad','NOrdenAdicionHfc as N_Orden','obvsAdicionHfc as Comentarios', 'TrabajadoAdicionHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoAdicionHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_objetada_pendiente =  PostventaAdicionHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionHfc as tipo_actividad','OrdenAdicionObjHfc as N_Orden','ComentariosObjAdicionHfc as Comentarios','TrabajadoObjAdicionHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjAdicionHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_transferida_pendiente = PostventaAdicionHfc_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadAdicionHfc as tipo_actividad','NOrdenAdicionAnuladaHfc as N_Orden','ComentarioAdicionAnulada_Hfc as Comentarios','TrabajadoAdicionAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });    

            $instalacion_dth_realizada_pendiente = PostventaAdicionDth_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionDth as tipo_actividad ','NOrdenAdicionDth as N_Orden','ObvsAdicionDth as Comentarios', 'TrabajadoAdicionDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });
    

            $instalacion_dth_objetada_pendiente =PostventaAdicionDth_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionDth as tipo_actividad','NOrdenAdicionObjDth as N_Orden','ComentariosAdicionObjDth as Comentarios','TrabajadoAdicionObjDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionObjDth', 'PENDIENTE')                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_dth_transferida_pendiente = PostventaAdicionDth_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadAdicionDth as tipo_actividad','OrdenAdicionAnulada_Dth as N_Orden','ComentarioAdicionAnulada_Dth as Comentarios','TrabajadoAdicionAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    });
    

            $instalacion_gpon_realizada_pendiente =  PostventaAdicionGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionGpon as tipo_actividad ','NOrdenAdicionGpon as N_Orden','ObvsAdicionGpon as Comentarios', 'TrabajadoAdicionGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdicionGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });
            
             $instalacion_gpon_objetada_pendiente = PostventaAdicionGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadAdicionGpon as tipo_actividad','NOrdenAdicionObjGpon as N_Orden','ComentariosAdicionObjGpon as Comentarios','TrabajadoAdicionObjGpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoAdicionObjGpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            });
            
            $instalacion_gpon_transferida_pendiente = PostventaAdicionGpon_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadAdicionGpon as tipo_actividad','NOrdenAdicionAnuladaGpon as N_Orden','ComentarioAdicionAnulada_Gpon as Comentarios','TrabajadoAdicionAnulada_Gpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoAdicionAnulada_Gpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 

            $resultados = $instalacion_hfc_realizada_pendiente->union($instalacion_hfc_objetada_pendiente)
                ->union($instalacion_hfc_transferida_pendiente)->union($instalacion_dth_realizada_pendiente)->union($instalacion_dth_objetada_pendiente)->union($instalacion_dth_transferida_pendiente)->union($instalacion_gpon_realizada_pendiente)->union($instalacion_gpon_objetada_pendiente)
                ->union($instalacion_gpon_transferida_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'ADSL' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaTrasladoAdsl_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'ADSL' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaTrasladoAdsl_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'ADSL' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaTrasladoAdsl_Anulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'ADSL' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaTrasladoAdsl_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoAdsl as Tipo_actividad','NOrdenTrasladosAdsl as N_Orden','ObvsTrasladoAdsl as Comentarios', 'TrabajadoTrasladoAdsl as Trabajado','username_creacion','created_at')
            ->where('TrabajadoTrasladoAdsl', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaTrasladoAdsl_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoAdsl as Tipo_actividad','OrdenObjTrasladoAdsl as N_Orden','ComentariosTrasladosObjAdsl as Comentarios','TrabajadoTrasladoObjAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoObjAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaTrasladoAdsl_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadTrasladoAdsl as Tipo_actividad','NOrdenTrasladosAnulAdsl as N_Orden','ComentarioTrasladoAnulada_Adsl as Comentarios','TrabajadoTrasladoTrAnulada_Adsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoTrAnulada_Adsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'DTH' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaTrasladoDth_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'DTH' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaTrasladoDth_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'DTH' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaTrasladoDthAnulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'DTH' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaTrasladoDth_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoDth as Tipo_actividad','OrdenTrasladoDth as N_Orden','ObvsTrasladoDth as Comentarios', 'TrabajadoTrasladoDth as Trabajado','username_creacion','created_at')
            ->where('TrabajadoTrasladoDth', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaTrasladoDth_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoDth as Tipo_actividad','OrdenTrasladoObjDth as N_Orden','ComentariosTrasladoObjDth as Comentarios','TrabajadoTrasladoObj_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoObj_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaTrasladoDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadTrasladoDth as Tipo_actividad','OrdenTrasladosDth as N_Orden','ComentarioTrasladoAnulada_Dth as Comentarios','TrabajadoTrasladoAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'COBRE' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaTrasladoCobre_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'COBRE' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaTrasladoCobre_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'COBRE' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaTrasladoCobre_Anulada::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'COBRE' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaTrasladoCobre_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoCobre as Tipo_actividad','OrdenTrasladoCobre as N_Orden','ObvsTrasladoCobre as Comentarios', 'TrabajadoTrasladoCobre as Trabajado','username_creacion','created_at')
            ->where('TrabajadoTrasladoCobre', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaTrasladoCobre_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoCobre as Tipo_actividad','OrdenTrasladoObjCobres as N_Orden','ComentariosObjTrasladoCobre as Comentarios','TrabajadoTrasladoObjCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoObjCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaTrasladoCobre_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadTrasladoCobre as Tipo_actividad','OrdenTrasladosCobre as N_Orden','ComentarioTrasladoAnulada_Cobre as Comentarios','TrabajadoTrasladoAnulada_Cobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoAnulada_Cobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'GPON' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaTrasladoGpon_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'GPON' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaTrasladoGpon_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'GPON' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaTrasladoGpon_Anulado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'GPON' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = PostventaTrasladoGpon_Transferido::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'GPON' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaTrasladoGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTrasladoGpon as N_OrdenTv','OrdenInternetTrasladoGpon as N_OrdenInternet','OrdenLineaTrasladoGpon as N_OrdenLinea','ObvsTrasladoGpon as Comentarios', 'TrabajadoTrasladoGpon as Trabajado','username_creacion','created_at')
            ->where('TrabajadoTrasladoGpon', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaTrasladoGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTrasladoObjGpon as N_OrdenTv','OrdenInterObjTraslGpon as N_OrdenInternet','OrdenLineaTraslObjGpon as N_OrdenLinea','ObvsTrasladoObjGpon as Comentarios', 'TrabajadoTrasladoObjGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoObjGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaTrasladoGpon_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTraslAnuladoGpon as N_OrdenTv','OrdenIntTrasladoAnulGpon as N_OrdenInternet','OrdenLineaTraslAnulGpon as N_OrdenLinea','ComentarioTrasladoAnulada_Gpon as Comentarios', 'TrabajadoAnuladaTraslado_gpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnuladaTraslado_gpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_transferida_pendiente = PostventaTrasladoGpon_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTrasladoTransGpon as N_OrdenTv','OrdenIntTransladoGpon as N_OrdenInternet','OrdenLineaTrasladoTransGpon as N_OrdenLinea','ComentTrasladoTransGpon as Comentarios', 'TrabajadoTraslTransGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTraslTransGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)->union($instalacion_cobre_transferida_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'HFC' && $tipo_actividad === 'REALIZADA') {
            $resultados = PostventaTrasladoHfc_Realizado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'HFC' && $tipo_actividad === 'OBJETADA') {
            $resultados = PostventaTrasladoHfc_Objetado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'HFC' && $tipo_actividad === 'ANULADA') {
            $resultados = PostventaTrasladoHfc_Anulado::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'HFC' && $tipo_actividad === 'TRANSFERIDA') {
            $resultados = PostventaTrasladoHfc_Transferido::when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                return $query->where('motivo_llamada', $llamada_motivo);
            })
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })
            ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            })
            ->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaTrasladoHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvTrasladoHfc as N_OrdenTv','OrdenInternetTrasladoHfc as N_OrdenInternet','OrdenLineaTrasladoHfc as N_OrdenLinea','ObservacionesTrasladoHfc as Comentarios', 'TrabajadoTrasladoHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoTrasladoHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaTrasladoHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvObjetadoTrasladoHfc as N_OrdenTv','OrdenIntObjTrasladoHfc as N_OrdenInternet','OrdenLineaObjetadoTrasladoHfc as N_OrdenLinea','ObvsObjTrasladoHfc as Comentarios', 'TrabajadoObjTrasladoHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjTrasladoHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaTrasladoHfc_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvAnulTraslHfc as N_OrdenTv','OrdenInterAnulTraslHfc as N_OrdenInternet','OrdenLineaAnulTraslHfc as N_OrdenLinea','ComenAnuladaTraslado_Hfc as Comentarios', 'TrabajadoAnuladaTraslado_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnuladaTraslado_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_transferida_pendiente = PostventaTrasladoHfc_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvTransferidoHfc as N_OrdenTv','OrdenInternetTransferidoHfc as N_OrdenInternet','OrdenLineaTransferidoHfc as N_OrdenLinea','ComentarioTrasladoTransHfc as Comentarios', 'TrabajadoTransTrasladoHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransTrasladoHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });


                
            $resultados = $instalacion_cobre_realizada_pendiente->union($instalacion_cobre_anulada_pendiente)
                ->union($instalacion_cobre_objetada_pendiente)->union($instalacion_cobre_transferida_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'TODOS' && $tipo_actividad === 'REALIZADA') {
            $instalacion_adsl_realizada_pendiente = PostventaTrasladoAdsl_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoAdsl as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NOrdenTrasladosAdsl as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ObvsTrasladoAdsl as Comentarios', 'TrabajadoTrasladoAdsl as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_dth_realizada_pendiente = PostventaTrasladoDth_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoDth as Tipo_actividad',DB::raw('OrdenTrasladoDth as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ObvsTrasladoDth as Comentarios', 'TrabajadoTrasladoDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_cobre_realizada_pendiente = PostventaTrasladoCobre_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoCobre as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('OrdenTrasladoCobre as N_OrdenLinea'),'ObvsTrasladoCobre as Comentarios', 'TrabajadoTrasladoCobre as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
      
            $instalacion_gpon_realizada_pendiente = PostventaTrasladoGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTrasladoGpon as N_OrdenTv','OrdenInternetTrasladoGpon as N_OrdenInternet','OrdenLineaTrasladoGpon as N_OrdenLinea','ObvsTrasladoGpon as Comentarios', 'TrabajadoTrasladoGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            
             $instalacion_hfc_realizada_pendiente =PostventaTrasladoHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvTrasladoHfc as N_OrdenTv','OrdenInternetTrasladoHfc as N_OrdenInternet','OrdenLineaTrasladoHfc as N_OrdenLinea','ObservacionesTrasladoHfc as Comentarios', 'TrabajadoTrasladoHfc as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
                
            $resultados = $instalacion_adsl_realizada_pendiente->union($instalacion_dth_realizada_pendiente)->union($instalacion_cobre_realizada_pendiente)->union($instalacion_gpon_realizada_pendiente)->union($instalacion_hfc_realizada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'TODOS' && $tipo_actividad === 'OBJETADA') {
            $instalacion_adsl_realizada_pendiente = PostventaTrasladoAdsl_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoAdsl as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('OrdenObjTrasladoAdsl as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentariosTrasladosObjAdsl as Comentarios','TrabajadoTrasladoObjAdsl as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_dth_realizada_pendiente = PostventaTrasladoDth_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoDth as Tipo_actividad',DB::raw('OrdenTrasladoObjDth as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentariosTrasladoObjDth as Comentarios','TrabajadoTrasladoObj_Dth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

                $instalacion_cobre_realizada_pendiente = PostventaTrasladoCobre_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoCobre as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('OrdenTrasladoObjCobres as N_OrdenLinea'),'ComentariosObjTrasladoCobre as Comentarios','TrabajadoTrasladoObjCobre as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
      
            $instalacion_gpon_realizada_pendiente = PostventaTrasladoGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTrasladoObjGpon as N_OrdenTv','OrdenInterObjTraslGpon as N_OrdenInternet','OrdenLineaTraslObjGpon as N_OrdenLinea','ObvsTrasladoObjGpon as Comentarios', 'TrabajadoTrasladoObjGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            
             $instalacion_hfc_realizada_pendiente =PostventaTrasladoHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvObjetadoTrasladoHfc as N_OrdenTv','OrdenIntObjTrasladoHfc as N_OrdenInternet','OrdenLineaObjetadoTrasladoHfc as N_OrdenLinea','ObvsObjTrasladoHfc as Comentarios', 'TrabajadoObjTrasladoHfc as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
                
            $resultados = $instalacion_adsl_realizada_pendiente->union($instalacion_dth_realizada_pendiente)->union($instalacion_cobre_realizada_pendiente)->union($instalacion_gpon_realizada_pendiente)->union($instalacion_hfc_realizada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'TODOS' && $tipo_actividad === 'ANULADA') {
            $instalacion_adsl_realizada_pendiente = PostventaTrasladoAdsl_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadTrasladoAdsl as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NOrdenTrasladosAnulAdsl as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentarioTrasladoAnulada_Adsl as Comentarios','TrabajadoTrasladoTrAnulada_Adsl as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_dth_realizada_pendiente =  PostventaTrasladoDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadTrasladoDth as Tipo_actividad',DB::raw('OrdenTrasladosDth as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentarioTrasladoAnulada_Dth as Comentarios','TrabajadoTrasladoAnulada_Dth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

                $instalacion_cobre_realizada_pendiente = PostventaTrasladoCobre_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadTrasladoCobre as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('OrdenTrasladosCobre as N_OrdenLinea'),'ComentarioTrasladoAnulada_Cobre as Comentarios','TrabajadoTrasladoAnulada_Cobre as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
      
            $instalacion_gpon_realizada_pendiente = PostventaTrasladoGpon_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTraslAnuladoGpon as N_OrdenTv','OrdenIntTrasladoAnulGpon as N_OrdenInternet','OrdenLineaTraslAnulGpon as N_OrdenLinea','ComentarioTrasladoAnulada_Gpon as Comentarios', 'TrabajadoAnuladaTraslado_gpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            
             $instalacion_hfc_realizada_pendiente =PostventaTrasladoHfc_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvAnulTraslHfc as N_OrdenTv','OrdenInterAnulTraslHfc as N_OrdenInternet','OrdenLineaAnulTraslHfc as N_OrdenLinea','ComenAnuladaTraslado_Hfc as Comentarios', 'TrabajadoAnuladaTraslado_Hfc as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });  
            
                
            $resultados = $instalacion_adsl_realizada_pendiente->union($instalacion_dth_realizada_pendiente)->union($instalacion_cobre_realizada_pendiente)->union($instalacion_gpon_realizada_pendiente)->union($instalacion_hfc_realizada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'TODOS' && $tipo_actividad === 'TRANSFERIDA') {
            $instalacion_adsl_realizada_pendiente =PostventaTrasladoGpon_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTrasladoTransGpon as N_OrdenTv','OrdenIntTransladoGpon as N_OrdenInternet','OrdenLineaTrasladoTransGpon as N_OrdenLinea','ComentTrasladoTransGpon as Comentarios', 'TrabajadoTraslTransGpon as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_dth_realizada_pendiente =   PostventaTrasladoHfc_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvTransferidoHfc as N_OrdenTv','OrdenInternetTransferidoHfc as N_OrdenInternet','OrdenLineaTransferidoHfc as N_OrdenLinea','ComentarioTrasladoTransHfc as Comentarios', 'TrabajadoTransTrasladoHfc as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $resultados = $instalacion_adsl_realizada_pendiente->union($instalacion_dth_realizada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'TRASLADO' && $tecnologia === 'TODOS' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_hfc_realizada_pendiente =  PostventaTrasladoAdsl_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoAdsl as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NOrdenTrasladosAdsl as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ObvsTrasladoAdsl as Comentarios', 'TrabajadoTrasladoAdsl as Trabajado','username_creacion','created_at')
            ->where('TrabajadoTrasladoAdsl', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_objetada_pendiente =  PostventaTrasladoDth_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoDth as Tipo_actividad',DB::raw('OrdenTrasladoDth as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ObvsTrasladoDth as Comentarios', 'TrabajadoTrasladoDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_transferida_pendiente = PostventaTrasladoCobre_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoCobre as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('OrdenTrasladoCobre as N_OrdenLinea'),'ObvsTrasladoCobre as Comentarios', 'TrabajadoTrasladoCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });    

            $instalacion_dth_realizada_pendiente =PostventaTrasladoGpon_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTrasladoGpon as N_OrdenTv','OrdenInternetTrasladoGpon as N_OrdenInternet','OrdenLineaTrasladoGpon as N_OrdenLinea','ObvsTrasladoGpon as Comentarios', 'TrabajadoTrasladoGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });
    

            $instalacion_dth_objetada_pendiente =PostventaTrasladoHfc_Realizado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvTrasladoHfc as N_OrdenTv','OrdenInternetTrasladoHfc as N_OrdenInternet','OrdenLineaTrasladoHfc as N_OrdenLinea','ObservacionesTrasladoHfc as Comentarios', 'TrabajadoTrasladoHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoHfc', 'PENDIENTE')                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_dth_transferida_pendiente =PostventaTrasladoAdsl_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoAdsl as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('OrdenObjTrasladoAdsl as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentariosTrasladosObjAdsl as Comentarios','TrabajadoTrasladoObjAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoObjAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    });
    

            $instalacion_gpon_realizada_pendiente =  PostventaTrasladoDth_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoDth as Tipo_actividad',DB::raw('OrdenTrasladoObjDth as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentariosTrasladoObjDth as Comentarios','TrabajadoTrasladoObj_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTrasladoObj_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });
            
             $instalacion_gpon_objetada_pendiente = PostventaTrasladoCobre_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoCobre as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('OrdenTrasladoObjCobres as N_OrdenLinea'),'ComentariosObjTrasladoCobre as Comentarios','TrabajadoTrasladoObjCobre as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoTrasladoObjCobre', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            });
            
            $instalacion_gpon_transferida_pendiente = PostventaTrasladoGpon_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTrasladoObjGpon as N_OrdenTv','OrdenInterObjTraslGpon as N_OrdenInternet','OrdenLineaTraslObjGpon as N_OrdenLinea','ObvsTrasladoObjGpon as Comentarios', 'TrabajadoTrasladoObjGpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoTrasladoObjGpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 

            $instalacion_gpon_trans_pendiente = PostventaTrasladoHfc_Objetado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvObjetadoTrasladoHfc as N_OrdenTv','OrdenIntObjTrasladoHfc as N_OrdenInternet','OrdenLineaObjetadoTrasladoHfc as N_OrdenLinea','ObvsObjTrasladoHfc as Comentarios', 'TrabajadoObjTrasladoHfc as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoObjTrasladoHfc', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 
                            
             $instalacion_adslanulada_pendiente =  PostventaTrasladoAdsl_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadTrasladoAdsl as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NOrdenTrasladosAnulAdsl as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentarioTrasladoAnulada_Adsl as Comentarios','TrabajadoTrasladoTrAnulada_Adsl as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoTrasladoTrAnulada_Adsl', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 

             $instalacion_Dthanulada_pendiente =  PostventaTrasladoDthAnulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadTrasladoDth as Tipo_actividad',DB::raw('OrdenTrasladosDth as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentarioTrasladoAnulada_Dth as Comentarios','TrabajadoTrasladoAnulada_Dth as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoTrasladoAnulada_Dth', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 
                            
            $instalacion_Cobreanulada_pendiente =  PostventaTrasladoCobre_Anulada::select('codigoUnico','codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadTrasladoCobre as Tipo_actividad',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenInternet'),DB::raw('OrdenTrasladosCobre as N_OrdenLinea'),'ComentarioTrasladoAnulada_Cobre as Comentarios','TrabajadoTrasladoAnulada_Cobre as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoTrasladoAnulada_Cobre', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 

            $instalacion_Gponanulada_pendiente =  PostventaTrasladoGpon_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTraslAnuladoGpon as N_OrdenTv','OrdenIntTrasladoAnulGpon as N_OrdenInternet','OrdenLineaTraslAnulGpon as N_OrdenLinea','ComentarioTrasladoAnulada_Gpon as Comentarios', 'TrabajadoAnuladaTraslado_gpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoAnuladaTraslado_gpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 
            
             $instalacion_Hfcanulada_pendiente =  PostventaTrasladoHfc_Anulado::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvAnulTraslHfc as N_OrdenTv','OrdenInterAnulTraslHfc as N_OrdenInternet','OrdenLineaAnulTraslHfc as N_OrdenLinea','ComenAnuladaTraslado_Hfc as Comentarios', 'TrabajadoAnuladaTraslado_Hfc as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoAnuladaTraslado_Hfc', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 
            
            $instalacion_HfcTrans_pendiente =   PostventaTrasladoHfc_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoHfc as Tipo_actividad','OrdenTvTransferidoHfc as N_OrdenTv','OrdenInternetTransferidoHfc as N_OrdenInternet','OrdenLineaTransferidoHfc as N_OrdenLinea','ComentarioTrasladoTransHfc as Comentarios', 'TrabajadoTransTrasladoHfc as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoTransTrasladoHfc', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 
                            
            $instalacion_GponTrans_pendiente =   PostventaTrasladoGpon_Transferido::select('codigoUnico','codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadTrasladoGpon as Tipo_actividad','OrdenTvTrasladoTransGpon as N_OrdenTv','OrdenIntTransladoGpon as N_OrdenInternet','OrdenLineaTrasladoTransGpon as N_OrdenLinea','ComentTrasladoTransGpon as Comentarios', 'TrabajadoTraslTransGpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoTraslTransGpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            }); 

            $resultados = $instalacion_hfc_realizada_pendiente->union($instalacion_hfc_objetada_pendiente)
                ->union($instalacion_hfc_transferida_pendiente)->union($instalacion_dth_realizada_pendiente)->union($instalacion_dth_objetada_pendiente)
                ->union($instalacion_dth_transferida_pendiente)->union($instalacion_gpon_realizada_pendiente)->union($instalacion_gpon_objetada_pendiente)
                ->union($instalacion_gpon_transferida_pendiente)->union($instalacion_gpon_trans_pendiente)->union($instalacion_adslanulada_pendiente)
                ->union($instalacion_Dthanulada_pendiente)->union($instalacion_Cobreanulada_pendiente)->union($instalacion_Gponanulada_pendiente)
                ->union($instalacion_Hfcanulada_pendiente)->union($instalacion_HfcTrans_pendiente)->union($instalacion_GponTrans_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })
                ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                })
                ->get();
        }else {
            $resultados = collect(); // crear una colección vacía

            if (!isset($llamada_motivo)) {
                return view('llamadashome/reportes', [
                    'resultados' => $resultados,
                    'llamada_motivo' => $llamada_motivo,
                    'tecnologia' => $tecnologia,
                    'tipo_actividad' => $tipo_actividad,
                    'users' => User::pluck('username')
                ])
                ->with('page_title', 'Generar - Reporte')    
                ->with('navigation', 'Generar - Reporte');
            }
           
            
        }      

        if ($resultados->isEmpty()) {
			$message = "Sin resultados";
			$messages = "No se encontraron registros";
		} else {
			$message = "¡EXITO!";
			$messages = "REGISTRO ENCONTRADO";
			
		}

        return view('llamadashome/reportes', [
                    'resultados' => $resultados,
                    'llamada_motivo' => $llamada_motivo,
                    'tecnologia' => $tecnologia,
                    'tipo_postventa'=>$tipo_postventa,
                    'tipo_actividad' => $tipo_actividad,
                    'users' => User::pluck('username')
                ])
                ->with('message', $message)
				->with('messages', $messages)
                ->with('page_title', 'Generar - Reporte')    
                ->with('navigation', 'Generar - Reporte');
        
    }






    
    
       
}