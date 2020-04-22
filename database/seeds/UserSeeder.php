<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Super Admin',
            'username' => 'superadmin',
            'password' => Hash::make('superadmin'),
            'id_outlet' => null,
            'role' => 'super_admin',
        ]);
    }
}