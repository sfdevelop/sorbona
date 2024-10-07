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
        Schema::create('chose_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('chose_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->longText('description')->nullable();

            $table->unique(['chose_id', 'locale']);
            $table->foreign('chose_id')
                ->references('id')
                ->on('choses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chose_translations');
    }
};
