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
        Schema::create('parlamentares', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->string('nome_politico')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->boolean('suplente')->default(false);
            $table->string('formacao')->nullable();
            $table->string('nivel_intrucao')->nullable();
            $table->longText('biografia')->nullable();
            $table->foreignUuid('partido_id')->nullable()->constrained('partidos_politicos')->nullOnDelete();
            $table->boolean('ativo')->default(true);
            $table->foreignUuid('setor_id')->nullable()->constrained('setores')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parlamentares');
    }
};
