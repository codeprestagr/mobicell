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
            $table->integer('id_prestashop')->unsigned();
            $table->string('name')->nullable();
            $table->string('sku')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string('ean')->nullable();
            $table->string('mpn')->nullable();
            $table->decimal('price', 10,2)->default(0)->nullable();
            $table->decimal('discount', 10, 2)->default(0)->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_title')->nullable();
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
