<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DetalhesUser;
use App\Models\User;
use App\Models\Materias;
use Hash;

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
        $acertos= Controller::acertosUsuario();         
        $x=[];
        array_push($x,$acertos[0]['Matematica']);
        array_push($x,$acertos[1]['Logica']);
        array_push($x,$acertos[2]['Algoritmo']);
        array_push($x,$acertos[3]['EstruturaDeRepeticao']);        
        return json_encode($x);
    }

    public function perfil(){        
        $detalheUser = DetalhesUser::where('id_user',($this->user()->id))->first();  
        $x = Controller::tabelaDadosQuestao();
        return view('site.perfil')
        ->with('detalheUser',$detalheUser)
        ->with('xs',$x)
        ->with('user',$this->user());
    }    

    public function trocaSenha(Request $r){        
        if(strlen($r->senhaNova) == 6 && !empty($r->senhaAtual)){            
            if(Hash::check($r->senhaAtual, $this->user()->password)){
                if($r->senhaNova == $r->confirmSenhaNova){
                    $userNewPass = User::where('id',$this->user()->id)->update(['password'=>hash::make($r->senhaNova)]);
                    $volta = 'ok';
                    Controller::log("Senha Atualizada com sucesso.");
                }
            }
        }else{
            $volta = 'erro';
        }
        return json_encode($volta);
    }

    public function trocaDadosUser(Request $r){
        $volta = 'sucesso';
        $detalheUser = DetalhesUser::where('id_user',$this->user()->id)->first(); 
        $user = User::where('id','=',$this->user()->id)->update(['nome'=>"$r->form_nome_register"]);
        if($detalheUser == null){
            $userNew = DetalhesUser::create([
                'id_user'=>$this->user()->id,
                'sexo'=>$r->sexo_registro,
                'data_nascimento'=>$r->form_data_nascimento,
                'formacao'=>$r->formacao_registro,
                'cep'=>$r->cep_registro,
                'estado'=>$r->estado_casa,
                'cidade'=>$r->cidade_casa,
                'bairro'=>$r->bairro_casa,
                'rua'=>$r->rua_casa,
                'numero'=>$r->numero_casa,
            ]);
            Controller::log("Perfil criado com sucesso.");
        }else{        
            $x = DetalhesUser::where('id_user',$this->user()->id)->update([
                'sexo'=>$r->sexo_registro,
                'data_nascimento'=>$r->form_data_nascimento,
                'formacao'=>$r->formacao_registro,
                'cep'=>$r->cep_registro,
                'estado'=>$r->estado_casa,
                'cidade'=>$r->cidade_casa,
                'bairro'=>$r->bairro_casa,
                'rua'=>$r->rua_casa,
                'numero'=>$r->numero_casa,
            ]);
            Controller::log("Perfil Atualizado com sucesso.");
        }
        return json_encode($volta);
    }
}
