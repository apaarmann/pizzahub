<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePizzas extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('pizzas', function($pizzaTable){
            $pizzaTable->increments('id');
            $pizzaTable->boolean('onions');
            $pizzaTable->boolean('mushrooms');
            $pizzaTable->boolean('capsicum');
            $pizzaTable->integer('customer_id');
            $pizzaTable->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('pizzas');
	}

}
