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
        Schema::create('map_projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->text('description');
            $table->string('sector');
            $table->text('condition')->nullable();
            $table->text('investment_opportunity')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('map_projects');
    }
};
