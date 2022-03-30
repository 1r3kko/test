<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Create 50 product records
        for ($i = 0; $i < 20; $i++) {
            Category::create([
                'parent_id' => $faker->randomNumber(1),
                'name' => $faker->company
            ]);
        }
    }
}
