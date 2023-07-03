<?php

namespace Database\Seeders;

use App\Models\Variant;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) { 
            $variant = new Variant;

            $variant->name = $faker->name;

            $variant->save();
        }
    }
}
