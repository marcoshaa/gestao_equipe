<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoricoQuestao;
use App\Models\Materias;
use App\Models\User;
use App\Models\Menu;

class InicialController extends Controller
{
    private $user;

    public function __construct(){
       $this->setUser();
    }

    private function setUser(){
        $this->user = Controller::user();
    }

    public function getUser(){
        return $this->user();
    }

    public function index(){
        $user = $this->getUser();        
        $ret = $this->notasGeral();    
        $medias=$this->maiorRetorno(Controller::retornoPorcento());
        //dd($medias);
        return view('site.inicio')
        ->with('user',$user)
        ->with('medias',$medias);
    }

    private function maiorRetorno(array $tx){
        //dd($tx);
        $menor = 0;
        $maior = 0;
        $conjMaior = [];
        $conjMenor = [];
        $id = 1;
        foreach($tx as $key=>$valor){
            if($valor>$maior){
                $maior = $valor;
                $tr = Materias::where('id',intval($key+1))->first('title');
                $conjMaior=['titulo'=>$tr->title,'valor'=>$maior];
            }else{
                $tr = Materias::where('id',intval($key+1))->first('title');
            }
            if($valor<=$menor){
                $menor = $valor;
                $tr = Materias::where('id',intval($key+1))->first('title');
                $conjMenor=['titulo'=>$tr->title,'valor'=>$menor];
            }
            
        }
        return [$conjMaior,$conjMenor];
    }
    private function menorRetorno(array $tx){
        //dd($tx);
        $volta = 0;
        $id = 1;
        foreach($tx as $key=>$valor){
            if($valor<=$volta){
                $volta = $valor;
                $id = Materias::where('id',intval($key+1))->first();
            }
        }
        return [$id->title,$volta];
    }

    public function quiz(){
        return view('site.perguntas');
    }

    public function adm(){
        $user = $this->getUser();   
        return view('site.adm')
        ->with('user',$user);
    }

    private function notasGeral(){
        $historicoQt = HistoricoQuestao::where('id_user',$this->getUser()->id);
        $quantidade = $historicoQt->count();
        $historicoQt->where('id_materia',1)->get();
        return $historicoQt;
    }
}