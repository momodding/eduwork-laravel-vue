<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) { 
            $product = new Product;

            $product->name = $faker->name;
            $product->category_id = rand(1,4);
            $product->variant_id = rand(1,4);
            $product->qty = rand(1,20);
            $product->price = rand(10000,20000);

            $product->save();
        }
    }
}
