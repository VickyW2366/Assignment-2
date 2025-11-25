<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Statusseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert(['name' => 'Currently running', 'description' => 'This vehicle has a chance of being used during running days.', 'filename' => "u.png"]);
        DB::table('statuses')->insert(['name' => 'Maintenance needed', 'description' => 'This vehicle needs some light repairs before it can run again.', 'filename' => "pg.png"]);
        DB::table('statuses')->insert(['name' => 'In storage', 'description' => 'This vehicle is in storage, likely waiting for considerable repairs.', 'filename' => "12a.png"]);
        DB::table('statuses')->insert(['name' => 'On loan', 'description' => 'This vehicle is not currently at the museum, and is on loan for repairs or a special event.', 'filename' => "15.png"]);
        DB::table('statuses')->insert(['name' => 'Dilapidated', 'description' => 'This vehicle is not likely to ever be fully restored.', 'filename' => "18.png"]);
    }
}