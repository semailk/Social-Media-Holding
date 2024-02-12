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
            $table->string('title');
            $table->text('description');
            $table->double('price');
            $table->double('discountPercentage');
            $table->foreignId('brand_id')->references('id')->on('brands')->cascadeOnDelete();
            $table->double('rating');
            $table->integer('stock')->default(0);
            $table->foreignId('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->string('thumbnail')->nullable();
            $table->json('images');
            $table->timestamps();
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
