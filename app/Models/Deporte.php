<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    use HasFactory;
    protected $table = 'deporte';
    protected $fillable=[
        "nombre","precio","dia","descripcion","nivel","duracion","id_entrenador" 
    ];

    public function usuarios(){
        return $this->belongsToMany(User::class,'deporte_users','deporte_id','user_id');
    }

    public function entrenador(){
        return $this->belongsTo(Entrenador::class,'id_entrenador','id');
    }
}
