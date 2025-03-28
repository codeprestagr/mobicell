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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('gemi_number')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('doi')->nullable();
            $table->string('address')->nullable();
            $table->string('company')->nullable();
            $table->string('business_activity')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('website')->nullable();
            $table->string('postcode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
