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
        Schema::create('page_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('page_id')->unsigned();
            $table->string('locale')->index();

            $table->longText('titleSectionAboutUs')->nullable();

            $table->longText('titleDownAboutUs')->nullable();
            $table->longText('descriptionRememberAboutUs')->nullable();
            $table->longText('textFeedBackAboutUs')->nullable();

            $table->string('title');
            $table->longText('descriptionShort')->nullable();
            $table->longText('description')->nullable();
            $table->longText('notoriety')->nullable();
            $table->longText('assortment')->nullable();
            $table->longText('cooperate')->nullable();
            $table->longText('comfort')->nullable();

            $table->unique(['page_id', 'locale']);
            $table->foreign('page_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_translations');
    }
};
