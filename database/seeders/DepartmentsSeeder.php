<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'departmentName' => 'Free',
        ]);
        //needs to be removed after development
        for ($x = 0; $x <= 5; $x++) {
            DB::table('departments')->insert([
                'departmentName' => Str::random(4),
            ]);
        }
    }
}
