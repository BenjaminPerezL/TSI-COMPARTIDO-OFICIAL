<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct() {
        //verifica que se inicie sesion antes de construir
        $this->middleware('auth');
    }

    public function index(){
        $clientes = Cliente::all() ;
        return view('test.index')->with(compact("clientes"));
    }

    




}
