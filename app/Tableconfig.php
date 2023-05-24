<?php 

namespace SSD;
use Illuminate\Support\Facades\DB;

class Tableconfig 
{

    public static function getTables()
    {
        return [
            'instalacionhfc_realizada' => [
                ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc']
            ],
            'instalacionhfc_objetada' => [
                ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc']
            ],
            'instalacionhfc_anulada' => [
                ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc']
            ],
            'instalacionhfc_transferida' => [
                ['orden_tv_hfc', 'orden_internet_hfc', 'orden_linea_hfc']
            ],
            'instalaciongpon_anulada' => [
                ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon']
            ],
            'instalaciongpon_objetada' => [
            ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon']
            ],
            'instalaciongpon_realizada' => [
            ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon']
            ],
            'instalaciongpon_transferida' => [
            ['OrdenInternet_Gpon', 'OrdenTv_Gpon', 'OrdenLinea_Gpon']
            ],
            'instalaciondth_anulada' => 'OrdenAnulada_Dth',
            'instalaciondth_objetada' => 'OrdenObj_Dth',
            'instalaciondth_realizada' => 'ordenTv_Dth',
            'instalacionadsl_realizada' => 'orden_internet_adsl',
            'instalacionadsl_objetada' => 'OrdenAdsl_Objetada',
            'instalacionadsl_anulada' => 'OrdenAnuladaAdsl',
            'instalacioncobre_realizada' => 'OrdenLineaCobre',
            'instalacioncobre_objetado' => 'OrdenCobre_Objetada',
            'instalacioncobre_anulada' => 'OrdenAnuladaCobre',
            
            'reparacionesadsl_realizado' => 'OrdenAdslRealizado',
            'reparacionesadsl_objetado' => 'OrdenObjAdsl',
            'reparacionesadsl_transferido' => 'OrdenTransferidoAdsl',
            'reparacionescobre_realizado' => 'OrdenReparacionCobre',
            'reparacionescobre_objetado' => 'OrdenObjReparacionCobre',
            'reparacionescobre_transferido' => 'OrdenTransfCobre',
            'reparacionesgpon_realizado' => 'OrdenRealizadoGpon',
            'reparacionesgpon_objetado' => 'OrdenObjGpon',
            'reparacionesgpon_transferido' => 'OrdenTransGpon',
            'reparacionesdth_realizado' => 'OrdenDthRealizada',
            'reparacionesdth_objetado' => 'OrdenObjDth',
            'reparacionesdth_transferido' => 'OrdenTransferidoDth',
            
            'postventacambiocobre_realizada' => 'OrdenCambioCobre',
            'postventacambiocobre_objetada' => 'OrdenObjCambioCobre',
            'postventacambiocobre_anulada' => 'OrdenAnuladaCambioCobre',
            'postventaretirodth_anulada' =>'OrdenRetiroAnulacionDth',
            'postventaretirodth_realizada' =>'OrdenRetiroDth',
            'postventaretirohfc_realizada' =>'OrdenRetiroHfc',
            'postventaretirohfc_anulada' =>'OrdenRetiroAnulacionHfc',
            'postventamigracion_realizada' =>'NOrdenMigracionHfc',
            'postventamigracion_objetada' =>'OrdenMigracionHfcObj',
            'postventamigracion_anulada' =>'NOrdenMigracionAnuladaHfc',
            'postventamigracion_transferida' =>'OrdenMigracionTranfHfc',
            'postventacambioequipodth_realizado' =>'OrdenEquipoDth',
            'postventacambioequipodth_objetado' =>'OrdenEquipoObjDth',
            'postventacambioequipodth_anulada' =>'OrdenEquipoAnulada_Dth',
            'postventacambioequipoadsl_realizado' =>'OrdenEquipoAdsl',
            'postventacambioequipoadsl_objetado' =>'OrdenEquipoObjAdsl',
            'postventacambioequipoadsl_anulada' =>'OrdenAnuladaEquipoAdsl',
            'postventacambioequipogpon_realizado' =>'NOrdenEquipoGpon',
            'postventacambioequipogpon_objetado' =>'NOrdenObjEquipoGpon',
            'postventacambioequipogpon_anulado' =>'OrdenEquipoAnuladaGpon',
            'postventacambioequipohfc_realizado' =>'NOrdenEquipoHfc',
            'postventacambioequipohfc_objetado' =>'NordenObjEquipoHfc',
            'postventacambioequipohfc_anulada' =>'OrdenAnuladaEquipoHfc',
            'postventaadicionhfc_realizado' =>'NOrdenAdicionHfc',
            'postventaadicionhfc_objetado' =>'OrdenAdicionObjHfc',
            'postventaadicionhfc_anulada' =>'NOrdenAdicionAnuladaHfc',
            'postventaadiciongpon_realizada' =>'NOrdenAdicionGpon',
            'postventaadiciongpon_objetada' =>'NOrdenAdicionObjGpon',
            'postventaadiciongpon_anulada' =>'NOrdenAdicionAnuladaGpon',
            'postventaadiciondth_realizado' =>'NOrdenAdicionDth',
            'postventaadiciondth_objetado' =>'NOrdenAdicionObjDth',
            'postventaadiciondth_anulado' =>'OrdenAdicionAnulada_Dth',

            'postventatrasladohfc_realizado' =>[
                ['OrdenTvTrasladoHfc','OrdenInternetTrasladoHfc','OrdenLineaTrasladoHfc']
            ],
            'postventatrasladohfc_objetado' =>[
                ['OrdenTvObjetadoTrasladoHfc','OrdenIntObjTrasladoHfc','OrdenLineaObjetadoTrasladoHfc']
            ],
            'postventatrasladohfc_anulada' =>[
                ['OrdenTvAnulTraslHfc','OrdenInterAnulTraslHfc','OrdenLineaAnulTraslHfc']
            ],
            'postventatrasladohfc_transferido' =>[
                ['OrdenTvTransferidoHfc','OrdenInternetTransferidoHfc','OrdenLineaTransferidoHfc']
            ],
            'postventatrasladogpon_realizado' =>[
                ['OrdenTvTrasladoGpon','OrdenInternetTrasladoGpon','OrdenLineaTrasladoGpon']
            ],
            'postventatrasladogpon_objetado' =>[
                ['OrdenTvTrasladoObjGpon','OrdenInterObjTraslGpon','OrdenLineaTraslObjGpon']
            ],
            'postventatrasladogpon_anulado' =>[
                ['OrdenTvTraslAnuladoGpon','OrdenIntTrasladoAnulGpon','OrdenLineaTraslAnulGpon']
            ],
            'postventatrasladogpon_transferido' =>[
                ['OrdenTvTrasladoTransGpon','OrdenIntTransladoGpon','OrdenLineaTrasladoTransGpon']
            ],
            'postventatrasladoadsl_realizada' =>'NOrdenTrasladosAdsl',
            'postventatrasladoadsl_objetada' =>'OrdenObjTrasladoAdsl',
            'postventatrasladoadsl_anulada' =>'NOrdenTrasladosAnulAdsl',
            'postventatrasladocobre_realizado' =>'OrdenTrasladoCobre',
            'postventatrasladocobre_objetado' =>'OrdenTrasladoObjCobres',
            'postventatrasladocobre_anulada' =>'OrdenTrasladosCobre',
            'postventatrasladodth_realizada' =>'OrdenTrasladoDth',
            'postventatrasladodth_objetado' =>'OrdenTrasladoObjDth',
            'postventatrasladodth_anulada' =>'OrdenTrasladosDth',
            
        ];
    }


