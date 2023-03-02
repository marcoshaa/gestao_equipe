<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Questao;

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

    
}