<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
class ServiciosController extends Controller
{
    public function __construct() {
        //verifica que se inicie sesion antes de construir
        $this->middleware('auth');
    }

    public function index(){
        $servicios = Servicio::all() ;
        return view('servicios.index',compact("servicios"));
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'tipo_servicio'=> 'required',
            'valor_estandar'=> 'required',
            'duracion_estandar'=> 'required',
            
        ]);

        $servicio = new Servicio();
        $servicio->tipo_servicio = $request->tipo_servicio;
        $servicio->valor_estandar = $request->valor_estandar;
        $servicio->duracion_estandar = $request->duracion_estandar;
        $servicio->timestamps =$request->timestamps;
        $servicio->save();
        return redirect()->route('servicios.index');

        
    }

    public function destroy(Servicio $servicio){
        //dd($cliente->nombre);
        $servicio->delete();
        return redirect()->route('servicios.index');
    }
    public function edit(Servicio $servicio){
        return view("servicios.edit",compact("servicio"));
    }
    public function update(Servicio $servicio,Request $request){
        $this->validate($request,[
            'tipo_servicio'=> 'required',
            'valor_estandar'=> 'required',
            'duracion_estandar'=> 'required',
            
        ]);

        $servicio->tipo_servicio = $request->tipo_servicio;
        $servicio->valor_estandar = $request->valor_estandar;
        $servicio->duracion_estandar = $request->duracion_estandar;
        $servicio->timestamps= $request->timestamps;
        $servicio->save();
        return redirect()->route('servicios.index');
    }
}
