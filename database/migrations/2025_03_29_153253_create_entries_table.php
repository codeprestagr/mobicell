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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('sku');
            $table->decimal('price',10,2)->default(0);
            $table->decimal('wholesale_price',10,2)->default(0);
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->text('ean')->nullable();
            $table->string('mpn')->nullable();
            $table->string('id_categories')->nullable();
            $table->integer('id_prestashop')->default(0)->nullable();
            $table->boolean('copy_featured')->default(0)->nullable();
            $table->boolean('copy_description')->default(0)->nullable();
            $table->boolean('copy_description_short')->default(0)->nullable();
            $table->boolean('scrape')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
