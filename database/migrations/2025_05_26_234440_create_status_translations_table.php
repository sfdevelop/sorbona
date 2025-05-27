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
        Schema::create('status_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('status_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');

            $table->unique(['status_id', 'locale']);
            $table->foreign('status_id')
                ->references('id')
                ->on('statuses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_translations');
    }
};
