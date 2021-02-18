<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\AnexoController;
use \App\Http\Controllers\BeneficiarioController;
use \App\Http\Controllers\ContaController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\BolsaController;
use \App\Http\Controllers\ServidorController;
use \App\Http\Controllers\FamiliaController;
use \App\Http\Controllers\SaudeController;
use \App\Http\Controllers\EditalController;
use \App\Http\Controllers\WelcomeController;
use \App\Http\Controllers\InscricaoController;
use \App\Http\Controllers\OutrasInfoController;
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

Route::get('/', [WelcomeController::class, 'inicio'])->name("homePage");

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
Route::get('/edital/adicionar', [EditalController::class, 'createView'])->name('createEdital');
Route::post('/edital/adicionar', [EditalController::class, 'create'])->name('createEdital');
Route::get('/edital/atualizar/{idEdital?}', [EditalController::class, 'update'])->name('updateEditalView');
Route::post('/edital/atualizar/{idEdital?}', [EditalController::class, 'update'])->name('updateEdital');
Route::get('/edital/remover/{idEdital?}', [EditalController::class, 'delete'])->name('deleteEdital');
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
Route::get('/contas/atualizar/{id?}', [ContaController::class, 'initatualizar'])->name('atualizarContaView');
Route::post('/contas/atualizar/{id?}', [ContaController::class, 'atualizar'])->name('atualizarConta');
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


/*
 * ----------------------------------------ROTAS INSCRICAO------------------------------------------------
 * */

Route::get('/inscricao/programa' ,[InscricaoController::class, 'inscricaoSelectProgramaView'])
    ->name('selecionarProgramaInscricao');

Route::get('/inscricao/{idPrograma}/edital',[InscricaoController::class, 'inscricaoSelectEditalView'])
    ->name('selecionarEditalInscricao');

Route::get('/inscricao/{idEdital}/familias/', [FamiliaController::class, 'listar'])
    ->name('listaFamilias');

Route::get('/inscricao/{idEdital}/familias/adicionar', [FamiliaController::class, 'inicio'])
    ->name('adicionarFamiliaView');

Route::post('/inscricao/{idEdital}/familias/adicionar', [FamiliaController::class, 'adicionar'])
    ->name('adicionarFamilia');

Route::get('/inscricao/{idEdital}/familias/atualizar/{idFamilia}', [FamiliaController::class, 'initatualizar'])
    ->name('atualizarFamiliaView');
Route::post('/inscricao/{idEdital}/familias/atualizar/{idFamilia}', [FamiliaController::class, 'atualizar'])
    ->name('atualizarFamilia');

Route::get('/inscricao/{idEdital}/familias/{idFamilia}/outifo/adicionar', [OutrasInfoController::class, 'adicionarView'])
    ->name('adicionarOutrasInfoView');

Route::post('/inscricao/{idEdital}/familias/{idFamilia}/outifo/adicionar', [OutrasInfoController::class, 'adicionar'])
    ->name('adicionaradicionarOutrasInfo');


Route::get('/familias/{id?}/saudes/',[SaudeController::class, 'listar'])->name('listaSaudes');
Route::get('/familias/{id?}/saudes/adicionar',[SaudeController::class, 'inicio'])->name('adicionarSaudesView');
Route::post('/familias/{id?}/saudes/adicionar',[SaudeController::class, 'adicionar'])->name('adicionarSaudes');
