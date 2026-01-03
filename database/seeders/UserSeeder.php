<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(['name' => 'Anjelica Addams', 'email' => 'a.addams@yahoo.com', 'password' => Hash::make('pass!away'), 'role_id' => 1]);
        DB::table('users')->insert(['name' => 'Kristine Kochanski', 'email' => 'k38504@reddwarf.gov.uk', 'password' => Hash::make('Unf0rtunate_Compan1on_Dec3mber'), 'role_id' => 2]);
        DB::table('users')->insert(['name' => 'Cecil Palmer', 'email' => 'cgpalmer@nvcradio.com', 'password' => Hash::make('carlos53188'), 'role_id' => 1]);
        DB::table('users')->insert(['name' => 'Philomena Cunk', 'email' => 'pcunk@bbc.co.uk', 'password' => Hash::make('incorrect'), 'role_id' => 1]);
    }
}