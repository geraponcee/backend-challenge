<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('boardings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('registration',10)->nullable(false)->unique();
            $table->string('name')->nullable(false);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('type_id')->nullable(false);
            $table->unsignedBigInteger('feature_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();

            $table->foreign('type_id')->references('id')->on('boardings_types');
            $table->foreign('feature_id')->references('id')->on('boardings_features')->onDelete('cascade');
            $table->foreign('owner_id')->references('id')->on('owners');
        });
    }

    public function down()
    {
        Schema::dropIfExists('boardings');
    }
    
};
