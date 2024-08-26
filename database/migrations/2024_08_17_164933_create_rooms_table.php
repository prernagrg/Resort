<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
            $table->string('ac')->nullable();
            $table->string('wifi')->nullable();
            $table->string('teaCoffeeMaker')->nullable();
            $table->string('inRoomSafe')->nullable();
            $table->string('purifiedWater')->nullable();
            $table->string('workplace')->nullable();
            $table->string('tv')->nullable();
            $table->string('rainShower')->nullable();
            $table->string('wardrobe')->nullable();
            $table->string('miniBar')->nullable();
            $table->string('livingSpace')->nullable();
            $table->string('fruit')->nullable();
            $table->string('refrigerator')->nullable();
            $table->string('bathtub')->nullable();
            $table->string('hairDryer')->nullable();
            $table->string('iron')->nullable();
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
