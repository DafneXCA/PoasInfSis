<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PoasController;

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

Route::get('/', function () {
    return view('detalleOperacion');
});

Route::get('/login', [UserController::class,'login'])->name('login');
Route::get('/home', [UserController::class,'home'])->name('home');

Route::get('/objetivosGestion', [PoasController::class,'objetivosGestion'])->name('objetivosGestion');
Route::get('/objetivosEspecificos', [PoasController::class,'objetivosEspecificos'])->name('objetivosEspecificos');
Route::get('/operacionesProyectos', [PoasController::class,'operacionesProyectos'])->name('operacionesProyectos');
Route::get('/operacionesAsignadas', [PoasController::class,'operacionesAsignadas'])->name('operacionesAsignadas');
Route::get('/detalleOperacion', [PoasController::class,'detalleOperacion'])->name('detalleOperacion');

Route::post('/registro-archivos', 'UserController@index')->name('registro_archivos');
