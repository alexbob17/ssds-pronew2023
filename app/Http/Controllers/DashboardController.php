<?php namespace SSD\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SSD\Repositories\UsuarioRepository;

class DashboardController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

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

	// public function getDatosDashboard(){
	// 	$page_title = "Dashboard";
		
	// 	$breadcrumb = [
	// 			['name' => 'Dashboard' ]
	// 	];
		
		

	// }

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
}