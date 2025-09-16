<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\DeporteControll;
use App\Http\Controllers\EntrenadorControll;
use App\Http\Controllers\EntrenoControll;
use App\Http\Controllers\PerfilControll;
use App\Http\Controllers\PlanControll;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// RUTA PARA LOS IDIOMAS
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('idioma');

//RUTAS QUE SOLO EL ADMIN PUEDE ACCEDER
Route::middleware(['auth', 'admin'])->group(function () {
    // RUTAS DE ADMINISTRADOR
    Route::get("/administracion", function () {
        return view("administracion");
    })->name("administracion");
    // RUTAS DE ENTRENADORES
    Route::get("entrenadores",[EntrenadorControll::class,'index'])->name('entrenadores');
    Route::get("nuevoEntrenador", [EntrenadorControll::class, 'create'])->name('entrenador.create');
    Route::post("entrenador", [EntrenadorControll::class, 'store'])->name('entrenador.store');
    Route::get("entrenador/{id}",[EntrenadorControll::class,'edit'])->name('entrenador.edit');
    Route::put("entrenador/{id}",[EntrenadorControll::class,'update'])->name('entrenador.update');
    Route::get("eliminarEntrenador/{id}",[EntrenadorControll::class,'destroy'])->name('entrenador.destroy');
    
});

// RUTAS A LAS QUE UN USUARIO REGISTRADO Y ADMIN PUEDEN ACCEDER
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // RUTAS DE ENTRENOS
    Route::get("entrenos", [EntrenoControll::class, 'index'])->name('entrenos');
    Route::get("nuevoEntreno", [EntrenoControll::class, 'create'])->name('entreno.create');
    Route::post("entreno", [EntrenoControll::class, 'store'])->name('entreno.store');
    Route::get("entreno/{id}",[EntrenoControll::class,'edit'])->name('entreno.edit');
    Route::put("entreno/{id}",[EntrenoControll::class,'update'])->name('entreno.update');
    Route::get("eliminarEntreno/{id}",[EntrenoControll::class,'destroy'])->name('entreno.destroy');

    // RUTAS DE DEPORTES
    Route::get("deportes",[DeporteControll::class,'index'])->name('deportes');
    Route::get("nuevoDeporte", [DeporteControll::class, 'create'])->name('deporte.create');
    Route::post("deporte", [DeporteControll::class, 'store'])->name('deporte.store');
    Route::get("deporte/{id}",[DeporteControll::class,'edit'])->name('deporte.edit');
    Route::put("deporte/{id}",[DeporteControll::class,'update'])->name('deporte.update');
    Route::get("eliminarDeporte/{id}",[DeporteControll::class,'destroy'])->name('deporte.destroy');

    // RUTAS DE PERFIL
    Route::get("perfiles",[PerfilControll::class,'index'])->name('perfiles');
    Route::get("nuevoPerfil", [PerfilControll::class, 'create'])->name('perfil.create');
    Route::post("perfil", [PerfilControll::class, 'store'])->name('perfil.store');
    Route::get("perfilShow/{id}",[PerfilControll::class,'show'])->name('perfil.show');
    Route::get("perfil/{id}",[PerfilControll::class,'edit'])->name('perfil.edit');
    Route::put("perfil/{id}",[PerfilControll::class,'update'])->name('perfil.update');
    Route::get("eliminarPerfil/{id}",[PerfilControll::class,'destroy'])->name('perfil.destroy');

    // RUTA PARA LA API
    Route::get("chatEntreno",[ApiController::class,'chatEntreno']);
});

// RUTAS A LAS QUE TODO USUARIO PUEDE ACCEDER

//INICIO
Route::get("/", function () {
    return view('inicio');
})->name('inicio');

// RUTAS DE TARIFAS
Route::get("tarifas", [PlanControll::class, "index"])->name("tarifas");

//RUTAS PUBLICAS DE ENTRENADORES
// Ruta entrenadores paginación con AJAX
Route::get("paginarEntrenadores",[EntrenadorControll::class,'paginarEntrenadores'])->name('paginarEntrenadores');

//Rutas para el buscador
Route::get('/verEntrenadores',function(){
    return view('verentrenadoresapifetch');
})->name("verentrenadoresapifetch");

Route::get('entrenadoresapifetch',[EntrenadorControll::class,'apifetchEntrenadores']);

Route::get('entren/{id}',[EntrenoControll::class,'getEntrenador']);

require __DIR__ . '/auth.php';
