<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('ports', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('city')->nullable(false);
            $table->string('province')->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('latitude')->nullable(false);
            $table->string('longitude')->nullable(false);
            $table->string('image')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ports');
    }
    
};
