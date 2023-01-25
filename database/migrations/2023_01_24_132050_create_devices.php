<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('serial_number', 40)->unique();
            $table->string('additional_info')->nullable();
            $table->integer('attlog_stamp')->nullable();
            $table->integer('operlog_stamp')->nullable();
            $table->integer('attphotolog_stamp')->nullable();
            $table->integer('error_delay')->nullable()->default(30);
            $table->integer('delay')->nullable()->default(30);
            $table->string('trans_times')->nullable()->default('00:00;14:05');
            $table->integer('trans_interval')->nullable()->default(1);
            $table->string('trans_flag')->nullable()->default('1111111100');
            $table->integer('timezone')->nullable()->default(7);
            $table->tinyInteger('realtime')->nullable()->default(1);
            $table->tinyInteger('encrypt')->nullable()->default(0);
            $table->string('server_version')->nullable();
            $table->string('table_name_stamp')->nullable();            
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
