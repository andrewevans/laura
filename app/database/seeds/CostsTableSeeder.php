<?php

use Faker\Factory as Faker;

class CostsTableSeeder extends Seeder {

    public function run()
    {

        $faker = Faker::create();

        foreach (range(1,10) as $index) {

            Cost::create([
                'title' => $faker->sentence(3),
                'amount' => $faker->numberBetween(0,200),
                'description' => $faker->paragraph(20),

            ]);
        }
    }
}