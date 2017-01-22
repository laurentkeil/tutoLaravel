<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

    public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 30)->unique();
			$table->string('email', 100)->unique();
			$table->string('password', 64);
			$table->boolean('admin')->default(false);
            $table->string('remember_token', 100)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}