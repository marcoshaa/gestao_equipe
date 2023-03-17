<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Questao;
use App\Models\HistoricoQuestao;

class QuestaoController extends Controller
{
    public function questaoEnviada(){
        $all = Questao::all();
        return $all;
    }

    public function newQuestao(Request $r){
        $new = new Questao();
        $new->title = $r->title;
        $new->id_materia = $r->id_materia;
        $new->alternativa_1 = $r->alternativa_1;
        $new->alternativa_2 = $r->alternativa_2;
        $new->alternativa_3 = $r->alternativa_3;
        $new->alternativa_4 = $r->alternativa_4;
        $new->alternativa_correta = $r->alternativa_correta;
        $new->save();
    }

    function validaId($str){
        $id = intval(str_replace('answer_','',$str));
        $query = Questao::where('id',$id)->first();
        return $query;
    }
    function recebeQuestao(){
        $itens = $_POST['dados'];
        if(count($itens) != 10){
            $x='erro';
           return json_encode($x);
        }
        foreach($itens as $index => $item){
            $qt = $this->validaId($index);
            $pontua = 0;
            if($item == $qt->alternativa_correta){
                $pontua = 1;
            }
            $newH = $this->historicoQuestao($qt->id,$pontua);            
        }
        return 'ok';
    }

    function historicoQuestao($id,$ponto){
        $novo = new HistoricoQuestao();
    }

    function primeiraQuestao(Requeste $r){
        $questao = Questao::where('id',$r);
    }
}