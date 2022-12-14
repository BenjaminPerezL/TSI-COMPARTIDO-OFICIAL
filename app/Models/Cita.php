<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "citas";

    public function citas()
    {
        return $this->hasMany('App\Models\Cita');
    }
}

    
