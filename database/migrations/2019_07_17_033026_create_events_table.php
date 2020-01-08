<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('organizer_id');
            $table->string('ticket_type');
            $table->unsignedInteger('available_tickets');
            $table->boolean('show_available_tickets');
            $table->string('img_path')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('video_upload')->nullable();
            $table->string('powerpoint_upload')->nullable();
            $table->text('powerpoint_frame')->nullable();
            $table->boolean('approval')->default(0);
            $table->timestamps();
            $table->foreign('organizer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
        DB::table('events')->insert(array(
            'title' => 'Laravel Basics: Introduction to Laravel',
            'description' => 'A short intensive laravel workshop at Room 213 aimed to improve students\' project.This workshop is led by Software Development studies club. We aim to improve UIT. Students after attending this course will be able to fully utilze laravel tools and improve their Development processs.',
            'location_id' => 1,
            'organizer_id' => 3,
            'ticket_type' => 'Free',
            'available_tickets' => 80,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/laravel.png',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-06-12',
            'end_date' => '2019-06-12',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'The Internal Structure of an A12 bionic chipset',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 3,
            'organizer_id' => 9,
            'ticket_type' => 'Paid',
            'available_tickets' => 80,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/A12.jpg',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-3',
            'end_date' => '2019-08-3',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Industry 4.0',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 4,
            'organizer_id' => 5,
            'ticket_type' => 'Free',
            'available_tickets' => 80,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/industry4.jpg',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-7',
            'end_date' => '2019-08-7',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Cloud Computing 101',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 2,
            'organizer_id' => 6,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/cloud.png',
            'start_time' => '12:00:00',
            'end_time' => '14:00:00',
            'start_date' => '2019-08-10',
            'end_date' => '2019-08-10',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'How to start a successful start-up',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 4,
            'organizer_id' => 4,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/startup.png',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-14',
            'end_date' => '2019-08-14',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Ubuntu 19.04 Disco Dingo',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 1,
            'organizer_id' => 6,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/ubuntu.jpg',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-12',
            'end_date' => '2019-08-12',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Industry 4.0',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 4,
            'organizer_id' => 5,
            'ticket_type' => 'Free',
            'available_tickets' => 80,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/industry4.jpg',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-7',
            'end_date' => '2019-08-7',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Cloud Computing 101',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 2,
            'organizer_id' => 6,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/cloud.png',
            'start_time' => '12:00:00',
            'end_time' => '14:00:00',
            'start_date' => '2019-08-10',
            'end_date' => '2019-08-10',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Cloud Computing 101',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 2,
            'organizer_id' => 6,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/cloud.png',
            'start_time' => '12:00:00',
            'end_time' => '14:00:00',
            'start_date' => '2019-08-10',
            'end_date' => '2019-08-10',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'How to start a successful start-up',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 4,
            'organizer_id' => 4,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/startup.png',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-14',
            'end_date' => '2019-08-14',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Ubuntu 19.04 Disco Dingo',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 1,
            'organizer_id' => 6,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/ubuntu.jpg',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-12',
            'end_date' => '2019-08-12',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Industry 4.0',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 4,
            'organizer_id' => 5,
            'ticket_type' => 'Free',
            'available_tickets' => 80,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/industry4.jpg',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-7',
            'end_date' => '2019-08-7',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Cloud Computing 101',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 2,
            'organizer_id' => 6,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/cloud.png',
            'start_time' => '12:00:00',
            'end_time' => '14:00:00',
            'start_date' => '2019-08-10',
            'end_date' => '2019-08-10',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'How to start a successful start-up',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 4,
            'organizer_id' => 4,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/startup.png',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-14',
            'end_date' => '2019-08-14',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Ubuntu 19.04 Disco Dingo',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 1,
            'organizer_id' => 6,
            'ticket_type' => 'Free',
            'available_tickets' => 120,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/ubuntu.jpg',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-12',
            'end_date' => '2019-08-12',
            'approval' => 1
        ));
        DB::table('events')->insert(array(
            'title' => 'Industry 4.0',
            'description' => 'A whole new level of intelligence. The A12 Bionic, with our next-generation Neural Engine, delivers incredible performance. It uses real-time machine learning to transform the way you experience photos, gaming, augmented reality, and more. Apple-designed CPU. Two performance cores tackle heavy computational tasks. And four efficiency cores take on everyday tasks. Our newest performance controller dynamically divides work across these cores, harnessing all six when a power boost is needed. 2 performance cores Up to 15% faster than A11 Bionic 4 efficiency cores Up to 50% lower power usage than A11 Bionic',
            'location_id' => 4,
            'organizer_id' => 5,
            'ticket_type' => 'Free',
            'available_tickets' => 80,
            'show_available_tickets' => 1,
            'img_path' => 'uploads/events/industry4.jpg',
            'start_time' => '13:00:00',
            'end_time' => '16:00:00',
            'start_date' => '2019-08-7',
            'end_date' => '2019-08-7',
            'approval' => 1
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
