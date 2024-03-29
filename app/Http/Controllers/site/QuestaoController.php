<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Questao;
use App\Models\HistoricoQuestao;

class QuestaoController extends Controller
{
    private $user;

    public function __construct(){
        $this->setUser(Controller::user());
    }

    private function setUser($us){
        $this->user=$us;
    }

    private function getUser(){
        return $this->user();
    }

    //******************************/

    public function questaoEnviada(){        
        if($this->user()->primeiro_acesso == 'n'){
            $acesso = $this->buscaQuestao();
        }else{
            $acesso = $this->primeiraQuestao();
        }
        return $acesso;
    }

    private function primeiraQuestao(){
        $perguntas = Questao::offset(0)->limit(10)->get();        
        return $perguntas;
    }

    private function buscaQuestao(){
        $x = $this->buscaHistorico();
        $x = "[$x]";        
        $falta = Questao::where('id','!=',$x)->inRandomOrder()->limit(10)->get();;
        
        return $falta;
    }

    private function buscaHistorico(){
        $questoes = HistoricoQuestao::where('id_user',$this->user()->id)->get(['id_alternativa']);        
        $volta = '';
        foreach($questoes as $questao){
            $volta = $questao->id_alternativa.','.$volta;
        }
        return $volta;
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
        Controller::log("Questão criada com sucesso ($new->id).");
    }

    private function validaId($str){
        $id = intval(str_replace('answer_','',$str));
        $query = Questao::where('id',($id))->first();
        return $query;
    }

    public function recebeQuestao(){
        $itens = $_POST['dados'];      
        if(count($itens) != 10){            
            $x='erro';
           return json_encode($x);
        }
        foreach($itens as $index => $item){
            $qt = $this->validaId($index);            
            $pontua = 0;
            $xr[] = [$item,$qt['alternativa_correta']??0];
            if($item == $qt['alternativa_correta']){
                $pontua = 1;
            }
            $newH = $this->historicoQuestao($qt,$pontua);
        }
        if($this->user()->primeiro_acesso == 's'){
            $this->atualizaPerfilAcesso();
        }
        return 'ok';
    }

    private function materiaId($id){
        $x = Questao::where('id',$id)->first('id_materia');
        return $x;
    }

    private function historicoQuestao($questao,$pontua){        
        $novoHistorico = new HistoricoQuestao();
        $novoHistorico->id_user=$this->user()->id;
        $novoHistorico->id_materia=$questao['id_materia'];
        $novoHistorico->id_alternativa=$questao['id'];
        $novoHistorico->resultado=$pontua;
        $novoHistorico->save();
        Controller::log("Historico criada com sucesso ($novoHistorico->id).");
    }

    private function atualizaPerfilAcesso(){
        $user = User::where('id','=',$this->user()->id)->update(['primeiro_acesso'=>'n']);
    }
}