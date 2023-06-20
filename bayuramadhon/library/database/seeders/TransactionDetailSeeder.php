<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\factory as Faker;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            $transactiondetail = new transactiondetail;

            $transactiondetail->transaction_id = rand(1, 20);
            $transactiondetail->book_id = rand(1, 20);
            $transactiondetail->qty = rand(10, 20);


            $transactiondetail->save();
        }
    }
}
