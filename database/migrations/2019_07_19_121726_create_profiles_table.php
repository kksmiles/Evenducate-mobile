<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->string('img_url')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
        DB::table('profiles')->insert(array(
            'user_id' => 1,
            'title' => 'admin',
            'description' => 'Super User',
            'website' => 'www.localevenk.com',
            'img_url' => 'uploads/profiles/user_default.png'
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 2,
            'title' => 'staff',
            'description' => 'Staff User',
            'website' => 'www.localevenk.com',
            'img_url' => 'uploads/profiles/user_default.png'
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 3,
            'title' => 'Kaung Khant',
            'description' => 'Student at University of Information Technology, Web Developer, Teacher at KK.edu',
            'website' => 'www.kaungkhant.com',
            'img_url' => 'uploads/profiles/kk.jpg'
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 4,
            'title' => 'Ni Pu',
            'description' => 'Student at University of Information Technology, Curious Mind',
            'website' => '',
            'img_url' => 'uploads/profiles/nipu.jpg'
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 5,
            'title' => 'UITSU',
            'description' => 'University of Information Technology Students\' Union',
            'website' => 'www.uit.edu.mm',
            'img_url' => 'uploads/profiles/UITSU.png'
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 6,
            'title' => 'YTU',
            'description' => 'Yangon Technological University Students\' Union',
            'website' => 'www.ytu.edu.mm',
            'img_url' => 'uploads/profiles/ytusu.jpg'
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 7,
            'title' => 'Shwe Thwin',
            'description' => 'Engineer',
            'website' => '',
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 8,
            'title' => 'Than Lwin',
            'description' => 'Business Man',
            'website' => '',
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 9,
            'title' => 'Thet Khine',
            'description' => 'Teacher, Full-stack Developer, Tech Geeks',
            'img_url' => 'uploads/profiles/thetkhine.jpg'
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 10,
            'title' => 'Ei Maung',
            'description' => 'Dad, Web Developer, Teacher, Founder at Fairway',
            'website' => 'www.eimaung.com',
            'img_url' => 'uploads/profiles/eimaung.jpg'
        ));
        DB::table('profiles')->insert(array(
            'user_id' => 11,
            'title' => 'Min Ko Ko',
            'description' => 'Cyber Security Expert, Founder at Creatigon',
            'website' => 'www.creatigon.com',
            'img_url' => 'uploads/profiles/minkoko.jpg'
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
