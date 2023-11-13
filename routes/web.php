<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PoasController;
use App\Http\Controllers\gestionController;
use App\Http\Controllers\objetivosGestionController;
use App\Http\Controllers\objetivosEspecificosController;
use App\Http\Controllers\operacionesProyectosController;

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



Route::get('/', [UserController::class,'login'])->name('login');
Route::post('/',[UserController::class,'auth'])->name('auth');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/home', [UserController::class,'home'])->name('home');

//----------------------------GESTIONES----------------------------------------------
Route::get('/gestiones',[gestionController::class,'index'])->name('gestiones');
Route::post('/gestiones',[gestionController::class,'store'])->name('gestiones-store');
Route::get('/gestiones/{id?}',[gestionController::class,'destroy'])->name('gestiones-destroy');

//----------------------------OBJETIVOS DE GESTION-------------------------------------
Route::get('/objetivosGestion/{id}', [objetivosGestionController::class,'index'])->name('objetivosGestion');
Route::post('/objetivosGestion', [objetivosGestionController::class,'store'])->name('objetivosGestion-store');
Route::post('/objetivosGestion-update', [objetivosGestionController::class,'update'])->name('objetivosGestion-update');
Route::get('/objetivosGestion-delete/{id?}', [objetivosGestionController::class,'destroy'])->name('objetivosGestion-destroy');

//----------------------------OBJETIVOS ESPECIFICOS-----------------------------------
Route::get('/objetivosEspecificos/{id}', [objetivosEspecificosController::class,'index'])->name('objetivosEspecificos');
Route::post('/objetivosEspecificos', [objetivosEspecificosController::class,'store'])->name('objetivosEspecificos-store');
Route::post('/objetivosEspecificos-update', [objetivosEspecificosController::class,'update'])->name('objetivosEspecificos-update');
Route::get('/objetivosEspecificos-delete/{id?}', [objetivosEspecificosController::class,'destroy'])->name('objetivosEspecificos-destroy');

//----------------------------OPERACIONES Y PROYECTOS--------------------------------------------
Route::get('/operacionesProyectos/{id}', [operacionesProyectosController::class,'index'])->name('operacionesProyectos');
Route::post('/operacionesProyectos', [operacionesProyectosController::class,'store'])->name('operacionesProyectos-store');
Route::post('/operacionesProyectos-update', [operacionesProyectosController::class,'update'])->name('operacionesProyectos-update');
Route::get('/operacionesProyectos-delete/{id?}', [operacionesProyectosController::class,'destroy'])->name('operacionesProyectos-destroy');
Route::post('/operacionesProyectos-asignar', [operacionesProyectosController::class,'asignar'])->name('operacionesProyectos-asignar');

//----------------------------OPERACIONES ASIGNADAS-----------------------------------------------
Route::get('/operacionesAsignadas/{id}', [operacionesProyectosController::class,'operacionesAsignadas'])->name('operacionesAsignadas');
Route::post('/cambioEstado',[operacionesProyectosController::class,'cambiarEstado'])->name('cambioEstado');

//----------------------------ARCHIVOS------------------------------------------------
Route::get('/archivos/{id}', [PoasController::class,'detalleOperacion'])->name('detalleOperacion');
Route::post('/registro-archivos', [PoasController::class,'archivos'])->name('registro_archivos');
Route::get('/archivos-destroy/{id?}',[PoasController::class,'destroy'])->name('archivos-destroy');

//----------------------------USUARIOS------------------------------------------------
Route::get('/usuarios',[UserController::class,'index'])->name('usuarios');
Route::post('/usuarios', [UserController::class,'store'])->name('usuarios-store');
Route::get('/usuarios-delete/{id?}', [UserController::class,'destroy'])->name('usuarios-destroy');
