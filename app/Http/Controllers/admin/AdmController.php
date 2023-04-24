<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Questao;
use App\Models\Materias;
use App\Models\User;
use Hash;

class AdmController extends Controller
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

    public function usuarioAdm(){
        return view('adm.userAdm');
    }

    public function novaPergunta(){
        $materiais = Materias::all();
        return view('adm.pergunta')
        ->with('materiais',$materiais);
    }

    public function novoMaterial(){
        return view('adm.material');
    }

    public function criaNovoUsuarioAdm(Request $r){        
        $novoAdm = new User;
        $novoAdm->nome = $r->form_nome;
        $novoAdm->email  = $r->form_email;
        $novoAdm->password =  hash::make($r->form_senha);
        $novoAdm->acesso = 0;
        $novoAdm->primeiro_acesso = 'n';
        $novoAdm->save();        
        if(!empty($novoAdm->id)){
            $volta = 'ok';
            $this->criaDetalhesUser($novoAdm,$r->form_data_nascimento);
        }else{
            $volta = 'erro';
        }
        return $volta;
    }
    
    private function criaDetalhesUser($user,$data){
        if(!empty($user->id)){
            $newDt = new DetalhesUser;
            $newDt->id_user = $user->id;
            $newDt->data_nascimento = $data;
            $newDt->save();
        }
    }

    public function criaPergunta(Request $r){
        $x =$r->form_anternative_correta;
        $alternativa = new Questao;
        $alternativa->title = $r->form_titulo;
        $alternativa->id_materia = $r->form_material;
        $alternativa->alternativa_1 = $r->form_anternative_1;
        $alternativa->alternativa_2 = $r->form_anternative_2;
        $alternativa->alternativa_3 = $r->form_anternative_3;
        $alternativa->alternativa_4 = $r->form_anternative_4;
        $alternativa->alternativa_correta = $r->$x;
        $alternativa->save();
        if(!empty($alternativa->id)){
            $volta='ok';
        }else{
            $volta='erro';
        }
        return $volta;
    }
}