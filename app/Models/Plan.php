<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'plan';
    
    public function usuario(){
        return $this->belongsTo(Entrenador::class,'id_user','id');
    }

    public function planStandard(){
        return $this->hasOne(PlanStandard::class,'id_plan','id');
    }

    public function planPremium(){
        return $this->hasOne(PlanPremium::class,'id_plan','id');
    }
}
