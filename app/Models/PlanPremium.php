<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanPremium extends Model
{
    use HasFactory;

    protected $table = 'plan_premium';
    public function plan(){
        return $this->belongsTo(PlanStandard::class,'id','id_plan');
    }
}
