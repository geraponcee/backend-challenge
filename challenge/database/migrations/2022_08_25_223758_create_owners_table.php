<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('dni', 8)->nullable(false)->unique();
            $table->string('first_name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->date('birth')->nullable(false);
            $table->string('mail')->nullable(false)->unique();
            $table->string('phone_number')->nullable(false);
            $table->string('image')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('owners');
    }
    
};
