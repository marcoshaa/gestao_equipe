<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\auth\LoginController;
use App\Http\Controllers\site\RegistroController;
use App\Http\Controllers\site\PerfilController;
use App\Http\Controllers\site\InicialController;
use App\Http\Controllers\site\QuestaoController;

// Página principal
Route::get('/', function () {
    // Caso user não esteja logado
    if(Auth::check()){
        // será direcionado para a dashboard
        return redirect ('/painel');
    }
    // Caso esteja logado
    else{
        // Será redirecionado para a dashboard falsa para fazer login
        return redirect ('/login');
    }
});

Route::prefix('/login')->group(function(){
    Route::get('/', function (){return view('site.login');})->name('login');
    Route::post('/validacao',[LoginController::class, 'index'])->name('login_validacao');
    Route::get('/sair/sistema',[LoginController::class, 'logout'])->name('logout');
});

Route::prefix('/registro')->group(function(){
    Route::get('/', function (){return view('site.cadastro');})->name('cad_novo_us');
    Route::post('/registro-novo',[RegistroController::class, 'created'])->name('new_user');
});

Route::middleware(['auth','verified'])->prefix('/')->group(function(){
    Route::get('painel',[InicialController::class, 'index'])->name('inicio');    
    Route::get('/quiz',[InicialController::class, 'quiz'])->name('quiz');    
    // Route::post('inicio',[LoginController::class, 'index'])->name('inicio');
});

Route::prefix('/questao')->group(function(){
    Route::post('/envia_questao',[QuestaoController::class, 'questaoEnviada'])->name('questao_enviada');
    Route::post('/recebe_questao',[QuestaoController::class, 'recebeQuestao'])->name('recebeQuestao');
});

Route::middleware(['auth','verified'])->prefix('/inicio/analise')->group(function(){
    Route::get('/',function (){return view('site.perguntas');});
});

Route::prefix('/perfil')->group(function(){
    Route::get('/',[PerfilController::class, 'perfil'])->name('perfil');
    Route::post('/troca/senha',[PerfilController::class, 'trocaSenha'])->name('trocaSenha');
    Route::post('/troca/dados/user',[PerfilController::class, 'trocaDadosUser'])->name('trocaDadosUser');
});