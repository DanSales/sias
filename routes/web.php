<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaController;
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


