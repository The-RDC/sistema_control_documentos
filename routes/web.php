<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CargoController;
use \App\Http\Controllers\EmpleadoController;
use \App\Http\Controllers\EmpresaController;
use \App\Http\Controllers\EstadoDocumentoController;
use \App\Http\Controllers\RegionalController;
use \App\Http\Controllers\RegistroDocumentoController;
use \App\Http\Controllers\SolicitudVacacionController;
use \App\Http\Controllers\SucursalController;
use \App\Http\Controllers\TipoDocumentoController;
use \App\Http\Controllers\UnidadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('cargo', CargoController::class)->names('cargo');
Route::resource('empleado', EmpleadoController::class)->names('empleado');
Route::resource('empresa', EmpresaController::class)->names('empresa');
Route::resource('estadoDocumento', EstadoDocumentoController::class)->names('estadoDocumento');
Route::resource('regional', RegionalController::class)->names('regional');
Route::resource('registroDocumento', RegistroDocumentoController::class)->names('registroDocumento');
Route::resource('solicitudVacaciones', SolicitudVacacionController::class)->names('solicitudVacaciones');
Route::resource('sucursal', SucursalController::class)->names('sucursal');
Route::resource('tipoDocuemnto', TipoDocumentoController::class)->names('tipoDocuemnto');
Route::resource('unidad', UnidadController::class)->names('unidad');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Rutas para el acceso al panel para la administracion
 */

 Route::get('/panelAdministrador', function () {
    return view('dashboard-admin.index');
});