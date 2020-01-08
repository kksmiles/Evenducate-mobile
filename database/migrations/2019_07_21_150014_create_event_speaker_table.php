<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventSpeakerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_speaker', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('speaker_id');
            $table->boolean('approval')->default(0);
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('speaker_id')->references('id')->on('users')->onDelete('cascade');
        });
        DB::table('event_speaker')->insert(array(
            'event_id' => 1,
            'speaker_id' => 3,
            'approval' => 0,
            'title' => '',
            'description' => ''
        ));
        DB::table('event_speaker')->insert(array(
            'event_id' => 1,
            'speaker_id' => 9,
            'approval' => 0,
            'title' => '',
            'description' => ''
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_speaker');
    }
}
