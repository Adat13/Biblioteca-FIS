<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\catalogoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\EstudianteController;
use App\Livewire\InventarioComponent;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\validarDatos;
use App\Http\Controllers\catalogoLibroController;
use App\Livewire\ListaEstudiante;
use App\Http\Controllers\AuthController;

// Ruta base, aquí empieza la pagina web
Route::get('/', function () {
    return view('welcome1');
});

// ----------------------------------------------------------------------- Rutas del grupo 1

Route::middleware(['auth'])->group(function () {
    Route::get('administrador/inventario', InventarioComponent::class)->name('administrador.inventario');
    Route::get('prestamos', [PrestamosController::class, 'index'])->name('prestamos.index');
    Route::put('prestamos/{id}', [PrestamosController::class, 'update'])->name('prestamos.update');
    Route::get('prestamos/pdf', [PrestamosController::class, 'generatePdf'])->name('prestamos.generatePdf');
    Route::get('administrador/estudiante', ListaEstudiante::class)->name('administrador.estudiante');
    Route::get('/solicitudes', [SolicitudController::class, 'index'])->name('solicitudes.index');
    Route::post('/solicitudes/{id}/accept', [SolicitudController::class, 'accept'])->name('solicitudes.accept');
    Route::post('/solicitudes/{id}/reject', [SolicitudController::class, 'reject'])->name('solicitudes.reject');
    Route::resource('/bibliotecario', catalogoController::class);
    Route::resource('/estudiantes', EstudianteController::class);
    Route::resource('/libros', catalogoController::class);
});

// ----------------------------------------------------------------------- Rutas del grupo 2

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ----------------------------------------------------------------------- Rutas del grupo 3

Route::resource('/catalogoLibro', catalogoLibroController::class);
Route::get('/', [catalogoLibroController::class, 'index']);
Route::post('/validar', [validarDatos::class, 'validar'])->name('validar');
