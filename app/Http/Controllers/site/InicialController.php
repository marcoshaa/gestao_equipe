<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoricoQuestao;
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
        dd(Controller::resultados());
        return view('site.inicio')
        ->with('user',$user);
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