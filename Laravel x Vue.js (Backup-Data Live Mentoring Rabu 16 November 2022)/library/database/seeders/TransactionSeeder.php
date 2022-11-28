<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=0; $i < 20; $i++) {
            $transaction = new Transaction;

            $transaction->member_id = rand(1,20);
            $transaction->date_start = $faker->date('Y_m_d');
            $transaction->date_end = $faker->date('Y_m_d');
            $transaction->duration = differentDateInDays($date_end-$date_start);
            $transaction->qty = rand(10,20);
            $transaction->price = rand(10000,20000);
            $transaction->status = $faker->randomElement($array = array ('Borrowed','Returned'));

            $transaction->save();
        }
    }

    public function differentDateInDays($date_start, $date_end)
    {
        $diff = strtotime($date_end) - strtotime($date_start);
        return abs(round($diff / 86400));
    }
}
