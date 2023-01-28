<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Menu;

class InicialController extends Controller
{
    private $user;
    private $menu;

    public function __construct(){
        setUser();
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
}