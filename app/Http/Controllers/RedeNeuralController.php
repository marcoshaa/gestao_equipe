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
use Rubix\ML\CrossValidation\Metrics\Accuracy;
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;
use Rubix\ML\Datasets\Unlabeled;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        
        $questoes = HistoricoQuestao::where('id_user',$this->user->id)->get();
        
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

    private function locationMaterial($quiz)
    {
                
        // Carregando o modelo treinado
        $fileMl = Storage::path('rede/segia.ml', '');
        $tree = PersistentModel::load(new Filesystem($fileMl));

        $predictions = $tree->predict( new Unlabeled([
            $this->padSamples($quiz)
        ]));
        
        if ($predictions[0] != "zero") {
            return $predictions[0];
        }

        /*
         O que falta {
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
    protected function namematerial($id){
        $name = Material::find($id);

        if ( !empty($name) ) {
            $back = $name->nome;
        }else {
            $back = "zero";
        }
        return $back;
    }
    protected function transformeArray($line)
    {
        $x = '';
        if (is_array($line)) {
            $count = count($line);
            for($i = 2; $i < $count; $i++ ) {
                if ( !empty($line[$i]) ) {
                    $x .= $this->namematerial($line[$i]).',';
                } else {
                    $x .= 'zero';
                }
            }
        } else {
            $x .= "zero";
        }
        
        return $x;
    }

    public function trainingCsv()
    {
        $filePath = 'rede/segia.csv'; // Caminho relativo ao diretório "storage/app"
        $fileMl = Storage::path('rede/segia.ml', '');

        // Cria um novo arquivo CSV em branco (o arquivo anterior será substituído)
        Storage::put($filePath, '');

        $file = fopen(Storage::path($filePath), 'a');

        $questoes = $this->dataQuestion();

        foreach ($questoes as $questao) {
            $quiz = $this->findIdMateria($questao->id_materia);
            $registroCSV = $questao->id_alternativa . ',' . $questao->resultado . ',';
            
            if ($quiz[1] == ',') {
                $registroCSV .= 0 ."\n";
            } else {
                $registroCSV .= $quiz[1] . "\n";
            }

            // Escreve o registro CSV no arquivo
            fwrite($file, $registroCSV);
        }
        
        $csvUrlStream = fopen(Storage::path($filePath), 'r');;
        
        while (!feof($csvUrlStream)) {
            $line = fgetcsv($csvUrlStream);
            
            $samples[] = [$line[0] ?? "0", $line[1] ?? "0", $line[2] ?? "0",$line[4] ?? "0",$line[5] ?? "0",$line[6] ?? "0",$line[7] ?? "0",$line[8] ?? "0"];
            $label[] = $this->transformeArray($line);
        }
        
        // Treinamento do modelo
        $dataset = new Labeled($samples,$label);
        [$training, $testing] = $dataset->stratifiedSplit(0.90);

        $tree = new ExtraTreeClassifier();
        $tree->train($training);

        $model = new PersistentModel($tree, new Filesystem($fileMl));
        $model->save();
        fclose($file);
        fclose($csvUrlStream);
    }

    protected function dataQuestion()
    {
        $questoes = HistoricoQuestao::all();
        return $questoes;
    }

    protected function padSamples($samples, $desiredDimensions = 8, $defaultValue = 0) {       
        $currentDimensions = count($samples);

        if ($currentDimensions < $desiredDimensions) {
            // Preencha com valores padrão até atingir o número desejado de dimensões
            $missingDimensions = $desiredDimensions - $currentDimensions;
            for ($i = 0; $i < $missingDimensions; $i++) {
                array_push($samples, $defaultValue);
            }
        }

        return $samples;
    }
}