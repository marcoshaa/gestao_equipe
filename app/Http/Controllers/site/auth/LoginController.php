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
            'nome.min' => 'É necessário no mínimo 4 caracteres no nome!',
            'email.email' => 'Digite um email válido!'
        ];

        $x = $dados->validate([
            'nome' => 'required|min:5|max:10|unique:clientes',
            'idade' => 'required',
            'email' => 'required|email'
        ], $mensagens);

        return $x;
    }

    public function login(){

    }
}
