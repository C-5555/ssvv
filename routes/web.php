<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

//Rutas de vistas
Route::get('/ssvv', function () {
    return view('ssvv.index'); 
});

Route::get('/ssvv/create', function () {
    return view('ssvv.create');
});

Route::get('ssvv/usuario', function () {
    return view('dashboards.usuario');
});

Route::get('ssvv/status', function () {
    return view('dashboards.status');
});

Route::get('/ssvv/viaticos', function () {
    return view('dashboards.viaticos');
});

Route::get('/ssvv/vacaciones', function () {
    return view('dashboards.vacaciones');
});

Route::get('ssvv/mensajes', function () {
    return view('dashboards.mensajes');
});

Route::get('ssvv/lista', function () {
    return view('dashboards.listaUsuarios');
});

Route::get('ssvv/vista', function () {
    return view('dashboards.vistaUsuario');
});

Route::get('ssvv/roles', function () {
    return view('dashboards.listaRoles');
});
Route::get('ssvv/ver', function () {
    return view('ssvv.show');
});

Route::get('ssvv/editar', function () {
    return view('ssvv.edit');
});

//Rutas de controlador 
Route::get('/ssvv/ajax/data', [EmpleadoController::class, 'getEmpleado'])->name('ajaxroute');

Route::get('/ssvv/ver/{encryptedId}', [EmpleadoController::class, 'show'])->name('empleados.show');

Route::put('/ssvv/desactivar/{encryptedId}', [EmpleadoController::class, 'destroy'])->name('empleados.cambio-status');

Route::get('ssvv/lista', [EmpleadoController::class, 'index']); 

Route::post('ssvv/store', [EmpleadoController::class, 'store']);

