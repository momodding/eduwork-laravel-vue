<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i < 5; $i++) { 
            $member = new Member;

            $member->name = $faker->name;
            $member->gender = rand(1,2);
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();
        }
    }
}
