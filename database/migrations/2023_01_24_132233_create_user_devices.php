<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // USER PIN=5519	Name=Setiasih	Pri=0	Passwd=	Card=	Grp=1	TZ=0000000100000000	Verify=0	ViceCard=	StartDatetime=0	EndDatetime=0
    public function up()
    {
        Schema::create('user_devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('device_id');
            $table->string('pin',30);
            $table->string('name');
            $table->string('pri');
            $table->string('passwd');
            $table->string('card');
            $table->string('grp', 10);
            $table->string('tz');
            $table->tinyInteger('verify');
            $table->string('vice_card');
            $table->datetime('start_datetime')->nullable();
            $table->datetime('end_datetime')->nullable();
            $table->timestamps();
            $table->foreign('device_id')->on('devices')->references('id');
            $table->unique(['device_id', 'pin']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_devices');
    }
}
