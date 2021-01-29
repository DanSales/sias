<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\AnexoController;
use \App\Http\Controllers\BeneficiarioController;
use \App\Http\Controllers\ContaController;
<<<<<<< HEAD
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\BolsaController;
=======
use \App\Http\Controllers\ServidorController;
>>>>>>> upstream/master
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
 * -------------------------------ROTAS BENEFICIÁRIO-------------------------------------
 * */
Route::get('/beneficiarios/', [BeneficiarioController::class, 'listar']);
Route::get('/beneficiarios/adicionar', [BeneficiarioController::class, 'inicio']);
Route::get('/beneficiarios/adicionar/{id}', [BeneficiarioController::class, 'adicionar']);
Route::get('/beneficiarios/remover/{id}', [BeneficiarioController::class, 'remover']);

/*
 * -------------------------------ROTAS CONTA -------------------------------------
 * */

Route::get('/contas/adicionar', [ContaController::class, 'inicio']);
Route::post('/contas/adicionar', [ContaController::class, 'adicionar']);
Route::get('/contas/', [ContaController::class, 'listar']);
Route::get('/contas/remover/{id}', [ContaController::class, 'remover']);

/*
 * -------------------------------ROTAS BOLSA -------------------------------------
 * */

Route::get('/contas/{idConta}/bolsas/', [BolsaController::class, 'listBolsaBeneficiario'])->name('listBolsaBeneficiario');
Route::get('programa/{idPrograma}/bolsas', [BolsaController::class, 'listBolsasPrograma'])->name('listBolsaPrograma');

Auth::routes();

<<<<<<< HEAD
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/edital/adicionar', [EditalController::class, 'create'])->name('createEdital');
Route::get('/edital/atualizar/{idEdital?}', [EditalController::class, 'update'])->name('updateEditalView');
Route::post('/edital/atualizar/{idEdital?}', [EditalController::class, 'update'])->name('updateEdital');
Route::post('/edital/remover/{idEdital?}', [EditalController::class, 'delete'])->name('deleteEdital');
Route::get('/edital/vizualizar/{idEdital?}', [EditalController::class, 'view'])->name('viewEdital');
Route::get('/edital', [EditalController::class, 'list'])->name('listEdital');



=======
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



















Route::get('/servidors/', [ServidorController::class, 'listar']);
Route::get('/servidors/adicionar', [ServidorController::class, 'inicio']);
Route::post('/servidors/adicionar', [ServidorController::class, 'adicionar']);


>>>>>>> upstream/master
