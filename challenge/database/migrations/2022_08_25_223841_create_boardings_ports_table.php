<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('boardings_ports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('entry_time', $precision = 0)->nullable(false);
            $table->dateTime('expiry_time', $precision = 0)->nullable(false);
            $table->unsignedBigInteger('boarding_id')->nullable(false);
            $table->unsignedBigInteger('port_id')->nullable(false);

            $table->foreign('boarding_id')->references('id')->on('boardings');
            $table->foreign('port_id')->references('id')->on('ports');
        });
    }

    public function down()
    {
        Schema::dropIfExists('boardings_ports');
    }
    
};
