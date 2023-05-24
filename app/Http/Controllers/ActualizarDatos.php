<?php

namespace SSD\Http\Controllers;

use Illuminate\Http\Request;

use SSD\Http\Requests;

use Illuminate\Support\Facades\Auth;

// INSTALACIONES
use SSD\Models\Instalaciones\InstalacionHfcRealizada;
use SSD\Models\Instalaciones\InstalacionHfcObjetada;
use SSD\Models\Instalaciones\InstalacionHfcTransferida;
use SSD\Models\Instalaciones\InstalacionHfcAnulada;
use SSD\Models\Instalaciones\InstalacionGponAnulada;
use SSD\Models\Instalaciones\InstalacionGponTransferida;
use SSD\Models\Instalaciones\InstalacionGponObjetada;
use SSD\Models\Instalaciones\InstalacionGponRealizada;
use SSD\Models\Instalaciones\InstalacionDthRealizada;
use SSD\Models\Instalaciones\InstalacionDthObjetada;
use SSD\Models\Instalaciones\InstalacionDthAnulada;
use SSD\Models\Instalaciones\InstalacionCobreRealizada;
use SSD\Models\Instalaciones\InstalacionCobreObjetada;
use SSD\Models\Instalaciones\InstalacionCobreAnulada;
use SSD\Models\Instalaciones\InstalacionAdslRealizada;
use SSD\Models\Instalaciones\InstalacionAdslObjetada;
use SSD\Models\Instalaciones\InstalacionAdslAnulada;

// REPARACIONES
use SSD\Models\Reparaciones\repacionesDth_Realizado;
use SSD\Models\Reparaciones\repacionesDth_Objetado;
use SSD\Models\Reparaciones\repacionesDth_Transferido;
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

// POSTVENTAS

use SSD\Models\Postventas\PostventaCambioNumeroCobreRealizada;
use SSD\Models\Postventas\PostventaCambioNumeroCobreObjetada;
use SSD\Models\Postventas\PostventaCambioNumeroCobreAnulada;

use SSD\Models\Postventas\PostventaRetiroHfcRealizada;
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
use SSD\Models\Postventas\PostventaAdicionDth_Realizado
;
use SSD\Models\Postventas\PostventaAdicionGpon_Anulada;
use SSD\Models\Postventas\PostventaAdicionGpon_Objetado;
use SSD\Models\Postventas\PostventaAdicionGpon_Realizado;

use SSD\Models\Postventas\PostventaAdicionHfc_Anulada;
use SSD\Models\Postventas\PostventaAdicionHfc_Objetado;
use SSD\Models\Postventas\PostventaAdicionHfc_Realizado;

use SSD\Models\Postventas\PostventaTrasladoDthAnulada;
use SSD\Models\Postventas\PostventaTrasladoDth_Objetado;
use SSD\Models\Postventas\PostventaTrasladoDth_Realizado;


use SSD\Models\Postventas\PostventaTrasladoCobre_Anulada;
use SSD\Models\Postventas\PostventaTrasladoCobre_Objetado;
use SSD\Models\Postventas\PostventaTrasladoCobre_Realizado;


use SSD\Models\Postventas\PostventaTrasladoAdsl_Anulada;
use SSD\Models\Postventas\PostventaTrasladoAdsl_Realizado;
use SSD\Models\Postventas\PostventaTrasladoAdsl_Objetado;

use SSD\Models\Postventas\PostventaTrasladoGpon_Anulado;
use SSD\Models\Postventas\PostventaTrasladoGpon_Transferido;
use SSD\Models\Postventas\PostventaTrasladoGpon_Objetado;
use SSD\Models\Postventas\PostventaTrasladoGpon_Realizado;

use SSD\Models\Postventas\PostventaTrasladoHfc_Transferido;
use SSD\Models\Postventas\PostventaTrasladoHfc_Anulado;
use SSD\Models\Postventas\PostventaTrasladoHfc_Objetado;
use SSD\Models\Postventas\PostventaTrasladoHfc_Realizado;

class ActualizarDatos extends Controller
{
    //


