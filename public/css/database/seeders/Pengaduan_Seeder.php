<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Pengaduan_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 100; $i++) { 
            \DB::table('complains')->insert([
                'name'=>$faker->name,
                'complain'=>$faker->text(25),
                'phone'=>$faker->phoneNumber,
                'unit'=>$faker->text(10),
                'address'=>$faker->address,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s')
            ]);
        }
    }
}
