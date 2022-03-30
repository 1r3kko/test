<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
            Product::create([
                'category_id' => $faker->randomNumber(1),
                'name' => $faker->name,
                'description' => $faker->paragraph,
                'price' => $faker->randomNumber(2)
            ]);
        }
    }
}
