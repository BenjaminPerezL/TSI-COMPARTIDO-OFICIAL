<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Evento;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventosController extends Controller
{



    public function __construct() {
        //verifica que se inicie sesion antes de construir
        $this->middleware('auth');
    }


    public function index()
    {
        
        //return view('agenda.index');
    }

    public function store(Request $request){

        //validar
        request()->validate(Evento::$rules);

        //crea con todos los datos llegados
        $evento = Evento::create($request->all());

        
    }

    public function show(Evento $evento){

        //accedemos a registro y devolvemos en formato json
        $evento = Evento::all();
        return response()->json($evento);
        
    }

    public function edit($id){

        $evento = Evento::find($id);
        
        //se cambia formato de fecha y hora a solo fecha
        //$evento->start = Carbon::createFromFormat('Y-m-d H:i:s',$evento->start)->format('Y-m-d');
        //$evento->end = Carbon::createFromFormat('Y-m-d H:i:s',$evento->end)->format('Y-m-d');
        
        return response()->json($evento);
        
    }

    public function destroy($id){

        $evento = Evento::find($id)->delete();

        return response()->json($evento);
        
    }

    public function update(Request $request, Evento $evento){

        request()->validate(Evento::$rules);    //validamos
        $evento->update($request->all());       //update
        return response()->json($evento);       //devolvemos datos
        
    }
}