    public function editar(Request $request) {

        $id = $request->input('id');
        $motivo_llamada = $request->input('motivo_llamada');
        $NumeroOrden = $request->input('NumeroOrden');
        $actividad_tipo = $request->input('actividad_tipo');
        $tecnologia = $request->input('tecnologia');
        
        // Buscar el registro en las tres tablas
        $registro_tabla_1 = InstalacionHfcRealizada::where(function($query) use ($NumeroOrden) {
            $query->where('orden_tv_hfc', $NumeroOrden)
                  ->orWhere('orden_internet_hfc', $NumeroOrden)
                  ->orWhere('orden_linea_hfc', $NumeroOrden);
        })
            ->where('id', $id)
            ->where('tecnologia', $tecnologia)
            ->where('tipo_actividad', $actividad_tipo)
            ->where('motivo_llamada', $motivo_llamada)
            ->first();
    
        $registro_tabla_2 = InstalacionHfcObjetada::where(function($query) use ($NumeroOrden) {
            $query->where('orden_tv_hfc', $NumeroOrden)
                  ->orWhere('orden_internet_hfc', $NumeroOrden)
                  ->orWhere('orden_linea_hfc', $NumeroOrden);
        })
            ->where('id', $id)
            ->where('tecnologia', $tecnologia)
            ->where('tipo_actividad', $actividad_tipo)
            ->where('motivo_llamada', $motivo_llamada)
            ->first();
        
        $registro_tabla_3 = InstalacionHfcAnulada::where(function($query) use ($NumeroOrden) {
            $query->where('orden_tv_hfc', $NumeroOrden)
                  ->orWhere('orden_internet_hfc', $NumeroOrden)
                  ->orWhere('orden_linea_hfc', $NumeroOrden);
        })
            ->where('id', $id)
            ->where('tecnologia', $tecnologia)
            ->where('tipo_actividad', $actividad_tipo)
            ->where('motivo_llamada', $motivo_llamada)
            ->first();


        $registro_tabla_4 = InstalacionHfcTransferida::where(function($query) use ($NumeroOrden) {
                $query->where('orden_tv_hfc', $NumeroOrden)
                      ->orWhere('orden_internet_hfc', $NumeroOrden)
                      ->orWhere('orden_linea_hfc', $NumeroOrden);
            })
                ->where('id', $id)
                ->where('tecnologia', $tecnologia)
                ->where('tipo_actividad', $actividad_tipo)
                ->where('motivo_llamada', $motivo_llamada)
                ->first();

        $registro_tabla_5 = InstalacionGponRealizada::where(function($query) use ($NumeroOrden) {
                $query->where('OrdenTv_Gpon', $NumeroOrden)
                      ->orWhere('OrdenInternet_Gpon', $NumeroOrden)
                      ->orWhere('OrdenLinea_Gpon', $NumeroOrden);
            })
                ->where('id', $id)
                ->where('tecnologia', $tecnologia)
                ->where('tipo_actividadGpon', $actividad_tipo)
                ->where('motivo_llamada', $motivo_llamada)
                ->first();  
                
        $registro_tabla_6 = InstalacionGponObjetada::where(function($query) use ($NumeroOrden) {
                $query->where('OrdenTv_Gpon', $NumeroOrden)
                      ->orWhere('OrdenInternet_Gpon', $NumeroOrden)
                      ->orWhere('OrdenLinea_Gpon', $NumeroOrden);
            })
                ->where('id', $id)
                ->where('tecnologia', $tecnologia)
                ->where('tipo_actividadGpon', $actividad_tipo)
                ->where('motivo_llamada', $motivo_llamada)
                ->first(); 


        $registro_tabla_7 = InstalacionGponTransferida::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenTv_Gpon', $NumeroOrden)
                        ->orWhere('OrdenInternet_Gpon', $NumeroOrden)
                        ->orWhere('OrdenLinea_Gpon', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadGpon', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();

        $registro_tabla_8 = InstalacionGponAnulada::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenTv_Gpon', $NumeroOrden)
                        ->orWhere('OrdenInternet_Gpon', $NumeroOrden)
                        ->orWhere('OrdenLinea_Gpon', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadGpon', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_9 = InstalacionDthRealizada::where(function($query) use ($NumeroOrden) {
                    $query->where('ordenTv_Dth', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadDth', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
                    
        $registro_tabla_10 = InstalacionDthObjetada::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenObj_Dth', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadDth', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();

        $registro_tabla_11 = InstalacionDthAnulada::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenAnulada_Dth', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadDth', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_12 = InstalacionCobreRealizada::where(function($query) use ($NumeroOrden) {
                    $query->where('OrdenLineaCobre', $NumeroOrden);
                })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('tipo_actividadCobre', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_13 = InstalacionCobreObjetada::where(function($query) use ($NumeroOrden) {
                        $query->where('OrdenCobre_Objetada', $NumeroOrden);
                    })
                        ->where('id', $id)
                        ->where('tecnologia', $tecnologia)
                        ->where('tipo_actividadCobre', $actividad_tipo)
                        ->where('motivo_llamada', $motivo_llamada)
                        ->first();
        $registro_tabla_14 = InstalacionCobreAnulada::where(function($query) use ($NumeroOrden) {
                        $query->where('OrdenAnuladaCobre', $NumeroOrden);
                    })
                        ->where('id', $id)
                        ->where('tecnologia', $tecnologia)
                        ->where('tipo_actividadCobre', $actividad_tipo)
                        ->where('motivo_llamada', $motivo_llamada)
                        ->first();
        $registro_tabla_15 = InstalacionAdslRealizada::where(function($query) use ($NumeroOrden) {
                                $query->where('orden_internet_adsl', $NumeroOrden);
                            })
                                ->where('id', $id)
                                ->where('tecnologia', $tecnologia)
                                ->where('tipo_actividadAdsl', $actividad_tipo)
                                ->where('motivo_llamada', $motivo_llamada)
                                ->first();
        $registro_tabla_16 = InstalacionAdslObjetada::where(function($query) use ($NumeroOrden) {
                                $query->where('OrdenAdsl_Objetada', $NumeroOrden);
                            })
                                ->where('id', $id)
                                ->where('tecnologia', $tecnologia)
                                ->where('tipo_actividadAdsl', $actividad_tipo)
                                ->where('motivo_llamada', $motivo_llamada)
                                ->first();

        $registro_tabla_17 = InstalacionAdslAnulada::where(function($query) use ($NumeroOrden) {
                                $query->where('OrdenAnuladaAdsl', $NumeroOrden);
                            })
                                ->where('id', $id)
                                ->where('tecnologia', $tecnologia)
                                ->where('tipo_actividadAdsl', $actividad_tipo)
                                ->where('motivo_llamada', $motivo_llamada)
                                ->first();
        $registro_tabla_18 = reparacionesHfc_Realizado::where(function($query) use ($NumeroOrden) {
                                $query->where('OrdenHfc', $NumeroOrden);
                            })
                                ->where('id', $id)
                                ->where('tecnologia', $tecnologia)
                                ->where('TipoActividadReparacionHfc', $actividad_tipo)
                                ->where('motivo_llamada', $motivo_llamada)
                                ->first();
        $registro_tabla_19 = reparacionesHfc_Objetado::where(function($query) use ($NumeroOrden) {
                                $query->where('OrdenObjHfc', $NumeroOrden);
                            })
                                ->where('id', $id)
                                ->where('tecnologia', $tecnologia)
                                ->where('TipoActividadReparacionHfc', $actividad_tipo)
                                ->where('motivo_llamada', $motivo_llamada)
                                ->first();
        $registro_tabla_20 = reparacionesHfc_Transferido::where(function($query) use ($NumeroOrden) {
                                $query->where('OrdenTransfHfc', $NumeroOrden);
                            })
                                ->where('id', $id)
                                ->where('tecnologia', $tecnologia)
                                ->where('TipoActividadReparacionHfc', $actividad_tipo)
                                ->where('motivo_llamada', $motivo_llamada)
                                ->first();
        $registro_tabla_21 = repacionesGpon_Realizado::where(function($query) use ($NumeroOrden) {
                                    $query->where('OrdenRealizadoGpon', $NumeroOrden);
                                })
                                    ->where('id', $id)
                                    ->where('tecnologia', $tecnologia)
                                    ->where('TipoActividadReparacionGpon', $actividad_tipo)
                                    ->where('motivo_llamada', $motivo_llamada)
                                    ->first();
        $registro_tabla_22 = reparacionesGpon_Objetado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenObjGpon', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionGpon', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_23 = reparacionesGpon_Transferido::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenTransGpon', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionGpon', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_24 = repacionesDth_Realizado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenDthRealizada', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionDth', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_25 = repacionesDth_Objetado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenObjDth', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionDth', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_26 = repacionesDth_Transferido::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenTransferidoDth', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionDth', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_27 = repacionesCobre_Realizado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenReparacionCobre', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionCobre', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_28 = repacionesCobre_Objetado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenObjReparacionCobre', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionCobre', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_29 = repacionesCobre_Transferido::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenTransfCobre', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionCobre', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_30 = repacionesAdsl_Realizado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenAdslRealizado', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionAdsl', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_31 = repacionesAdsl_Objetado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenObjAdsl', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionAdsl', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_32 = repacionesAdsl_Transferido::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenTransferidoAdsl', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReparacionAdsl', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_33 = PostventaCambioNumeroCobreRealizada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenCambioCobre', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioNumeroCobre', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_34 = PostventaCambioNumeroCobreObjetada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenObjCambioCobre', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioNumeroCobre', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_35 = PostventaCambioNumeroCobreAnulada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenAnuladaCambioCobre', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioNumeroCobre', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_36 = PostventaRetiroDthRealizada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenRetiroDth', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReconexionDth', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_37 = PostventaRetiroDthAnulada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenRetiroAnulacionDth', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReconexionDth', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_38 = PostventaRetiroHfcRealizada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenRetiroHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReconexionHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_39 = PostventaRetiroHfcAnulada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenRetiroAnulacionHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadReconexionHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_40 = PostventaMigracionRealizada::where(function($query) use ($NumeroOrden) {
                                            $query->where('NOrdenMigracionHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadMigracionHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_41 = PostventaMigracionObjetada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenMigracionHfcObj', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadMigracionHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_42 = PostventaMigracionAnulada::where(function($query) use ($NumeroOrden) {
                                            $query->where('NOrdenMigracionAnuladaHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadMigracionHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_43 = PostventaMigracionTransferida::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenMigracionTranfHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadMigracionHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_44 = PostventaCambioEquipoDthAnulada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenEquipoAnulada_Dth', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioDth', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_45 = PostventaCambioEquipoDthObjetado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenEquipoObjDth', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioDth', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_46 = PostventaCambioEquipoDthRealizada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenEquipoDth', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioDth', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();

        $registro_tabla_47 = PostventaCambioEquipoAdslRealizado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenEquipoAdsl', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioAdsl', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_48 = PostventaCambioEquipoAdslObjetado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenEquipoObjAdsl', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioAdsl', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_49 = PostventaCambioEquipoAdslAnulada::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenAnuladaEquipoAdsl', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioAdsl', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_50 = PostventaCambioEquipoGpon_Realizado::where(function($query) use ($NumeroOrden) {
                                            $query->where('NOrdenEquipoGpon', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioGpon', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_51 = PostventaCambioEquipoGpon_Objetado::where(function($query) use ($NumeroOrden) {
                                            $query->where('NOrdenObjEquipoGpon', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioGpon', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_52 = PostventaCambioEquipoGpon_Anulado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenEquipoAnuladaGpon', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioGpon', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_53 = PostventaCambioEquipoHfc_Realizado::where(function($query) use ($NumeroOrden) {
                                            $query->where('NOrdenEquipoHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_54 = PostventaCambioEquipoHfc_Objetado::where(function($query) use ($NumeroOrden) {
                                            $query->where('NordenObjEquipoHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_55 = PostventaCambioEquipoHfc_Anulado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenAnuladaEquipoHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadCambioHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_56 = PostventaAdicionHfc_Realizado::where(function($query) use ($NumeroOrden) {
                                            $query->where('NOrdenAdicionHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadAdicionHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_57 = PostventaAdicionHfc_Objetado::where(function($query) use ($NumeroOrden) {
                                            $query->where('OrdenAdicionObjHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadAdicionHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_58 = PostventaAdicionHfc_Anulada::where(function($query) use ($NumeroOrden) {
                                            $query->where('NOrdenAdicionAnuladaHfc', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadAdicionHfc', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_59 = PostventaAdicionGpon_Realizado::where(function($query) use ($NumeroOrden) {
                                            $query->where('NOrdenAdicionGpon', $NumeroOrden);
                                        })
                                            ->where('id', $id)
                                            ->where('tecnologia', $tecnologia)
                                            ->where('TipoActividadAdicionGpon', $actividad_tipo)
                                            ->where('motivo_llamada', $motivo_llamada)
                                            ->first();
        $registro_tabla_60 = PostventaAdicionGpon_Objetado::where(function($query) use ($NumeroOrden) {
                                                $query->where('NOrdenAdicionObjGpon', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadAdicionGpon', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_61 = PostventaAdicionGpon_Anulada::where(function($query) use ($NumeroOrden) {
                                                $query->where('NOrdenAdicionAnuladaGpon', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadAdicionGpon', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_62 = PostventaAdicionDth_Realizado::where(function($query) use ($NumeroOrden) {
                                                $query->where('NOrdenAdicionDth', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadAdicionDth', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_63 = PostventaAdicionDth_Objetado::where(function($query) use ($NumeroOrden) {
                                                $query->where('NOrdenAdicionObjDth', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadAdicionDth', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_64 = PostventaAdicionDth_Anulado::where(function($query) use ($NumeroOrden) {
                                                $query->where('OrdenAdicionAnulada_Dth', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadAdicionDth', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_65 = PostventaTrasladoHfc_Realizado::where(function($query) use ($NumeroOrden) {
            $query->where('OrdenTvTrasladoHfc', $NumeroOrden)
            ->orWhere('OrdenInternetTrasladoHfc', $NumeroOrden)
            ->orWhere('OrdenLineaTrasladoHfc', $NumeroOrden);
                    })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('TipoActividadTrasladoHfc', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_66 = PostventaTrasladoHfc_Objetado::where(function($query) use ($NumeroOrden) {
            $query->where('OrdenTvObjetadoTrasladoHfc', $NumeroOrden)
            ->orWhere('OrdenIntObjTrasladoHfc', $NumeroOrden)
            ->orWhere('OrdenLineaObjetadoTrasladoHfc', $NumeroOrden);
                    })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('TipoActividadTrasladoHfc', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();

        $registro_tabla_67 = PostventaTrasladoHfc_Anulado::where(function($query) use ($NumeroOrden) {
            $query->where('OrdenTvAnulTraslHfc', $NumeroOrden)
            ->orWhere('OrdenInterAnulTraslHfc', $NumeroOrden)
            ->orWhere('OrdenLineaAnulTraslHfc', $NumeroOrden);
                    })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('TipoActividadTrasladoHfc', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_68 = PostventaTrasladoHfc_Transferido::where(function($query) use ($NumeroOrden) {
            $query->where('OrdenTvTransferidoHfc', $NumeroOrden)
            ->orWhere('OrdenInternetTransferidoHfc', $NumeroOrden)
            ->orWhere('OrdenLineaTransferidoHfc', $NumeroOrden);
                    })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('TipoActividadTrasladoHfc', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_69 = PostventaTrasladoGpon_Realizado::where(function($query) use ($NumeroOrden) {
            $query->where('OrdenTvTrasladoGpon', $NumeroOrden)
            ->orWhere('OrdenInternetTrasladoGpon', $NumeroOrden)
            ->orWhere('OrdenLineaTrasladoGpon', $NumeroOrden);
                    })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('TipoActividadTrasladoGpon', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_70 = PostventaTrasladoGpon_Objetado::where(function($query) use ($NumeroOrden) {
            $query->where('OrdenTvTrasladoObjGpon', $NumeroOrden)
            ->orWhere('OrdenInterObjTraslGpon', $NumeroOrden)
            ->orWhere('OrdenLineaTraslObjGpon', $NumeroOrden);
                    })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('TipoActividadTrasladoGpon', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_71 = PostventaTrasladoGpon_Anulado::where(function($query) use ($NumeroOrden) {
            $query->where('OrdenTvTraslAnuladoGpon', $NumeroOrden)
            ->orWhere('OrdenIntTrasladoAnulGpon', $NumeroOrden)
            ->orWhere('OrdenLineaTraslAnulGpon', $NumeroOrden);
                    })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('TipoActividadTrasladoGpon', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_72 = PostventaTrasladoGpon_Transferido::where(function($query) use ($NumeroOrden) {
            $query->where('OrdenTvTrasladoTransGpon', $NumeroOrden)
            ->orWhere('OrdenIntTransladoGpon', $NumeroOrden)
            ->orWhere('OrdenLineaTrasladoTransGpon', $NumeroOrden);
                    })
                    ->where('id', $id)
                    ->where('tecnologia', $tecnologia)
                    ->where('TipoActividadTrasladoGpon', $actividad_tipo)
                    ->where('motivo_llamada', $motivo_llamada)
                    ->first();
        $registro_tabla_73 = PostventaTrasladoAdsl_Realizado::where(function($query) use ($NumeroOrden) {
                                                $query->where('NOrdenTrasladosAdsl', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadTrasladoAdsl', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_74 = PostventaTrasladoAdsl_Objetado::where(function($query) use ($NumeroOrden) {
                                                $query->where('OrdenObjTrasladoAdsl', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadTrasladoAdsl', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_75 = PostventaTrasladoAdsl_Anulada::where(function($query) use ($NumeroOrden) {
                                                $query->where('NOrdenTrasladosAnulAdsl', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadTrasladoAdsl', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_76 = PostventaTrasladoCobre_Realizado::where(function($query) use ($NumeroOrden) {
                                                $query->where('OrdenTrasladoCobre', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadTrasladoCobre', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_77 = PostventaTrasladoCobre_Objetado::where(function($query) use ($NumeroOrden) {
                                                $query->where('OrdenTrasladoObjCobres', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadTrasladoCobre', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_78 = PostventaTrasladoCobre_Anulada::where(function($query) use ($NumeroOrden) {
                                                $query->where('OrdenTrasladosCobre', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadTrasladoCobre', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_79 = PostventaTrasladoDth_Realizado::where(function($query) use ($NumeroOrden) {
                                                $query->where('OrdenTrasladoDth', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadTrasladoDth', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_80 = PostventaTrasladoDth_Objetado::where(function($query) use ($NumeroOrden) {
                                                $query->where('OrdenTrasladoObjDth', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadTrasladoDth', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
        $registro_tabla_81 = PostventaTrasladoDthAnulada::where(function($query) use ($NumeroOrden) {
                                                $query->where('OrdenTrasladosDth', $NumeroOrden);
                                            })
                                                ->where('id', $id)
                                                ->where('tecnologia', $tecnologia)
                                                ->where('TipoActividadTrasladoDth', $actividad_tipo)
                                                ->where('motivo_llamada', $motivo_llamada)
                                                ->first();
            // Validar en qué tabla se encontró el registro
            if ($registro_tabla_1) {
                // Si el registro está en la tabla_1, redirigir a la vista de edición de tabla_1

                // dd($registro_tabla_1);
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')	
                ->with('registro', $registro_tabla_1);
            } elseif ($registro_tabla_2) {
                // Si el registro está en la tabla_2, redirigir a la vista de edición de tabla_2
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_2);
            } elseif ($registro_tabla_3) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_3);
            }elseif ($registro_tabla_4) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_4);
            }elseif ($registro_tabla_5) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_5);
            }elseif ($registro_tabla_6) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_6);
            }elseif ($registro_tabla_7) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_7);
            }elseif ($registro_tabla_8) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_8);
            }elseif ($registro_tabla_9) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_9);
            }elseif ($registro_tabla_10) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_10);
            }elseif ($registro_tabla_11) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_11);
            }elseif ($registro_tabla_12) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_12);
            }elseif ($registro_tabla_13) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_13);
            }elseif ($registro_tabla_14) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_14);
            }elseif ($registro_tabla_15) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_15);
            }elseif ($registro_tabla_16) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_16);
            }elseif ($registro_tabla_17) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/instalaciones')
                ->with('page_title', 'Actualizar - Instalaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_17);
            }elseif ($registro_tabla_18) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_18);
            }elseif ($registro_tabla_19) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_19);
            }elseif ($registro_tabla_20) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_20);
            }elseif ($registro_tabla_21) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_21);
            }elseif ($registro_tabla_22) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_22);
            }elseif ($registro_tabla_23) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_23);
            }elseif ($registro_tabla_24) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_24);
            }elseif ($registro_tabla_25) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_25);
            }elseif ($registro_tabla_26) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_26);
            }elseif ($registro_tabla_27) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_27);
            }elseif ($registro_tabla_28) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_28);
            }elseif ($registro_tabla_29) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_29);
            }elseif ($registro_tabla_30) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_30);
            }elseif ($registro_tabla_31) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_31);
            }elseif ($registro_tabla_32) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/reparaciones')
                ->with('page_title', 'Actualizar - Reparaciones')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_32);
            }elseif ($registro_tabla_33) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_33);
            }elseif ($registro_tabla_34) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_34);
            }elseif ($registro_tabla_35) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_35);
            }elseif ($registro_tabla_36) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_36);
            }elseif ($registro_tabla_37) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_37);
            }elseif ($registro_tabla_38) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_38);
            }elseif ($registro_tabla_39) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_39);
            }elseif ($registro_tabla_40) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_40);
            }elseif ($registro_tabla_41) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_41);
            }elseif ($registro_tabla_42) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_42);
            }elseif ($registro_tabla_43) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_43);
            }elseif ($registro_tabla_44) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_44);
            }elseif ($registro_tabla_45) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_45);
            }elseif ($registro_tabla_46) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_46);
            }elseif ($registro_tabla_47) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_47);
            }elseif ($registro_tabla_48) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_48);
            }elseif ($registro_tabla_49) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_49);
            }elseif ($registro_tabla_50) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_50);
            }elseif ($registro_tabla_51) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_51);
            }elseif ($registro_tabla_52) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_52);
            }elseif ($registro_tabla_53) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_53);
            }elseif ($registro_tabla_54) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_54);
            }elseif ($registro_tabla_55) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_55);
            }elseif ($registro_tabla_56) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_56);
            }elseif ($registro_tabla_57) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_57);
            }elseif ($registro_tabla_58) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_58);
            }elseif ($registro_tabla_59) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_59);
            }elseif ($registro_tabla_60) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_60);
            }elseif ($registro_tabla_61) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_61);
            }elseif ($registro_tabla_62) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_62);
            }elseif ($registro_tabla_63) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_63);
            }elseif ($registro_tabla_64) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_64);
            }elseif ($registro_tabla_65) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_65);
            }elseif ($registro_tabla_66) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_66);
            }elseif ($registro_tabla_67) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_67);
            }elseif ($registro_tabla_68) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_68);
            }elseif ($registro_tabla_69) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_69);
            }elseif ($registro_tabla_70) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_70);
            }elseif ($registro_tabla_71) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_71);
            }elseif ($registro_tabla_72) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_72);
            }elseif ($registro_tabla_73) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_73);
            }elseif ($registro_tabla_74) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_74);
            }elseif ($registro_tabla_75) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_75);
            }elseif ($registro_tabla_76) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_76);
            }elseif ($registro_tabla_77) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_77);
            }elseif ($registro_tabla_78) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_78);
            }elseif ($registro_tabla_79) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_79);
            }elseif ($registro_tabla_80) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_80);
            }elseif ($registro_tabla_81) {
                // Si el registro está en la tabla_3, redirigir a la vista de edición de tabla_3
                return view('llamadashome/editar/postventa')
                ->with('page_title', 'Actualizar - Postventa')
                ->with('navigation', 'Actualizar')
                ->with('registro', $registro_tabla_81);
            }
               else {
                // Si no se encontró el registro en ninguna de las tablas, redirigir a la vista de resultados

                $message = "¡ERROR!";
                $messages = "No se encontro el registro";
                $resultados = [];
                $NumeroOrden = null;
        
                return redirect()->route('busqueda.generar', [
                'resultados' => $resultados,
                'NumeroOrden' => $NumeroOrden,
                                    ])
                    ->with('success', false)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
            }
    
    }
    
    
    public function actualizar(Request $request, $id)
    {
        $tecnologia = $request->input("tecnologia");
        $tipo_actividad = $request->input("tipo_actividad");
        $tipo_actividadGpon = $request->input("tipo_actividadGpon");
        $tipo_actividadDth = $request->input("tipo_actividadDth");
        $tipo_actividadCobre = $request->input("tipo_actividadCobre");
        $tipo_actividadAdsl = $request->input("tipo_actividadAdsl");

        switch($tecnologia){
            case"HFC":

                if($tipo_actividad === "REALIZADA"){
                    // Campos seleccionados del formulario
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'tipo_actividad',
                        'orden_tv_hfc',
                        'orden_internet_hfc',
                        'orden_linea_hfc',
                        'equipostv1',
                        'equipostv2',
                        'equipostv3',
                        'equipostv4',
                        'equipostv5',
                        'syrengHfc',
                        'sapHfc',
                        'EquipoModem_Hfc',
                        'numeroVoip_hfc',
                        'GeorefHfc',
                        'TrabajadoHfc',
                        'ObservacionesHfc',
                        'RecibeHfc',
                        'NodoHfc',
                        'TapHfc',
                        'PosicionHfc',
                        'MaterialesHfc'
                    ];

                    $registro = InstalacionHfcRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoHfc' && $request->has('TrabajadoHfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoHfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividad === "OBJETADA"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividad',
						'orden_tv_hfc',
						'orden_internet_hfc',
						'orden_linea_hfc',
						'MotivoObjetada_Hfc',
						'TrabajadoObjetadaHfc',
						'ComentariosObjetados_Hfc',
						'username_creacion',
						'username_atencion',
					];
                    
                    $registro = InstalacionHfcObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoObjetadaHfc' && $request->has('TrabajadoObjetadaHfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoObjetadaHfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividad === "ANULACION"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividad',
						'MotivoAnulada_Hfc',
						'orden_internet_hfc',
						'orden_tv_hfc',
						'orden_linea_hfc',
						'TrabajadoAnulada_Hfc',
						'ComentarioAnulada_Hfc',
						'username_creacion',
						'username_atencion',

					];
                    $registro = InstalacionHfcAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Hfc' && $request->has('TrabajadoAnulada_Hfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Hfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividad === "TRANSFERIDA"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividad',
						'orden_tv_hfc',
						'orden_internet_hfc',
						'orden_linea_hfc',
						'TrabajadoTransferido_Hfc',
						'MotivoTransferidoHfc',
						'ComentariosTransferida_Hfc',
						'username_creacion',
						'username_atencion',

					];
                    $registro = InstalacionHfcTransferida::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoTransferido_Hfc' && $request->has('TrabajadoTransferido_Hfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoTransferido_Hfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC TRANSFERIDO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                } 
             break;
            case"GPON":

                if($tipo_actividadGpon === "REALIZADA"){
                    // Campos seleccionados del formulario
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'select_orden',
                        'dpto_colonia',
                        'OrdenInternet_Gpon',
                        'OrdenTv_Gpon',
                        'OrdenLinea_Gpon',
                        'tecnologia',
                        'tipo_actividadGpon',
                        'equipotv1Gpon',
                        'equipotv2Gpon',
                        'equipostv3Gpon',
                        'equipostv4Gpon',
                        'equipostv5Gpon',
                        'EqModenGpon',
                        'GeoreferenciaGpon',
                        'SapGpon',
                        'NumeroGpon',
                        'TrabajadoGpon',
                        'ObservacionesGpon',
                        'RecibeGpon',
                        'NodoGpon',
                        'CajaGpon',
                        'PuertoGpon',
                        'MaterialesRedGpon',
                        'username_creacion',
                        'username_atencion',
                    ];

                    $registro = InstalacionGponRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoGpon' && $request->has('TrabajadoGpon')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoGpon') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO GPON ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividadGpon === "OBJETADA"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadGpon',
						'OrdenInternet_Gpon',
						'OrdenTv_Gpon',
						'OrdenLinea_Gpon',
						'MotivoObjetado_Gpon',
						'TrabajadoGpon_Objetado',
						'ComentariosGpon_Objetada',
						'username_creacion',
						'username_atencion',
					];
                    
                    $registro = InstalacionGponObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoGpon_Objetado' && $request->has('TrabajadoGpon_Objetado')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoGpon_Objetado') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();


                    $message = "¡EXITO!";
                    $messages = "REGISTRO GPON OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadGpon === "ANULACION"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadGpon',
						'MotivoAnulada_Gpon',
						'OrdenInternet_Gpon',
						'OrdenTv_Gpon',
						'OrdenLinea_Gpon',
						'TrabajadoAnulada_Gpon',
						'ComentarioAnulada_Gpon',
						'username_creacion',
						'username_atencion',

					];
                    $registro = InstalacionGponAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Gpon' && $request->has('TrabajadoAnulada_Gpon')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Gpon') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO GPON ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadGpon === "TRANSFERIDA"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadGpon',
						'OrdenInternet_Gpon',
						'OrdenTv_Gpon',
						'OrdenLinea_Gpon',
						'MotivoTransferidoGpon',
						'TrabajadoTransferido_Gpon',
						'ComentarioTransferido_Gpon',
						'username_creacion',
						'username_atencion',

					];
                    $registro = InstalacionGponTransferida::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoTransferido_Gpon' && $request->has('TrabajadoTransferido_Gpon')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoTransferido_Gpon') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO GPON TRANSFERIDO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                } 
             break;
            case"DTH":

                if($tipo_actividadDth === "REALIZADA"){
                    // Campos seleccionados del formulario
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'tipo_actividadDth',
                        'ordenTv_Dth',
                        'SyrengDth',
                        'GeoreferenciaDth',
                        'sap_dth',
                        'TrabajadoDth',
                        'SmarcardDth1',
                        'SmarcardDth2',
                        'SmarcardDth3',
                        'SmarcardDth4',
                        'SmarcardDth5',
                        'StbDth1',
                        'StbDth2',
                        'StbDth3',
                        'StbDth4',
                        'StbDth5',
                        'ObservacionesDth',
                        'RecibeDth',
                        'MaterialesDth',
                        'username_creacion',
                        'username_atencion',
                    ];

                    $registro = InstalacionDthRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoDth' && $request->has('TrabajadoDth')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoDth') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO DTH ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividadDth === "OBJETADA"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadDth',
						'MotivoObjetada_Dth',
						'TrabajadoObj_Dth',
						'OrdenObj_Dth',
						'ComentarioObjetado_Dth',
						'username_creacion',
						'username_atencion',
					];
                    
                    $registro = InstalacionDthObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoObj_Dth' && $request->has('TrabajadoObj_Dth')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoObj_Dth') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();


                    $message = "¡EXITO!";
                    $messages = "REGISTRO DTH OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadDth === "ANULACION"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadDth',
						'MotivoAnulada_Dth',
						'OrdenAnulada_Dth',
						'TrabajadoAnulada_Dth',
						'ComentarioAnulada_Dth',
						'username_creacion',
						'username_atencion',
					];
                    $registro = InstalacionDthAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Dth' && $request->has('TrabajadoAnulada_Dth')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Dth') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO DTH ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }
             break;
            case"COBRE":

                if($tipo_actividadCobre === "REALIZADA"){
                    // Campos seleccionados del formulario
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'tipo_actividadCobre',
                        'OrdenLineaCobre',
                        'NumeroCobre',
                        'GeoreferenciaCobre',
                        'sap_cobre',
                        'TrabajadoCobre',
                        'ObservacionesCobre',
                        'RecibeCobre',
                        'MaterialesCobre',
                        'username_creacion',
                        'username_atencion',
                    ];
    
                    $registro = InstalacionCobreRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoCobre' && $request->has('TrabajadoCobre')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoCobre') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO COBRE ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividadCobre === "OBJETADA"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadCobre',
						'MotivoObjetada_Cobre',
						'OrdenCobre_Objetada',
						'TrabajadoCobre_Objetado',
						'ComentariosCobre_Objetados',
						'username_creacion',
						'username_atencion',
					];
                    
                    $registro = InstalacionCobreObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoCobre_Objetado' && $request->has('TrabajadoCobre_Objetado')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoCobre_Objetado') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();


                    $message = "¡EXITO!";
                    $messages = "REGISTRO COBRE OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadCobre === "ANULACION"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadCobre',
						'MotivoAnulada_Cobre',
						'OrdenAnuladaCobre',
						'TrabajadoAnulada_Cobre',
						'ComentarioAnulada_Cobre',
						'username_creacion',
						'username_atencion',
					];
                    $registro = InstalacionCobreAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Cobre' && $request->has('TrabajadoAnulada_Cobre')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Cobre') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO COBRE ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }
             break;

            case"ADSL":

                if($tipo_actividadAdsl === "REALIZADA"){
                    // Campos seleccionados del formulario
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'tipo_actividadAdsl',
                        'orden_internet_adsl',
                        'Georeferencia_Adsl',
                        'TrabajadoAdsl',
                        'Obvservaciones_Adsl',
                        'Recibe_Adsl',
                        'Materiales_Adsl',
                        'username_creacion',
                        'username_atencion',
                    ];
    
                    $registro = InstalacionAdslRealizada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAdsl' && $request->has('TrabajadoAdsl')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAdsl') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO ADSL ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                    } 
                if($tipo_actividadAdsl === "OBJETADA"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadAdsl',
						'MotivoObjetada_Adsl',
						'OrdenAdsl_Objetada',
						'TrabajadoAdslObjetado',
						'ComentariosObjetada_Adsl',
						'username_creacion',
						'username_atencion',
					];
                    
                    $registro = InstalacionAdslObjetada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAdslObjetado' && $request->has('TrabajadoAdslObjetado')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAdslObjetado') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();


                    $message = "¡EXITO!";
                    $messages = "REGISTRO COBRE OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }if($tipo_actividadAdsl === "ANULACION"){

                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'tipo_actividadAdsl',
						'MotivoAnulada_Adsl',
						'OrdenAnuladaAdsl',
						'TrabajadoAnulada_Adsl',
						'ComentarioAnulada_Adsl',
						'username_creacion',
						'username_atencion',
					];

                    $registro = InstalacionAdslAnulada::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoAnulada_Adsl' && $request->has('TrabajadoAnulada_Adsl')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoAnulada_Adsl') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO ADSL ANULADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
                }
             break;
            default:
            break;
            } 
                
           
        
    }


    public function actualizarReparaciones(Request $request, $id){

        $tecnologia = $request->input("tecnologia");
        $TipoActividadReparacionHfc = $request->input("TipoActividadReparacionHfc");
        $TipoActividadReparacionGpon = $request->input("TipoActividadReparacionGpon");
        $TipoActividadReparacionDth = $request->input("TipoActividadReparacionDth");
        $TipoActividadReparacionCobre = $request->input("TipoActividadReparacionCobre");
        $TipoActividadReparacionAdsl = $request->input("TipoActividadReparacionAdsl");

        switch($tecnologia){
            case"HFC":

                if($TipoActividadReparacionHfc === "REALIZADA"){

                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionHfc',
                        'CodigoCausaHfc',
                        'DescripcionCausaDañoHfc',
                        'DescripcionTipoDañoHfc',
                        'DescripcionUbicacionHfc',
                        'OrdenHfc',
                        'syrengHfc',
                        'ObservacionesHfc',
                        'RecibeHfc',
                        'TrabajadoHfcRealizado',
                        'username_creacion',
                        'username_atencion',
                    ];

                    $registro = reparacionesHfc_Realizado::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoHfcRealizado' && $request->has('TrabajadoHfcRealizado')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoHfcRealizado') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
            
                    
                }if($TipoActividadReparacionHfc === "OBJETADA"){

                    $selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionHfc',
                        'MotivoObjetada_Hfc',
                        'OrdenObjHfc',
                        'TrabajadoReparacionesObjetadaHfc',
                        'ComentariosObjetados_Hfc',
                        'username_creacion',
                        'username_atencion',
					];

                    $registro = reparacionesHfc_Objetado::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoReparacionesObjetadaHfc' && $request->has('TrabajadoReparacionesObjetadaHfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoReparacionesObjetadaHfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC OBJETADO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
            
                    
                }if($TipoActividadReparacionHfc === "TRANSFERIDA"){

                    $selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionHfc',
                        'OrdenTransfHfc',
                        'ObvsTransfHfc',
                        'ComentarioTransfHfc',
                        'TrabajadoTransfHfc',
                        'username_creacion',
                        'username_atencion',
					];
                    $registro = reparacionesHfc_Transferido::findOrFail($id);

                    // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                        $value = $request->input($fieldName);
                        if ($fieldName === 'TrabajadoTransfHfc' && $request->has('TrabajadoTransfHfc')) {
                            $registro->$fieldName = 'TRABAJADO';
                        } elseif ($fieldName === 'TrabajadoTransfHfc') {
                            $registro->$fieldName = 'PENDIENTE';
                        } else {
                            $registro->$fieldName = $value;
                        }
                    }
                    
                    // Agregamos el usuario actual como creador y atendedor del registro
                    $registro->username_creacion = Auth::user()->username;
                    $registro->username_atencion = Auth::user()->username;
                    $registro->save();

                    $message = "¡EXITO!";
                    $messages = "REGISTRO HFC TRANSFERIDO ACTUALIZADO";
                    $resultados = [];
                    $NumeroOrden = null;

                    return redirect()->route('busqueda.generar', [
                    'resultados' => $resultados,
                    'NumeroOrden' => $NumeroOrden,
                            ])
                    ->with('success', true)
                    ->with('message', $message)
                    ->with('messages', $messages)
                    ->withDelay(2);
            
                    
                }
                break;
            case"GPON":

                if($TipoActividadReparacionGpon === "REALIZADA"){
    
                        $selectedFields = [
                            'codigo_tecnico',
                            'telefono',
                            'tecnico',
                            'motivo_llamada',
                            'tecnologia',
                            'select_orden',
                            'dpto_colonia',
                            'TipoActividadReparacionGpon',
                            'CodigoCausaGpon',
                            'DescripcionCausaDañoGpon',
                            'DescripcionTipoDañoGpon',
                            'DescripcionUbicacionGpon',
                            'OrdenRealizadoGpon',
                            'syrengGpon',
                            'ObservacionesGpon',
                            'RecibeGpon',
                            'TrabajadoReparacionesGpon',
                            'username_creacion',
                            'username_atencion',
                        ];
    
                        $registro = repacionesGpon_Realizado::findOrFail($id);
    
                        // Iteramos por los campos seleccionados del formulario
                        foreach ($selectedFields as $fieldName) {
                            $value = $request->input($fieldName);
                            if ($fieldName === 'TrabajadoReparacionesGpon' && $request->has('TrabajadoReparacionesGpon')) {
                                $registro->$fieldName = 'TRABAJADO';
                            } elseif ($fieldName === 'TrabajadoReparacionesGpon') {
                                $registro->$fieldName = 'PENDIENTE';
                            } else {
                                $registro->$fieldName = $value;
                            }
                        }
                        
                        // Agregamos el usuario actual como creador y atendedor del registro
                        $registro->username_creacion = Auth::user()->username;
                        $registro->username_atencion = Auth::user()->username;
                        $registro->save();
    
                        $message = "¡EXITO!";
                        $messages = "REGISTRO GPON ACTUALIZADO";
                        $resultados = [];
                        $NumeroOrden = null;
    
                        return redirect()->route('busqueda.generar', [
                        'resultados' => $resultados,
                        'NumeroOrden' => $NumeroOrden,
                                ])
                        ->with('success', true)
                        ->with('message', $message)
                        ->with('messages', $messages)
                        ->withDelay(2);
                
                        
                }if($TipoActividadReparacionGpon === "OBJETADA"){
    
                        $selectedFields = [
                            'codigo_tecnico',
                            'telefono',
                            'tecnico',
                            'motivo_llamada',
                            'tecnologia',
                            'select_orden',
                            'dpto_colonia',
                            'TipoActividadReparacionGpon',
                            'MotivoObjetada_Gpon',
                            'OrdenObjGpon',
                            'TrabajadoObjetadaGpon',
                            'ComentariosObjGpon',
                            'username_creacion',
                            'username_atencion',
                        ];
    
                        $registro = reparacionesGpon_Objetado::findOrFail($id);
    
                        // Iteramos por los campos seleccionados del formulario
                        foreach ($selectedFields as $fieldName) {
                            $value = $request->input($fieldName);
                            if ($fieldName === 'TrabajadoObjetadaGpon' && $request->has('TrabajadoObjetadaGpon')) {
                                $registro->$fieldName = 'TRABAJADO';
                            } elseif ($fieldName === 'TrabajadoObjetadaGpon') {
                                $registro->$fieldName = 'PENDIENTE';
                            } else {
                                $registro->$fieldName = $value;
                            }
                        }
                        
                        // Agregamos el usuario actual como creador y atendedor del registro
                        $registro->username_creacion = Auth::user()->username;
                        $registro->username_atencion = Auth::user()->username;
                        $registro->save();
    
                        $message = "¡EXITO!";
                        $messages = "REGISTRO GPON OBJETADO ACTUALIZADO";
                        $resultados = [];
                        $NumeroOrden = null;
    
                        return redirect()->route('busqueda.generar', [
                        'resultados' => $resultados,
                        'NumeroOrden' => $NumeroOrden,
                                ])
                        ->with('success', true)
                        ->with('message', $message)
                        ->with('messages', $messages)
                        ->withDelay(2);
                
                        
                }if($TipoActividadReparacionGpon === "TRANSFERIDA"){
    
                        $selectedFields = [
                            'codigo_tecnico',
                            'telefono',
                            'tecnico',
                            'motivo_llamada',
                            'tecnologia',
                            'select_orden',
                            'dpto_colonia',
                            'TipoActividadReparacionGpon',
                            'OrdenTransGpon',
                            'ObvsTransfGpon',
                            'ComentarioTransfGpon',
                            'TrabajadoTransfGpon',
                            'username_creacion',
                            'username_atencion',
                        ];
                        $registro = reparacionesGpon_Transferido::findOrFail($id);
    
                        // Iteramos por los campos seleccionados del formulario
                        foreach ($selectedFields as $fieldName) {
                            $value = $request->input($fieldName);
                            if ($fieldName === 'TrabajadoTransfGpon' && $request->has('TrabajadoTransfGpon')) {
                                $registro->$fieldName = 'TRABAJADO';
                            } elseif ($fieldName === 'TrabajadoTransfGpon') {
                                $registro->$fieldName = 'PENDIENTE';
                            } else {
                                $registro->$fieldName = $value;
                            }
                        }
                        
                        // Agregamos el usuario actual como creador y atendedor del registro
                        $registro->username_creacion = Auth::user()->username;
                        $registro->username_atencion = Auth::user()->username;
                        $registro->save();
    
                        $message = "¡EXITO!";
                        $messages = "REGISTRO GPON TRANSFERIDO ACTUALIZADO";
                        $resultados = [];
                        $NumeroOrden = null;
    
                        return redirect()->route('busqueda.generar', [
                        'resultados' => $resultados,
                        'NumeroOrden' => $NumeroOrden,
                                ])
                        ->with('success', true)
                        ->with('message', $message)
                        ->with('messages', $messages)
                        ->withDelay(2);
                
                        
                    }
                break;

             case"DTH":

                if($TipoActividadReparacionDth === "REALIZADA"){
    
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionDth',
                        'CodigoCausaDth',
                        'DescripcionCausaDth',
                        'DescripcionTipoDañoDth',
                        'DescripcionUbicacionDañoDth',
                        'OrdenDthRealizada',
                        'syrengDthRealizado',
                        'ObservacionesDth',
                        'RecibeDth',
                        'TrabajadoDth',
                        'username_creacion',
                        'username_atencion',
                    ];
    
                        $registro = repacionesDth_Realizado::findOrFail($id);
    
                        // Iteramos por los campos seleccionados del formulario
                        foreach ($selectedFields as $fieldName) {
                            $value = $request->input($fieldName);
                            if ($fieldName === 'TrabajadoDth' && $request->has('TrabajadoDth')) {
                                $registro->$fieldName = 'TRABAJADO';
                            } elseif ($fieldName === 'TrabajadoDth') {
                                $registro->$fieldName = 'PENDIENTE';
                            } else {
                                $registro->$fieldName = $value;
                            }
                        }
                        
                        // Agregamos el usuario actual como creador y atendedor del registro
                        $registro->username_creacion = Auth::user()->username;
                        $registro->username_atencion = Auth::user()->username;
                        $registro->save();
    
                        $message = "¡EXITO!";
                        $messages = "REGISTRO DTH ACTUALIZADO";
                        $resultados = [];
                        $NumeroOrden = null;
    
                        return redirect()->route('busqueda.generar', [
                        'resultados' => $resultados,
                        'NumeroOrden' => $NumeroOrden,
                                ])
                        ->with('success', true)
                        ->with('message', $message)
                        ->with('messages', $messages)
                        ->withDelay(2);
                
                        
                }if($TipoActividadReparacionDth === "OBJETADA"){
    
                    $selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionDth',
                        'MotivoObjetada_Dth',
                        'OrdenObjDth',
                        'TrabajadoObjetadaDth',
                        'ComentariosObjetadosDth',
                        'username_creacion',
                        'username_atencion',
					];
                        $registro = repacionesDth_Objetado::findOrFail($id);
    
                        // Iteramos por los campos seleccionados del formulario
                        foreach ($selectedFields as $fieldName) {
                            $value = $request->input($fieldName);
                            if ($fieldName === 'TrabajadoObjetadaDth' && $request->has('TrabajadoObjetadaDth')) {
                                $registro->$fieldName = 'TRABAJADO';
                            } elseif ($fieldName === 'TrabajadoObjetadaDth') {
                                $registro->$fieldName = 'PENDIENTE';
                            } else {
                                $registro->$fieldName = $value;
                            }
                        }
                        
                        // Agregamos el usuario actual como creador y atendedor del registro
                        $registro->username_creacion = Auth::user()->username;
                        $registro->username_atencion = Auth::user()->username;
                        $registro->save();
    
                        $message = "¡EXITO!";
                        $messages = "REGISTRO DTH OBJETADO ACTUALIZADO";
                        $resultados = [];
                        $NumeroOrden = null;
    
                        return redirect()->route('busqueda.generar', [
                        'resultados' => $resultados,
                        'NumeroOrden' => $NumeroOrden,
                                ])
                        ->with('success', true)
                        ->with('message', $message)
                        ->with('messages', $messages)
                        ->withDelay(2);
                
                        
                }if($TipoActividadReparacionDth === "TRANSFERIDA"){
    
                    $selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionDth',
                        'OrdenTransferidoDth',
                        'ObvsTransferidoDth',
                        'ComentarioTransferidoDth',
                        'TrabajadoTransferidoDth',
                        'username_creacion',
                        'username_atencion',
					];

                        $registro = repacionesDth_Transferido::findOrFail($id);
    
                        // Iteramos por los campos seleccionados del formulario
                        foreach ($selectedFields as $fieldName) {
                            $value = $request->input($fieldName);
                            if ($fieldName === 'TrabajadoTransferidoDth' && $request->has('TrabajadoTransferidoDth')) {
                                $registro->$fieldName = 'TRABAJADO';
                            } elseif ($fieldName === 'TrabajadoTransferidoDth') {
                                $registro->$fieldName = 'PENDIENTE';
                            } else {
                                $registro->$fieldName = $value;
                            }
                        }
                        
                        // Agregamos el usuario actual como creador y atendedor del registro
                        $registro->username_creacion = Auth::user()->username;
                        $registro->username_atencion = Auth::user()->username;
                        $registro->save();
    
                        $message = "¡EXITO!";
                        $messages = "REGISTRO DTH TRANSFERIDO ACTUALIZADO";
                        $resultados = [];
                        $NumeroOrden = null;
    
                        return redirect()->route('busqueda.generar', [
                        'resultados' => $resultados,
                        'NumeroOrden' => $NumeroOrden,
                                ])
                        ->with('success', true)
                        ->with('message', $message)
                        ->with('messages', $messages)
                        ->withDelay(2);
                
                        
                    }
                break;

            case"COBRE":

                if($TipoActividadReparacionCobre === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionCobre',
                        'CodigoCausaCobre',
                        'DescripcionCausaCobre',
                        'DescripcionTipoDañoCobre',
                        'DescripcionUbicacionDañoCobre',
                        'OrdenReparacionCobre',
                        'syrengReparacionCobre',
                        'ObservacionesCobre',
                        'RecibeCobre',
                        'TrabajadoReparacionCobre',
                        'username_creacion',
                        'username_atencion',
                    ];
            
        
                            $registro = repacionesCobre_Realizado::findOrFail($id);
        
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoReparacionCobre' && $request->has('TrabajadoReparacionCobre')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoReparacionCobre') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();
        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO COBRE ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }if($TipoActividadReparacionCobre === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionCobre',
                        'MotivoObjetada_Cobre',
                        'OrdenObjReparacionCobre',
                        'TrabajadoObjetadaCobre',
                        'ComentariosObjetados_Cobre',
                        'username_creacion',
                        'username_atencion',
					];
                            $registro = repacionesCobre_Objetado::findOrFail($id);
        
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoObjetadaCobre' && $request->has('TrabajadoObjetadaCobre')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoObjetadaCobre') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();
        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO COBRE OBJETADO ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }if($TipoActividadReparacionCobre === "TRANSFERIDA"){
        
                    $selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionCobre',
                        'OrdenTransfCobre',
                        'ObvsCobreTransferido',
                        'ComentarioCobreTransferido',
                        'TrabajadoCobreTransferido',
                        'username_creacion',
                        'username_atencion',
					];

    
                            $registro = repacionesCobre_Transferido::findOrFail($id);
        
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoCobreTransferido' && $request->has('TrabajadoCobreTransferido')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoCobreTransferido') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();
        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO COBRE TRANSFERIDO ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                        }
                break;
                
            case"ADSL":

                if($TipoActividadReparacionAdsl === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionAdsl',
                        'CodigoCausaAdsl',
                        'DescripcionCausaAdsl',
                        'DescripcionTipoDañoAdsl',
                        'DescripcionUbicacionDañoAdsl',
                        'OrdenAdslRealizado',
                        'syrengAdsl',
                        'ObservacionesAdsl',
                        'RecibeAdsl',
                        'TrabajadoReparacionAdsl',
                        'username_creacion',
                        'username_atencion',
                    ];
            
        
                            $registro = repacionesAdsl_Realizado::findOrFail($id);
        
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoReparacionAdsl' && $request->has('TrabajadoReparacionAdsl')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoReparacionAdsl') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();
        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO ADSL ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }if($TipoActividadReparacionAdsl === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionAdsl',
                        'MotivoObjetada_Adsl',
                        'OrdenObjAdsl',
                        'TrabajadoObjetadaAdsl',
                        'ComentsObjAdsl',
                        'username_creacion',
                        'username_atencion'
					];

                            $registro = repacionesAdsl_Objetado::findOrFail($id);
        
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoObjetadaAdsl' && $request->has('TrabajadoObjetadaAdsl')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoObjetadaAdsl') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();
        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO ADSL OBJETADO ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }if($TipoActividadReparacionAdsl === "TRANSFERIDA"){
        
                    $selectedFields = [
						'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'tecnologia',
                        'select_orden',
                        'dpto_colonia',
                        'TipoActividadReparacionAdsl',
                        'OrdenTransferidoAdsl',
                        'ObvsAdslTransferido',
                        'TrabajadoTransferidoAdsl',
                        'ComentsTransferidoAdsl',
                        'username_creacion',
                        'username_atencion',
					];

    
                            $registro = repacionesAdsl_Transferido::findOrFail($id);
        
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTransferidoAdsl' && $request->has('TrabajadoTransferidoAdsl')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTransferidoAdsl') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();
        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO ADSL TRANSFERIDO ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                        }
                break;
        }
    }


    public function actualizarPostventas(Request $request, $id){
        $tecnologia = $request->input('tecnologia');
		$Select_Postventa = $request->input("Select_Postventa");
        $TipoActividadCambioNumeroCobre = $request->input("TipoActividadCambioNumeroCobre");
        $TipoActividadReconexionDth = $request->input("TipoActividadReconexionDth");
        $TipoActividadReconexionHfc = $request->input("TipoActividadReconexionHfc");
        $TipoActividadMigracionHfc = $request->input("TipoActividadMigracionHfc");
        $TipoActividadCambioDth = $request->input("TipoActividadCambioDth");
        $TipoActividadCambioAdsl = $request->input("TipoActividadCambioAdsl");
        $TipoActividadCambioGpon = $request->input("TipoActividadCambioGpon");
        $TipoActividadCambioHfc = $request->input("TipoActividadCambioHfc");
        $TipoActividadAdicionHfc = $request->input("TipoActividadAdicionHfc");
        $TipoActividadAdicionGpon = $request->input("TipoActividadAdicionGpon");
        $TipoActividadAdicionDth = $request->input("TipoActividadAdicionDth");
        $TipoActividadTrasladoHfc = $request->input("TipoActividadTrasladoHfc");
        $TipoActividadTrasladoGpon = $request->input("TipoActividadTrasladoGpon");
        $TipoActividadTrasladoAdsl = $request->input("TipoActividadTrasladoAdsl");
        $TipoActividadTrasladoCobre = $request->input("TipoActividadTrasladoCobre");
        $TipoActividadTrasladoDth = $request->input("TipoActividadTrasladoDth");



		$key = $Select_Postventa . '|' . $tecnologia;
       
        switch($key){
            case'CAMBIO NUMERO COBRE|COBRE':
                if($TipoActividadCambioNumeroCobre === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadCambioNumeroCobre',
                        'NumeroCobreCambio',
                        'OrdenCambioCobre',
                        'TrabajadoCambioCobre',
                        'ObvsCambioCobre',
                        'RecibeCambioCobre',
                    ];
        
                            $registro = PostventaCambioNumeroCobreRealizada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoCambioCobre' && $request->has('TrabajadoCambioCobre')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoCambioCobre') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO COBRE ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioNumeroCobre === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadCambioNumeroCobre',
						'MotivoObjCambioCobre',
						'OrdenObjCambioCobre',
						'TrabajadoObjCambioCobre',
						'ObvsObjCambioCobre',
						'ComentariosCambioCobre',
					];

        
                            $registro = PostventaCambioNumeroCobreObjetada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoObjCambioCobre' && $request->has('TrabajadoObjCambioCobre')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoObjCambioCobre') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO COBRE ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioNumeroCobre === "ANULACION"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadCambioNumeroCobre',
                        'MotivoAnuladaCambioCobre',
                        'OrdenAnuladaCambioCobre',
                        'TrabajadoAnuladaCambioCobre',
                        'ComentarioAnuladaCambioCobre'
                    ];

        
                            $registro = PostventaCambioNumeroCobreAnulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAnuladaCambioCobre' && $request->has('TrabajadoAnuladaCambioCobre')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAnuladaCambioCobre') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO COBRE ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
          case'RECONEXION / RETIRO|DTH':
                if($TipoActividadReconexionDth === "REALIZADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadReconexionDth',
						'EquipoModemRetiroDth',
						'OrdenRetiroDth',
						'TrabajadoRetiroDth',
						'ObvsRetiroDth',
						'RecibeRetiroDth',
						'MaterialesRetiroDth',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaRetiroDthRealizada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoRetiroDth' && $request->has('TrabajadoRetiroDth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoRetiroDth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadReconexionDth === "ANULACION"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadReconexionDth',
                        'MotivoRetiroAnulada_Dth',
                        'OrdenRetiroAnulacionDth',
                        'TrabajadoRetiroAnulada_Dth',
                        'ComentsRetiroAnulada_Dth',
                        'username_creacion',
                        'username_atencion',
                    ];

        
                            $registro = PostventaRetiroDthAnulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoRetiroAnulada_Dth' && $request->has('TrabajadoRetiroAnulada_Dth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoRetiroAnulada_Dth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
          case'RECONEXION / RETIRO|HFC':
                if($TipoActividadReconexionHfc === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadReconexionHfc',
                        'EquipoModemRetiroHfc',
                        'OrdenRetiroHfc',
                        'TrabajadoRetiroHfc',
                        'ObvsRetiroHfc',
                        'RecibeRetiroHfc',
                        'MaterialesRetiroHfc',
                    ];
    
                            $registro = PostventaRetiroHfcRealizada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoRetiroHfc' && $request->has('TrabajadoRetiroHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoRetiroHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadReconexionHfc === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadReconexionHfc',
						'MotivoRetiroAnulada_Hfc',
						'OrdenRetiroAnulacionHfc',
						'TrabajadoRetiroAnulada_Hfc',
						'ComentsRetiroAnulada_Hfc',
						'username_creacion',
						'username_atencion',
					];

        
                            $registro = PostventaRetiroHfcAnulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoRetiroAnulada_Hfc' && $request->has('TrabajadoRetiroAnulada_Hfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoRetiroAnulada_Hfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
             case'MIGRACION|HFC':
                if($TipoActividadMigracionHfc === "REALIZADA"){
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadMigracionHfc',
                        'equipotvmigracion1',
                        'equipotvmigracion2',
                        'equipotvmigracion3',
                        'equipotvmigracion4',
                        'equipotvmigracion5',
                        'NOrdenMigracionHfc',
                        'SyrengMigracionHfc',
                        'SapMigracionHfc',
                        'ObvsMigracionHfc',
                        'TrabajadoMigracionHfc',
                        'RecibeMigracionHfc',
                        'NodoMigracionHfc',
                        'TapMigracionRealizadaHfc',
                        'PosicionMigracionHfc',
                        'GeorefMigracionHfc',
                        'MaterialesMigracionHfc',
                        'username_creacion',
                        'username_atencion',
                    ];
        
                            $registro = PostventaMigracionRealizada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoMigracionHfc' && $request->has('TrabajadoMigracionHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoMigracionHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadMigracionHfc === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadMigracionHfc',
						'MotivoMigracionObjHfc',
						'OrdenMigracionHfcObj',
						'TrabajadoMigracionObjHfc',
						'ComentsMigracionObjHfc',
						'ObvsMigracionObjHfc',
						'username_creacion',
						'username_atencion',
					];

        
                            $registro = PostventaMigracionObjetada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoMigracionObjHfc' && $request->has('TrabajadoMigracionObjHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoMigracionObjHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadMigracionHfc === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadMigracionHfc',
						'MotivoMigracionAnulada_Hfc',
						'NOrdenMigracionAnuladaHfc',
						'TrabajadoMigracionAnulada_Hfc',
						'ComentarioMigracionAnulada_Hfc',
						'username_creacion',
						'username_atencion',
					];

        
                            $registro = PostventaMigracionAnulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoMigracionAnulada_Hfc' && $request->has('TrabajadoMigracionAnulada_Hfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoMigracionAnulada_Hfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadMigracionHfc === "TRANSFERIDA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadMigracionHfc',
						'OrdenMigracionTranfHfc',
						'TrabajadoMigracionTransHfc',
						'MotivoTransMigracionHfc',
						'ComentsMigracionTransHfc',
						'username_creacion',
						'username_atencion',
					];

        
                            $registro = PostventaMigracionTransferida::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoMigracionTransHfc' && $request->has('TrabajadoMigracionTransHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoMigracionTransHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
           case'CAMBIO DE EQUIPO|DTH':
                if($TipoActividadCambioDth === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadCambioDth',
                        'InstalacionEquipoDth',
                        'DesinstalarEquipoDth',
                        'OrdenEquipoDth',
                        'ObvsEquipoDth',
                        'RecibeEquipoDth',
                        'TrabajadoEquipoDth',
                        'username_creacion',
                        'username_atencion',
    
                    ];
                            $registro = PostventaCambioEquipoDthRealizada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoDth' && $request->has('TrabajadoEquipoDth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoDth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioDth === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadCambioDth',
						'MotivoObjEquipoDth',
						'OrdenEquipoObjDth',
						'TrabajadoEquipoObjDth',
						'ObvsEquipoObjDth',
						'ComentsEquipoObjDth',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaCambioEquipoDthObjetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoObjDth' && $request->has('TrabajadoEquipoObjDth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoObjDth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioDth === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadCambioDth',
						'MotivoEquipoAnulada_Dth',
						'OrdenEquipoAnulada_Dth',
						'TrabajadoEquipoAnulada_Dth',
						'ComentarioEquipoAnulada_Dth',
						'username_creacion',
						'username_atencion',
					];

        
                            $registro = PostventaCambioEquipoDthAnulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoAnulada_Dth' && $request->has('TrabajadoEquipoAnulada_Dth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoAnulada_Dth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
             case'CAMBIO DE EQUIPO|ADSL':
                if($TipoActividadCambioAdsl === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadCambioAdsl',
                        'InstalacionEquipoAdsl',
                        'DesinstalarEquipoAdsl',
                        'OrdenEquipoAdsl',
                        'ObvsEquipoAdsl',
                        'RecibeEquipoAdsl',
                        'TrabajadoEquipoAdsl',
                        'username_creacion',
                        'username_atencion',
                    ];
                            $registro = PostventaCambioEquipoAdslRealizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoAdsl' && $request->has('TrabajadoEquipoAdsl')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoAdsl') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO ADSL ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioAdsl === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadCambioAdsl',
						'MotivoEquipoObjAdsl',
						'OrdenEquipoObjAdsl',
						'TrabajadoEquipoObjAdsl',
						'ObvsEquipoObjAdsl',
						'ComentsEquipoObjAdsl',
						'username_creacion',
						'username_atencion'
					];
        
                            $registro = PostventaCambioEquipoAdslObjetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoObjAdsl' && $request->has('TrabajadoEquipoObjAdsl')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoObjAdsl') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO ADSL ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioAdsl === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadCambioAdsl',
						'MotivoEquipoAnulada_Adsl',
						'OrdenAnuladaEquipoAdsl',
						'TrabajadoEquipoAnulada_Adsl',
						'ComentsEquipoAnulada_Adsl',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaCambioEquipoGpon_Anulado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoAnulada_Adsl' && $request->has('TrabajadoEquipoAnulada_Adsl')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoAnulada_Adsl') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
            case'CAMBIO DE EQUIPO|GPON':
                if($TipoActividadCambioGpon === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadCambioGpon',
                        'InstalacionEquipoGpon',
                        'DesinstalarEquipoGpon',
                        'NOrdenEquipoGpon',
                        'ObvsEquipoGpon',
                        'RecibeEquipoGpon',
                        'TrabajadoEquipoGpon',
                        'username_creacion',
                        'username_atencion',
                    ];
            
                            $registro = PostventaCambioEquipoGpon_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoGpon' && $request->has('TrabajadoEquipoGpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoGpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioGpon === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadCambioGpon',
						'MotivoObjEquipoGpon',
						'NOrdenObjEquipoGpon',
						'TrabajadoObjEquipoGpon',
						'ObvsEquipoObjGpon',
						'ComentsEquipoObjGpon',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaCambioEquipoGpon_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoObjEquipoGpon' && $request->has('TrabajadoObjEquipoGpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoObjEquipoGpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioGpon === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadCambioGpon',
						'MotivoAnuladaObj_Gpon',
						'OrdenEquipoAnuladaGpon',
						'TrabajadoEquipoAnulada_Gpon',
						'ComentarioEquipoAnulada_Gpon',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaCambioEquipoGpon_Anulado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoAnulada_Gpon' && $request->has('TrabajadoEquipoAnulada_Gpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoAnulada_Gpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
             case'CAMBIO DE EQUIPO|HFC':
                if($TipoActividadCambioHfc === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadCambioHfc',
                        'InstalacionEquipoHfc',
                        'DesinstalarEquipoHfc',
                        'NOrdenEquipoHfc',
                        'ObvsEquipoHfc',
                        'RecibeEquipoHfc',
                        'TrabajadoEquipoHfc',
                        'username_creacion',
                        'username_atencion',
                    ];
            
                            $registro = PostventaCambioEquipoHfc_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoHfc' && $request->has('TrabajadoEquipoHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioHfc === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadCambioHfc',
						'MotivoEquipoObjHfc',
						'NordenObjEquipoHfc',
						'TrabajadoObjEquipoHfc',
						'ObvsObjEquipoHfc',
						'ComentsEquipoObjHfc',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaCambioEquipoHfc_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoObjEquipoHfc' && $request->has('TrabajadoObjEquipoHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoObjEquipoHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadCambioHfc === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadCambioHfc',
						'MotivoEquipoAnulada_Hfc',
						'OrdenAnuladaEquipoHfc',
						'TrabajadoEquipoAnulada_Hfc',
						'ComentarioAnuladaEquipoHfc',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaCambioEquipoHfc_Anulado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoEquipoAnulada_Hfc' && $request->has('TrabajadoEquipoAnulada_Hfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoEquipoAnulada_Hfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
            case'ADICION|HFC':
                if($TipoActividadAdicionHfc === "REALIZADA"){
        
                                $selectedFields = [
                                'codigo_tecnico',
                                'telefono',
                                'tecnico',
                                'motivo_llamada',
                                'Select_Postventa',
                                'select_orden',
                                'dpto_colonia',
                                'tecnologia',
                                'TipoActividadAdicionHfc',
                                'equipostvAdicionHfc1',
                                'equipostvAdicionHfc2',
                                'equipostvAdicionHfc3',
                                'equipostvAdicionHfc4',
                                'equipostvAdicionHfc5',
                                'NOrdenAdicionHfc',
                                'TrabajadoAdicionHfc',
                                'obvsAdicionHfc',
                                'RecibeAdicionHfc',
                                'username_creacion',
                                'username_atencion',
                            ];
            
                    $registro = PostventaAdicionHfc_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAdicionHfc' && $request->has('TrabajadoAdicionHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAdicionHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadAdicionHfc === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadAdicionHfc',
						'MotivoObjAdicionHfc',
						'OrdenAdicionObjHfc',
						'TrabajadoObjAdicionHfc',
						'ObvsAdicionObjHfc',
						'ComentariosObjAdicionHfc',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaAdicionHfc_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoObjAdicionHfc' && $request->has('TrabajadoObjAdicionHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoObjAdicionHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadAdicionHfc === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadAdicionHfc',
						'MotivoAdicionAnulada_Hfc',
						'NOrdenAdicionAnuladaHfc',
						'TrabajadoAdicionAnulada_Hfc',
						'ComentarioAdicionAnulada_Hfc',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaAdicionHfc_Anulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAdicionAnulada_Hfc' && $request->has('TrabajadoAdicionAnulada_Hfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAdicionAnulada_Hfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
             case'ADICION|GPON':
                if($TipoActividadAdicionGpon === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadAdicionGpon',
                        'equipostvAdicionGpon1',
                        'equipostvAdicionGpon2',
                        'equipostvAdicionGpon3',
                        'equipostvAdicionGpon4',
                        'equipostvAdicionGpon5',
                        'NOrdenAdicionGpon',
                        'TrabajadoAdicionGpon',
                        'ObvsAdicionGpon',
                        'RecibeAdicionGpon',
                        'username_creacion',
                        'username_atencion',
                    ];
            
                    $registro = PostventaAdicionGpon_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAdicionGpon' && $request->has('TrabajadoAdicionGpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAdicionGpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadAdicionGpon === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadAdicionGpon',
						'MotivoAdicionObjGpon',
						'NOrdenAdicionObjGpon',
						'TrabajadoAdicionObjGpon',
						'ObvsAdicionObjGpon',
						'ComentariosAdicionObjGpon',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaAdicionGpon_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAdicionObjGpon' && $request->has('TrabajadoAdicionObjGpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAdicionObjGpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadAdicionGpon === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadAdicionGpon',
						'MotivoAdicionAnulada_Gpon',
						'NOrdenAdicionAnuladaGpon',
						'TrabajadoAdicionAnulada_Gpon',
						'ComentarioAdicionAnulada_Gpon',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaAdicionGpon_Anulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAdicionAnulada_Gpon' && $request->has('TrabajadoAdicionAnulada_Gpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAdicionAnulada_Gpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
             case'ADICION|DTH':
                if($TipoActividadAdicionDth === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadAdicionDth',
                        'equipostvAdicionDth1',
                        'equipostvAdicionDth2',
                        'equipostvAdicionDth3',
                        'equipostvAdicionDth4',
                        'equipostvAdicionDth5',
                        'NOrdenAdicionDth',
                        'TrabajadoAdicionDth',
                        'ObvsAdicionDth',
                        'RecibeAdicionDth',
                        'username_creacion',
                        'username_atencion',
                    ];
            
                    $registro = PostventaAdicionDth_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAdicionDth' && $request->has('TrabajadoAdicionDth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAdicionDth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadAdicionDth === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadAdicionDth',
						'MotivoObjAdicionDth',
						'NOrdenAdicionObjDth',
						'TrabajadoAdicionObjDth',
						'ObvsAdicionObjDth',
						'ComentariosAdicionObjDth',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaAdicionDth_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAdicionObjDth' && $request->has('TrabajadoAdicionObjDth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAdicionObjDth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadAdicionDth === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadAdicionDth',
						'MotivoAdicionAnulada_Dth',
						'OrdenAdicionAnulada_Dth',
						'TrabajadoAdicionAnulada_Dth',
						'ComentarioAdicionAnulada_Dth',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaAdicionDth_Anulado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAdicionAnulada_Dth' && $request->has('TrabajadoAdicionAnulada_Dth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAdicionAnulada_Dth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
             case'TRASLADO|HFC':
                if($TipoActividadTrasladoHfc === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadTrasladoHfc',
                        'OrdenTvTrasladoHfc',
                        'OrdenInternetTrasladoHfc',
                        'OrdenLineaTrasladoHfc',
                        'ObservacionesTrasladoHfc',
                        'TrabajadoTrasladoHfc',
                        'RecibeHfcRealizado',
                        'NodoTrasladoHfc',
                        'TapTrasladoHfc',
                        'PosicionTrasladoHfc',
                        'MaterialesTrasladoHfc',
                        'username_creacion',
                        'username_atencion',
                    ];
            
                    $registro = PostventaTrasladoHfc_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoHfc' && $request->has('TrabajadoTrasladoHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoHfc === "OBJETADA"){
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoHfc',
						'OrdenTvObjetadoTrasladoHfc',
						'OrdenIntObjTrasladoHfc',
						'OrdenLineaObjetadoTrasladoHfc',
						'MotivoObjTrasladoHfc',
						'TrabajadoObjTrasladoHfc',
						'ObvsObjTrasladoHfc',
						'ComentariosObjTrasladoHfc',
						'username_creacion',
						'username_atencion',
					];

                            $registro = PostventaTrasladoHfc_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoObjTrasladoHfc' && $request->has('TrabajadoObjTrasladoHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoObjTrasladoHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoHfc === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoHfc',
						'OrdenTvAnulTraslHfc',
						'OrdenInterAnulTraslHfc',
						'OrdenLineaAnulTraslHfc',
						'MotivoAnuladaTraslado_Hfc',
						'TrabajadoAnuladaTraslado_Hfc',
						'ComenAnuladaTraslado_Hfc',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaTrasladoHfc_Anulado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAnuladaTraslado_Hfc' && $request->has('TrabajadoAnuladaTraslado_Hfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAnuladaTraslado_Hfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoHfc === "TRANSFERIDA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoHfc',
						'OrdenTvTransferidoHfc',
						'OrdenInternetTransferidoHfc',
						'OrdenLineaTransferidoHfc',
						'MotivoTransTrasladoHfc',
						'TrabajadoTransTrasladoHfc',
						'ComentarioTrasladoTransHfc',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaTrasladoHfc_Transferido::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTransTrasladoHfc' && $request->has('TrabajadoTransTrasladoHfc')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTransTrasladoHfc') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO HFC ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
            case'TRASLADO|GPON':
                if($TipoActividadTrasladoGpon === "REALIZADA"){
        
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadTrasladoGpon',
                        'OrdenTvTrasladoGpon',
                        'OrdenInternetTrasladoGpon',
                        'OrdenLineaTrasladoGpon',
                        'ObvsTrasladoGpon',
                        'TrabajadoTrasladoGpon',
                        'RecibeTrasladoGpon',
                        'NodoTrasladoGpon',
                        'TapTrasladoGpon',
                        'PosicionTrasladoGpon',
                        'MaterialesTrasladoGpon',
                        'username_creacion',
                        'username_atencion',
                    ];
            
                    $registro = PostventaTrasladoGpon_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoGpon' && $request->has('TrabajadoTrasladoGpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoGpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoGpon === "OBJETADA"){
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoGpon',
						'OrdenTvTrasladoObjGpon',
						'OrdenInterObjTraslGpon',
						'OrdenLineaTraslObjGpon',
						'MotivoObjTrasladoGpon',
						'TrabajadoTrasladoObjGpon',
						'ObvsTrasladoObjGpon',
						'ComentTrasladoObjGpon',
						'username_creacion',
						'username_atencion',
					];


                            $registro = PostventaTrasladoGpon_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoObjGpon' && $request->has('TrabajadoTrasladoObjGpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoObjGpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoGpon === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoGpon',
						'OrdenTvTraslAnuladoGpon',
						'OrdenIntTrasladoAnulGpon',
						'OrdenLineaTraslAnulGpon',
						'MotivoTrasladoAnulada_Gpon',
						'TrabajadoAnuladaTraslado_gpon',
						'ComentarioTrasladoAnulada_Gpon',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaTrasladoGpon_Anulado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoAnuladaTraslado_gpon' && $request->has('TrabajadoAnuladaTraslado_gpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoAnuladaTraslado_gpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoGpon === "TRANSFERIDA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoGpon',
						'OrdenTvTrasladoTransGpon',
						'OrdenIntTransladoGpon',
						'OrdenLineaTrasladoTransGpon',
						'MotivoTransTrasladoGpon',
						'TrabajadoTraslTransGpon',
						'ComentTrasladoTransGpon',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaTrasladoGpon_Transferido::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTraslTransGpon' && $request->has('TrabajadoTraslTransGpon')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTraslTransGpon') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO GPON ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
             case'TRASLADO|ADSL':
                if($TipoActividadTrasladoAdsl === "REALIZADA"){
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadTrasladoAdsl',
                        'NOrdenTrasladosAdsl',
                        'GeorefTrasladoAdsl',
                        'MaterialesTrasladoAdsl',
                        'TrabajadoTrasladoAdsl',
                        'ObvsTrasladoAdsl',
                        'RecibeTrasladoAdsl',
                        'username_creacion',
                        'username_atencion',
                    ];
            
                    $registro = PostventaTrasladoAdsl_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoAdsl' && $request->has('TrabajadoTrasladoAdsl')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoAdsl') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO ADSL ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoAdsl === "OBJETADA"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoAdsl',
						'MotivoObjTrasladoAdsl',
						'OrdenObjTrasladoAdsl',
						'TrabajadoTrasladoObjAdsl',
						'ObvsTrasladoObjAdsl',
						'ComentariosTrasladosObjAdsl',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaTrasladoAdsl_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoObjAdsl' && $request->has('TrabajadoTrasladoObjAdsl')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoObjAdsl') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO ADSL ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoAdsl === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoAdsl',
						'MotivoTrasladoAnulada_Adsl',
						'NOrdenTrasladosAnulAdsl',
						'TrabajadoTrasladoTrAnulada_Adsl',
						'ComentarioTrasladoAnulada_Adsl',
						'username_creacion',
						'username_atencion',
					];
        
                            $registro = PostventaTrasladoAdsl_Anulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoTrAnulada_Adsl' && $request->has('TrabajadoTrasladoTrAnulada_Adsl')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoTrAnulada_Adsl') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO ADSL ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
             case'TRASLADO|COBRE':
                if($TipoActividadTrasladoCobre === "REALIZADA"){
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadTrasladoCobre',
                        'OrdenTrasladoCobre',
                        'GeorefTrasladoCobre',
                        'MaterialesTrasladoCobre',
                        'TrabajadoTrasladoCobre',
                        'ObvsTrasladoCobre',
                        'RecibeTrasladoCobre',
                        'username_creacion',
                        'username_atencion',
                    ];
            
                    $registro = PostventaTrasladoCobre_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoCobre' && $request->has('TrabajadoTrasladoCobre')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoCobre') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO COBRE ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoCobre === "OBJETADA"){
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoCobre',
						'MotivoObjTrasladoCobre',
						'OrdenTrasladoObjCobres',
						'TrabajadoTrasladoObjCobre',
						'ObsObjTrasladoCobre',
						'ComentariosObjTrasladoCobre',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaTrasladoCobre_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoObjCobre' && $request->has('TrabajadoTrasladoObjCobre')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoObjCobre') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO COBRE ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoCobre === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoCobre',
						'MotivoTrasladoAnulada_Cobre',
						'OrdenTrasladosCobre',
						'TrabajadoTrasladoAnulada_Cobre',
						'ComentarioTrasladoAnulada_Cobre',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaTrasladoCobre_Anulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoAnulada_Cobre' && $request->has('TrabajadoTrasladoAnulada_Cobre')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoAnulada_Cobre') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO COBRE ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;

             case'TRASLADO|DTH':
                if($TipoActividadTrasladoDth === "REALIZADA"){
                    $selectedFields = [
                        'codigo_tecnico',
                        'telefono',
                        'tecnico',
                        'motivo_llamada',
                        'Select_Postventa',
                        'select_orden',
                        'dpto_colonia',
                        'tecnologia',
                        'TipoActividadTrasladoDth',
                        'OrdenTrasladoDth',
                        'GeorefTrasladoDth',
                        'MaterialesTrasladoDth',
                        'TrabajadoTrasladoDth',
                        'ObvsTrasladoDth',
                        'RecibeTrasladoDth',
                        'username_creacion',
                        'username_atencion',
                    ];
            
                    $registro = PostventaTrasladoDth_Realizado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                    foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoDth' && $request->has('TrabajadoTrasladoDth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoDth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoDth === "OBJETADA"){
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoDth',
						'MotivoObjTrasladoDth',
						'OrdenTrasladoObjDth',
						'TrabajadoTrasladoObj_Dth',
						'ObvsTrasladoObjDth',
						'ComentariosTrasladoObjDth',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaTrasladoDth_Objetado::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoObj_Dth' && $request->has('TrabajadoTrasladoObj_Dth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoObj_Dth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
                if($TipoActividadTrasladoDth === "ANULACION"){
        
                    $selectedFields = [
						'codigo_tecnico',
						'telefono',
						'tecnico',
						'motivo_llamada',
						'Select_Postventa',
						'select_orden',
						'dpto_colonia',
						'tecnologia',
						'TipoActividadTrasladoDth',
						'MotivoTrasladoAnulada_Dth',
						'OrdenTrasladosDth',
						'TrabajadoTrasladoAnulada_Dth',
						'ComentarioTrasladoAnulada_Dth',
						'username_creacion',
						'username_atencion',
					];
                            $registro = PostventaTrasladoDthAnulada::findOrFail($id);
                            
                            // Iteramos por los campos seleccionados del formulario
                            foreach ($selectedFields as $fieldName) {
                                $value = $request->input($fieldName);
                                if ($fieldName === 'TrabajadoTrasladoAnulada_Dth' && $request->has('TrabajadoTrasladoAnulada_Dth')) {
                                    $registro->$fieldName = 'TRABAJADO';
                                } elseif ($fieldName === 'TrabajadoTrasladoAnulada_Dth') {
                                    $registro->$fieldName = 'PENDIENTE';
                                } else {
                                    $registro->$fieldName = $value;
                                }
                            }
                            
                            // Agregamos el usuario actual como creador y atendedor del registro
                            $registro->username_creacion = Auth::user()->username;
                            $registro->username_atencion = Auth::user()->username;
                            $registro->save();

        
                            $message = "¡EXITO!";
                            $messages = "REGISTRO DTH ACTUALIZADO";
                            $resultados = [];
                            $NumeroOrden = null;
        
                            return redirect()->route('busqueda.generar', [
                            'resultados' => $resultados,
                            'NumeroOrden' => $NumeroOrden,
                                    ])
                            ->with('success', true)
                            ->with('message', $message)
                            ->with('messages', $messages)
                            ->withDelay(2);
                    
                            
                }
             break;
        }
    }

}