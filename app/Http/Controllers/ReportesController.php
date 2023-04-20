<?php
namespace SSD\Http\Controllers;


use SSD\Models\consultasRealizada;
use SSD\Models\agendamientosRealizados;

use SSD\Models\Instalaciones\InstalacionDthAnulada;
use SSD\Models\Instalaciones\InstalacionDthObjetada;
use SSD\Models\Instalaciones\InstalacionDthRealizada;

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
            
        return view('llamadashome/reportes')
        ->with('page_title', 'Generar - Reporte')
        ->with('navigation', 'Generar - Reporte');      
    }

    public function usersAll()
    {
        $users = User::pluck('first_name');

        // dd($users);

        return view('llamadashome/reportes', [
            'users' => $users
        ])
        ->with('page_title', 'Generar - Reporte')
        ->with('navigation', 'Generar - Reporte'); 
    }


    // public function generarReporte(Request $request){

    //     $llamada_motivo = $request->input("motivo_llamada");
    //     // dd($llamada_motivo);
        
    //     $created_at = $request->created_at;
    //     $motivo_llamada = $request->motivo_llamada;
    //     $username_creacion = $request->username_creacion;

        
    //     $consultas = consultasRealizada::all();
    //     // dd($consultas);

    //     $users = User::pluck('first_name');
    
    //     return view('llamadashome/reportes', [
    //                 'consultas' => $consultas,
    //                 'users' => $users
    //     ])
    //     ->with('page_title', 'Reporte')
    //     ->with('navigation', 'Reporte'); 

	// 	// Redireccionamos a la página de inicio

    // }

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
            $instalacion_dth_realizada_pendiente = InstalacionDthRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadDth','ordenTv_Dth as N_Orden','ObservacionesDth as Comentarios', 'TrabajadoDth as Trabajado','username_creacion','created_at')
            ->where('TrabajadoDth', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_objetada_pendiente = InstalacionDthObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadDth','OrdenObj_Dth as N_Orden','ComentarioObjetado_Dth as Comentarios','TrabajadoObj_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObj_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = InstalacionDthAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadDth','OrdenAnulada_Dth as N_Orden','ComentarioAnulada_Dth as Comentarios','TrabajadoAnulada_Dth as Trabajado','username_creacion','created_at')
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
            $instalacion_cobre_realizada_pendiente = InstalacionCobreRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadCobre','OrdenLineaCobre as N_Orden','ObservacionesCobre as Comentarios', 'TrabajadoCobre as Trabajado','username_creacion','created_at')
            ->where('TrabajadoCobre', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = InstalacionCobreObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadCobre','OrdenCobre_Objetada as N_Orden','ComentariosCobre_Objetados as Comentarios','TrabajadoCobre_Objetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoCobre_Objetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = InstalacionCobreAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadCobre','OrdenAnuladaCobre as N_Orden','ComentarioAnulada_Cobre as Comentarios','TrabajadoAnulada_Cobre as Trabajado','username_creacion','created_at')
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
            $instalacion_cobre_realizada_pendiente = InstalacionAdslRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadAdsl','orden_internet_adsl as N_Orden','Obvservaciones_Adsl as Comentarios', 'TrabajadoAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_objetada_pendiente = InstalacionAdslObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadAdsl','OrdenAdsl_Objetada as N_Orden','ComentariosObjetada_Adsl as Comentarios','TrabajadoAdslObjetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdslObjetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = InstalacionAdslAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadAdsl','OrdenAnuladaAdsl as N_Orden','ComentarioAnulada_Adsl as Comentarios','TrabajadoAnulada_Adsl as Trabajado','username_creacion','created_at')
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
            $instalacion_gpon_realizada_pendiente = InstalacionGponRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon','OrdenInternet_Gpon as N_OrdenInternet','OrdenTv_Gpon as N_OrdenTv','OrdenLinea_Gpon as N_OrdenLinea','ObservacionesGpon as Comentarios', 'TrabajadoGpon as Trabajado','username_creacion','created_at')
            ->where('TrabajadoGpon', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_gpon_objetada_pendiente = InstalacionGponObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon','OrdenInternet_Gpon as N_OrdenInternet','OrdenTv_Gpon as N_OrdenTv','OrdenLinea_Gpon as N_OrdenLinea','ComentariosGpon_Objetada as Comentarios','TrabajadoGpon_Objetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoGpon_Objetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_gpon_anulada_pendiente = InstalacionGponAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadGpon','OrdenInternet_Gpon as N_OrdenInternet','OrdenTv_Gpon as N_OrdenTv','OrdenLinea_Gpon as N_OrdenLinea','ComentarioAnulada_Gpon as Comentarios','TrabajadoAnulada_Gpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Gpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_gpon_transferida_pendiente = InstalacionGponTransferida::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadGpon','OrdenInternet_Gpon as N_OrdenInternet','OrdenTv_Gpon as N_OrdenTv','OrdenLinea_Gpon as N_OrdenLinea','ComentarioTransferido_Gpon as Comentarios','TrabajadoTransferido_Gpon as Trabajado','username_creacion','created_at')
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
            
        }else if ($llamada_motivo === 'INSTALACION' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_hfc_realizada_pendiente = InstalacionHfcRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ObservacionesHfc as Comentarios', 'TrabajadoHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_hfc_objetada_pendiente = InstalacionHfcObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentariosObjetados_Hfc as Comentarios','TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_hfc_anulada_pendiente = InstalacionHfcAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentarioAnulada_Hfc as Comentarios','TrabajadoAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_hfc_transferida_pendiente = InstalacionHfcTransferida::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentariosTransferida_Hfc as Comentarios','TrabajadoTransferido_Hfc as Trabajado','username_creacion','created_at')
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
            $instalacion_hfc_realizada_pendiente = InstalacionHfcRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ObservacionesHfc as Comentarios', 'TrabajadoHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });

            $instalacion_hfc_objetada_pendiente = InstalacionHfcObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentariosObjetados_Hfc as Comentarios','TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });

            $instalacion_hfc_anulada_pendiente = InstalacionHfcAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentarioAnulada_Hfc as Comentarios','TrabajadoAnulada_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });

            $instalacion_hfc_transferida_pendiente = InstalacionHfcTransferida::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividad as tipo_actividad','orden_tv_hfc as N_OrdenTv','orden_internet_hfc as N_OrdenInternet','orden_linea_hfc as N_OrdenLinea','ComentariosTransferida_Hfc as Comentarios','TrabajadoTransferido_Hfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferido_Hfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });  

            $instalacion_dth_realizada_pendiente = InstalacionDthRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadDth as tipo_actividad','ordenTv_Dth as N_OrdenTv',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ObservacionesDth as Comentarios', 'TrabajadoDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
    
            $instalacion_dth_objetada_pendiente = InstalacionDthObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadDth as tipo_actividad','OrdenObj_Dth as N_OrdenTv',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentarioObjetado_Dth as Comentarios','TrabajadoObj_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObj_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
    
            $instalacion_dth_anulada_pendiente = InstalacionDthAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadDth as tipo_actividad','OrdenAnulada_Dth as N_OrdenTv',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenLinea'),'ComentarioAnulada_Dth as Comentarios','TrabajadoAnulada_Dth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Dth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_realizada_pendiente = InstalacionCobreRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadCobre as tipo_actividad',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenTv'),'OrdenLineaCobre as N_OrdenLinea','ObservacionesCobre as Comentarios', 'TrabajadoCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
        
            $instalacion_cobre_objetada_pendiente = InstalacionCobreObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadCobre as tipo_actividad',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenTv'),'OrdenCobre_Objetada as N_OrdenLinea','ComentariosCobre_Objetados as Comentarios','TrabajadoCobre_Objetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoCobre_Objetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
        
            $instalacion_cobre_anulada_pendiente = InstalacionCobreAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadCobre as tipo_actividad',DB::raw('NULL as N_OrdenInternet'),DB::raw('NULL as N_OrdenTv'),'OrdenAnuladaCobre as N_OrdenLinea','ComentarioAnulada_Cobre as Comentarios','TrabajadoAnulada_Cobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Cobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });

            $instalacion_adls_realizada_pendiente = InstalacionAdslRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadAdsl as tipo_actividad','orden_internet_adsl as N_OrdenInternet',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenLinea'),'Obvservaciones_Adsl as Comentarios', 'TrabajadoAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                        return $query->whereDate('created_at', '>=', $fecha_inicio);
                    })
                    ->when($fecha_fin, function ($query) use ($fecha_fin) {
                        return $query->whereDate('created_at', '<=', $fecha_fin);
                    });
        
            $instalacion_adsl_objetada_pendiente = InstalacionAdslObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadAdsl as tipo_actividad','OrdenAdsl_Objetada as N_OrdenInternet',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenLinea'),'ComentariosObjetada_Adsl as Comentarios','TrabajadoAdslObjetado as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdslObjetado', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                            return $query->whereDate('created_at', '>=', $fecha_inicio);
                        })
                        ->when($fecha_fin, function ($query) use ($fecha_fin) {
                            return $query->whereDate('created_at', '<=', $fecha_fin);
                        });
        
            $instalacion_adsl_anulada_pendiente = InstalacionAdslAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadAdsl as tipo_actividad','OrdenAnuladaAdsl as N_OrdenInternet',DB::raw('NULL as N_OrdenTv'),DB::raw('NULL as N_OrdenLinea'),'ComentarioAnulada_Adsl as Comentarios','TrabajadoAnulada_Adsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAnulada_Adsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });
                        
            $instalacion_gpon_realizada_pendiente = InstalacionGponRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon as tipo_actividad','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','ObservacionesGpon as Comentarios', 'TrabajadoGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                            return $query->whereDate('created_at', '>=', $fecha_inicio);
                        })
                        ->when($fecha_fin, function ($query) use ($fecha_fin) {
                            return $query->whereDate('created_at', '<=', $fecha_fin);
                        });
            
             $instalacion_gpon_objetada_pendiente = InstalacionGponObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'tipo_actividadGpon as tipo_actividad','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','ComentariosGpon_Objetada as Comentarios','TrabajadoGpon_Objetado as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoGpon_Objetado', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });
            
            $instalacion_gpon_anulada_pendiente = InstalacionGponAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadGpon as tipo_actividad','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','ComentarioAnulada_Gpon as Comentarios','TrabajadoAnulada_Gpon as Trabajado','username_creacion','created_at')
                 ->where('TrabajadoAnulada_Gpon', 'PENDIENTE')
                 ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                                return $query->whereDate('created_at', '>=', $fecha_inicio);
                            })
                            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                                return $query->whereDate('created_at', '<=', $fecha_fin);
                            });
            
            $instalacion_gpon_transferida_pendiente = InstalacionGponTransferida::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','tipo_actividadGpon as tipo_actividad','OrdenTv_Gpon as N_OrdenTv','OrdenInternet_Gpon as N_OrdenInternet','OrdenLinea_Gpon as N_OrdenLinea','ComentarioTransferido_Gpon as Comentarios','TrabajadoTransferido_Gpon as Trabajado','username_creacion','created_at')
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
            
        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'DTH' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = repacionesDth_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth','OrdenDthRealizada as N_Orden','ObservacionesDth as Comentarios','TrabajadoDth as Trabajado','username_creacion','created_at')
            ->where('TrabajadoDth', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_dth_objetada_pendiente = repacionesDth_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth','OrdenObjDth as N_Orden','ComentariosObjetadosDth as Comentarios','TrabajadoObjetadaDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = repacionesDth_Transferido::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReparacionDth','OrdenTransferidoDth as N_Orden','ComentarioTransferidoDth as Comentarios','TrabajadoTransferidoDth as Trabajado','username_creacion','created_at')
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

        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad === 'TRANSFERIDA') {
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
            
        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'COBRE' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = repacionesCobre_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre','OrdenReparacionCobre as N_Orden','ObservacionesCobre as Comentarios','TrabajadoCobre as Trabajado','username_creacion','created_at')
            ->where('TrabajadoCobre', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_dth_objetada_pendiente = repacionesCobre_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre','OrdenObjReparacionCobre as N_Orden','ComentariosObjetados_Cobre as Comentarios','TrabajadoObjetadaCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }) ->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = repacionesCobre_Transferido::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReparacionCobre','OrdenTransfCobre as N_Orden','ComentarioCobreTransferido as Comentarios','TrabajadoCobreTransferido as Trabajado','username_creacion','created_at')
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

        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad === 'TRANSFERIDA') {
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
            
        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'ADSL' && $tipo_actividad === 'PENDIENTES') {
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

        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad === 'TRANSFERIDA') {
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
            
        
        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'GPON' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = repacionesGpon_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon','OrdenRealizadoGpon as N_Orden','ObservacionesGpon as Comentarios','TrabajadoGpon as Trabajado','username_creacion','created_at')
            ->where('TrabajadoGpon', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_dth_objetada_pendiente = reparacionesGpon_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon','OrdenObjGpon as N_Orden','ComentariosObjGpon as Comentarios','TrabajadoObjetadaGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = reparacionesGpon_Transferido::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReparacionGpon','OrdenTransGpon as N_Orden','ComentarioTransfGpon as Comentarios','TrabajadoTransfGpon as Trabajado','username_creacion','created_at')
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

        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad === 'TRANSFERIDA') {
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
            
        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_dth_realizada_pendiente = reparacionesHfc_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc','OrdenHfc as N_Orden','ObservacionesHfc as Comentarios','TrabajadoHfcRealizado as Trabajado','username_creacion','created_at')
            ->where('TrabajadoHfcRealizado', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_objetada_pendiente = reparacionesHfc_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc','OrdenObjHfc as N_Orden','ComentariosObjetados_Hfc as Comentarios','TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_dth_anulada_pendiente = reparacionesHfc_Transferido::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReparacionHfc','OrdenTransfHfc as N_Orden','ComentarioTransfHfc as Comentarios','TrabajadoTransfHfc as Trabajado','username_creacion','created_at')
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

        }
        else if ($llamada_motivo === 'REPARACIONES' && $tecnologia === 'TODOS' && $tipo_actividad === 'REALIZADA') {
            $instalacion_hfc_realizada_todos = reparacionesHfc_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenHfc as N_Orden','CodigoCausaHfc as Codigo_Causa','DescripcionCausaDañoHfc as Descripcion_Causa','DescripcionTipoDañoHfc as Descripcion_Tipo_Daño','DescripcionUbicacionHfc as Descripcion_Ubicacion_Daño','ObservacionesHfc as Comentarios','RecibeHfc as Recibe', 'TrabajadoHfcRealizado as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = repacionesGpon_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad ','OrdenRealizadoGpon as N_Orden','CodigoCausaGpon as Codigo_Causa','DescripcionCausaDañoGpon as Descripcion_Causa','DescripcionTipoDañoGpon as Descripcion_Tipo_Daño','DescripcionUbicacionGpon as Descripcion_Ubicacion_Daño','ObservacionesGpon as Comentarios','RecibeGpon as Recibe', 'TrabajadoGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_cobre_realizada_todos = repacionesCobre_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad ','OrdenReparacionCobre as N_Orden','CodigoCausaCobre as Codigo_Causa','DescripcionCausaCobre as Descripcion_Causa','DescripcionTipoDañoCobre as Descripcion_Tipo_Daño','DescripcionUbicacionDañoCobre as Descripcion_Ubicacion_Daño','ObservacionesCobre as Comentarios','RecibeCobre as Recibe', 'TrabajadoCobre as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = repacionesDth_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad ','OrdenDthRealizada as N_Orden','CodigoCausaDth as Codigo_Causa','DescripcionCausaDth as Descripcion_Causa','DescripcionTipoDañoDth as Descripcion_Tipo_Daño','DescripcionUbicacionDañoDth as Descripcion_Ubicacion_Daño','ObservacionesDth as Comentarios','RecibeDth as Recibe', 'TrabajadoDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            $instalacion_adsl_realizada_todos = repacionesAdsl_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad ','OrdenAdslRealizado as N_Orden','CodigoCausaAdsl as Codigo_Causa','DescripcionCausaAdsl as Descripcion_Causa','DescripcionTipoDañoAdsl as Descripcion_Tipo_Daño','DescripcionUbicacionDañoAdsl as Descripcion_Ubicacion_Daño','ObservacionesAdsl as Comentarios','RecibeAdsl as Recibe', 'TrabajadoAdsl as Trabajado','username_creacion','created_at')
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
            $instalacion_hfc_realizada_todos = reparacionesHfc_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenObjHfc as N_Orden','MotivoObjetada_Hfc as Motivo_Objetada','ComentariosObjetados_Hfc as Comentarios', 'TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = reparacionesGpon_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad','OrdenObjGpon as N_Orden','MotivoObjetada_Gpon as Motivo_Objetada','ComentariosObjGpon as Comentarios', 'TrabajadoObjetadaGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_cobre_realizada_todos = repacionesCobre_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad','OrdenObjReparacionCobre as N_Orden','MotivoObjetada_Cobre as Motivo_Objetada','ComentariosObjetados_Cobre as Comentarios', 'TrabajadoObjetadaCobre as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = repacionesDth_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad','OrdenObjDth as N_Orden','MotivoObjetada_Dth as Motivo_Objetada','ComentariosObjetadosDth as Comentarios', 'TrabajadoObjetadaDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            $instalacion_adsl_realizada_todos = repacionesAdsl_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad','OrdenObjAdsl as N_Orden','MotivoObjetada_Adsl as Motivo_Objetada','ComentsObjAdsl as Comentarios', 'TrabajadoObjetadaAdsl as Trabajado','username_creacion','created_at')
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
            $instalacion_hfc_realizada_todos = reparacionesHfc_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenTransfHfc as N_Orden','ComentarioTransfHfc as Comentarios', 'TrabajadoTransfHfc as Trabajado','username_creacion','created_at')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            });

            $instalacion_gpon_realizada_todos = reparacionesGpon_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad','OrdenTransGpon as N_Orden','ComentarioTransfGpon as Comentarios', 'TrabajadoTransfGpon as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_cobre_realizada_todos = repacionesCobre_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad','OrdenTransfCobre as N_Orden','ComentarioCobreTransferido as Comentarios', 'TrabajadoCobreTransferido as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                });

            $instalacion_dth_realizada_todos = repacionesDth_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad','OrdenTransferidoDth as N_Orden','ComentarioTransferidoDth as Comentarios', 'TrabajadoTransferidoDth as Trabajado','username_creacion','created_at')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                }); 
            $instalacion_adsl_realizada_todos = repacionesAdsl_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad','OrdenTransferidoAdsl as N_Orden','ComentsTransferidoAdsl as Comentarios', 'TrabajadoTransferidoAdsl as Trabajado','username_creacion','created_at')
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
            $instalacion_hfc_realizada_pendiente = reparacionesHfc_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenHfc as N_Orden','ObservacionesHfc as Comentarios','TrabajadoHfcRealizado as Trabajado','username_creacion','created_at')
            ->where('TrabajadoHfcRealizado', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_objetada_pendiente =  reparacionesHfc_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenObjHfc as N_Orden','ComentariosObjetados_Hfc as Comentarios', 'TrabajadoObjetadaHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_hfc_transferida_pendiente = reparacionesHfc_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionHfc as tipo_actividad','OrdenTransfHfc as N_Orden','ComentarioTransfHfc as Comentarios', 'TrabajadoTransfHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransfHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });    

            $instalacion_dth_realizada_pendiente = repacionesDth_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad ','OrdenDthRealizada as N_Orden','ObservacionesDth as Comentarios', 'TrabajadoDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                    });
    
            $instalacion_dth_objetada_pendiente = repacionesDth_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad','OrdenObjDth as N_Orden','ComentariosObjetadosDth as Comentarios', 'TrabajadoObjetadaDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_dth_transferida_pendiente = repacionesDth_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionDth as tipo_actividad','OrdenTransferidoDth as N_Orden','ComentarioTransferidoDth as Comentarios', 'TrabajadoTransferidoDth as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferidoDth', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    });
    

            $instalacion_cobre_realizada_pendiente = repacionesCobre_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad ','OrdenReparacionCobre as N_Orden','ObservacionesCobre as Comentarios', 'TrabajadoCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });
        
            $instalacion_cobre_objetada_pendiente = repacionesCobre_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad','OrdenObjReparacionCobre as N_Orden','ComentariosObjetados_Cobre as Comentarios', 'TrabajadoObjetadaCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    });
                    
            $instalacion_cobre_transferida_pendiente = repacionesCobre_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionCobre as tipo_actividad','OrdenTransfCobre as N_Orden','ComentarioCobreTransferido as Comentarios', 'TrabajadoCobreTransferido as Trabajado','username_creacion','created_at')
            ->where('TrabajadoCobreTransferido', 'PENDIENTE')    
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                    });

            $instalacion_adls_realizada_pendiente =repacionesAdsl_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad ','OrdenAdslRealizado as N_Orden','ObservacionesAdsl as Comentarios', 'TrabajadoAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                        return $query->where('username_creacion', $selected_user);
                    });
        
            $instalacion_adsl_objetada_pendiente = repacionesAdsl_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad','OrdenObjAdsl as N_Orden','ComentsObjAdsl as Comentarios', 'TrabajadoObjetadaAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjetadaAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });
            $instalacion_adsl_transferida_pendiente = repacionesAdsl_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionAdsl as tipo_actividad','OrdenTransferidoAdsl as N_Orden','ComentsTransferidoAdsl as Comentarios', 'TrabajadoTransferidoAdsl as Trabajado','username_creacion','created_at')
                ->where('TrabajadoTransferidoAdsl', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });

            $instalacion_gpon_realizada_pendiente =  repacionesGpon_Realizado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad ','OrdenRealizadoGpon as N_Orden','ObservacionesGpon as Comentarios', 'TrabajadoGpon as Trabajado','username_creacion','created_at')
                ->where('TrabajadoGpon', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                            return $query->where('username_creacion', $selected_user);
                        });
            
             $instalacion_gpon_objetada_pendiente = reparacionesGpon_Objetado::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad','OrdenObjGpon as N_Orden','ComentariosObjGpon as Comentarios', 'TrabajadoObjetadaGpon as Trabajado','username_creacion','created_at')
                    ->where('TrabajadoObjetadaGpon', 'PENDIENTE')
                    ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                                return $query->where('username_creacion', $selected_user);
                            });
            
            $instalacion_gpon_transferida_pendiente = reparacionesGpon_Transferido::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReparacionGpon as tipo_actividad','OrdenTransGpon as N_Orden','ComentarioTransfGpon as Comentarios', 'TrabajadoTransfGpon as Trabajado','username_creacion','created_at')
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
            $instalacion_cobre_realizada_pendiente = PostventaCambioNumeroCobreRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioNumeroCobre','OrdenCambioCobre as N_Orden','ObvsCambioCobre as Comentarios', 'TrabajadoCambioCobre as Trabajado','username_creacion','created_at')
            ->where('TrabajadoCambioCobre', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaCambioNumeroCobreObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadCambioNumeroCobre','OrdenObjCambioCobre as N_Orden','ComentariosCambioCobre as Comentarios','TrabajadoObjCambioCobre as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjCambioCobre', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaCambioNumeroCobreAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadCambioNumeroCobre','OrdenAnuladaCambioCobre as N_Orden','ComentarioAnuladaCambioCobre as Comentarios','TrabajadoAnuladaCambioCobre as Trabajado','username_creacion','created_at')
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
            
        }else if ($llamada_motivo === 'POSTVENTA' && $tipo_postventa === 'RECONEXION / RETIRO' && $tecnologia === 'HFC' && $tipo_actividad === 'PENDIENTES') {
            $instalacion_cobre_realizada_pendiente = PostventaRetiroHfcRealizada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionHfc','OrdenRetiroHfc as N_Orden','ObvsRetiroHfc as Comentarios', 'TrabajadoRetiroHfc as Trabajado','username_creacion','created_at')
            ->where('TrabajadoRetiroHfc', 'PENDIENTE')
            ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                return $query->where('username_creacion', $selected_user);
            })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                return $query->whereDate('created_at', '>=', $fecha_inicio);
            })
            ->when($fecha_fin, function ($query) use ($fecha_fin) {
                return $query->whereDate('created_at', '<=', $fecha_fin);
            });

            $instalacion_cobre_objetada_pendiente = PostventaRetiroHfcObjetada::select('codigo_tecnico', 'tecnico','telefono','motivo_llamada', 'select_orden','dpto_colonia','tecnologia', 'TipoActividadReconexionHfc','OrdenRetiroObjHfc as N_Orden','ComentariosRetiroObjHfc as Comentarios','TrabajadoObjRetiroHfc as Trabajado','username_creacion','created_at')
                ->where('TrabajadoObjRetiroHfc', 'PENDIENTE')
                ->when($selected_user !== 'TODOS', function ($query) use ($selected_user) {
                    return $query->where('username_creacion', $selected_user);
                })->when($fecha_inicio, function ($query) use ($fecha_inicio) {
                    return $query->whereDate('created_at', '>=', $fecha_inicio);
                })
                ->when($fecha_fin, function ($query) use ($fecha_fin) {
                    return $query->whereDate('created_at', '<=', $fecha_fin);
                });

            $instalacion_cobre_anulada_pendiente = PostventaRetiroHfcAnulada::select('codigo_tecnico', 'tecnico', 'telefono','motivo_llamada', 'select_orden', 'dpto_colonia','tecnologia','TipoActividadReconexionHfc','OrdenRetiroAnulacionHfc as N_Orden','ComentsRetiroAnulada_Hfc as Comentarios','TrabajadoRetiroAnulada_Hfc as Trabajado','username_creacion','created_at')
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
                ->union($instalacion_cobre_objetada_pendiente)
                ->when($llamada_motivo !== 'POSTVENTA', function ($query) use ($llamada_motivo) {
                    return $query->where('motivo_llamada', $llamada_motivo);
                })->get();
            
        }  else {
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