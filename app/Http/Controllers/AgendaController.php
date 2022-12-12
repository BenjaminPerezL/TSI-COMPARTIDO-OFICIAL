<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function __construct() {
        //verifica que se inicie sesion antes de construir
        $this->middleware('auth');
    }

    public function index(){
        $clientes = Cliente::all();
        $servicios = Servicio::all() ;
        return view('agenda.index')->with(compact("clientes"))
                                    ->with(compact("servicios"));
        //return view('agenda.index');
    }
}
