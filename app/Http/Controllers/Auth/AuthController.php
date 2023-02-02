<?php

namespace SSD\Http\Controllers\Auth;

use Validator;
use SSD\User;
use SSD\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	 /**
     * Defined column for authentication
     * 
     * */
    protected $username = 'username';
	
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
	
	/**
     * Other propieties.
     *
     */
	//protected $maxLoginAttempts = 3;
	//protected $lockoutTime = 300;
	
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
	 public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username'				=> 'required|max:255|unique:users',
        	'firstname'				=> 'required|max:255',
        	'lastname'				=> 'required|max:255',
        	'email' 				=> 'required|email|max:255|unique:users',
            'password' 				=> 'required|confirmed|min:6',
        	'organizational_area' 	=> 'required|max:255',
        	'status' 				=> 'required|max:255'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
        	'username' 				=> $data['username'],
        	'first_name' 			=> $data['fgirst_name'],
            'lastname' 				=> $data['lastname'],
            'email' 				=> $data['email'],
            'password'				=> bcrypt($data['password']),
        	'organizational_area' 	=> $data['organizational_area'],
        	'is_activated' 			=> $data['is_activated'],
        	'hash_reset'			=> md5($data['password'] . time())
        ]);
    }
    
    public function showRegistrationForm () {
    	abort(404);
    }
    
    public function postRegister() {
    	abort(404);
    }
    
    public function login(Request $request)
   	{
   		
   		$this->validateLogin($request);
    	
    	$throttles = $this->isUsingThrottlesLoginsTrait();
    	
    	if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
    		$this->fireLockoutEvent($request);
    	
   			return $this->sendLockoutResponse($request);
   		}
    	
   		$credentials = $this->getCredentials($request);
    	   		
   		if (Auth::guard($this->getGuard())->attempt(array_add($credentials, 'is_activated', 1), $request->has('remember'))) {
   			return $this->handleUserWasAuthenticated($request, $throttles);
   		}
    
   		if (Auth::guard($this->getGuard())->attempt($credentials)) {
   			Auth::guard($this->getGuard())->logout();
   			return redirect()->back()
   			->withInput($request->only($this->loginUsername(), 'remember'))
   			->withErrors([
   				'status' => trans('auth.blocked')
   			]);
   		}
   		
   		if ($throttles && ! $lockedOut) {
   			$this->incrementLoginAttempts($request);
   		}
    	
   		return $this->sendFailedLoginResponse($request);
   	}
}
