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
//Route::resource('cargo', CargoController::class)->names('cargo');
Route::get('/cargo',  [CargoController::class, 'index']);
Route::get('/cargo/crear',  [CargoController::class, 'create'])->name('crear');
Route::post('/cargo/store',  [CargoController::class, 'store'])->name('guardar');
Route::post('/cargo/delete',  [CargoController::class, 'destroy'])->name('eliminar');

//Route::resource('empleado', EmpleadoController::class)->names('empleado');
Route::get('/empleado',  [EmpleadoController::class, 'index']);
Route::get('/empleado/crear',  [EmpleadoController::class, 'create'])->name('crear_empleado');
Route::post('/empleado/store',  [EmpleadoController::class, 'store'])->name('guardar_empleado');
Route::post('/empleado/delete',  [EmpleadoController::class, 'destroy'])->name('eliminar_empleado');

//Route::resource('empresa', EmpresaController::class)->names('empresa');
Route::get('/empresa',  [EmpresaController::class, 'index']);
Route::get('/empresa/crear',  [EmpresaController::class, 'create'])->name('crear_empresa');
Route::post('/empresa/store',  [EmpresaController::class, 'store'])->name('guardar_empresa');
Route::post('/empresa/delete',  [EmpresaController::class, 'destroy'])->name('eliminar_empresa');

//Route::resource('estadoDocumento', EstadoDocumentoController::class)->names('estadoDocumento');
Route::get('/estadoDocumento',  [EstadoDocumentoController::class, 'index']);
Route::get('/estadoDocumento/crear',  [EstadoDocumentoController::class, 'create'])->name('crear_eDocumento');
Route::post('/estadoDocumento/store',  [EstadoDocumentoController::class, 'store'])->name('guardar_eDocumento');
Route::post('/estadoDocumento/delete',  [EstadoDocumentoController::class, 'destroy'])->name('eliminar_eDocumento');

//Route::resource('regional', RegionalController::class)->names('regional');
Route::get('/regional',  [RegionalController::class, 'index']);
Route::get('/regional/crear',  [RegionalController::class, 'create'])->name('crear');
Route::post('/regional/store',  [RegionalController::class, 'store'])->name('guardar');
Route::post('/regional/delete',  [RegionalController::class, 'destroy'])->name('eliminar');

//Route::resource('registroDocumento', RegistroDocumentoController::class)->names('registroDocumento');
Route::get('/registroDocumento',  [RegistroDocumentoController::class, 'index']);
Route::get('/registroDocumento/crear',  [RegistroDocumentoController::class, 'create'])->name('crear');
Route::post('/registroDocumento/store',  [RegistroDocumentoController::class, 'store'])->name('guardar');
Route::post('/registroDocumento/delete',  [RegistroDocumentoController::class, 'destroy'])->name('eliminar');

//Route::resource('solicitudVacaciones', SolicitudVacacionController::class)->names('solicitudVacaciones');
Route::get('/solicitudVacaciones',  [SolicitudVacacionController::class, 'index']);
Route::get('/solicitudVacaciones/crear',  [SolicitudVacacionController::class, 'create'])->name('crear');
Route::post('/solicitudVacaciones/store',  [SolicitudVacacionController::class, 'store'])->name('guardar');
Route::post('/solicitudVacaciones/delete',  [SolicitudVacacionController::class, 'destroy'])->name('eliminar');

//Route::resource('sucursal', SucursalController::class)->names('sucursal');
Route::get('/sucursal',  [SucursalController::class, 'index']);
Route::get('/sucursal/crear',  [SucursalController::class, 'create'])->name('crear');
Route::post('/sucursal/store',  [SucursalController::class, 'store'])->name('guardar');
Route::post('/sucursal/delete',  [SucursalController::class, 'destroy'])->name('eliminar');

//Route::resource('tipoDocuemnto', TipoDocumentoController::class)->names('tipoDocuemnto');
Route::get('/tipoDocuemnto',  [TipoDocumentoController::class, 'index']);
Route::get('/tipoDocuemnto/crear',  [TipoDocumentoController::class, 'create'])->name('crear');
Route::post('/tipoDocuemnto/store',  [TipoDocumentoController::class, 'store'])->name('guardar');
Route::post('/tipoDocuemnto/delete',  [TipoDocumentoController::class, 'destroy'])->name('eliminar');

//Route::resource('unidad', UnidadController::class)->names('unidad');
Route::get('/unidad',  [UnidadController::class, 'index']);
Route::get('/unidad/crear',  [UnidadController::class, 'create'])->name('crear');
Route::post('/unidad/store',  [UnidadController::class, 'store'])->name('guardar');
Route::post('/unidad/delete',  [UnidadController::class, 'destroy'])->name('eliminar');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * Rutas para el acceso al panel para la administracion
 */

 Route::get('/panelAdministrador', function () {
    return view('dashboard-admin.index');
});