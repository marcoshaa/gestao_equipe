<?php

namespace App\Http\Controllers\site\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Suport\Facedes\Auth;
use Illuminate\Suport\Facedes\Validator;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index(){
        return view('site.inicio');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    protected function validator(array $dados){       
        $mensagens = [
            'required' => 'O :attribute é obrigatório!',
            'password.min' => 'É necessário no mínimo 4 caracteres no senha!',
            'password.max' => 'É no máximo 6 caracteres no senha!',
            'email.email' => 'Digite um email válido!',
            'email.max' => 'É no máximo 255 caracteres no campo email!'
        ];

        return $dados->validate([
            'nome' => 'required|min:5|max:10|unique:clientes',
            'password' => 'required|min:4|max:6',
            'email' => 'required|email|max:255'
        ], $mensagens);
         
    }

    public function login(Request $request){
        $data = $request->only([
            'email',
            'password',
            'remember'
        ]);

        $userValidator = $this->validator($data);

        if($userValidator->fails()){
            return redirect()->route('login')
            ->withErrors($userValidator)
            ->withInput();  
        }

        if(Auth::attempt($data)){
            return redirect()->route('inicio');
        }else{
            $userValidator->errors()->add('password','E-mail e/ou Senha Incorreto.');
            return redirect()->route('login')
            ->withErrors($userValidator)
            ->withInput();  
        }

    }
}
