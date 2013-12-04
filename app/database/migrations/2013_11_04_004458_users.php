<?php

use Illuminate\Database\Migrations\Migration;

class Users extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');

			$table->text('email')->unique();

			$table->text('password');

			$table->text('name');

			$table->timestamps();
		});

		$user = new Application\Repositories\User;
		$user->name = 'Antonio Carlos Ribeiro';
		$user->email = 'acr@antoniocarlosribeiro.com';
		$user->password = '$2y$08$d92Fxk55YWRnTGpQ5GNdGuBDgBnyO.l6T1wM1L6Cfe.DoA9EZxAe.';
		$user->save();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('users');
	}

}