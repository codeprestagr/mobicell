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
        Schema::create('erps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('api_key');
            $table->string('database');
            $table->string('username');
            $table->string('password');
            $table->string('url');
            $table->boolean('is_main')->default(false)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erps');
    }
};
