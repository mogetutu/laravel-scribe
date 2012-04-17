<?php

class Scribe_Create_Scribe_Content {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('scribe_content', function($table) {
			$table->increments('id');
			$table->string('nickname', 128);
			$table->string('name', 128);
			$table->text('content');
			$table->boolean('hidden');
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scribe_content');
	}

}
