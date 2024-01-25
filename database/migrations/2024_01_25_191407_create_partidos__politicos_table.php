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
        Schema::create('partidos_politicos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('sigla')->unique();
            $table->string('nome')->nullable();
            $table->date('data_criacao');
            $table->date('data_extincao')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos_politicos');
    }
};
