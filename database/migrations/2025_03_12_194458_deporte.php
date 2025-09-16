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
        Schema::create("deporte", function (Blueprint $table) {
            $table->unsignedBigInteger("id_entrenador");
            //Campos de la tabla
            $table->id();
            $table->string("nombre", 100);
            $table->string("precio", 100);
            $table->enum("dia", ["Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo"]);
            $table->string("descripcion", 100);
            $table->enum("nivel", ["Experto","Intermedio","Novato"]);
            $table->string("duracion",100);
            $table->timestamps();
            //Foránea 
            $table->foreign("id_entrenador")->references("id")->on("entrenador")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deporte');
    }
};
