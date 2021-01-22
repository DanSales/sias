<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ListarBeneficiarioController;
use \App\Http\Controllers\AdicionarBeneficiarioController;
use \App\Http\Controllers\RemoverBeneficiarioController;
use \App\Http\Controllers\ListarContaController;
use \App\Http\Controllers\AdicionarContaController;
use \App\Http\Controllers\RemoverContaController;
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

Route::get('/listar/beneficiarios', [ListarBeneficiarioController::class, 'listar']);

Route::get('/adicionar/beneficiarios', [AdicionarBeneficiarioController::class, 'inicio']);

Route::get('/adicionar/beneficiarios/{id}', [AdicionarBeneficiarioController::class, 'adicionar']);

Route::get('/remover/beneficiarios/{id}', [RemoverBeneficiarioController::class, 'remover']);

Route::get('/adicionar/contas', [AdicionarContaController::class, 'inicio']);

Route::post('/adicionar/contas', [AdicionarContaController::class, 'adicionar']);

Route::get('/listar/contas', [ListarContaController::class, 'listar']);

Route::get('/remover/contas/{id}', [RemoverContaController::class, 'remover']);

