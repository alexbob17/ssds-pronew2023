<?php

namespace SSD\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \SSD\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \SSD\Http\Middleware\VerifyCsrfToken::class,
            // \SSD\Http\Middleware\CheckInactiveUser::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' 			=> \SSD\Http\Middleware\Authenticate::class,
        'auth.basic' 	=> \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'guest' 		=> \SSD\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' 		=> \Illuminate\Routing\Middleware\ThrottleRequests::class,
		'ajax' 			=> \SSD\Http\Middleware\IsAjax::class,	
		'role' 			=> \Zizaco\Entrust\Middleware\EntrustRole::class,
		'permission' 	=> \Zizaco\Entrust\Middleware\EntrustPermission::class,
		'ability' 		=> \Zizaco\Entrust\Middleware\EntrustAbility::class,
    ];
}