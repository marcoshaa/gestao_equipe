<?php

namespace App\Http\Controllers\site\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Redirect;
use Hash;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $data = [
            'email'=>$request->email_login,
            'password'=>$request->senha_login
        ];

        $userValidator = $this->validadorCred($data['email'],$data['password']);
        
        if($userValidator[0] == '1'){            
            return ['falha',$userValidator[1]];
        }
        $check = $userValidator[1];
        
        //$check = User::where('email',$data['email'])->first();
        if(empty($check)){
            
            return ['falha','Email e/ou Senha incorretos'];
        }else{     
            if(Hash::check($data['password'], $check->password)){       
                if(Auth::attempt($data)){
                    //dd(['email' => $data['email'], 'password' => $data['password']]);
                    $request->session()->regenerate();                        
                    return ['sucesso',route('inicio')];
                }  
            }    
        }
    }

    public function logout(){        
        Auth::logout();
        return redirect()->route('login');
    }

    // protected function validator2($dados){       
    //     $mensagens = [
    //         'required' => 'O atributo é obrigatório!',
    //         'password.min' => 'É necessário no mínimo 6 caracteres na senha!',
    //         'password.max' => 'É no máximo 6 caracteres no senha!',
    //         'email.email' => 'Digite um email válido!',
    //         'email.max' => 'É no máximo 255 caracteres no campo email!'
    //     ];
    //     return $dados->validate([           
    //     'email' => 'required|email|max:255',
    //     'password' => 'required|min:6|max:6',        
    //     ]);
        
    // }

    // public function login(Request $request){
    //     $data = $request->only([
    //         'email',
    //         'password'
    //     ]);

    //     $userValidator = $this->validator($data);

    //     if($userValidator->fails()){
    //         return redirect()->route('login')
    //         ->withErrors($userValidator)
    //         ->withInput();  
    //     }

    //     if(Auth::attempt($data)){
    //         return redirect()->route('inicio');
    //     }else{
    //         $userValidator->errors()->add('password','E-mail e/ou Senha Incorreto.');
    //         return redirect()->route('login')
    //         ->withErrors($userValidator)
    //         ->withInput();  
    //     }

    // }
    protected function validadorCred($email,$senha){        
        $check = User::where('email',$email)->first();         
        $msg[0]='0';       
        $msg[1]=$check;
        //caso nao ache o  email
        if(empty($check)){
            $msg[0]='1';
            $msg[1] = 'Email não encontrado';
        }
        //caso nao ache a senha
        if(!empty($senha)){
            if(strlen($senha) < 6){
                $msg[0]='1';
                $msg[1] = 'É necessário no mínimo 6 caracteres na senha!';
            }else if(strlen($senha) > 6){
                $msg[0]='1';
                $msg[1] = 'É no máximo 6 caracteres no senha!';
            }           
        }else{
            $msg[0]='1';
            $msg[1] = 'O campo Senha é obrigatorio';
        }
        return $msg;
    }

}
