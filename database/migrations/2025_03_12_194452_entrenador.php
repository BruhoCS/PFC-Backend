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
        Schema::create("entrenador", function (Blueprint $table) {
            //Campos de la tabla
            $table->id();
            $table->string("email", 100);
            $table->string("nombre", 100);
            $table->string("apellido", 100);
            $table->string("direccion", 150);
            $table->string("telefono", 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrenador');
    }
};
