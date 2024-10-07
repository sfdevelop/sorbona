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
        Schema::create('why_choose_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('why_choose_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->longText('description')->nullable();

            $table->unique(['why_choose_id', 'locale']);
            $table->foreign('why_choose_id')
                ->references('id')
                ->on('why_chooses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('why_choose_translations');
    }
};
