<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class RegistroController extends Controller
{
    function index(){
        return view('site.cadastro');
    }
    function created(Request $request){
        $check = $this->check($request->form_email_register);
        if($check != 'novo'){
            return $x = 'Email ja em uso.';
        }
        $user = new User;
        $user->nome = $request->form_nome_register;
        $user->email = $request->form_email_register;
        $user->password = hash::make($request->form_senha);
        $user->data_nascimento = $request->form_date_register;
        $user->cor = $request->form_color;
        $user->save();
        if(!empty($user->id)){
            $x = "ok";
        }else{
            $x = "fail";
        }
        return $x;
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
