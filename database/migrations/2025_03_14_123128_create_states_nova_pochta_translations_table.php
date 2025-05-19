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
        Schema::create('states_nova_pochta_translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Змінюємо тип на bigInteger, щоб відповідав типу id в states_nova_pochtas
            $table->bigInteger('states_nova_pochta_id')->unsigned();
            $table->string('locale')->index();

            $table->string('region')->nullable();
            $table->longText('city')->nullable();
            $table->longText('address')->nullable();

            // Використовуємо коротшу назву для унікального індексу
            $table->unique(['states_nova_pochta_id', 'locale'], 'np_state_trans_unique');
            // Використовуємо коротшу назву для зовнішнього ключа
            $table->foreign('states_nova_pochta_id', 'np_state_trans_foreign')
                ->references('id')
                ->on('states_nova_pochtas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states_nova_pochta_translations');
    }
};