    public static function getTablesAll()
    {
        return [
            'instalacionhfc_realizada' => [
                'orden_tv_hfc', 
                'orden_internet_hfc', 
                'orden_linea_hfc'
            ],
            'instalacionhfc_objetada' => [
                'orden_tv_hfc', 
                'orden_internet_hfc', 
                'orden_linea_hfc'
            ],
            'instalacionhfc_anulada' => [
                'orden_tv_hfc', 
                'orden_internet_hfc', 
                'orden_linea_hfc'
            ],
            'instalacionhfc_transferida' => [
                'orden_tv_hfc', 
                'orden_internet_hfc', 
                'orden_linea_hfc'
            ],
            'instalaciongpon_anulada' => [
                'OrdenInternet_Gpon', 
                'OrdenTv_Gpon', 
                'OrdenLinea_Gpon'
            ],
            'instalaciongpon_objetada' => [
                'OrdenInternet_Gpon', 
                'OrdenTv_Gpon', 
                'OrdenLinea_Gpon'
            ],
            'instalaciongpon_realizada' => [
                'OrdenInternet_Gpon', 
                'OrdenTv_Gpon', 
                'OrdenLinea_Gpon'
            ],
            'instalaciongpon_transferida' => [
                'OrdenInternet_Gpon', 
                'OrdenTv_Gpon', 
                'OrdenLinea_Gpon'
            ],
            'postventatrasladohfc_realizado' =>[
                'OrdenTvTrasladoHfc',
                'OrdenInternetTrasladoHfc',
                'OrdenLineaTrasladoHfc'
            ],
            'postventatrasladohfc_objetado' =>[
                'OrdenTvObjetadoTrasladoHfc',
                'OrdenIntObjTrasladoHfc',
                'OrdenLineaObjetadoTrasladoHfc'
            ],
            'postventatrasladohfc_anulada' =>[
                'OrdenTvAnulTraslHfc',
                'OrdenInterAnulTraslHfc',
                'OrdenLineaAnulTraslHfc'
            ],
            'postventatrasladohfc_transferido' =>[
                'OrdenTvTransferidoHfc'
                ,'OrdenInternetTransferidoHfc',
                'OrdenLineaTransferidoHfc'
            ],
            'postventatrasladogpon_realizado' =>[
                'OrdenTvTrasladoGpon',
                'OrdenInternetTrasladoGpon',
                'OrdenLineaTrasladoGpon'
            ],
            'postventatrasladogpon_objetado' =>[
                'OrdenTvTrasladoObjGpon',
                'OrdenInterObjTraslGpon',
                'OrdenLineaTraslObjGpon'
            ],
            'postventatrasladogpon_anulado' =>[
                'OrdenTvTraslAnuladoGpon',
                'OrdenIntTrasladoAnulGpon',
                'OrdenLineaTraslAnulGpon'
            ],
            'postventatrasladogpon_transferido' =>[
                'OrdenTvTrasladoTransGpon',
                'OrdenIntTransladoGpon',
                'OrdenLineaTrasladoTransGpon'
            ],
            'instalaciondth_anulada' => ['OrdenAnulada_Dth'],
            'instalaciondth_objetada' => ['OrdenObj_Dth'],
            'instalaciondth_realizada' => ['ordenTv_Dth'],
            'instalacionadsl_realizada' => ['orden_internet_adsl'],
            'instalacionadsl_objetada' => ['OrdenAdsl_Objetada'],
            'instalacionadsl_anulada' => ['OrdenAnuladaAdsl'],
            'instalacioncobre_realizada' => ['OrdenLineaCobre'],
            'instalacioncobre_objetado' => ['OrdenCobre_Objetada'],
            'instalacioncobre_anulada' => ['OrdenAnuladaCobre'],
            'reparacionescobre_realizado' => ['OrdenReparacionCobre'],
            'reparacionescobre_objetado' => ['OrdenObjReparacionCobre'],
            'reparacionescobre_transferido' => ['OrdenTransfCobre'],
            'reparacionesgpon_realizado' => ['OrdenRealizadoGpon'],
            'reparacionesgpon_objetado' => ['OrdenObjGpon'],
            'reparacionesgpon_transferido' => ['OrdenTransGpon'],
            'reparacionesdth_realizado' => ['OrdenDthRealizada'],
            'reparacionesdth_objetado' => ['OrdenObjDth'],
            'reparacionesdth_transferido' => ['OrdenTransferidoDth'],
            
            'postventacambiocobre_realizada' => ['OrdenCambioCobre'],
            'postventacambiocobre_objetada' => ['OrdenObjCambioCobre'],
            'postventacambiocobre_anulada' => ['OrdenAnuladaCambioCobre'],

            'postventaretirodth_anulada' =>['OrdenRetiroAnulacionDth'],
            'postventaretirodth_realizada' =>['OrdenRetiroDth'],
            'postventaretirohfc_realizada' =>['OrdenRetiroHfc'],
            'postventaretirohfc_anulada' =>['OrdenRetiroAnulacionHfc'],
            'postventamigracion_realizada' =>['NOrdenMigracionHfc'],
            'postventamigracion_objetada' =>['OrdenMigracionHfcObj'],
            'postventamigracion_anulada' =>['NOrdenMigracionAnuladaHfc'],
            'postventamigracion_transferida' =>['OrdenMigracionTranfHfc'],
            'postventacambioequipodth_realizado' =>['OrdenEquipoDth'],
            'postventacambioequipodth_objetado' =>['OrdenEquipoObjDth'],
            'postventacambioequipodth_anulada' =>['OrdenEquipoAnulada_Dth'],
            'postventacambioequipoadsl_realizado' =>['OrdenEquipoAdsl'],
            'postventacambioequipoadsl_objetado' =>['OrdenEquipoObjAdsl'],
            'postventacambioequipoadsl_anulada' =>['OrdenAnuladaEquipoAdsl'],
            'postventacambioequipogpon_realizado' =>['NOrdenEquipoGpon'],
            'postventacambioequipogpon_objetado' =>['NOrdenObjEquipoGpon'],
            'postventacambioequipogpon_anulado' =>['OrdenEquipoAnuladaGpon'],
            'postventacambioequipohfc_realizado' =>['NOrdenEquipoHfc'],
            'postventacambioequipohfc_objetado' =>['NordenObjEquipoHfc'],
            'postventacambioequipohfc_anulada' =>['OrdenAnuladaEquipoHfc'],
            'postventaadicionhfc_realizado' =>['NOrdenAdicionHfc'],
            'postventaadicionhfc_objetado' =>['OrdenAdicionObjHfc'],
            'postventaadicionhfc_anulada' =>['NOrdenAdicionAnuladaHfc'],
            'postventaadiciongpon_realizada' =>['NOrdenAdicionGpon'],
            'postventaadiciongpon_objetada' =>['NOrdenAdicionObjGpon'],
            'postventaadiciongpon_anulada' =>['NOrdenAdicionAnuladaGpon'],
            'postventaadiciondth_realizado' =>['NOrdenAdicionDth'],
            'postventaadiciondth_objetado' =>['NOrdenAdicionObjDth'],
            'postventaadiciondth_anulado' =>['OrdenAdicionAnulada_Dth'],

            
            'postventatrasladoadsl_realizada' =>['NOrdenTrasladosAdsl'],
            'postventatrasladoadsl_objetada' =>['OrdenObjTrasladoAdsl'],
            'postventatrasladoadsl_anulada' =>['NOrdenTrasladosAnulAdsl'],
            'postventatrasladocobre_realizado' =>['OrdenTrasladoCobre'],
            'postventatrasladocobre_objetado' =>['OrdenTrasladoObjCobres'],
            'postventatrasladocobre_anulada' =>['OrdenTrasladosCobre'],
            'postventatrasladodth_realizada' =>['OrdenTrasladoDth'],
            'postventatrasladodth_objetado' =>['OrdenTrasladoObjDth'],
            'postventatrasladodth_anulada' =>['OrdenTrasladosDth'],
            
        ];
    }
   

    
    public static function getAllFields()
    {
        return [
            'orden_tv_hfc', 
            'orden_internet_hfc', 
            'orden_linea_hfc',
            'OrdenInternet_Gpon', 
            'OrdenTv_Gpon', 
            'OrdenLinea_Gpon', 
            'OrdenAnulada_Dth', 
            'OrdenObj_Dth', 
            'ordenTv_Dth', 
            'orden_internet_adsl', 
            'OrdenAdsl_Objetada', 
            'OrdenAnuladaAdsl', 
            'OrdenLineaCobre', 
            'OrdenCobre_Objetada', 
            'OrdenAnuladaCobre',
            'OrdenAdslRealizado',
            'OrdenObjAdsl',
            'OrdenTransferidoAdsl',
            'OrdenReparacionCobre',
            'OrdenObjReparacionCobre',
            'OrdenTransfCobre',
            'OrdenRealizadoGpon',
            'OrdenObjGpon',
            'OrdenTransGpon',
            'OrdenDthRealizada',
            'OrdenObjDth',
            'OrdenTransferidoDth',
            'OrdenCambioCobre',
            'OrdenObjCambioCobre',
            'OrdenAnuladaCambioCobre',
            'OrdenRetiroAnulacionDth',
            'OrdenRetiroDth',
            'OrdenRetiroHfc',
            'OrdenRetiroAnulacionHfc',
            'NOrdenMigracionHfc',
            'OrdenMigracionHfcObj',
            'NOrdenMigracionAnuladaHfc',
            'OrdenMigracionTranfHfc',
            'OrdenEquipoDth',
            'OrdenEquipoObjDth',
            'OrdenEquipoAnulada_Dth',
            'OrdenEquipoAdsl',
            'OrdenEquipoObjAdsl',
            'OrdenAnuladaEquipoAdsl',
            'NOrdenEquipoGpon',
            'NOrdenObjEquipoGpon',
            'OrdenEquipoAnuladaGpon',
            'NOrdenEquipoHfc',
            'NordenObjEquipoHfc',
            'OrdenAnuladaEquipoHfc',
            'NOrdenAdicionHfc',
            'OrdenAdicionObjHfc',
            'NOrdenAdicionAnuladaHfc',
            'NOrdenAdicionGpon',
            'NOrdenAdicionObjGpon',
            'NOrdenAdicionAnuladaGpon',
            'NOrdenAdicionDth',
            'NOrdenAdicionObjDth',
            'OrdenAdicionAnulada_Dth',
            'OrdenTvTrasladoHfc',
            'OrdenInternetTrasladoHfc',
            'OrdenLineaTrasladoHfc',
            'OrdenTvObjetadoTrasladoHfc',
            'OrdenIntObjTrasladoHfc',
            'OrdenLineaObjetadoTrasladoHfc',
            'OrdenTvAnulTraslHfc',
            'OrdenInterAnulTraslHfc',
            'OrdenLineaAnulTraslHfc',
            'OrdenTvTransferidoHfc',
            'OrdenInternetTransferidoHfc',
            'OrdenLineaTransferidoHfc',
            'OrdenTvTrasladoGpon',
            'OrdenInternetTrasladoGpon',
            'OrdenLineaTrasladoGpon',
            'OrdenTvTrasladoObjGpon',
            'OrdenInterObjTraslGpon',
            'OrdenTvTraslAnuladoGpon',
            'OrdenIntTrasladoAnulGpon',
            'OrdenLineaTraslAnulGpon',
            'OrdenTvTrasladoTransGpon',
            'OrdenIntTransladoGpon',
            'OrdenLineaTrasladoTransGpon',
            'NOrdenTrasladosAdsl',
            'OrdenObjTrasladoAdsl',
            'NOrdenTrasladosAnulAdsl',
            'OrdenTrasladoCobre',
            'OrdenTrasladoObjCobres',
            'OrdenTrasladosCobre',
            'OrdenTrasladoDth',
            'OrdenTrasladoObjDth',
            'OrdenTrasladosDth',
        ];
    }
    

