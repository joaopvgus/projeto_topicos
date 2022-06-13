<?php
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

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
    return view('PaginaInicial');
})->name('Home');


Route::post('/salvar', [ClienteController::class, 'salvar'])->name('salvar');
Route::get('/criar', [ClienteController::class, 'criar'])->name('criar');
Route::get('/listar', [ClienteController::class, 'listar'])->name('listar');
Route::get('/deletar/{id}', [ClienteController::class, 'deletar'])->name('deletar');
Route::get('/alterar/{id}', [ClienteController::class, 'update'])->name('update');
Route::post('/alterar/', [ClienteController::class, 'alterar'])->name('alterar');

Route::post('/salvarLivro', [LivroController::class, 'salvar'])->name('salvarLivro');
Route::get('/criarLivro', [LivroController::class, 'criar'])->name('criarLivro');
Route::get('/listarLivro', [LivroController::class, 'listar'])->name('listarLivro');
Route::get('/deletarLivro/{id}', [LivroController::class, 'deletar'])->name('deletarLivro');
Route::get('/alterarLivro/{id}', [LivroController::class, 'update'])->name('updateLivro');
Route::post('/alterarLivro/', [LivroController::class, 'alterar'])->name('alterarLivro');
