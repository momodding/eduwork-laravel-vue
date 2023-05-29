<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $catalog = new Book;

            $catalog->isbn = $faker->randomNumber(9);
            $catalog->title = $faker->name;
            $catalog->year = rand(2010, 2021);

            $catalog->publisher_id = rand(1, 20);
            $catalog->author_id = rand(1, 20);
            $catalog->catalog_id = rand(1, 4);

            $catalog->qty = rand(10, 20);
            $catalog->price = rand(10000, 20000);

            $catalog->save();
        }
    }
}
