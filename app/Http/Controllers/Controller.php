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

    public static function resultados(){
        $resultado = HistoricoQuestao::where('id_user',Controller::user()->id)->get(['id_alternativa','id_materia','resultado']);
        $total_de_respostas = $resultado->count(); //retorna tds as questoes.
        $x=[];
        foreach($resultado as $key=>$value){
            $x[$key]=array(
                            'resultado'=>$value->resultado,
                            'materia'=>$value->id_materia,
                            'questao'=>$value->id_alternativa
                            );
        }
        // dd($x);
        $avaliacao = Controller::trataMaterias($x);
        return [$avaliacao,$total_de_respostas];
    }

    private static function trataMaterias($dados){
        // dd($dados);
        $materias = array('1'=>array(),'2'=>array(),'3'=>array(),'4'=>array());
        foreach($dados as $key=>$value){
            // dd($value['materia']);
            array_push($materias[$value['materia']],$value['resultado']);
        }
        $x=[];
        foreach($materias as $reposta){
            $x[]=array_count_values($reposta);
        }
        return $x;
    }

    public static function retornoPorcento(){
        
    }

}
