<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('boardings_features', function (Blueprint $table) {
            $table->id();
            $table->string('color')->nullable();
            $table->float('length',20,2)->nullable();
            $table->float('width',20,2)->nullable();
            $table->float('max_weight',20,2)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('boardings_features');
    }
    
};
