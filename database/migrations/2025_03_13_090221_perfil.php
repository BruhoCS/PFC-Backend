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
        Schema::create('perfil', function (Blueprint $table) {
            $table->unsignedBigInteger("id_user");
            //Campos
            $table->id();
            $table->string('apellido',150);
            $table->string('telefono',100)->unique();
            $table->string('direccion',200);
            $table->string("hobby",100);
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
        Schema::dropIfExists('perfil');
    }
};
