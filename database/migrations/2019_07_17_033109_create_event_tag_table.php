<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
        DB::table('event_tag')->insert(array(
            'event_id' => 1,
            'tag_id' => 3,
        ));
        DB::table('event_tag')->insert(array(
            'event_id' => 1,
            'tag_id' => 13,
        ));
        DB::table('event_tag')->insert(array(
            'event_id' => 2,
            'tag_id' => 13,
        ));
        DB::table('event_tag')->insert(array(
            'event_id' => 2,
            'tag_id' => 3,
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_tag');
    }
}
