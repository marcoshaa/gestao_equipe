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
        $menor=$this->menorRetorno(Controller::retornoPorcento());
        $maior=$this->maiorRetorno(Controller::retornoPorcento());
        
        return view('site.inicio')
        ->with('user',$user)
        ->with('maior',$maior)
        ->with('menor',$menor);
    }

    private function maiorRetorno(array $tx){
        //dd($tx);
        $volta = 0;
        $id = 1;
        foreach($tx as $key=>$valor){
            if($valor>$volta){
                $volta = $valor;
                $tr = Materias::where('id',intval($key+1))->first('title');
            }else{
                $tr = Materias::where('id',intval($key+1))->first('title');
            }
        }
        //dd($tr->title);
        return [$tr->title,$volta];
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