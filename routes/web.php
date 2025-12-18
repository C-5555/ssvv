<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;


Route::get('ssvv/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'empleado.activo'])->group(function () {

    Route::get('/ssvv', function () {
        return view('ssvv.index');
    })->name('ssvv.index');

    Route::get('/ssvv/usuario', function () {
    return view('dashboards.usuario');
    })->name('ssvv.usuario');


    Route::get('/ssvv/status', fn () => view('dashboards.status'));
    Route::get('/ssvv/viaticos', fn () => view('dashboards.viaticos'));
    Route::get('/ssvv/vacaciones', fn () => view('dashboards.vacaciones'));
    Route::get('/ssvv/mensajes', fn () => view('dashboards.mensajes'));

    Route::get('/ssvv/listadatos', [EmpleadoController::class, 'index'])
        ->name('ssvv.listadatos');

    Route::get('/ssvv/create', [EmpleadoController::class, 'create'])
        ->name('ssvv.create');

    Route::post('/ssvv/store', [EmpleadoController::class, 'store'])
        ->name('ssvv.store');

    Route::get('/ssvv/ver/{encryptedId}', [EmpleadoController::class, 'show'])
        ->name('ssvv.show');

    Route::get('/ssvv/editar/{encryptedId}', [EmpleadoController::class, 'edit'])
        ->name('ssvv.edit');

    Route::put('/ssvv/update/{encryptedId}', [EmpleadoController::class, 'update'])
        ->name('ssvv.update');

    Route::get('/ssvv/permisos/{encryptedId}', [EmpleadoController::class, 'permisos'])
        ->name('ssvv.permisos');

    Route::put('/ssvv/desactivar/{encryptedId}', [EmpleadoController::class, 'destroy'])
        ->name('ssvv.cambio-status');

    Route::get('/users', [UsersController::class, 'index'])
        ->middleware('permission:users.index')
        ->name('users.index');

    Route::get('/users/create', [UsersController::class, 'create'])
        ->middleware('permission:users.create')
        ->name('users.create');

    Route::post('/users', [UsersController::class, 'store'])
        ->middleware('permission:users.create')
        ->name('users.store');

    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])
        ->middleware('permission:users.update')
        ->name('users.edit');

    Route::put('/users/{user}', [UsersController::class, 'update'])
        ->middleware('permission:users.update')
        ->name('users.update');

    Route::delete('/users/{user}', [UsersController::class, 'destroy'])
        ->middleware('permission:users.delete')
        ->name('users.destroy');

    Route::get('/roles', [RolesController::class, 'index'])
        ->middleware('permission:roles.index')
        ->name('roles.index');

    Route::get('/roles/create', [RolesController::class, 'create'])
        ->middleware('permission:roles.create')
        ->name('roles.create');

    Route::post('/roles', [RolesController::class, 'store'])
        ->middleware('permission:roles.create')
        ->name('roles.store');

    Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])
        ->middleware('permission:roles.update')
        ->name('roles.edit');

    Route::put('/roles/{role}', [RolesController::class, 'update'])
        ->middleware('permission:roles.update')
        ->name('roles.update');

    Route::get('/permissions', [PermissionsController::class, 'index'])
        ->middleware('permission:permissions.index')
        ->name('permissions.index');

    Route::post('/permissions', [PermissionsController::class, 'store'])
        ->middleware('permission:permissions.create')
        ->name('permissions.store');

    Route::delete('/permissions/{permission}', [PermissionsController::class, 'destroy'])
        ->middleware('permission:permissions.delete')
        ->name('permissions.destroy');
});
