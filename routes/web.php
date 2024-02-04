<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinciasController;

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

Route::get('funcionario', function () {
    return view('funcionarios.index');
})->name('funcionario');

// Route::get('/provincia', function () {
//     return view('provincia.listagem_provincia');
// })->name('provincia');

Route::get('provincia', [ProvinciasController::class, 'index'])->name('list');
Route::get('provincias', [ProvinciasController::class, 'list'])->name('listar');


