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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('address');
            $table->string('location');
            $table->decimal('price_per_day', 8, 2);
            $table->boolean('availability')->default(true);
            $table->integer('number_of_rooms')->nullable();
            $table->integer('number_of_bathrooms')->nullable();
            $table->integer('number_of_bedrooms')->nullable();
            $table->integer('number_of_garage')->nullable();
            $table->boolean('AC')->nullable();
            $table->boolean('WIFI')->nullable();
            $table->boolean('pool')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
