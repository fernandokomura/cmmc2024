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
        Schema::create('equipamento_tipo_campos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nome');
            $table->foreignUuid('equipamento_tipo_id')->nullable()->constrained('equipamento_tipos')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamento_tipo_campos');
    }
};
