<?php

use Illuminate\Support\Facades\Route;

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
    return view('ssvv.index'); //cambiar por layout
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

Route::get('/ssvv/dashboard', function () {
    return view('ssvv.index');
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

//Rutas de controlador 
Route::get('/admin/ajax/data', [usersController::class, 'getUsers'])->name('ajaxroute');

Route::match(['get', 'put'], '/admin/users/edit/{encryptedId}', [usersController::class, 'edit']);
