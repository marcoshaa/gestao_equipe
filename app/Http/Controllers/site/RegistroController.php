<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    function index(){
        return view('site.cadastro');
    }
    function created(Request $request){
        $check = $this->check();
        if($check != 'novo'){
            return $x = 'Email ja em uso.';
        }
        $user = new User;
        $user->nome = $request->nome;
        $user->email = $request->email;
        $user->password = hash::make($request->nome);
        $user->data_nascimento = $request->data_nascimento;
        $user->cor = $request->cor_perfil;
    }
     
    function check($email){
        $volta = 'novo';
        $check = User::where('email',$email)->first();
        if(!empty($check)){
            $volta = 'existe';
        }
        return $volta;
    }
}
