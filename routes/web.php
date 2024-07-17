<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciasController;
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
// Route::post('provincia/show', [ProvinciasController::class, 'show'])->name('show');
