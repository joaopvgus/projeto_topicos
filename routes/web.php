<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EmprestimoController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




Route::group(['middleware' => ['auth']], function() {
    Route::get('/listarLivro', [LivroController::class, 'listar'])->name('listarLivro');
    Route::post('/salvar', [ClienteController::class, 'salvar'])->name('salvar');
    Route::get('/criar', [ClienteController::class, 'criar'])->name('criar');
    Route::get('/listar', [ClienteController::class, 'listar'])->name('listar');
    Route::get('/deletar/{id}', [ClienteController::class, 'deletar'])->name('deletar');
    Route::get('/alterar/{id}', [ClienteController::class, 'update'])->name('update');
    Route::post('/alterar/', [ClienteController::class, 'alterar'])->name('alterar');

    Route::post('/salvarLivro', [LivroController::class, 'salvar'])->name('salvarLivro');
    Route::get('/criarLivro', [LivroController::class, 'criar'])->name('criarLivro');

    Route::get('/deletarLivro/{id}', [LivroController::class, 'deletar'])->name('deletarLivro');
    Route::get('/alterarLivro/{id}', [LivroController::class, 'update'])->name('updateLivro');
    Route::post('/alterarLivro/', [LivroController::class, 'alterar'])->name('alterarLivro');

    Route::post('/salvarEmprestimo', [EmprestimoController::class, 'salvar'])->name('salvarEmprestimo');
    Route::get('/criarEmprestimo', [EmprestimoController::class, 'criar'])->name('criarEmprestimo');
    Route::get('/listarEmprestimo', [EmprestimoController::class, 'listar'])->name('listarEmprestimo');
    Route::get('/getClientesELivros', [EmprestimoController::class, 'getClientesELivros'])->name('getClientesELivros');
    Route::get('/deletarEmprestimo/{id}', [EmprestimoController::class, 'deletar'])->name('deletarEmprestimo');
    Route::get('/alterarEmprestimo/{id}', [EmprestimoController::class, 'update'])->name('updateEmprestimo');
    Route::post('/alterarEmprestimo/', [EmprestimoController::class, 'alterar'])->name('alterarEmprestimo');
    Route::get('/finalizarEmprestimo/{id}', [EmprestimoController::class, 'finalizar'])->name('finalizarEmprestimo');
});

Route::get('/', function () {
    return view('PaginaInicial');
})->name('Home');
