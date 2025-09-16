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
        Schema::create("entreno", function (Blueprint $table) {
            $table->unsignedBigInteger("id_user");
            //Campos de la tabla
            $table->id();
            $table->enum("dia", ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"]);
            $table->enum("grupo_muscular", ["Tren Superior", "Tren Inferior", "Core"]);
            $table->string("ejercicio", 100);
            $table->string("repeticiones", 10);
            $table->enum("tipo", ["Fuerza", "Resistencia", "Velocidad", "Potencia"]);
            $table->string("duracion", 100);
            $table->string("descanso", 100);
            $table->timestamps();
            //Foránea 
            $table->foreign("id_user")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreno');
    }
};
