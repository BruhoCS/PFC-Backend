<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfil';
    protected $fillable = [
        'apellido',
        'telefono',
        'direccion',
        'id_user',
        'hobby'
    ];
    public function usuario(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}
