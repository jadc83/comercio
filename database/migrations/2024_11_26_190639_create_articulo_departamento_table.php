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
        Schema::create('articulo_departamento', function (Blueprint $table) {
            $table->foreignId('departamento_id')->constrained();
            $table->foreignId('articulo_id')->constrained();
            $table->primary(['departamento_id', 'articulo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulo_departamento');
    }
};
