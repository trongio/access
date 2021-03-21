<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShiftsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {DB::table('shifts')->insert([
            'shiftName' => 'Default',
            'shiftStart' => 9 . ':' . 0,
            'shiftEnd' => 18 . ':' . 0,
        ]);
        for ($x = 0; $x <= 5; $x++) {
            DB::table('shifts')->insert([
                'shiftName' => Str::random(5),
                'shiftStart' => rand(1, 9) . ':' . rand(0, 59),
                'shiftEnd' => rand(10, 24) . ':' . rand(0, 59),
            ]);
        }
    }
}
