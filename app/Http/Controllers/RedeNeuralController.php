<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\HistoricoQuestao;
use App\Models\Material;
use App\Models\ViewMaterial;

use Rubix\ML\Classifiers\ExtraTreeClassifier;
use Rubix\ML\Classifiers\NaiveBayes;
use Rubix\ML\Classifiers\SVC;
use Rubix\ML\CrossValidation\Metrics\Accuracy;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Kernels\SVM\Linear;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\Regressors\Ridge;
use Rubix\ML\Datasets\Unlabeled;

class RedeNeuralController extends Controller
{
    protected $user;

    public function __construct()
    {
        //$this->setUser(Controller::user());
        $this->setUser(User::find(1));
    }

    protected function setUser($us){
        return $this->user=$us;
    }

    public function fristIa()
    {
        //dd(User::all(),HistoricoQuestao::where('id_user',1)->get(),Material::all());
       // dd($this->user);
        // $csvUrlStream = fopen('https://gist.githubusercontent.com/guilhermesilveira/2d2efa37d66b6c84a722ea627a897ced/raw/1"0"968b997d885cbded1c92938c7a9912ba41c615/tracking.csv', 'r');
        // $headers = fgets($csvUrlStream);
        
        //$questoes = HistoricoQuestao::where('id_user',$this->user->id)->get();
        $questoes = HistoricoQuestao::all();
        //dd($questoes);
        $qe = $this->findIdMateria(1);
       //dd($qe,Material::all());
        $samples = [];
        $labels = [];
        foreach($questoes as $questoe){

            $labels[] = $this->locationMaterial($qe,$questoe);
            $samples[] = [$questoe['id_materia'], $questoe['id_alternativa'], $questoe['resultado']];

        }
        
        while (!feof($csvUrlStream)) {
            //dd($csvUrlStream);
            $line = fgetcsv($csvUrlStream);
            $labels[] = $line[3] === '"0"' ? 'Não Compraria' : 'Compraria';

            $samples[] = [$line["0"], $line[1], $line[2]];
        }

        //dd($samples);
        $dataset = new Labeled($samples, $labels);

        [$training, $testing] = $dataset->stratifiedSplit(0.90);

        // $estimator = new SVC(kernel: new Linear());
        $estimator = new NaiveBayes();
        $estimator->train($training);
        $predictions = $estimator->predict($testing);
        /*

            Salvar os dados em um .arquivo

                // Salvando o modelo treinado
                $model = new PersistentModel($estimator, new Filesystem('arqTreinamento.rbx'));
                $model->save();

                // Carregando o modelo treinado
                $model = PersistentModel::load(new Filesystem('arqTreinamento.rbx'));

        */
        

        $metric = new Accuracy();
        $score = $metric->score($predictions, $testing->labels());
        
        dd($predictions,$samples,$score);

        
    }

    private function locationMaterial($quiz,$questao)
    {
        $filename = 'segia.csv';
        //$file = fopen($filename, 'a');
        $file = fopen($filename, 'r');
        
        //$registroCSV = $questao->id_alternativa.','.$questao->resultado.','.$quiz[1] . "\n";
        // Escreva o registro CSV no arquivo
        // fwrite($file, $registroCSV);

        // fclose($file);
        // $ids = explode(',',$quiz[1]);

        // $hist = ViewMaterial::where('id_user',$this->user->id ?? 1)->whereIn('id_material',$ids)->pluck('id_material')->toArray();
        // $hist = implode(',', $hist);

        $csvUrlStream = $file;
        
        while (!feof($csvUrlStream)) {
            $line = fgetcsv($csvUrlStream);

            $samples[] = [$line[0] ?? "0", $line[1] ?? "0", $line[2] ?? "0",$line[4] ?? "0",$line[5] ?? "0",$line[6] ?? "0",$line[7] ?? "0",$line[8] ?? "0"];
            $label[] = $this->transformeArray($line);
        }



        // $hist = ViewMaterial::all()->pluck('id_material')->toArray();
        // $hist = implode(',', $hist);
        //dd($samples,$label);

        $dataset = new Labeled($samples,$label);
        [$training, $testing] = $dataset->stratifiedSplit(0.90);
        $x = [50,0,4,0,0,0,0,0];
        //dd($x,$testing);
        // $estimator = new SVC(kernel: new Linear());
        // $estimator = new NaiveBayes();
        // $estimator->train($training);
        // $predictions = $estimator->predict($x);

        $tree = new ExtraTreeClassifier();
        $tree->train($training);
        $predictions = $tree->predict( new Unlabeled([
            [50,0,4,0,0,0,0,0]
        ]));
        dd($predictions,$testing);

        /*
         O que falta {
            - Fazer uma Rotina automatica para teste []
            - Terminar de ajustar os retornos da IA []
            - Fazer a parte escrita []
            - fazer as função no js para capturar a leitura dos arquivos (uma unica vez) []
            - Exibir a mensagem da IA para o usuario []
            - Retornar com data ? a mensagem para que ele saiba o dia que exevutou a atividade?
         }

        */
        
    }

    protected function findIdMateria($id)
    {
        $ids = Material::where('id_materia', $id)->pluck('id')->toArray();
        $x["0"] = count($ids);
        $x[1] = implode(',', $ids);
        return $x;
    }
    
    protected function transformeArray($line)
    {
        $x = '';
        if (is_array($line)) {
            $count = count($line);
            for($i = 2; $i < $count; $i++ ) {
            
                $x .= $line[$i].',';
            }
        } else {
            $x .= "0,0,0".',';
        }
        return $x;
    }
}