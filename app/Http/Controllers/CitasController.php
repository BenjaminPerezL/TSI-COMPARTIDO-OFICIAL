<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Servicio;
class CitasController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        $citas = Cita::all() ;
        $clientes = Cliente::all();
        $servicios = Servicio::all();
        return view('citas.index')->with(compact("citas"))->with(compact("clientes"))->with(compact("servicios"));
    
    }
    
    public function store(Request $request){
        $cita = new Cita();
        $cita->rut_cliente = $request->rut_cliente;
        $cita->tipo_servicio = $request->tipo_servicio;
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->descripcion = $request->descripcion;
        $cita->estado = $request->estado;
        $cita->save();
        return redirect()->route('citas.index');
    }
    public function destroy(Cita $cita){
        $cita->delete();
        return redirect()->route('citas.index');
    }
    public function edit(Cita $cita){
        return view("citas.edit",compact("cita"));
    }
    public function update(Cita $cita,Request $request){
        $cita->rut_cliente = $request->rut_cliente;
        $cita->tipo_servicio = $request->tipo_servicio;
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->descripcion = $request->descripcion;
        $cita->estado = $request->estado;
        $cita->save();
        return redirect()->route('citas.index');
    }

}
