<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');
Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno.store');
Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');
Route::put('/aluno/update/{id}', [AlunoController::class, 'update'])->name('aluno.update');
Route::post('/aluno/search', [AlunoController::class, 'search'])->name('aluno.search');
Route::delete('/aluno/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');

Route::get('/curso', [CursoController::class, 'index'])->name('curso.index');
Route::get('/curso/create', [CursoController::class, 'create'])->name('curso.create');
Route::post('/curso', [CursoController::class, 'store'])->name('curso.store');
Route::get('/curso/edit/{id}', [CursoController::class, 'edit'])->name('curso.edit');
Route::put('/curso/update/{id}', [CursoController::class, 'update'])->name('curso.update');
Route::post('/curso/search', [CursoController::class, 'search'])->name('curso.search');
Route::delete('/curso/{id}', [CursoController::class, 'destroy'])->name('curso.destroy');

Route::get('/turma', [TurmaController::class, 'index'])->name('turma.index');
Route::get('/turma/create', [TurmaController::class, 'create'])->name('turma.create');
Route::post('/turma', [TurmaController::class, 'store'])->name('turma.store');
Route::get('/turma/edit/{id}', [TurmaController::class, 'edit'])->name('turma.edit');
Route::put('/turma/update/{id}', [TurmaController::class, 'update'])->name('turma.update');
Route::post('/turma/search', [TurmaController::class, 'search'])->name('turma.search');
Route::delete('/turma/{id}', [TurmaController::class, 'destroy'])->name('turma.destroy');

/*
Route::get('/aluno', function () {
    return view('aluno.list');
});
*/
