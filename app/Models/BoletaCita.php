<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BoletaCita extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "boletas_cita";

    public function boletas_cita(){
        return $this->hasMany('App\Models\BoletaCita');
    }

}
