<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('subscription')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(array(
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 1,
        ));
        DB::table('users')->insert(array(
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 1,
        ));
        DB::table('users')->insert(array(
            'name' => 'Kaung Khant',
            'email' => 'kaungkhant@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 0,
        ));
        DB::table('users')->insert(array(
            'name' => 'Ni Pu',
            'email' => 'nilarmyint@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 0,
        ));
        DB::table('users')->insert(array(
            'name' => 'UIT SU',
            'email' => 'uitsu@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 0,
        ));
        DB::table('users')->insert(array(
            'name' => 'YTU SU',
            'email' => 'ytusu@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 0,
        ));
        DB::table('users')->insert(array(
            'name' => 'Shwe Thwin',
            'email' => 'shwethwin@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 0,
        ));
        DB::table('users')->insert(array(
            'name' => 'Than Lwin',
            'email' => 'thanlwin@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 0,
        ));
        DB::table('users')->insert(array(
            'name' => 'Thet Khine',
            'email' => 'thetkhine@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 0,
        ));
        DB::table('users')->insert(array(
            'name' => 'Ei Maung',
            'email' => 'eimaung@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 0,
        ));
        DB::table('users')->insert(array(
            'name' => 'Min Ko Ko',
            'email' => 'minkoko@gmail.com',
            'password' => bcrypt('password'),
            'subscription' => 0,
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
