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
            $table->string('name',64);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('variant_id');
            $table->integer('qty');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('variant_id')->references('id')->on('variants');
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
