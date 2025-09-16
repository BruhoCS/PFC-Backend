<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;
    protected $table = 'entrenador';

    public function deporte(){
        return $this->belongsTo(Entrenador::class,'id','id_entrenador');
    }
}
