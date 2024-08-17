<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('roomtype');
            $table->longText('description');
            $table->string('image');
            $table->string('bedType');
            $table->string('capacity');
            $table->string('ac');
            $table->string('wifi');
            $table->string('tea/coffeeMaker');
            $table->string('inRoomSafe');
            $table->string('purifiedWater');
            $table->string('workplace');
            $table->string('tv');
            $table->string('rainShower');
            $table->string('wardrobe');
            $table->string('mineBar');
            $table->string('livingSpace');
            $table->string('Fruit');
            $table->string('refregerator');
            $table->string('bathtub');
            $table->string('hairDryer');
            $table->string('iron');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
