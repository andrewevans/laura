<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitleProjectDescriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('project_descriptions', function(Blueprint $table)
		{
			//
            $table->string('title', 250)->after('id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('project_descriptions', function(Blueprint $table)
		{
			//
            $table->dropColumn('title');
        });
	}

}
