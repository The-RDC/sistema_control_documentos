<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

use App\Http\Controllers\HomeController;

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
//Route::get('/cargo',  [CargoController::class, 'index'])->name('vista');
//Route::get('/cargo/crear',  [CargoController::class, 'create'])->name('crear');
//Route::post('/cargo/store',  [CargoController::class, 'store'])->name('guardar');
//Route::get('/cargo/edit/{id}',  [CargoController::class, 'edit'])->name('editar');
//Route::post('/cargo/update',  [CargoController::class, 'update'])->name('actualizar');
//Route::post('/cargo/delete',  [CargoController::class, 'destroy'])->name('eliminar');

//Route::resource('empleado', EmpleadoController::class)->names('empleado');
//Route::get('/empleado',  [EmpleadoController::class, 'index'])->name('vista_empleado');
//Route::get('/empleado/crear',  [EmpleadoController::class, 'create'])->name('crear_empleado');
//Route::post('/empleado/store',  [EmpleadoController::class, 'store'])->name('guardar_empleado');
//Route::post('/empleado/delete',  [EmpleadoController::class, 'destroy'])->name('eliminar_empleado');

//Route::resource('empresa', EmpresaController::class)->names('empresa');
//Route::get('/empresa',  [EmpresaController::class, 'index'])->name('vista_empresa');
//Route::get('/empresa/crear',  [EmpresaController::class, 'create'])->name('crear_empresa');
//Route::post('/empresa/store',  [EmpresaController::class, 'store'])->name('guardar_empresa');
//Route::post('/empresa/delete',  [EmpresaController::class, 'destroy'])->name('eliminar_empresa');

//Route::resource('estadoDocumento', EstadoDocumentoController::class)->names('estadoDocumento');
//Route::get('/estadoDocumento',  [EstadoDocumentoController::class, 'index'])->name('vista_eDocumento');
//Route::get('/estadoDocumento/crear',  [EstadoDocumentoController::class, 'create'])->name('crear_eDocumento');
//Route::post('/estadoDocumento/store',  [EstadoDocumentoController::class, 'store'])->name('guardar_eDocumento');
//Route::post('/estadoDocumento/delete',  [EstadoDocumentoController::class, 'destroy'])->name('eliminar_eDocumento');

//Route::resource('regional', RegionalController::class)->names('regional');
//Route::get('/regional',  [RegionalController::class, 'index'])->name('vista_regional');
//Route::get('/regional/crear',  [RegionalController::class, 'create'])->name('crear_regional');
//Route::post('/regional/store',  [RegionalController::class, 'store'])->name('guardar_regional');
//Route::post('/regional/delete',  [RegionalController::class, 'destroy'])->name('eliminar_regional');

//Route::resource('registroDocumento', RegistroDocumentoController::class)->names('registroDocumento');
//Route::get('/registroDocumento',  [RegistroDocumentoController::class, 'index'])->name('vista_rDocumento');
//Route::get('/registroDocumento/crear',  [RegistroDocumentoController::class, 'create'])->name('crear_rDocumento');
//Route::post('/registroDocumento/store',  [RegistroDocumentoController::class, 'store'])->name('guardar_rDocumento');
//Route::post('/registroDocumento/delete',  [RegistroDocumentoController::class, 'destroy'])->name('eliminar_rDocumento');

//Route::resource('solicitudVacaciones', SolicitudVacacionController::class)->names('solicitudVacaciones');
//Route::get('/solicitudVacaciones',  [SolicitudVacacionController::class, 'index'])->name('vista_sVacacion');;
//Route::get('/solicitudVacaciones/crear',  [SolicitudVacacionController::class, 'create'])->name('crear_sVacacion');
//Route::post('/solicitudVacaciones/store',  [SolicitudVacacionController::class, 'store'])->name('guardar_sVacacion');
//Route::post('/solicitudVacaciones/delete',  [SolicitudVacacionController::class, 'destroy'])->name('eliminar_sVacacion');

//Route::resource('sucursal', SucursalController::class)->names('sucursal');
//Route::get('/sucursal',  [SucursalController::class, 'index'])->name('vista_sucursal');;
//Route::get('/sucursal/crear',  [SucursalController::class, 'create'])->name('crear_sucursal');
//Route::post('/sucursal/store',  [SucursalController::class, 'store'])->name('guardar_sucursal');
//Route::post('/sucursal/delete',  [SucursalController::class, 'destroy'])->name('eliminar_sucursal');

//Route::resource('tipoDocumento', TipoDocumentoController::class)->names('tipoDocumento');
//Route::get('/tipoDocuemnto',  [TipoDocumentoController::class, 'index'])->name('vista_tDocumento');;
//Route::get('/tipoDocuemnto/crear',  [TipoDocumentoController::class, 'create'])->name('crear_tDocumento');
//Route::post('/tipoDocuemnto/store',  [TipoDocumentoController::class, 'store'])->name('guardar_tDocumento');
//Route::post('/tipoDocuemnto/delete',  [TipoDocumentoController::class, 'destroy'])->name('eliminar_tDocumento');

//Route::resource('unidad', UnidadController::class)->names('unidad');
//Route::get('/unidad',  [UnidadController::class, 'index'])->name('vista_unidad');;
//Route::get('/unidad/crear',  [UnidadController::class, 'create'])->name('crear_unidad');
//Route::post('/unidad/store',  [UnidadController::class, 'store'])->name('guardar_unidad');
//Route::post('/unidad/delete',  [UnidadController::class, 'destroy'])->name('eliminar_unidad');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('cargo', CargoController::class)->names('cargo');
    Route::resource('empleado', EmpleadoController::class)->names('empleado');
    Route::resource('empresa', EmpresaController::class)->names('empresa');
    Route::resource('estadoDocumento', EstadoDocumentoController::class)->names('estadoDocumento');
    Route::resource('regional', RegionalController::class)->names('regional');
    Route::resource('registroDocumento', RegistroDocumentoController::class)->names('registroDocumento');
    Route::resource('solicitudVacaciones', SolicitudVacacionController::class)->names('solicitudVacaciones');
    Route::resource('sucursal', SucursalController::class)->names('sucursal');
    Route::resource('tipoDocumento', TipoDocumentoController::class)->names('tipoDocumento');
    Route::resource('unidad', UnidadController::class)->names('unidad');

});

