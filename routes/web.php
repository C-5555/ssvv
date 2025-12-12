<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

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

// Rutas PÚBLICAS


Route::get('/ssvv/create',[EmpleadoController::class, 'create']) -> name('ssvv.create');

Route::post('/ssvv/registro', [UsersController::class, 'store']) -> name('register');

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

Route::get('ssvv/listadatos', function () {
    return view('dashboards.listaDatosUsuarios');
});

Route::get('ssvv/lista', function () {
    return view('dashboards.listaUsuario');
});

Route::get('ssvv/roles', function () {
    return view('dashboards.listaRoles');
});

Route::get('ssvv/ver', function () {
    return view('ssvv.show');
});


// Rutas de AUTENTICACIÓN (públicas)


Route::get('ssvv/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('ssvv/registro', function () {
    return view('auth.register');
});

// Rutas de REGISTRO (públicas)
Route::get('/ssvv/registro', [UsersController::class, 'create'])->name('register.form');

Route::post('/ssvv/registro', [UsersController::class, 'store'])->name('register');

Route::get('ssvv/reset', function () {
    return view('auth.resetPassword');
});

Route::get('ssvv/confirm', function () {
    return view('auth.confirmPassword');
});

Route::get('ssvv/newpswd', function () {
    return view('auth.newPassword');
});

Route::get('ssvv/two', function () {
    return view('auth.twoSteps');
});

// Rutas de controlador EMPLEADOS (públicas por ahora)
Route::get('/ssvv/ajax/data', [EmpleadoController::class, 'getEmpleado'])->name('ajaxroute');

Route::post('/ssvv/store', [EmpleadoController::class, 'store']) -> name('ssvv.store');
// ======== RUTAS PROTEGIDAS CON AUTENTICACIÓN ========
Route::middleware(['auth', 'empleado.activo'])->group(function () {
    // rutas protegidas


    Route::get('/ssvv', function () {
    return view('ssvv.index'); 
    });
    Route::get('/ssvv/ver/{encryptedId}', [EmpleadoController::class, 'show'])->name('ssvv.show');

    Route::get('/ssvv/editar/{encryptedId}', [EmpleadoController::class, 'edit'])->name('ssvv.edit');

    Route::put('/ssvv/update/{encryptedId}', [EmpleadoController::class, 'update'])->name('ssvv.update');


    Route::get('/ssvv/permisos/{encryptedId}', [EmpleadoController::class, 'permisos'])->name('ssvv.permisos');

    Route::put('/ssvv/desactivar/{encryptedId}', [EmpleadoController::class, 'destroy'])->name('ssvv.cambio-status');

    Route::get('/ssvv/listadatos', [EmpleadoController::class, 'index'])->name('ssvv.listadatos');

    // ======== RUTAS DE USUARIOS ========
    Route::get('/users', [UsersController::class, 'index'])->middleware('permission:users.index')->name('users.index');

    Route::get('/users/create', [UsersController::class, 'create'])->middleware('permission:users.create')->name('users.create');

    Route::post('/users', [UsersController::class, 'store'])->middleware('permission:users.create')->name('users.store');

    Route::get('/users/{user}/edit', [UsersController::class, 'edit'])->middleware('permission:users.update')->name('users.edit');

    Route::put('/users/{user}', [UsersController::class, 'update'])->middleware('permission:users.update')->name('users.update');

    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->middleware('permission:users.delete')->name('users.destroy');

    // ======== RUTAS DE ROLES ========
    Route::get('/roles', [RolesController::class, 'index'])->middleware('permission:roles.index')->name('roles.index');

    Route::get('/roles/create', [RolesController::class, 'create'])->middleware('permission:roles.create')->name('roles.create');

    Route::post('/roles', [RolesController::class, 'store'])->middleware('permission:roles.create')->name('roles.store');

    Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])->middleware('permission:roles.update')->name('roles.edit');

    Route::put('/roles/{role}', [RolesController::class, 'update'])->middleware('permission:roles.update')->name('roles.update');

    // ======== RUTAS DE PERMISOS ========
    Route::get('/permissions', [PermissionsController::class, 'index'])->middleware('permission:permissions.index')->name('permissions.index');

    Route::post('/permissions', [PermissionsController::class, 'store'])->middleware('permission:permissions.create')->name('permissions.store');

    Route::delete('/permissions/{permission}', [PermissionsController::class, 'destroy'])->middleware('permission:permissions.delete')->name('permissions.destroy');

});