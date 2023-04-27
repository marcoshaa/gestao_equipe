<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoricoQuestao;
use App\Models\Materias;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function user(){
        $user = User::where('id',Auth::id())->first();
        return $user;
    }

    private static function resultados(){
        $resultado = HistoricoQuestao::where('id_user',Controller::user()->id)->get(['id_alternativa','id_materia','resultado']);
        $total_de_respostas = $resultado->count(); //retorna tds as questoes.
        $x=[];
        foreach($resultado as $key=>$value){
            $x[$key]=array(
                            'resultado'=>$value->resultado,
                            'materia'=>$value->id_materia,
                            'questao'=>$value->id_alternativa
                            );
        };
        $avaliacao = Controller::trataMaterias($x);
        //dd($avaliacao);
        return [$avaliacao,$total_de_respostas];
    }

    private static function trataMaterias($dados){
        $materias = array('1'=>array(),'2'=>array(),'3'=>array(),'4'=>array());
        foreach($dados as $key=>$value){
            array_push($materias[$value['materia']],$value['resultado']);
        }
        $x=[];
        foreach($materias as $reposta){
            $x[]=array_count_values($reposta);
        }
        //dd($x);
        return $x;
    }

    public static function retornoPorcento(){
        $tratativas = Controller::resultados();
        //dd($tratativas);
        $dados = [];
        foreach($tratativas[0] as $tratativa){
            $dados[] = Controller::fgt($tratativa);
        }        
        return $dados;
    }

    private static function fgt($materia){
        $acerto = $materia[1] ?? 0;
        $erro = $materia[0] ?? 0;
        if($erro == 0 && $acerto == 0 || $acerto == 0){
            $aproveitamento = 0;            
        }else{
            $aproveitamentoAcerto = number_format(($acerto*100)/($acerto + $erro),1,'.','');
            $aproveitamento = $aproveitamentoAcerto;
        }
        return $aproveitamento;
    }

    public static function acertosUsuario(){
        $materias = Materias::all();        
        $volta=[];
        foreach($materias as $materia){
            $volta[] = array($materia->title=>HistoricoQuestao::where('id_user',Controller::user()->id)->where('id_materia',$materia->id)->where('resultado',1)->count());
        }
        //dd($volta);
        return $volta;
    }
}
