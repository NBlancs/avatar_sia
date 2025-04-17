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
        Schema::create('smart_lights', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['On', 'Off']);
            $table->string('location');
            $table->integer('brightness')->default(100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smart_lights');
    }
};
