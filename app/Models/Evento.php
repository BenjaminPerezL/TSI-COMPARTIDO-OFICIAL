<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use HasFactory,SoftDeletes;

    static $rules=[
        'title'=>'required',
        'start'=>'required',
        'end'=>'required',
        'clientes'=>'required',
        'estado'=>'required',
<<<<<<< HEAD
=======
        'descripcion' =>'required',
>>>>>>> 15cfe488d1f9e29623847916f60a93ef6c45afde
    ];

    
    //ayuda a distinguir cuales son los datos con los q se trabajara
    protected $fillable=['title','descripcion','start','end','clientes','estado','deleted_at'];
}
