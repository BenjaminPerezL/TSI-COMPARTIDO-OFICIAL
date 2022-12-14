<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\{EventosController,ServiciosController,ClientesController,AgendaController,UsuariosController,TestController,CitasController,BoletasCitaController};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
//va al controlador HomeController y ejecuta metodo 'index'

Route::get('/login', [HomeController::class, 'login'])->name('home.login');
//va al controlador HomeController y ejecuta la accion 'login'

Route::get('/servicios', [ServiciosController::class, 'index'])->name('servicios.index');
Route::POST('/servicios', [ServiciosController::class, 'store'])->name('servicios.store');
Route::delete('/servicios/{servicio}', [ServiciosController::class,'destroy'])->name('servicios.destroy');
Route::get('/servicios/{servicio}/edit', [ServiciosController::class, 'edit'])->name('servicios.edit');
Route::put('/servicios/{servicio}',[ServiciosController::class,'update'])->name('servicios.update');

//AGENDA OCUPA AGENDACOTROLLER PARA INDEX Y EL RESTO CON EVENTOS CONTROLLER
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');
Route::post('/agenda/mostrar', [App\Http\Controllers\EventosController::class, 'show']);
Route::post('/agenda/agregar', [App\Http\Controllers\EventosController::class, 'store']);
Route::post('/agenda/editar/{id}', [App\Http\Controllers\EventosController::class, 'edit']);
Route::post('/agenda/borrar/{id}', [App\Http\Controllers\EventosController::class, 'destroy']);
Route::post('/agenda/actualizar/{evento}', [App\Http\Controllers\EventosController::class, 'update']);

Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::POST('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
Route::delete('/clientes/{cliente}', [ClientesController::class,'destroy'])->name('clientes.destroy');
Route::get('/clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{cliente}',[ClientesController::class,'update'])->name('clientes.update');

Route::POST('/usuarios/login', [UsuariosController::class, 'login'])->name('usuarios.login');
Route::get('/usuarios/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');

Route::get('/boletas_cita', [BoletasCitaController::class, 'index'])->name('boletas.index');
Route::POST('/boletas_cita', [BoletasCitaController::class, 'store'])->name('boletas.store');
Route::delete('/boletas_cita/{boleta_cita}', [BoletasCitaController::class,'destroy'])->name('boletas.destroy');
Route::get('/boletas_cita/{boleta_cita}/edit', [BoletasCitaController::class, 'edit'])->name('boletas.edit');
Route::put('/boletas_cita/{boleta_cita}',[BoletasCitaController::class,'update'])->name('boletas.update');

Route::get('/eventos', [EventosController::class, 'index'])->name('eventos.index');
Route::POST('/eventos', [EventosController::class, 'store2'])->name('eventos.store');
Route::delete('/eventos/{evento}', [EventosController::class,'destroy2'])->name('eventos.destroy');
Route::get('/eventos/{evento}/edit', [EventosController::class, 'edit2'])->name('eventos.edit');
Route::put('/eventos/{evento}',[EventosController::class,'update2'])->name('eventos.update');
//RUTAS DE TEST
 Route::get('/test', [TestController::class, 'index'])->name('test.index');
// Route::post('/test/mostrar', [App\Http\Controllers\EventosController::class, 'show']);
// Route::post('/test/agregar', [App\Http\Controllers\EventosController::class, 'store']);
// Route::post('/test/editar/{id}', [App\Http\Controllers\EventosController::class, 'edit']);
// Route::post('/test/borrar/{id}', [App\Http\Controllers\EventosController::class, 'destroy']);
// Route::post('/test/actualizar/{evento}', [App\Http\Controllers\EventosController::class, 'update']);

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


