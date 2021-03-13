<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 10; $x++) {
            DB::table('Personnel')->insert([
                'name'   => Str::random(10),
                'departmentName' =>  Str::random(5),
                'cardNum' => rand(2093,999999),
                'shiftStart' => rand(1,9).':'.rand(0,60),
                'shiftEnd' => rand(10,24).':'.rand(0,60),
            ]);
        }
    }
}
