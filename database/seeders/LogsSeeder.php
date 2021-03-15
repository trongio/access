<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 1000; $x++) {
            DB::table('logs')->insert([
                'personID'   => rand(1,100),
                'actionID' => rand(1,2),
                'time' => rand(9, 18) . ':' . rand(0, 59),
                'date' => "2021-01-25",
            ]);
        }
    }
}
