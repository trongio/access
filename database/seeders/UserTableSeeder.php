<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'Username'    => 'admin',
            'password'   =>  Hash::make('admin'),
            'remember_token' =>  '0',
            'Created_at' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
