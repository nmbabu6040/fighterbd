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
        Schema::create('hero_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('subtitle')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image');
            $table->string('button_text_1')->nullable();
            $table->string('button_link_1')->nullable();
            $table->string('button_text_2')->nullable();
            $table->string('button_link_2')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sliders');
    }
};
