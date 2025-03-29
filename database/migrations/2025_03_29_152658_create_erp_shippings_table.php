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
        Schema::create('erp_shippings', function (Blueprint $table) {
            $table->foreignId('erp_id')->constrained('erps')->onDelete('cascade');
            $table->foreignId('shipping_id')->constrained('shippings')->onDelete('cascade');
            $table->timestamps();
            // Unique constraint για να αποτρέψουμε διπλές εγγραφές
            $table->unique(['erp_id', 'shipping_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erp_shippings');
    }
};
