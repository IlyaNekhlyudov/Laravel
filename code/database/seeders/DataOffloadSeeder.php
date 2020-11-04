<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Faker;

class DataOffloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ru_RU');

        for ($i = 0; $i < 10; $i++) {
            DB::table('data_offload')->insert([
                'name'        => $faker->name(),
                'phone_number'=> $faker->phoneNumber(),
                'email'       => $faker->email(),
                'message'     => $faker->realText(200),
            ]);
        }
    }
}
