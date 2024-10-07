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
        Schema::create('slider_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('slider_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('description')->nullable();

            $table->unique(['slider_id', 'locale']);
            $table->foreign('slider_id')
                ->references('id')
                ->on('sliders')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slider_translations');
    }
};
