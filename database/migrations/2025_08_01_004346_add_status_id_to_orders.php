<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'status_id')) {
                $table->bigInteger('status_id')->unsigned()->nullable();

                $table->foreign('status_id')
                    ->references('id')
                    ->on('statuses')
                    ->onDelete('set null');
            }
        });

        // Отримуємо тільки id першого статусу
        $firstStatusId = \App\Models\Status::first()?->id;

        if ($firstStatusId) {
            DB::table('orders')->update(['status_id' => $firstStatusId]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
            $table->dropColumn('status_id');
        });
    }
};
