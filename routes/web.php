<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\auth\LoginController;
use App\Http\Controllers\site\RegistroController;

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

Route::prefix('/login')->group(function(){
    Route::get('/', function (){return view('site.login');});
    Route::post('/validacao',[LoginController::class, 'index'])->name('login_validacao');
});

Route::prefix('/registro')->group(function(){
    Route::get('/novo',[RegistroController::class, 'index'])->name('cad_novo_us');
});

Route::prefix('/')->group(function(){
    Route::get('inicio',[LoginController::class, 'index'])->name('inicio');
});
