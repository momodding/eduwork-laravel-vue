<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $transaction = new transaction;

            $transaction->member_id = rand(1, 20);
            $transaction->date_start = $faker->date;
            $transaction->date_end = $faker->date;


            $transaction->save();
        }
    }
}
