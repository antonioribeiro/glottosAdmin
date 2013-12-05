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
		$user->name = 'Admin';
		$user->email = 'admin';
		$user->password = Hash::make('admin');
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