<?php namespace SSD\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
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
	public function index()
	{
		$page_title = "Dashboard";
		
		$breadcrumb = [
				['name' => 'Dashboard' ]
		];
		
		//Just get the headers if we can or else use the SERVER global
		if ( function_exists( 'apache_request_headers' ) ) {
			$headers = apache_request_headers();
		} else {
			$headers = $_SERVER;
		}
	
		//Get the forwarded IP if it exists
		if ( array_key_exists( 'X-Forwarded-For', $headers ) 
				&& filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
			$ip_direction = $headers['X-Forwarded-For'];
		} elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) 
				&& filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )) {
			$ip_direction = $headers['HTTP_X_FORWARDED_FOR'];
		} else {	
			$ip_direction = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
		}
		
		
		return view('home')
			->with('page_title', $page_title)
			->with('breadcrumb', $breadcrumb)
			->with('ip_direction', $ip_direction);
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