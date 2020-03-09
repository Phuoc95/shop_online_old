<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGadgetsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gadgets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('alias'); 
			$table->integer('price');
			$table->text('intro');
			$table->longtext('description');
			$table->string('image');
			$table->integer('status');	
			$table->integer('discount');
			$table->integer('discount_percent');
			$table->integer('buyed');	
			$table->integer('total');	
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
			$table->integer('gadgetcate_id')->unsigned();
			$table->foreign('gadgetcate_id')->references('id')->on('gadget_cates')->onDelete('cascade');
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
		Schema::drop('gadgets');
	}

}
