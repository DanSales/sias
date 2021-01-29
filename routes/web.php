<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\AnexoController;
use \App\Http\Controllers\BeneficiarioController;
use \App\Http\Controllers\ContaController;
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

Route::post('/programa/new', [ProgramaController::class, 'create'])->name('createPrograma');
Route::get('/programa/update/{id?}', [ProgramaController::class, 'update'])->name('updatePrograma');
Route::post('/programa/update/{id?}', [ProgramaController::class, 'update'])->name('updatePrograma');
Route::get('/programa/delete/{id?}', [ProgramaController::class, 'delete'])->name('deletePrograma');
Route::get('/programa', [ProgramaController::class, 'list'])->name('listPrograma');

Route::get('/programa/{id?}/anexos', [AnexoController::class, 'listAnexos'])->name('listAnexos');
Route::post('/programa/{id?}/anexos/new', [AnexoController::class, 'createAnexo'])->name('createAnexo');
Route::get('/programa/{id?}/anexos/delete/{idAnexo?}', [AnexoController::class, 'deleteAnexo'])->name('deleteAnexo');


Route::get('/beneficiarios/', [BeneficiarioController::class, 'listar']);
Route::get('/beneficiarios/adicionar', [BeneficiarioController::class, 'inicio']);
Route::get('/beneficiarios/adicionar/{id}', [BeneficiarioController::class, 'adicionar']);
Route::get('/beneficiarios/remover/{id}', [BeneficiarioController::class, 'remover']);

Route::get('/contas/adicionar', [ContaController::class, 'inicio']);
Route::post('/contas/adicionar', [ContaController::class, 'adicionar']);
Route::get('/contas/', [ContaController::class, 'listar']);
Route::get('/contas/remover/{id}', [ContaController::class, 'remover']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




















