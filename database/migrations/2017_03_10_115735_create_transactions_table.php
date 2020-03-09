<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('type');
			$table->integer('status');
			$table->integer('user_id');
			$table->string('user_name');
			$table->string('user_email');
			$table->integer('user_phone');
			$table->decimal('amount');
			$table->string('payment');
			$table->string('payment_info');
			$table->integer('security');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}

}