    public static function getTrabajadoFields()
    {
        return [
            'instalacionhfc_realizada' => 'TrabajadoHfc' ,
			'instalacionhfc_objetada' => 'TrabajadoObjetadaHfc',
			'instalacionhfc_anulada' => 'TrabajadoAnulada_Hfc',
			'instalacionhfc_transferida' => 'TrabajadoTransferido_Hfc',
            'instalaciongpon_anulada' => 'TrabajadoAnulada_Gpon',
            'instalaciongpon_objetada' => 'TrabajadoGpon_Objetado',
            'instalaciongpon_realizada' => 'TrabajadoGpon',
            'instalaciongpon_transferida' => 'TrabajadoTransferido_Gpon',
            'instalaciondth_anulada' => 'TrabajadoAnulada_Dth',
            'instalaciondth_objetada' => 'TrabajadoObj_Dth',
            'instalaciondth_realizada' => 'TrabajadoDthRealizado',
            'instalacionadsl_realizada' => 'TrabajadoAdsl',
			'instalacionadsl_objetada' => 'TrabajadoAdslObjetado',
			'instalacionadsl_anulada' => 'TrabajadoAnulada_Adsl',
            'instalacioncobre_realizada' => 'TrabajadoCobre',
			'instalacioncobre_objetado' => 'TrabajadoCobre_Objetado',
			'instalacioncobre_anulada' => 'TrabajadoAnulada_Cobre',

            'reparacionesadsl_realizado' => 'TrabajadoReparacionAdsl',
            'reparacionesadsl_objetado' => 'TrabajadoObjetadaAdsl',
            'reparacionesadsl_transferido' => 'TrabajadoTransferidoAdsl',
            'reparacionescobre_realizado' => 'TrabajadoReparacionCobre',
            'reparacionescobre_objetado' => 'TrabajadoObjetadaCobre',
            'reparacionescobre_transferido' => 'TrabajadoCobreTransferido',
            'reparacionesgpon_realizado' => 'TrabajadoReparacionesGpon',
            'reparacionesgpon_objetado' => 'TrabajadoObjetadaGpon',
            'reparacionesgpon_transferido' => 'TrabajadoTransfGpon',
            'reparacionesdth_realizado' => 'TrabajadoDth',
            'reparacionesdth_objetado' => 'TrabajadoObjetadaDth',
            'reparacionesdth_transferido' => 'TrabajadoTransferidoDth',


            'postventacambiocobre_realizada' => 'TrabajadoCambioCobre',
            'postventacambiocobre_objetada' => 'TrabajadoObjCambioCobre',
            'postventacambiocobre_anulada' => 'TrabajadoAnuladaCambioCobre',
            'postventaretirodth_anulada' =>'TrabajadoRetiroAnulada_Dth',
            'postventaretirodth_realizada' =>'TrabajadoRetiroDth',
            'postventaretirohfc_realizada' =>'TrabajadoRetiroHfc',
            'postventaretirohfc_anulada' =>'TrabajadoRetiroAnulada_Hfc',
            'postventamigracion_realizada' =>'TrabajadoMigracionHfc',
            'postventamigracion_objetada' =>'TrabajadoMigracionObjHfc',
            'postventamigracion_anulada' =>'TrabajadoMigracionAnulada_Hfc',
            'postventamigracion_transferida' =>'TrabajadoMigracionTransHfc',
            'postventacambioequipodth_realizado' =>'TrabajadoEquipoDth',
            'postventacambioequipodth_objetado' =>'TrabajadoEquipoObjDth',
            'postventacambioequipodth_anulada' =>'TrabajadoEquipoAnulada_Dth',
            'postventacambioequipoadsl_realizado' =>'TrabajadoEquipoAdsl',
            'postventacambioequipoadsl_objetado' =>'TrabajadoEquipoObjAdsl',
            'postventacambioequipoadsl_anulada' =>'TrabajadoEquipoAnulada_Adsl',
            'postventacambioequipogpon_realizado' =>'TrabajadoEquipoGpon',
            'postventacambioequipogpon_objetado' =>'TrabajadoObjEquipoGpon',
            'postventacambioequipogpon_anulado' =>'TrabajadoEquipoAnulada_Gpon',
            'postventacambioequipohfc_realizado' =>'TrabajadoEquipoHfc',
            'postventacambioequipohfc_objetado' =>'TrabajadoObjEquipoHfc',
            'postventacambioequipohfc_anulada' =>'TrabajadoEquipoAnulada_Hfc',
            'postventaadicionhfc_realizado' =>'TrabajadoAdicionHfc',
            'postventaadicionhfc_objetado' =>'TrabajadoObjAdicionHfc',
            'postventaadicionhfc_anulada' =>'TrabajadoAdicionAnulada_Hfc',
            'postventaadiciongpon_realizada' =>'TrabajadoAdicionGpon',
            'postventaadiciongpon_objetada' =>'TrabajadoAdicionObjGpon',
            'postventaadiciongpon_anulada' =>'TrabajadoAdicionAnulada_Gpon',
            'postventaadiciondth_realizado' =>'TrabajadoAdicionDth',
            'postventaadiciondth_objetado' =>'TrabajadoAdicionObjDth',
            'postventaadiciondth_anulado' =>'TrabajadoAdicionAnulada_Dth',

            'postventatrasladohfc_realizado' =>'TrabajadoTrasladoHfc',
            'postventatrasladohfc_objetado' =>'TrabajadoObjTrasladoHfc',
            'postventatrasladohfc_anulada' =>'TrabajadoAnuladaTraslado_Hfc',
            'postventatrasladohfc_transferido' =>'TrabajadoTransTrasladoHfc',
            'postventatrasladogpon_realizado' =>'TrabajadoTrasladoGpon',
            'postventatrasladogpon_objetado' =>'TrabajadoTrasladoObjGpon',
            'postventatrasladogpon_anulado' =>'TrabajadoAnuladaTraslado_gpon',
            'postventatrasladogpon_transferido' =>'TrabajadoTraslTransGpon',
            'postventatrasladoadsl_realizada' =>'TrabajadoTrasladoAdsl',
            'postventatrasladoadsl_objetada' =>'TrabajadoTrasladoObjAdsl',
            'postventatrasladoadsl_anulada' =>'TrabajadoTrasladoTrAnulada_Adsl',
            'postventatrasladocobre_realizado' =>'TrabajadoTrasladoCobre',
            'postventatrasladocobre_objetado' =>'TrabajadoTrasladoObjCobre',
            'postventatrasladocobre_anulada' =>'TrabajadoTrasladoAnulada_Cobre',
            'postventatrasladodth_realizada' =>'TrabajadoTrasladoDth',
            'postventatrasladodth_objetado' =>'TrabajadoTrasladoObj_Dth',
            'postventatrasladodth_anulada' =>'TrabajadoTrasladoAnulada_Dth',
        ];
    }

    public static function getTablesAllArray()
{
    return [
        'postventatrasladogpon_anulado' => [
            'OrdenTvTraslAnuladoGpon',
            'OrdenIntTrasladoAnulGpon',
            'OrdenLineaTraslAnulGpon'
        ],
        'instalaciondth_anulada' => [
            'OrdenAnulada_Dth'
        ]
    ];
}

    

    


}