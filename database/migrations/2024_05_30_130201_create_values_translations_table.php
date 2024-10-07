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
        Schema::create('values_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('values_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->longText('description')->nullable();

            $table->unique(['values_id', 'locale']);
            $table->foreign('values_id')
                ->references('id')
                ->on('values')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('values_translations');
    }
};
