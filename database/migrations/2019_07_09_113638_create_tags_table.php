<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->timestamps();
        });

        DB::table('tags')->insert(array('name' => 'Charity & Causes'));
        DB::table('tags')->insert(array('name' => 'Community'));
        DB::table('tags')->insert(array('name' => 'Education'));
        DB::table('tags')->insert(array('name' => 'Fashion'));
        DB::table('tags')->insert(array('name' => 'Film & Media'));
        DB::table('tags')->insert(array('name' => 'Food & Drinks'));
        DB::table('tags')->insert(array('name' => 'Government'));
        DB::table('tags')->insert(array('name' => 'Health'));
        DB::table('tags')->insert(array('name' => 'Hobbies'));
        DB::table('tags')->insert(array('name' => 'Holidays'));
        DB::table('tags')->insert(array('name' => 'Home & Lifestyle'));
        DB::table('tags')->insert(array('name' => 'Music'));
        DB::table('tags')->insert(array('name' => 'Technology'));
        DB::table('tags')->insert(array('name' => 'Arts'));
        DB::table('tags')->insert(array('name' => 'Performance'));
        DB::table('tags')->insert(array('name' => 'School Activities'));
        DB::table('tags')->insert(array('name' => 'Science'));
        DB::table('tags')->insert(array('name' => 'Sports & Fitness'));
        DB::table('tags')->insert(array('name' => 'Travelling'));
        DB::table('tags')->insert(array('name' => 'Carnival'));
        DB::table('tags')->insert(array('name' => 'Conference'));
        DB::table('tags')->insert(array('name' => 'Convention'));
        DB::table('tags')->insert(array('name' => 'Networking'));
        DB::table('tags')->insert(array('name' => 'Race'));
        DB::table('tags')->insert(array('name' => 'Seminar'));
        DB::table('tags')->insert(array('name' => 'Workshop'));
        DB::table('tags')->insert(array('name' => 'Tournament'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
