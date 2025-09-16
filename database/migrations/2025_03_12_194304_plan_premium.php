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
        Schema::create("plan_premium",function(Blueprint $table){
            $table->unsignedBigInteger("id_plan");
            $table->timestamps();
            //Campos de la tabla
            $table->string("descuento",100)->default("20%");
            $table->string("ventaja_extra",100)->default("Deportes gratis");
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
        Schema::dropIfExists('plan_premium');
    }
};
