<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Menu;

class InicialController extends Controller
{
    private $user;
    private $menu;

    public function __construct(){
       $this->setUser();
    }

    public function setUser(){
        $this->user = User::where('id', Auth::id())->first();
    }

    public function getUser(){
        return $this->user;
    }

    public function getMenu(){
        return $this->menu;
    }

    public function setMenu(){
        $this->menu = menu::where('nivel', $this->user['niveis'])->get();
    }

    function index(){
        return view('site.inicio');
    }

    function perfil(){
        return view('site.perfil');
    }

    function quiz(){
        return view('site.perguntas');
    }
}