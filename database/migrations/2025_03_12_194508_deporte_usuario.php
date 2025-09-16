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
        Schema::create('deporte_users', function (Blueprint $table) {
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("deporte_id");
            $table->timestamps();

            //Claves foráneas
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("deporte_id")->references("id")->on("deporte")->onDelete("cascade");

            //Clave primaria
            $table->primary(["user_id","deporte_id"]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deporte_users');
    }
};
