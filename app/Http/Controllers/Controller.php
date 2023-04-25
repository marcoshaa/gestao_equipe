<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoricoQuestao;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function user(){
        $user = User::where('id',Auth::id())->first();
        return $user;
    }

    // public static function resultados(){
    //     $resultado = HistoricoQuestao::where('id_user',Controller::user()->id);
    //     $total_de_respostas = $resultado->count();
        
        
    //     return $resultados;
    // }

}
