<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignkeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //archives
		Schema::table('archives', function (Blueprint $table) {
            $table->foreign('category')->references('category_id')->on('archive_categories');	
        });       
        //hierarchy
		Schema::table('hierarchies', function (Blueprint $table) {
            $table->foreign('upper')->references('region_id')->on('regions');	
            $table->foreign('lower')->references('region_id')->on('regions');
        });      
        //regions
		Schema::table('regions', function (Blueprint $table) {
            $table->foreign('archive')->references('archive_id')->on('archives');
            $table->foreign('category')->references('category_id')->on('region_categories');	
        });
		//objects
		Schema::table('trucks', function (Blueprint $table) {
            $table->foreign('region')->references('region_id')->on('regions');	
            $table->foreign('category')->references('category_id')->on('categories');
        });
		//photos
		Schema::table('photos', function (Blueprint $table) {
            $table->foreign('truck')->references('truck_id')->on('trucks');	
        });
    }
}
