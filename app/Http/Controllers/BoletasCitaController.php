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
        $eventos = Evento::all();
        return view('boletas.index')->with(compact("boletas_cita"))->with(compact('servicios'))->with(compact('eventos'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'id_cita'=> 'required',
            'cantidad_pagada'=> 'required',
            'descripcion'=> 'required',
            'tipo_de_pago'=> 'required',
            
        ]);
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
        $servicios = Servicio::all();
        $eventos = Evento::all();
        return view('boletas.edit')->with(compact("boleta_cita"))->with(compact('servicios'))->with(compact('eventos'));
    }
    public function update(BoletaCita $boleta_cita,Request $request){
        $this->validate($request,[
            'id_cita'=> 'required',
            'cantidad_pagada'=> 'required',
            'descripcion'=> 'required',
            'tipo_de_pago'=> 'required',
            
        ]);
        $boleta_cita->id_cita = $request->id_cita;
        $boleta_cita->cantidad_pagada = $request->cantidad_pagada;
        $boleta_cita->descripcion = $request-> descripcion;
        $boleta_cita->tipo_de_pago = $request-> tipo_de_pago;
        $boleta_cita->save();
        return redirect()->route('boletas.index');
    }

}
