<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreno extends Model
{
    use HasFactory;

    protected $table = 'entreno';
    protected $fillable = ["id_user", "dia", "grupo_muscular", "ejercicio", "repeticiones", "tipo", "duracion", "descanso"];
    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
