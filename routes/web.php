<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\auth\LoginController;
use App\Http\Controllers\site\RegistroController;
use App\Http\Controllers\site\PainelController;
use App\Http\Controllers\site\InicialController;


Route::prefix('/login')->group(function(){
    Route::get('/', function (){return view('site.login');})->name('login');
    Route::post('/validacao',[LoginController::class, 'index'])->name('login_validacao');
    Route::get('/sair/sistema',[LoginController::class, 'logout'])->name('logout');
});

Route::prefix('/registro')->group(function(){
    Route::get('/', function (){return view('site.cadastro');})->name('cad_novo_us');
    Route::post('/registro-novo',[RegistroController::class, 'created'])->name('new_user');
});

Route::prefix('/')->group(function(){
    Route::get('painel',[InicialController::class, 'index'])->name('inicio');
    Route::get('/perfil',[InicialController::class, 'perfil'])->name('perfil');
    Route::get('/quiz',[InicialController::class, 'quiz'])->name('quiz');
    // Route::post('inicio',[LoginController::class, 'index'])->name('inicio');
});

Route::prefix('/inicio/analise')->group(function(){
    Route::get('/',function (){return view('site.perguntas');});
});
