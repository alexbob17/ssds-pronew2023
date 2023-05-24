<?php namespace SSD\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SSD\Repositories\UsuarioRepository;
use Carbon\Carbon;



class DashboardController extends Controller {

	

	protected $usuario_gestion;
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	
	public function __construct(UsuarioRepository $usuario_gestion)
	{
		$this->usuario_gestion = $usuario_gestion;
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */



	public function index()
	{
		$page_title = "Dashboard";
		
		$breadcrumb = [
				['name' => 'Dashboard' ]
		];
		
		$sql = 'SELECT COUNT(*) FROM reclamos_tecnica WHERE estado="pendiente" AND YEAR(fecha_creacion)=2023';
        $result = DB::select($sql);
		$Rpendientes = collect($result);
		
		$sqlInconsistencia = 'SELECT COUNT(*) FROM inconsistencias WHERE estado="atendido" AND YEAR(fecha_creacion)=2023';
        $result1 = DB::select($sqlInconsistencia);
		$RAtendido= collect($result1);

		$sqlPenalizacion = 'SELECT COUNT(*) FROM penalizaciones WHERE YEAR(fecha_reporte)=2023';
        $result2 = DB::select($sqlPenalizacion);
		$RPenalizacion= collect($result2);

		
		
		return view('home')
			->with('page_title', $page_title)
			->with('breadcrumb', $breadcrumb)
			->with('Rpendientes', $Rpendientes)
			->with('RAtendido', $RAtendido)
			->with('RPenalizacion', $RPenalizacion);

		
		
		// return view('home')
		// 	->with('page_title', $page_title)
		// 	->with('breadcrumb', $breadcrumb)
		// 	->with('ip_direction', $ip_direction);
	}
	
	public function showChangePasswordForm() {
		$page_title = "Cambiar contraseña";
		
		$breadcrumb = [
				['name' => 'Dashboard' ]
		];
		
		return view('auth/change_password')
			->with('page_title', $page_title)
			->with('breadcrumb', $breadcrumb);
	}
	
	public function changePassword(Request $request) {
		$user = \Auth::user();
		$inputs = $request->all();
		
		$validator = Validator::make($inputs, [
			'current_password' 	=> 'bail|required',
    		'new_password'		=> 'required|min:6|confirmed',
		]);
		
		if($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}
		
		$validator->after(function($validator) use ($request) {
			$check = auth()->validate([
				'username' => \Auth::user()->username,
				'password' => $request->current_password
			]);
			
			if(!$check) {
				$validator->errors()->add('current_password', 'Su contraseña actual es incorrecta, intente nuevamente.');
			}
		}); 
				
		if($validator->fails()) {
			return redirect()->back()->withErrors($validator);
		}
		
		$this->usuario_gestion->actualizarContrasena($user->id, $inputs['new_password']);
		return redirect('/')->with('success_message', 'Se ha actualizado la contraseña correctamente.');
	}

	public function countTables(Request $request){

		\Carbon\Carbon::setLocale('es');
		$mes_actual = Carbon::now()->format('Y-m');

		setlocale(LC_TIME, 'es_ES');
		$mes = ucfirst(strftime('%B'));

		
		$consultasrealizada = DB::table('consultasrealizada')->where('created_at', 'like', $mes_actual.'%')->count();

		$instalacionesRealizadasHfc = DB::table('instalacionhfc_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalacionesObjHfc = DB::table('instalacionhfc_objetada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalacionesAnulHfc = DB::table('instalacionhfc_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalacionhfc_transferida = DB::table('instalacionhfc_transferida')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalaciongpon_objetada = DB::table('instalaciongpon_objetada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalaciongpon_realizada = DB::table('instalaciongpon_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalaciongpon_transferida = DB::table('instalaciongpon_transferida')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalaciondth_realizada = DB::table('instalaciondth_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalaciondth_objetada = DB::table('instalaciondth_objetada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalaciondth_anulada = DB::table('instalaciondth_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalacioncobre_realizada = DB::table('instalacioncobre_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalacioncobre_objetado = DB::table('instalacioncobre_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalacioncobre_anulada = DB::table('instalacioncobre_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalacionadsl_realizada = DB::table('instalacionadsl_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalacionadsl_objetada = DB::table('instalacionadsl_objetada')->where('created_at', 'like', $mes_actual.'%')->count();
		$instalacionadsl_anulada = DB::table('instalacionadsl_anulada')->where('created_at', 'like', $mes_actual.'%')->count();


		$reparacionesadsl_objetado = DB::table('reparacionesadsl_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionesadsl_realizado = DB::table('reparacionesadsl_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionesadsl_transferido = DB::table('reparacionesadsl_transferido')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionescobre_objetado = DB::table('reparacionescobre_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionescobre_realizado = DB::table('reparacionescobre_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionescobre_transferido = DB::table('reparacionescobre_transferido')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionesgpon_realizado = DB::table('reparacionesgpon_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionesgpon_transferido = DB::table('reparacionesgpon_transferido')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionesgpon_objetado = DB::table('reparacionesgpon_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionesdth_realizado = DB::table('reparacionesdth_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionesdth_objetado = DB::table('reparacionesdth_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$reparacionesdth_transferido = DB::table('reparacionesdth_transferido')->where('created_at', 'like', $mes_actual.'%')->count();


		$postventacambiocobre_realizada = DB::table('postventacambiocobre_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambiocobre_objetada = DB::table('postventacambiocobre_objetada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambiocobre_anulada = DB::table('postventacambiocobre_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaretirodth_anulada = DB::table('postventaretirodth_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaretirodth_realizada = DB::table('postventaretirodth_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaretirohfc_anulada = DB::table('postventaretirohfc_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventamigracion_realizada = DB::table('postventamigracion_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventamigracion_objetada = DB::table('postventamigracion_objetada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventamigracion_anulada = DB::table('postventamigracion_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventamigracion_transferida = DB::table('postventamigracion_transferida')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipodth_realizado = DB::table('postventacambioequipodth_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipodth_objetado = DB::table('postventacambioequipodth_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipodth_anulada = DB::table('postventacambioequipodth_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipoadsl_realizado = DB::table('postventacambioequipoadsl_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipoadsl_objetado = DB::table('postventacambioequipoadsl_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipoadsl_anulada = DB::table('postventacambioequipoadsl_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipogpon_realizado = DB::table('postventacambioequipogpon_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipogpon_anulado = DB::table('postventacambioequipogpon_anulado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipohfc_realizado = DB::table('postventacambioequipohfc_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipohfc_objetado = DB::table('postventacambioequipohfc_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventacambioequipohfc_anulada = DB::table('postventacambioequipohfc_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaadicionhfc_objetado = DB::table('postventaadicionhfc_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaadicionhfc_anulada = DB::table('postventaadicionhfc_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaadiciongpon_realizada = DB::table('postventaadiciongpon_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaadiciongpon_objetada = DB::table('postventaadiciongpon_objetada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaadiciongpon_anulada = DB::table('postventaadiciongpon_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaadiciondth_realizado = DB::table('postventaadiciondth_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaadiciondth_objetado = DB::table('postventaadiciondth_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventaadiciondth_anulado = DB::table('postventaadiciondth_anulado')->where('created_at', 'like', $mes_actual.'%')->count();

		$postventatrasladohfc_realizado = DB::table('postventatrasladohfc_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladohfc_objetado = DB::table('postventatrasladohfc_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladohfc_anulada = DB::table('postventatrasladohfc_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladohfc_transferido = DB::table('postventatrasladohfc_transferido')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladogpon_realizado = DB::table('postventatrasladogpon_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladogpon_objetado = DB::table('postventatrasladogpon_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladogpon_anulado = DB::table('postventatrasladogpon_anulado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladogpon_transferido = DB::table('postventatrasladogpon_transferido')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladoadsl_realizada = DB::table('postventatrasladoadsl_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladoadsl_objetada = DB::table('postventatrasladoadsl_objetada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladoadsl_anulada = DB::table('postventatrasladoadsl_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladocobre_realizado = DB::table('postventatrasladocobre_realizado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladocobre_objetado = DB::table('postventatrasladocobre_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladocobre_anulada = DB::table('postventatrasladocobre_anulada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladodth_realizada = DB::table('postventatrasladodth_realizada')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladodth_objetado = DB::table('postventatrasladodth_objetado')->where('created_at', 'like', $mes_actual.'%')->count();
		$postventatrasladodth_anulada = DB::table('postventatrasladodth_anulada')->where('created_at', 'like', $mes_actual.'%')->count();



		$totalReparaciones = $reparacionesadsl_objetado + $reparacionesadsl_realizado + $reparacionesadsl_transferido + $reparacionescobre_objetado
		+$reparacionescobre_realizado + $reparacionescobre_transferido + $reparacionesgpon_realizado + $reparacionesgpon_transferido +  $reparacionesgpon_objetado
		+$reparacionesdth_realizado + $reparacionesdth_objetado + $reparacionesdth_transferido;

		$total = $instalacionesRealizadasHfc + $instalacionesObjHfc 
		+ $instalacionesAnulHfc + $instalacionhfc_transferida + $instalaciongpon_objetada + $instalaciongpon_realizada 
		+ $instalaciongpon_transferida +$instalaciondth_realizada +$instalaciondth_objetada + $instalaciondth_anulada + $instalacioncobre_realizada + $instalacioncobre_objetado + $instalacioncobre_anulada 
		+ $instalacioncobre_anulada +$instalacionadsl_realizada + $instalacionadsl_objetada +$instalacionadsl_anulada;

		$totalPostventa = $postventacambiocobre_realizada + $postventacambiocobre_objetada + $postventacambiocobre_anulada + $postventaretirodth_anulada  + $postventaretirodth_realizada
		+$postventaretirohfc_anulada + $postventamigracion_realizada + $postventamigracion_objetada + $postventamigracion_anulada + $postventamigracion_transferida + $postventacambioequipodth_realizado
		+$postventacambioequipodth_objetado + $postventacambioequipodth_anulada + $postventacambioequipoadsl_realizado + $postventacambioequipoadsl_objetado + $postventacambioequipoadsl_anulada
		+$postventacambioequipogpon_realizado + $postventacambioequipogpon_anulado + $postventacambioequipohfc_realizado + $postventacambioequipohfc_objetado + $postventacambioequipohfc_anulada 
		+$postventaadicionhfc_objetado + $postventaadicionhfc_anulada + $postventaadiciongpon_realizada + $postventaadiciongpon_objetada + $postventaadiciongpon_anulada + $postventaadiciondth_realizado + $postventaadiciondth_objetado
		+$postventaadiciondth_anulado + $postventatrasladohfc_realizado + $postventatrasladohfc_objetado + $postventatrasladohfc_anulada + $postventatrasladohfc_transferido + $postventatrasladogpon_realizado
		+$postventatrasladogpon_objetado + $postventatrasladogpon_anulado + $postventatrasladogpon_transferido + $postventatrasladoadsl_realizada + $postventatrasladoadsl_objetada + $postventatrasladoadsl_anulada
		+$postventatrasladocobre_realizado + $postventatrasladocobre_objetado + $postventatrasladocobre_anulada + $postventatrasladodth_realizada + $postventatrasladodth_objetado 
		+$postventatrasladodth_anulada;

		$consultasrealizada;
		// dd($total);

		return view('home', [
			'total' => $total,
			'totalReparaciones' => $totalReparaciones,
			'totalPostventa' => $totalPostventa,
			'consultasrealizada' => $consultasrealizada,
		])
		->with('page_title', 'Dashboard - Inicio')
		->with('navigation', 'Dashboard');

	}
}