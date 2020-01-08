<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->time('open_time');
            $table->time('close_time');
            $table->string('days');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->float('lat', 10, 7);
            $table->float('lng', 10, 7);
            $table->string('place_name')->nullable();
            $table->string('place_address')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
        DB::table('locations')->insert(array(
            'owner_id' => 5,
            'name' => 'University of Information Technology',
            'description' => 'University of Information Technology (Former Bahan Computer COE)
                            is a university teaching computer science and technologies,
                            powering students with dreams. Many TechTalks have been held here.',
            'open_time' => '08:30:00',
            'close_time' => '16:00:00',
            'days' => 'Mon, Tue, Wed, Thu, Fri',
            'address' => 'Parami Road, Universities\' Hlaing Campus, Ward (12), Hlaing Township',
            'city' => 'Yangon',
            'state' => 'Yangon',
            'country' => 'Myanmar',
            'phone' => ' 01 966 4709',
            'lat' => 16.8558730,
            'lng' => 96.1352775,
            'place_name' => 'University Of Information Technology',
            'place_address' => 'Yangon Mayangon Twp Yangon Region',
            'img_path' => 'uploads/locations/uit.jpeg',
        ));
        DB::table('locations')->insert(array(
            'owner_id' => 6,
            'name' => 'Yangon Technological University',
            'description' => 'The community of YTU students!  Also the biggest and the most active social network group of YTU.  Feel free to ask and share information',
            'open_time' => '08:30:00',
            'close_time' => '16:00:00',
            'days' => 'Mon, Tue, Wed, Thu, Fri',
            'address' => 'Insein Road, Gyokone, Insein',
            'city' => 'Yangon',
            'state' => 'Yangon',
            'country' => 'Myanmar',
            'phone' => ' 01 966 4709',
            'lat' => 16.8757128,
            'lng' => 96.1169848,
            'place_name' => 'Yangon Technological University',
            'place_address' => 'Insein Rd Insein Yangon',
            'img_path' => 'uploads/locations/ytu.jpeg',
        ));
        DB::table('locations')->insert(array(
            'owner_id' => 7,
            'name' => 'MICT Park',
            'description' => 'Myanmar ICT Park, Host of plenty of events around yangon.',
            'open_time' => '08:30:00',
            'close_time' => '20:30:00',
            'days' => 'Sun, Mon, Tue, Wed, Thu, Fri, Sat',
            'address' => 'Myanmar ICT Park. Universities\' Hlaing Campus, Hlaing Township, Yangon.',
            'city' => 'Yangon',
            'state' => 'Yangon',
            'country' => 'Myanmar',
            'phone' => '01-652272',
            'lat' => 16.8496403,
            'lng' => 96.1292152,
            'place_name' => 'MICT Park Main Building',
            'place_address' => 'MICT Park Main Building Hlaing Twp Yangon',
            'img_path' => 'uploads/locations/mict.jpeg',
        ));
        DB::table('locations')->insert(array(
            'owner_id' => 8,
            'name' => 'Novotel Yangon Max',
            'description' => 'Indulge yourself in 5 star luxury 20 minutes\' drive from Yangon International Airport at Novotel Yangon Max. Contemporary design with Myanmar accent and modern accessories make your room a tranquil retreat. Cool off with a dip in the swimming pool. Watch the famous Shwedagon Pagoda from the pool deck while sipping a refreshing drinks at the Pool Bar. ',
            'open_time' => '08:30:00',
            'close_time' => '20:30:00',
            'days' => 'Sun, Mon, Tue, Wed, Thu, Fri, Sat',
            'address' => '459 Pyay Road, Kamayut Township',
            'city' => 'Yangon',
            'state' => 'Yangon',
            'country' => 'Myanmar',
            'phone' => '01 230 5858',
            'lat' => 16.8201200,
            'lng' => 96.1319570,
            'place_name' => 'Novotel Yangon Max',
            'place_address' => 'Yangon Kamayut Twp Yangon Region',
            'img_path' => 'uploads/locations/novotel.jpeg',
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
