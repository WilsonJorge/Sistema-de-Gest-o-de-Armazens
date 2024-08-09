<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciasController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\FuncionarioController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('404', function () {
    return view('errors.not-found');
})->name('404');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('funcionario', [FuncionarioController::class, 'index'])->name('funcionario');


Route::prefix('funcionarios')->name('funcionarios.')->group(function () { 
    Route::get('create', [FuncionarioController::class, 'create'])->name('form_create');
});


// Route::get('/provincia', function () {
//     return view('provincia.listagem_provincia');
// })->name('provincia');

Route::get('/home', function () {
    return view('home');
})->name('pagina_inicial');


Route::get('provincia', [ProvinciasController::class, 'index'])->name('list');
Route::get('provincias', [ProvinciasController::class, 'list'])->name('listar');
Route::get('provincia/{id}', [ProvinciasController::class, 'show'])->name('show');
Route::get('provincia_detalhes/{id}', [ProvinciasController::class, 'show_details'])->name('detalhes');

Route::post('provincia/add', [ProvinciasController::class, 'add'])->name('create');
Route::post('provincia/delete', [ProvinciasController::class, 'delete'])->name('delete');
Route::post('provincia/edit', [ProvinciasController::class, 'edit'])->name('edit');


// Distritos
Route::get('distrito', [DistritoController::class, 'index'])->name('distrito');
Route::get('distritos', [DistritoController::class, 'list'])->name('listar');
Route::get('distrito/{id}', [DistritoController::class, 'show'])->name('show');
Route::get('distrito_detalhes/{id}', [DistritoController::class, 'show_details'])->name('detalhes');
Route::post('distrito/add', [DistritoController::class, 'add'])->name('create');
Route::post('distrito/delete', [DistritoController::class, 'delete'])->name('delete');
Route::post('distrito/edit', [DistritoController::class, 'edit'])->name('edit');

