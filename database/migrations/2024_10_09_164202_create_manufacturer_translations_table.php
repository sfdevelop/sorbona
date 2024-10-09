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
        Schema::create('manufacturer_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('manufacturer_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->longText('description')->nullable();
            $table->longText('all_title')->nullable();
            $table->string('specialization')->nullable();
            $table->string('flat')->nullable();

            $table->unique(['manufacturer_id', 'locale']);
            $table->foreign('manufacturer_id')
                ->references('id')
                ->on('manufacturers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacturer_translations');
    }
};
