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
        Schema::create('film_management', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('movieTitle')->nullable();
            $table->string('director')->nullable();
            $table->string('description')->nullable();
            $table->string('content')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('genre')->comment('1: Action - 2: Romance - 3: Horor - 4: Comedy');
            $table->tinyInteger('status')->comment('1: visible - 2: hidden');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_management');
    }
};
