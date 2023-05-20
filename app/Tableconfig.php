<?php 

namespace SSD;
use Illuminate\Support\Facades\DB;

class Tableconfig 
{

    public static function getTables()
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
            'instalaciondth_anulada' => 'OrdenAnulada_Dth',
            'instalaciondth_objetada' => 'OrdenObj_Dth',
            'instalaciondth_realizada' => 'ordenTv_Dth',
            'instalacionadsl_realizada' => 'orden_internet_adsl',
            'instalacionadsl_objetada' => 'OrdenAdsl_Objetada',
            'instalacionadsl_anulada' => 'OrdenAnuladaAdsl',
            'instalacioncobre_realizada' => 'OrdenLineaCobre',
            'instalacioncobre_objetado' => 'OrdenCobre_Objetada',
            'instalacioncobre_anulada' => 'OrdenAnuladaCobre',
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
            'instalaciondth_anulada' => ['OrdenAnulada_Dth'],
            'instalaciondth_objetada' => ['OrdenObj_Dth'],
            'instalaciondth_realizada' => ['ordenTv_Dth'],
            'instalacionadsl_realizada' => ['orden_internet_adsl'],
            'instalacionadsl_objetada' => ['OrdenAdsl_Objetada'],
            'instalacionadsl_anulada' => ['OrdenAnuladaAdsl'],
            'instalacioncobre_realizada' => ['OrdenLineaCobre'],
            'instalacioncobre_objetado' => ['OrdenCobre_Objetada'],
            'instalacioncobre_anulada' => ['OrdenAnuladaCobre'],
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
            'OrdenAnuladaCobre'
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
        ];
    }


}