<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('device_id');
            $table->string('pin',30);
            $table->datetime('fingertime');
            $table->tinyInteger('status', false, true);
            $table->tinyInteger('verify', false, true);
            $table->smallInteger('work_code', false, true);
            $table->smallInteger('reserved', false, true);            
            $table->timestamps();
            $table->unique(['device_id', 'pin', 'fingertime'], 'uq_attendance_logs');
            $table->foreign('device_id')->on('devices')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_logs');
    }
}
