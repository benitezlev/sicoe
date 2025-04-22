<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\GestionController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\ParaleloController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TurnoController;
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

Route::get('/', function () {
    return redirect('/admin');
});

Auth::routes();

Route::get('/register', function () {
    abort(403, 'Registro no Permitido');
})->name('register');

Route::get('/home', [AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');



Route::get('/admin/configuraciones', [ConfiguracionController::class, 'index'])->name('admin.configuracion.index');
Route::post('/admin/configuraciones/create', [ConfiguracionController::class, 'store'])->name('admin.configuracion.store');

///rutas para gestiones
Route::get('/admin/gestiones', [GestionController::class, 'index'])->name('admin.gestiones.index')->middleware('auth');
Route::get('/admin/gestiones/create', [GestionController::class, 'create'])->name('admin.gestiones.create')->middleware('auth');
Route::post('/admin/gestiones/create', [GestionController::class, 'store'])->name('admin.gestiones.store')->middleware('auth');
Route::get('/admin/gestiones/{id}/edit', [GestionController::class, 'edit'])->name('admin.gestiones.edit')->middleware('auth');
Route::put('/admin/gestiones/{id}', [GestionController::class, 'update'])->name('admin.gestiones.update')->middleware('auth');
Route::delete('/admin/gestiones/{id}', [GestionController::class, 'destroy'])->name('admin.gestiones.destroy')->middleware('auth');

//rutas para carreras
Route::get('/admin/carreras', [CarreraController::class, 'index'])->name('admin.carreras.index')->middleware('auth');
Route::get('/admin/carreras/create', [CarreraController::class, 'create'])->name('admin.carreras.create')->middleware('auth');
Route::post('/admin/carreras/create', [CarreraController::class, 'store'])->name('admin.carreras.store')->middleware('auth');
Route::get('/admin/carreras/{id}/edit', [CarreraController::class, 'edit'])->name('admin.carreras.edit')->middleware('auth');
Route::put('/admin/carreras/{id}', [CarreraController::class, 'update'])->name('admin.carreras.update')->middleware('auth');
Route::delete('/admin/carreras/{id}', [CarreraController::class, 'destroy'])->name('admin.carreras.destroy')->middleware('auth');

//rutas para niveles
Route::get('/admin/niveles', [NivelController::class, 'index'])->name('admin.niveles.index')->middleware('auth');
Route::get('/admin/niveles/create', [NivelController::class, 'create'])->name('admin.niveles.create')->middleware('auth');
Route::post('/admin/niveles/create', [NivelController::class, 'store'])->name('admin.niveles.store')->middleware('auth');
Route::get('/admin/niveles/{id}/edit', [NivelController::class, 'edit'])->name('admin.niveles.edit')->middleware('auth');
Route::put('/admin/niveles/{id}', [NivelController::class, 'update'])->name('admin.niveles.update')->middleware('auth');
Route::delete('/admin/niveles/{id}', [NivelController::class, 'destroy'])->name('admin.niveles.destroy')->middleware('auth');

//rutas para turnos
Route::get('/admin/turnos', [TurnoController::class, 'index'])->name('admin.turnos.index')->middleware('auth');
Route::get('/admin/turnos/create', [TurnoController::class, 'create'])->name('admin.turnos.create')->middleware('auth');
Route::post('/admin/turnos/create', [TurnoController::class, 'store'])->name('admin.turnos.store')->middleware('auth');
Route::get('/admin/turnos/{id}/edit', [TurnoController::class, 'edit'])->name('admin.turnos.edit')->middleware('auth');
Route::put('/admin/turnos/{id}', [TurnoController::class, 'update'])->name('admin.turnos.update')->middleware('auth');
Route::delete('/admin/turnos/{id}', [TurnoController::class, 'destroy'])->name('admin.turnos.destroy')->middleware('auth');

//rutas para paralelos
Route::get('/admin/paralelos', [ParaleloController::class, 'index'])->name('admin.paralelos.index')->middleware('auth');
Route::get('/admin/paralelos/create', [ParaleloController::class, 'create'])->name('admin.paralelos.create')->middleware('auth');
Route::post('/admin/paralelos/create', [ParaleloController::class, 'store'])->name('admin.paralelos.store')->middleware('auth');
Route::get('/admin/paralelos/{id}/edit', [ParaleloController::class, 'edit'])->name('admin.paralelos.edit')->middleware('auth');
Route::put('/admin/paralelos/{id}', [ParaleloController::class, 'update'])->name('admin.paralelos.update')->middleware('auth');
Route::delete('/admin/paralelos/{id}', [ParaleloController::class, 'destroy'])->name('admin.paralelos.destroy')->middleware('auth');


//rutas para periodos
Route::get('/admin/periodos', [PeriodoController::class, 'index'])->name('admin.periodos.index')->middleware('auth');
Route::get('/admin/periodos/create', [PeriodoController::class, 'create'])->name('admin.periodos.create')->middleware('auth');
Route::post('/admin/periodos/create', [PeriodoController::class, 'store'])->name('admin.periodos.store')->middleware('auth');
Route::get('/admin/periodos/{id}/edit', [PeriodoController::class, 'edit'])->name('admin.periodos.edit')->middleware('auth');
Route::put('/admin/periodos/{id}', [PeriodoController::class, 'update'])->name('admin.periodos.update')->middleware('auth');
Route::delete('/admin/periodos/{id}', [PeriodoController::class, 'destroy'])->name('admin.periodos.destroy')->middleware('auth');

// Rutas para Materias
Route::get('/admin/materias', [MateriaController::class, 'index'])->name('admin.materias.index')->middleware('auth');
Route::get('/admin/materias/create', [MateriaController::class, 'create'])->name('admin.materias.create')->middleware('auth');
Route::post('/admin/materias/create', [MateriaController::class, 'store'])->name('admin.materias.store')->middleware('auth');
Route::get('/admin/materias/{id}/edit', [MateriaController::class, 'edit'])->name('admin.materias.edit')->middleware('auth');
Route::put('/admin/materias/{id}', [MateriaController::class, 'update'])->name('admin.materias.update')->middleware('auth');
Route::delete('/admin/materias/{id}', [MateriaController::class, 'destroy'])->name('admin.materias.destroy')->middleware('auth');

// Rutas para Roles
Route::get('/admin/roles', [RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');


// Rutas para Administrativos

Route::get('/admin/administrativos', [AdministrativoController::class, 'index'])->name('admin.administrativos.index')->middleware('auth');
Route::get('/admin/administrativos/create', [AdministrativoController::class, 'create'])->name('admin.administrativos.create')->middleware('auth');
Route::post('/admin/create/administrativos', [AdministrativoController::class, 'store'])->name('admin.administrativos.store')->middleware('auth');
Route::get('/admin/administrativos/{id}', [AdministrativoController::class, 'show'])->name('admin.administrativos.show')->middleware('auth');
Route::get('/admin/administrativos/{id}/edit', [AdministrativoController::class, 'edit'])->name('admin.administrativos.edit')->middleware('auth');
Route::put('/admin/administrativos/{id}', [AdministrativoController::class, 'update'])->name('admin.administrativos.update')->middleware('auth');
Route::delete('/admin/administrativos/{id}', [AdministrativoController::class, 'destroy'])->name('admin.administrativos.destroy')->middleware('auth');


// Rutas para Docentes

Route::get('/admin/docentes', [DocenteController::class, 'index'])->name('admin.docentes.index')->middleware('auth');
Route::get('/admin/docentes/create', [DocenteController::class, 'create'])->name('admin.docentes.create')->middleware('auth');
Route::post('/admin/create/docentes', [DocenteController::class, 'store'])->name('admin.docentes.store')->middleware('auth');
Route::get('/admin/docentes/{id}', [DocenteController::class, 'show'])->name('admin.docentes.show')->middleware('auth');
Route::get('/admin/docentes/{id}/edit', [DocenteController::class, 'edit'])->name('admin.docentes.edit')->middleware('auth');
Route::put('/admin/docentes/{id}', [DocenteController::class, 'update'])->name('admin.docentes.update')->middleware('auth');
Route::delete('/admin/docentes/{id}', [DocenteController::class, 'destroy'])->name('admin.docentes.destroy')->middleware('auth');



