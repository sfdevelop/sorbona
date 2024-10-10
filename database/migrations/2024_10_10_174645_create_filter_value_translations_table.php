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
        Schema::create('filter_value_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('filter_value_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');

            $table->unique(['filter_value_id', 'locale']);
            $table->foreign('filter_value_id')
                ->references('id')
                ->on('filter_values')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filter_value_translations');
    }
};
