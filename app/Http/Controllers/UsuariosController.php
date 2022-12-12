<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function __construct() {
        //verifica que se inicie sesion antes de construir
        $this->middleware('auth')->except(['login']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(Request $request)
    {
    //     dd($request->only('email', 'password'));
    // }



        $credenciales = $request->only('email','password');
        

        //PAGINA DE HASH DE PASSWORD, EL PASSWORD EN BD SE METE HASHEADO, Y 
        //EN LOGIN SE ENTRA NORMAL
        //https://bcrypt.online/

        //attempt recibe arrays, y request only crea array
        if(Auth::attempt($credenciales)){
            //creden correctas
            $usuario = Usuario::where('email',$request->email)->first();
            $usuario ->registrarUltimoLogin();
            return redirect()->route('home.index');



        }else{
            //creden incorrectas
            return back()->withErrors('Credenciales incorrectas');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home.login');
    }
}
