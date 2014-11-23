<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('customers', function($customerTable){
            $customerTable->increments('id');
            $customerTable->string('first_name');
            $customerTable->string('last_name');
            $customerTable->string('email')->unique();
            $customerTable->string('username', 100)->unique();
            $customerTable->string('password', 128);
            $customerTable->string('remember_token', 100);
            $customerTable->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('customers');
	}

}
