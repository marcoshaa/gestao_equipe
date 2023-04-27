<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DetalhesUser;
use App\Models\User;
use App\Models\Materias;

class PerfilController extends Controller
{
    private $user;

    public function __construct(){
        $this->setUser(Controller::user());
    }

    private function setUser($us){
        return $this->user=$us;
    }

    private function getUser(){
        return $this->user();
    }

    public function retornaDadosGraficoUm(){
        $grafico = Controller::acertosUsuario();
        return json_encode($grafico);
    }

    public function perfil(){        
        return view('site.perfil');
    }    

    public function trocaSenha(){

    }
//$this->getUser()->update(['name'=>'teste']) (retorna true, deu certo)

    // public function trocaDadosUser(Request $r){
    //     $detalheUser = DetalhesUser::where('id',$this->user['1']);
    // }

    public function trocaDadosUser(Request $r){
        $detalheUser = DetalhesUser::where('id',$this->user()->id)->first();
        // $detalheUser->update([
        //     ''=>
        // ])
    }

    public function dadosGrafico(){

    }
}
