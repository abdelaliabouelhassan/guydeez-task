<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $faker = Factory::create();
        foreach (range(1, 15) as $index) {
            DB::table('countries')->insert([
                'name' => $faker->country,
            ]);
        }
        foreach (range(1, 20) as $index) {
            DB::table('cities')->insert([
                'name' => $faker->city,
                'country_id' => $faker->numberBetween(1, 15),
            ]);
        }
    }
}
