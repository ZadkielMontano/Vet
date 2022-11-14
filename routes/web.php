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
    return view('welcome');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {

    // rutas de las especialitys
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
});

//doctor = veterinario
Route::middleware(['auth', 'veterinario'])->group(function () {

    Route::get('/horario', [App\Http\Controllers\veterinario\HorarioController::class, 'edit']);
    Route::post('/horario', [App\Http\Controllers\veterinario\HorarioController::class, 'store']);

});


Route::middleware('auth')->group(function(){
Route::get('/reservarcitas/create', [App\Http\Controllers\AppointmenteController::class, 'create']);
Route::post('/reservarcitas', [App\Http\Controllers\AppointmenteController::class, 'store']);
Route::post('/miscitas', [App\Http\Controllers\AppointmenteController::class, 'index']);

Route::get('/especialidades/{specialty}/veterinarios', [App\Http\Controllers\Api\SpecialtyController::class, 'vets']);
Route::get('/horario/horas', [App\Http\Controllers\Api\HorarioController::class, 'hours']);

});   