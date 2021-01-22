<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ListarBeneficiarioController;
use \App\Http\Controllers\AdicionarBeneficiarioController;
use \App\Http\Controllers\RemoverBeneficiarioController;
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
