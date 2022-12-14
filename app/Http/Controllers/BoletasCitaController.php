<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BoletaCita;
use App\Models\Servicio;
use App\Models\Evento;
class BoletasCitaController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        $boletas_cita = BoletaCita::all() ;
        $servicios = Servicio::all();
        return view('boletas.index')->with(compact("boletas_cita"))->with(compact('servicios'));
    }
    public function store(Request $request){
        $boleta_cita = new BoletaCita();
        $boleta_cita->id_cita = $request->id_cita;
        $boleta_cita->cantidad_pagada = $request->cantidad_pagada;
        $boleta_cita->descripcion = $request-> descripcion;
        $boleta_cita->tipo_de_pago = $request-> tipo_de_pago;
        $boleta_cita->save();
        return redirect()->route('boletas.index');
    }
    public function destroy(BoletaCita $boleta_cita){
        $boleta_cita->delete();
        return redirect()->route('boletas.index');
    }
    public function edit(BoletaCita $boleta_cita){
        return view("boletas.edit",compact("boleta_cita"));
    }
    public function update(BoletaCita $boleta_cita,Request $request){
        
        $boleta_cita->id_cita = $request->id_cita;
        $boleta_cita->cantidad_pagada = $request->cantidad_pagada;
        $boleta_cita->descripcion = $request-> descripcion;
        $boleta_cita->tipo_de_pago = $request-> tipo_de_pago;
        $boleta_cita->save();
        return redirect()->route('boletas.index');
    }

}
