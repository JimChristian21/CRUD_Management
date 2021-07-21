<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator 1',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Client 1',
            'email' => 'client@mail.com',
            'password' => Hash::make('12345678'),
            'role_id' => 2,
        ]);
    }
}
