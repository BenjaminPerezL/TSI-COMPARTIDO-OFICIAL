<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
class ClientesController extends Controller
{
    public function __construct() {
        //verifica que se inicie sesion antes de construir
        $this->middleware('auth');
    }
    public function index(){
        $clientes = Cliente::all() ;
        return view('clientes.index',compact("clientes"));
    }
    public function store(Request $request){
        $this->validate($request,[
            'rut'=> 'required|unique:clientes',
            'nombre'=> 'required',
            'mail'=> 'required',
            
        ]);
        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->rut = $request->rut;
        $cliente->mail = $request->mail;
        $cliente->save();
        return redirect()->route('clientes.index');
    }
    public function destroy(Cliente $cliente){
        //dd($cliente->nombre);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
    public function edit(Cliente $cliente){
        return view("clientes.edit",compact("cliente"));
    }
    public function update(Cliente $cliente,Request $request){
        $this->validate($request,[
            'rut'=> 'required',
            'nombre'=> 'required',
            'mail'=> 'required',
            
        ]);
        
        $cliente->nombre = $request->nombre;
        $cliente->rut = $request->rut;
        $cliente->mail = $request->mail;
        $cliente->save();
        return redirect()->route('clientes.index');
    }
}