<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InicialController extends Controller
{
    private $user;

    public function __construct(){
        
    }

    public function setUser(){
        $this->user = User::where('id', Auth::id())->first();
    }

    public function getUser(){
        return $this->user;
    }
}