<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\AnexoController;
use \App\Http\Controllers\BeneficiarioController;
use \App\Http\Controllers\ContaController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\BolsaController;
use \App\Http\Controllers\ServidorController;
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

/*
 * -------------------------------ROTAS PROGRAMA-------------------------------------
 * */

Route::post('/programa/adicionar', [ProgramaController::class, 'create'])->name('createPrograma');
Route::get('/programa/adicionar', [ProgramaController::class, 'createView'])->name('createPrograma');
Route::get('/programa/atualizar/{id?}', [ProgramaController::class, 'updateView'])->name('updatePrograma');
Route::post('/programa/atualizar/{id?}', [ProgramaController::class, 'update'])->name('updatePrograma');
Route::get('/programa/remover/{id?}', [ProgramaController::class, 'delete'])->name('deletePrograma');
Route::get('/programa', [ProgramaController::class, 'list'])->name('listPrograma');

/*
 * -------------------------------ROTAS PROGRAMA - ANEXO -------------------------------------
 * */
Route::get('/programa/{id?}/anexos', [AnexoController::class, 'listAnexos'])->name('listAnexos');
Route::post('/programa/{id?}/anexos/adicionar', [AnexoController::class, 'createAnexo'])->name('createAnexo');
Route::get('/programa/{id?}/anexos/remover/{idAnexo?}', [AnexoController::class, 'deleteAnexo'])->name('deleteAnexo');

/*
 * -------------------------------ROTAS PROGRAMA - EDITAL -------------------------------------
 * */
Route::post('/edital/adicionar', [EditalController::class, 'create'])->name('createEdital');
Route::get('/edital/atualizar/{idEdital?}', [EditalController::class, 'update'])->name('updateEditalView');
Route::post('/edital/atualizar/{idEdital?}', [EditalController::class, 'update'])->name('updateEdital');
Route::post('/edital/remover/{idEdital?}', [EditalController::class, 'delete'])->name('deleteEdital');
Route::get('/edital/vizualizar/{idEdital?}', [EditalController::class, 'view'])->name('viewEdital');
Route::get('/edital', [EditalController::class, 'list'])->name('listEdital');

/*
 * -------------------------------ROTAS BENEFICIÁRIO-------------------------------------
 * */
Route::get('/beneficiarios/', [BeneficiarioController::class, 'listar'])->name('listaBeneficiariosView');
Route::get('/beneficiarios/adicionar', [BeneficiarioController::class, 'inicio'])->name('adicionarBeneficiarioView');
Route::get('/beneficiarios/adicionar/{id}', [BeneficiarioController::class, 'adicionar'])->name('adicionarBeneficiario');
Route::get('/beneficiarios/remover/{id}', [BeneficiarioController::class, 'remover'])->name('removerBeneficiario');;

/*
 * -------------------------------ROTAS CONTA -------------------------------------
 * */

Route::get('/contas/adicionar', [ContaController::class, 'inicio'])->name('adicionarContaView');
Route::post('/contas/adicionar', [ContaController::class, 'adicionar'])->name('adicionarConta');
Route::get('/contas/', [ContaController::class, 'listar'])->name('listaContas');
Route::get('/contas/remover/{id?}', [ContaController::class, 'remover'])->name('removerConta');

/*
 * -------------------------------ROTAS BOLSA -------------------------------------
 * */

Route::get('/contas/{idConta}/bolsas/', [BolsaController::class, 'listBolsaBeneficiario'])->name('listBolsaBeneficiario');
Route::get('programa/{idPrograma}/bolsas', [BolsaController::class, 'listBolsasPrograma'])->name('listBolsaPrograma');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/servidors/', [ServidorController::class, 'listar']);
Route::get('/servidors/adicionar', [ServidorController::class, 'inicio']);
Route::post('/servidors/adicionar', [ServidorController::class, 'adicionar']);


