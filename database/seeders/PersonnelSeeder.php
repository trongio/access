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
        for ($x = 0; $x <= 100; $x++) {
            DB::table('personnel')->insert([
                'personName'   => Str::random(6).' '.Str::random(10),
                'cardNum' => rand(2093,999999),
                'shiftID' =>  rand(1,5),
                'departmentID' =>  rand(1,5),
            ]);
        }
    }
}
