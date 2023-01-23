<?php

namespace App\Process;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;


/**
 * Database configuration
 */
class Database
{

	public function databaseSetup($database)
	{
		$this->databaseConfiguration($database);
		try {

			new \mysqli($database["DB_HOST"], $database["DB_USERNAME"],
			$database["DB_PASSWORD"], $database["DB_DATABASE"],
			$database['DB_PORT']);

			Artisan::call('migrate:fresh', ['--force' => true]);
			Artisan::call('db:seed');

		} catch (Exception $exception) {

			throw new $exception->getMessage();
		}
	}

	public function databaseConfiguration($database)
	{
		config([
			'database.default' => 'mysql',
			'database.connections.mysql.host' => $database['DB_HOST'],
			'database.connections.mysql.port' => $database['DB_PORT'],
			'database.connections.mysql.database' => $database['DB_DATABASE'],
			'database.connections.mysql.username' => $database['DB_USERNAME'],
			'database.connections.mysql.password' => $database['DB_PASSWORD'],
		]);

		DB::purge('mysql');
		Artisan::call('config:clear');
	}

	public function adminSetup($admin)
	{
		$role = Role::create(['name' => 'Admin']);
    $role->givePermissionTo(Permission::all());

    $user = User::factory()->create([
			'name'        			=> $admin['first_name'],
			'email'             => $admin['email'],
			'email_verified_at' => now(),
			'password'          => Hash::make($admin['password']),
			'remember_token'    => Str::random(10),
    ]);

    $user->assignRole($role);
	}

	public function env($database)
	{
		
		DotenvEditor::setKeys([
			'DB_HOST' => $database['DB_HOST'],
			'DB_PORT' => $database['DB_PORT'],
			'DB_DATABASE' => $database['DB_DATABASE'],
			'DB_USERNAME' => $database['DB_USERNAME'],
			'DB_PASSWORD' => $database['DB_PASSWORD'],
		]);

		DotenvEditor::save();
	}
}
