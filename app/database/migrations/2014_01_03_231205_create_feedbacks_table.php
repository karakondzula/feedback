<?php

use Illuminate\Database\Migrations\Migration;

class CreateFeedbacksTable extends Migration {

	public function up()
	{
		// Create the `Feedbacks` table
		Schema::create('feedbacks', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('project_id')->unsigned();
			$table->integer('approved')->unsigned();	//0 - not answerd, 1 - approved, denied
			$table->string('visitor');
			$table->text('feedback');

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
		Schema::drop('feedbacks');
	}

}