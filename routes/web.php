<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstudianteController;

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

// Auth::routes();
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro');

Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('inicio');
    
    Route::get('/registro', function () {
        return view('auth.register');
    })->name('register');
});

Route::middleware(['auth'])->group(function () {
    # READ
    Route::get('estudiantes',[EstudianteController::class, 'index'])->name('estudiantes');
    Route::get('listarestudiantes',[EstudianteController::class, 'listar_estudiantes'])->name('listarestudiantes'); # Paginacion
    Route::get('detalleestudiante/{id}',[EstudianteController::class, 'detalle_estudiante'])->name('vistadetalleestudiante');
    Route::post('detalleestudiante/{id}',[EstudianteController::class, 'show'])->name('detalleestudiante');
    
    # STORE
    Route::get('/storeview',[EstudianteController::class, 'vista_crear'])->name('vistacrearestudiante');
    Route::post('/store',[EstudianteController::class, 'store'])->name('crearestudiante');
    
    # EDIT
    Route::get('/edit/{id}',[EstudianteController::class, 'vista_editar'])->name('vistaeditarestudiante');
    Route::post('/edit/{id}',[EstudianteController::class, 'update'])->name('editarestudiante');
    
    # DELETE
    Route::post('/destroy/{id}',[EstudianteController::class, 'destroy'])->name('eliminarestudiante');
});

