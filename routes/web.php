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

Route::get('/ssvv', function () {
    return view('ssvv.index');
});

Route::get('/ssvv/create', function () {
    return view('ssvv.create');
});

Route::get('/dashboards/calendario', function () {
    return view('dashboards.calendar');
});

Route::get('ssvv/usuario', function () {
    return view('dashboards/usuario');
});

Route::get('ssvv/status', function () {
    return view('dashboards/status');
});

Route::get('ssvv/viaticos', function () {
    return view('dashboards/viaticos');
});

Route::get('ssvv/vacaciones', function () {
    return view('dashboards/vacaciones');
});

Route::get('ssvv/mensajes', function () {
    return view('dashboards/mensajes');
});

Route::get('/ssvv/dashboard', function () {
    return view('ssvv.index');
});

Route::get('/ssvv/dashboard', function () {
    return view('dashboards.mensajes');
});

Route::get('/dashboards/dashboards', function () {
    return view('dashboards.mensajes');
});

Route::get('/mensajes', function () {
    return view('ssvv.mensajes');
});
