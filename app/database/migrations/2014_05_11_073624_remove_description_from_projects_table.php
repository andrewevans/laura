<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDescriptionFromProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('projects', function(Blueprint $table)
		{
			//
            $table->dropColumn('description');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('projects', function(Blueprint $table)
		{
			//
            $table->string('description', 250);
        });
	}

}
