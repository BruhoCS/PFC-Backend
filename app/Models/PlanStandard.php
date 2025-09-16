<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanStandard extends Model
{
    use HasFactory;

    protected $table = 'plan_standard';
    public function plan(){
        return $this->belongsTo(PlanStandard::class,'id','id_plan');
    }
}
