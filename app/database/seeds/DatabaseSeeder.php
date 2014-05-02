<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        Cost::truncate();

		Eloquent::unguard();

        // $this->call('UserTableSeeder');
        $this->call('CostsTableSeeder');
	}

}
