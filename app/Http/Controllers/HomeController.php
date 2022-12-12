<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//cada controller debe tener su propio directorio en vistas
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    //verifica que se inicie sesion antes de construir
    {
        $this->middleware('auth')->except(['login']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
        //retorna vista en directorio home, llamda index
    }
    public function login(){
        return view('home.login');
    }
}



