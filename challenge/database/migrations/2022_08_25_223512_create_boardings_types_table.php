<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('boardings_types', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('boardings_types');
    }
    
};
