<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToNerdsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nerds', function(Blueprint $table)
		{
			//
            $table->string('slug', 250)->after('nerd_level');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nerds', function(Blueprint $table)
		{
			//
            $table->dropColumn('slug');
        });
	}

}
