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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('currency_id')
                ->constrained()
                ->cascadeOnUpdate();

            $table->foreignId('manufacturer_id')
                ->constrained()
                ->cascadeOnUpdate();

            $table->string('slug')->unique();
            $table->string('sku');
            $table->unsignedFloat('price')->default(0);
            $table->integer('sale')->nullable();
            $table->unsignedFloat('priceTen')->nullable();
            $table->unsignedFloat('priceTwenty')->nullable();
            $table->integer('sort')->default(999);

            $table->boolean('is_public')->default(true);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_top')->default(false);
            $table->boolean('in_stock')->default(true);

            $table->timestamps();

            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
