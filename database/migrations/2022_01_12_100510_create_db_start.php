<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbStart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100);
            $table->string('manufacture_number');
            $table->text('metrology');
            $table->text('communication_setting');
            $table->unsignedBigInteger('id_sid1');
            $table->unsignedBigInteger('id_sid2');
            $table->unsignedBigInteger('id_ip1');
            $table->unsignedBigInteger('id_ip2');
            $table->unsignedBigInteger('id_installation_location');
            $table->text('software');
            $table->text('comments');
            $table->date('verification_date');
            $table->string('communication_status', 5);
            $table->string('name_of_adjuster', 100);
            $table->string('checklist', 100);
            $table->timestamps();
        });

        Schema::create('cheklists', function (Blueprint $table) {
            $table->id();
            $table->string('checklist');
            $table->timestamps();
        });

        Schema::create('sids', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sid');
            $table->unsignedBigInteger('id_number_port');
            $table->timestamps();
        });

        Schema::create('port_numbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('number_port');
            $table->unsignedBigInteger('id_converter');
            $table->timestamps();
        });

        Schema::create('converters', function (Blueprint $table) {
            $table->id();
            $table->string('type', 100);
            $table->unsignedBigInteger('id_ip');
            $table->unsignedBigInteger('id_installation_location');
            $table->text('comments');
            $table->timestamps();
        });

        Schema::create('ip', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 16);
            $table->string('mask', 16);
            $table->string('gateway', 16);
            $table->unsignedBigInteger('number_port_switch');
            $table->unsignedBigInteger('id_switch');
            $table->timestamps();
        });

        Schema::create('network_switch', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ip');
            $table->unsignedBigInteger('id_installation_location');
            $table->string('type', 100);
            $table->string('mark_switch', 100);
            $table->unsignedBigInteger('number_port_main_switch');
            $table->unsignedBigInteger('id_main_switch');
            $table->timestamps();
        });

        Schema::create('installation_location', function (Blueprint $table) {
            $table->id();
            $table->string('electrical_cabinet', 50);
            $table->text('comments');
            $table->unsignedBigInteger('id_room');
            $table->unsignedBigInteger('id_building');
            $table->unsignedBigInteger('id_manufacture');
            $table->timestamps();
        });

        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->string('room', 50);
            $table->timestamps();
        });

        Schema::create('building', function (Blueprint $table) {
            $table->id();
            $table->string('building', 100);
            $table->timestamps();
        });

        Schema::create('manufacture', function (Blueprint $table) {
            $table->id();
            $table->string('manufacture', 100);
            $table->timestamps();
        });

        Schema::create('software', function (Blueprint $table) {
            $table->id();
            $table->string('software', 50);
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project');
            $table->unsignedBigInteger('id_device');
            $table->timestamps();
        });

        Schema::create('free_ip', function (Blueprint $table) {
            $table->id();
            $table->string('ip', 16);
            $table->string('mask', 16);
            $table->string('gateway', 16);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('father_name', 100);
            $table->string('password', 200);
            $table->string('access', 50);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
}
