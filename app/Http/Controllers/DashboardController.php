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


		$total = $instalacionesRealizadasHfc + $instalacionesObjHfc 
		+ $instalacionesAnulHfc + $instalacionhfc_transferida + $instalaciongpon_objetada + $instalaciongpon_realizada 
		+ $instalaciongpon_transferida + $instalaciongpon_transferida +$instalaciondth_realizada +$instalaciondth_objetada 
		+$instalaciondth_anulada + $instalacioncobre_realizada + $instalacioncobre_objetado + $instalacioncobre_anulada 
		+ $instalacionadsl_realizada + $instalacionadsl_objetada +$instalacionadsl_anulada;

		// dd($total);

		return view('home',compact('total'))
		->with('page_title', 'Dashboard - Inicio')
		->with('navigation', 'Dashboard');

	}
}