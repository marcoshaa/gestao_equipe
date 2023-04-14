<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DetalhesUser;
use App\Models\User;

class PerfilController extends Controller
{

    public function __construct(){                 
        
    }

    private function setUser($r){
        PerfilController::$userLogado = $r;
    }

    private function getUser(){
        
        return PerfilController::$userLogado;
    }

    public function perfil(){ 
        dd(PerfilController::$userLogado,Auth::id());      
        $this->getUser();                   
        return view('site.perfil');
    }

    public function trocaSenha(){

    }

    public function trocaDadosUser(Request $r){
        $cliente = DetalhesUser::where('id',$this->user['1']);
    }
}
