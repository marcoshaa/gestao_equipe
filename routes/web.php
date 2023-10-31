<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\auth\LoginController;
use App\Http\Controllers\site\RegistroController;
use App\Http\Controllers\site\PerfilController;
use App\Http\Controllers\site\InicialController;
use App\Http\Controllers\site\QuestaoController;
use App\Http\Controllers\site\MaterialController;
use App\Http\Controllers\admin\AdmController;
use App\Http\Controllers\ViewMaterialController;
use App\Http\Controllers\RedeNeuralController;
use Illuminate\Support\Facades\Storage;


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
    Route::get('/administrador',[InicialController::class, 'adm'])->name('adm');
    // Route::post('inicio',[LoginController::class, 'index'])->name('inicio');
});

Route::middleware(['auth','verified'])->prefix('/questao')->group(function(){
    Route::post('/quiz',[QuestaoController::class, 'primeiroAcesso'])->name('primeiroAcesso');
    Route::post('/envia_questao',[QuestaoController::class, 'questaoEnviada'])->name('questao_enviada');
    Route::post('/recebe_questao',[QuestaoController::class, 'recebeQuestao'])->name('recebeQuestao');
});

Route::middleware(['auth','verified'])->prefix('/inicio/analise')->group(function(){
    Route::get('/',function (){return view('site.perguntas');});
});

Route::middleware(['auth','verified'])->prefix('/perfil')->group(function(){
    Route::get('/',[PerfilController::class, 'perfil'])->name('perfil');
    Route::post('/troca/senha',[PerfilController::class, 'trocaSenha'])->name('trocaSenha');
    Route::post('/troca/dados/user',[PerfilController::class, 'trocaDadosUser'])->name('trocaDadosUser');
    Route::post('/recebe/dados/grafico',[PerfilController::class, 'retornaDadosGraficoUm'])->name('PrimeiroGrafico');
});

Route::prefix('/ADM')->group(function(){
    Route::get('/usuario',[AdmController::class, 'usuarioAdm'])->name('usuarioAdm');
    Route::post('/usuario/envio-dados',[AdmController::class, 'criaNovoUsuarioAdm'])->name('newAdm');
    Route::post('/pergunta/envio-dados',[AdmController::class, 'criaPergunta'])->name('newPergunta');
    Route::post('/material/envio-dados',[AdmController::class, 'criaMaterial'])->name('newMaterial');
    Route::get('/pergunta',[AdmController::class, 'novaPergunta'])->name('novaPergunta');
    Route::get('/material',[AdmController::class, 'novoMaterial'])->name('novoMaterial');
});

Route::get('/pdf{img}',[MaterialController::class, 'showPdf'])->name('showPdf');

Route::middleware(['auth','verified'])->prefix('/')->group(function(){
    Route::get('/materiais',[MaterialController::class, 'viewMaterial'])->name('viewMaterial');
    Route::get('/materiais/painel/{materia}',[MaterialController::class, 'viewMaterialSelec'])->name('viewMaterialSelec');
});

Route::get('/img', function () {
    // Obtenha a URL assinada do arquivo PDF no S3    
    $url = Storage::disk('s3')->temporaryUrl("matematica/acSFpbaEVCmeqIuqqPsUVZRyWjSSAXrGBs5wkvVa.pdf", now()->addMinutes(120));
    return $url;
})->name('geralPdf');

Route::middleware(['auth','verified'])->get('/FAQ', function(){ 
    return view('site.faq');
})->name('faq.view');

Route::middleware(['auth','verified'])->prefix('/material')->group(function(){
    Route::post('/material/saveView',[ViewMaterialController::class, 'viewMaterial'])->name('dataMaterial');
});

Route::get('/teste',[RedeNeuralController::class, "fristIa"]);