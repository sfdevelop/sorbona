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
        Schema::create('nova_pochta_detachment_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Змінюємо тип на integer, щоб відповідав типу id в nova_pochta_detachments
            $table->integer('nova_pochta_detachment_id')->unsigned();
            $table->string('locale')->index();

            $table->string('region')->nullable();
            $table->longText('city')->nullable();
            $table->longText('address')->nullable();

            // Використовуємо коротшу назву для унікального індексу
            $table->unique(['nova_pochta_detachment_id', 'locale'], 'np_detach_trans_unique');
            // Використовуємо коротшу назву для зовнішнього ключа
            $table->foreign('nova_pochta_detachment_id', 'np_detach_trans_foreign')
                ->references('id')
                ->on('nova_pochta_detachments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nova_pochta_detachment_translations');
    }
};
