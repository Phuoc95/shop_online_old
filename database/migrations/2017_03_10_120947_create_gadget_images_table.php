<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGadgetImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gadget_images', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('image');
			$table->integer('gadget_id')->unsigned();
			$table->foreign('gadget_id')->references('id')->on('gadgets')->onDelete('cascade'); 
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
		Schema::drop('gadget_images');
	}

}
