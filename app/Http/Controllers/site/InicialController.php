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

    private function setUser(){
        $this->user = Controller::user();
    }

    public function getUser(){
        return $this->user();
    }

    public function getMenu(){
        return $this->menu;
    }

    public function setMenu(){
        $this->menu = menu::where('nivel', $this->user['niveis'])->get();
    }

    public function index(){
        $user = $this->getUser();        
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
}