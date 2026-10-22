<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('receta_ingredientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('receta_id')->constrained('recetas')->cascadeOnDelete();
            $table->foreignId('ingrediente_id')->constrained('ingredientes')->restrictOnDelete();
            $table->decimal('cantidad', 8, 2);
            $table->string('unidad_medida', 30);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('receta_ingredientes');
    }
};
