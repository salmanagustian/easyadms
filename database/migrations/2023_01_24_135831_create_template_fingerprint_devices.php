<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateFingerprintDevices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_fingerprint_devices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('device_id');
            $table->string('pin',30);
            $table->integer('fid');
            $table->integer('size');
            $table->tinyInteger('valid');
            $table->text('tmp')->nullable();
            $table->timestamps();
            $table->foreign('device_id')->on('devices')->references('id');
            $table->unique(['pin','fid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_fingerprint_devices');
    }
}
