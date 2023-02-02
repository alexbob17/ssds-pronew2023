<?php

use Illuminate\Database\Seeder;
use SSD\Role as Role;
use SSD\User as User;

class InitialConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$admin = new Role();
		$admin->name			= 'admin';
		$admin->display_name	= 'Administrador';
		$admin->description		= 'Administrador del Sistema';
		$admin->save(); 

		$user = new User();
		$user->username 	 		= 'administrator';
		$user->first_name 	 		= 'Super';
		$user->last_name 	 		= 'Admin';
		$user->password				= Hash::make( '123456' );
		$user->hash_reset			= md5($user->password . time());
		$user->email 				= 'bismark.munoz@claro.com.ni';
		$user->organizational_area	= 'Administrador del Sistema';
		$user->save();
		
		$user->attachRole($admin);
		
		$operador = new Role();
		$operador->name				= 'operador';
		$operador->display_name		= 'Operador';
		$operador->description		= 'Registrar casos';
		$operador->save();
		
	/*  $user = new User();
		$user->username 	 		= 'operador1';
		$user->first_name 	 		= 'Operador';
		$user->last_name 	 		= 'Call Center 1';
		$user->password				= Hash::make( 'abc123' );
		$user->hash_reset			= md5($user->password . time());
		$user->email 				= 'prueba@transactel.com.ni';
		$user->organizational_area	= 'Transactel';
		$user->save();
		
		$user->attachRole($operador); */
	}
}
