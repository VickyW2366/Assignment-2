<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('buses')->insert(['chassis' => 'Karrier W4', 'entered_service' => 1945, 'withdrawn' => 1972, 'numberplate' => 'DKY 706', 'origin' => 'Bradford', 'status_id' => 1]);
        DB::table('buses')->insert(['chassis' => 'British United Traction 9611T', 'entered_service' => 1949, 'withdrawn' => 1970, 'numberplate' => 'EKU 743', 'origin' => 'Bradford', 'status_id' => 3]);
        DB::table('buses')->insert(['chassis' => 'Karrier MS2', 'entered_service' => 1947, 'withdrawn' => 1964, 'numberplate' => 'CVH 741', 'origin' => 'Huddersfield', 'status_id' => 1]);
        DB::table('buses')->insert(['chassis' => 'General Motors HR150G', 'entered_service' => 1981, 'withdrawn' => 2009, 'numberplate' => 'Unregistered', 'origin' => 'Edmonton', 'status_id' => 3]);
        DB::table('buses')->insert(['chassis' => 'British United Traction 9641T', 'entered_service' => 1948, 'withdrawn' => 1961, 'numberplate' => 'HYM 812', 'origin' => 'London', 'status_id' => 1]);
        DB::table('buses')->insert(['chassis' => 'British United Traction 9641T', 'entered_service' => 1957, 'withdrawn' => 1968, 'numberplate' => 'KVH 219', 'origin' => 'Huddersfield', 'status_id' => 1]);
        DB::table('buses')->insert(['chassis' => 'British United Traction 9641T', 'entered_service' => 1948, 'withdrawn' => 1974, 'numberplate' => 'Unregistered', 'origin' => 'Johannesburg', 'status_id' => 3]);
        DB::table('buses')->insert(['chassis' => 'British United Traction 9613T', 'entered_service' => 1958, 'withdrawn' => 1967, 'numberplate' => 'FYS 839', 'origin' => 'Glasgow', 'status_id' => 2]);
        DB::table('buses')->insert(['chassis' => 'Vetra VBH85', 'entered_service' => 1964, 'withdrawn' => 1999, 'numberplate' => '7830 LG 69', 'origin' => 'Lyon', 'status_id' => 5]);
        DB::table('buses')->insert(['chassis' => 'British United Traction RETB1', 'entered_service' => 1964, 'withdrawn' => 1986, 'numberplate' => 'EV 6757', 'origin' => 'Wellington', 'status_id' => 2]);
        DB::table('buses')->insert(['chassis' => 'AEC 664T', 'entered_service' => 1942, 'withdrawn' => 1962, 'numberplate' => 'CKG 193', 'origin' => 'Cardiff', 'status_id' => 1]);
        DB::table('buses')->insert(['chassis' => 'Sunbeam W4', 'entered_service' => 1944, 'withdrawn' => 1964, 'numberplate' => 'RC 8472', 'origin' => 'Derby', 'status_id' => 3]);
        DB::table('buses')->insert(['chassis' => 'Karrier W4', 'entered_service' => 1945, 'withdrawn' => 1963, 'numberplate' => 'CDT 636', 'origin' => 'Doncaster', 'status_id' => 1]);
        DB::table('buses')->insert(['chassis' => 'Sunbeam W4', 'entered_service' => 1945, 'withdrawn' => 1964, 'numberplate' => 'RC 8575', 'origin' => 'Derby', 'status_id' => 3]);
        DB::table('buses')->insert(['chassis' => 'Fabrique Nationale', 'entered_service' => 1932, 'withdrawn' => 1964, 'numberplate' => '1425P', 'origin' => 'Liege', 'status_id' => 2]);
        DB::table('buses')->insert(['chassis' => 'AEC 661T', 'entered_service' => 1939, 'withdrawn' => 1961, 'numberplate' => 'ARD 676', 'origin' => 'Reading', 'status_id' => 1]);
        DB::table('buses')->insert(['chassis' => 'Daimler CTE6', 'entered_service' => 1950, 'withdrawn' => 1965, 'numberplate' => 'FET 618', 'origin' => 'Rotherham', 'status_id' => 4]);
        DB::table('buses')->insert(['chassis' => 'Garrett Type O', 'entered_service' => 1928, 'withdrawn' => 1945, 'numberplate' => 'WW 4688', 'origin' => 'Mexbrough & Swinton', 'status_id' => 5]);
        DB::table('buses')->insert(['chassis' => 'Renault ER100', 'entered_service' => 1980, 'withdrawn' => 2004, 'numberplate' => '8319 JD 13', 'origin' => 'Marseille', 'status_id' => 3]);
        DB::table('buses')->insert(['chassis' => 'Karrier E6', 'entered_service' => 1938, 'withdrawn' => 1953, 'numberplate' => 'AVH 470', 'origin' => 'Huddersfield', 'status_id' => 5]);
    }
}