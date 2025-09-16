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
        Schema::create("plan_standard",function(Blueprint $table){
            $table->unsignedBigInteger("id_plan");
            $table->timestamps();
            //Campos de la tabla
            $table->string("costes_adicionales",100)->default("Sillones de masaje");
            $table->string("seguimiento_basico",100)->default("mensual");
            //Foránea 
            $table->foreign("id_plan")->references("id")->on("plan")->onDelete("cascade");

            //Clave primaria
            $table->primary("id_plan");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_standard');
    }
};
