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
        Schema::create('nova_pochta_depots', function (Blueprint $table) {
            $table->id();
            $table->string('ref');
            $table->string('city_ref');
            $table->integer('depot_number');
            $table->boolean('is_pochtomat');
            $table->string('name_ru');
            $table->string('name_uk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nova_pochta_depots');
    }
};
