<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(ActionsSeeder::class);

        //↓↓↓ need to be cleaned up (delete random generation) ↓↓↓
        $this->call(DepartmentsSeeder::class);
        $this->call(ShiftsSeeder::class);

        //↓↓↓ need to be removed (just for testing) ↓↓↓
        $this->call(PersonnelSeeder::class);
        $this->call(LogsSeeder::class);
    }
}
