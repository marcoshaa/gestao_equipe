<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function showPdf($rota){
        //gera rota p/ acessar a imagen.
        //return Storage::disk('s3')->url($rota);
        return Storage::disk('s3')->temporaryUrl("$rota", now()->addMinutes(120));
    }

    public function viewMaterial(){
        return view('site.material');
    }

    public function viewMaterialSelec($rota){
        $id = $this->pegaDiretorio($rota);
        $documentos = Material::where('id_materia',$id)->get();
        $documentos = $this->traduzRota($documentos);
        //dd($documentos);
        return view('site.materialPorMateria')
        ->with('link',$rota)
        ->with('pdfs',$documentos);
    }

    private function pegaDiretorio($pasta){
        if($pasta == 'matematica'){
            $volta = 1;
        }elseif($pasta == 'logica'){
            $volta = 2;
        }elseif($pasta == 'algoritmo'){
            $volta = 3;
        }else{
            $volta = 4;
        }
        return $volta;
    }

    private function traduzRota($todos){
        $volta = [];
        foreach($todos as $unico){            
            $volta[]=array(
                'titulo'=>$unico->nome,
                'link'=>$this->novaRota($unico->endereco),
                //'link'=>route('geralPdf',$unico->endereco)
            );
        }
        return $volta;
    }

    private function novaRota($rota){
        $x = explode('/',$rota);
        $url = $x[1]."/".$x[2];
        $new = $this->showPdf($url);
        return $new;
    }
}
