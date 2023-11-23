<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetalhesUser;
use App\Models\User;
use Hash;

class RegistroController extends Controller
{
    public function index(){
        return view('site.cadastro');
    }

    public function created(Request $request){
        $check = $this->check($request->form_email_register);
        if($check != 'novo'){
            return $x = ['fail','Email ja em uso.'];
        }
        $user = new User;
        $user->nome = $request->form_nome_register;
        $user->email = $request->form_email_register;
        $user->password = hash::make($request->form_senha);        
        $user->save();
        if(!empty($user->id)){
            $x = ["ok", "Conta criada"];
            $this->criaDetalhesUser($user,$request->form_date_register);
            Controller::logDetalheUser("Usuario criado com sucesso ($user->id).",$user->id);
        }else{
            $x = ["fail","Erro nos campos"];
        }
        return $x;
    }
     
    public function check($email){
        $volta = 'novo';
        $check = User::where('email',$email)->first();
        if(!empty($check)){
            $volta = 'existe';
        }
        return $volta;
    }

    private function criaDetalhesUser($user,$data){
        if(!empty($user->id)){
            $newDt = new DetalhesUser;
            $newDt->id_user = $user->id;
            $newDt->data_nascimento = $data;
            $newDt->save();
            Controller::logDetalheUser("Detalhes do usuario criado com sucesso ($newDt->id).", $user->id);
        }
    }
}
