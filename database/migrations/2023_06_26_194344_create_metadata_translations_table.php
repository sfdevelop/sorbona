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
        Schema::create('metadata_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('metadata_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title_seo')->nullable();
            $table->string('description_seo')->nullable();

            $table->unique(['metadata_id', 'locale']);
            $table->foreign('metadata_id')->references('id')->on('metadata')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metadata_translations');
    }
};
