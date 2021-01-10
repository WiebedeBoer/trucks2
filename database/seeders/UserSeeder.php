<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1958molen
        DB::table('users')->insert([
            'name' => 'Jan',
            'email' => 'europesemolens@gmail.com',
            'password' => '$2y$10$KJzxBM8PKlO2KLTIap6Vb.2yBSfnxKOmTRTUpEPec9iRSXmfxPiOe'
        ]);  
        //1981molen     
        DB::table('users')->insert([
            'name' => 'Wiebe',
            'email' => 'wiebe81@gmail.com',
            'password' => '$2y$10$FGOHOB.UsEGAFPmyARNuiu6eJ.t4AVheokIje4XJSIRvDYLbopi9m'
        ]);
    }
}
