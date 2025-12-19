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
        DB::table('statuses')->insert(['name' => 'Currently running', 'description' => 'This bus has no major faults and has been found safe to be used by the public, any bus with this status has a chance to be used during open days', 'filename' => "running.png"]);
        DB::table('statuses')->insert(['name' => 'Maintenance needed', 'description' => 'This bus needs some minor repairs like some fresh oil or water leakage, but soon this bus will be good to run on open days.', 'filename' => "maintenence.png"]);
        DB::table('statuses')->insert(['name' => 'In storage', 'description' => 'This bus needs some major restoration work done, and is waiting for its turn in the workshop. However it might be a year or more before this bus could be used during an open day.', 'filename' => "storage.png"]);
        DB::table('statuses')->insert(['name' => 'On loan', 'description' => 'This bus is temporarily being stored elsewhere whilst undergoing restoration work, or for a special event.', 'filename' => "loan.png"]);
        DB::table('statuses')->insert(['name' => 'Static', 'description' => 'This bus is not likely to ever be fully restored, and is only be able to be viewed as a static exhibit.', 'filename' => "static.png"]);
    }
}