<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('boardings_ports_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('port_id')->nullable(false);
            $table->unsignedBigInteger('type_id')->nullable(false);

            $table->foreign('port_id')->references('id')->on('ports');
            $table->foreign('type_id')->references('id')->on('boardings_types');
        });
    }

    public function down()
    {
        Schema::dropIfExists('boardings_ports_types');
    }
    
};
