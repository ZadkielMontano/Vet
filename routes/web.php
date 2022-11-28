<?php

//use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('auth.login');

    return view('welcome');  //para tener una pagina de vista antes
    
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {

    // rutas de las especialidades
    Route::get('/especialidades', [App\Http\Controllers\admin\SpecialityController::class, 'index']);
    Route::get('/especialidades/create', [App\Http\Controllers\admin\SpecialityController::class, 'create']);
    Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\admin\SpecialityController::class, 'edit']);
    Route::post('/especialidades', [App\Http\Controllers\admin\SpecialityController::class, 'sendData']);
    Route::put('/especialidades/{specialty}', [App\Http\Controllers\admin\SpecialityController::class, 'update']);
    Route::delete('/especialidades/{specialty}', [App\Http\Controllers\admin\SpecialityController::class, 'destroy']);

    // ruta veterinarios
    Route::resource('veterinarios', 'App\Http\Controllers\admin\VeterinarioController');

    //ruta clientes
    Route::resource('clientes', 'App\Http\Controllers\admin\ClientController');

    //ruta de report
    Route::get('/reportes/citas/line', [App\Http\Controllers\admin\ChartController::class, 'appointments']);

    //ruta de rendimiento
    Route::get('/reportes/vets/column', [App\Http\Controllers\admin\ChartController::class, 'vets']);

    Route::get('/reportes/vets/column/data', [App\Http\Controllers\admin\ChartController::class, 'vetsJson']);



});

//doctor = veterinario
Route::middleware(['auth', 'veterinario'])->group(function () {

    Route::get('/horario', [App\Http\Controllers\veterinario\HorarioController::class, 'edit']);
    Route::post('/horario', [App\Http\Controllers\veterinario\HorarioController::class, 'store']);

});

//rutas de las citas
Route::middleware('auth')->group(function(){
Route::get('/reservarcitas/create', [App\Http\Controllers\AppointmenteController::class, 'create']);
Route::post('/reservarcitas', [App\Http\Controllers\AppointmenteController::class, 'store']);
Route::get('/miscitas', [App\Http\Controllers\AppointmenteController::class, 'index']);
//cancelar cita
Route::post('/miscitas/{appointment}/cancel', [App\Http\Controllers\AppointmenteController::class, 'cancel']);
//confirmar cita
Route::post('/miscitas/{appointment}/confirm', [App\Http\Controllers\AppointmenteController::class, 'confirm']);
//cita atendida
Route::get('/miscitas/{appointment}/atendida', [App\Http\Controllers\AppointmenteController::class, 'atendida']);
//cita cancel form
Route::get('/miscitas/{appointment}/cancel', [App\Http\Controllers\AppointmenteController::class, 'formCancel']);
//cita información
Route::get('/miscitas/{appointment}', [App\Http\Controllers\AppointmenteController::class, 'show']);

Route::get('/especialidades/{specialty}/veterinarios', [App\Http\Controllers\Api\SpecialtyController::class, 'vets']);
Route::get('/horario/horas', [App\Http\Controllers\Api\HorarioController::class, 'hours']);

});   