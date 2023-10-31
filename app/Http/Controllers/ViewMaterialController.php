<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ViewMaterial;

class ViewMaterialController extends Controller
{
    protected $user;

    public function __construct()
    {        
        $this->setUser(Controller::user());
    }

    protected function setUser($us){
        return $this->user=$us;
    }

    private function getUser(){
        return $this->user();
    }

    public function viewMaterial(Request $r)
    {        
        $cad = ViewMaterial::where('id_user',$this->getUser()['id'])->where('id_material',$r->id)->first();
        if (empty($cad)){
            $model = new ViewMaterial();
            $model->id_user = $this->getUser()['id'];
            $model->id_material = $r->id;
            $model->save();
            if (!empty($model->id)) {
                $back = "success";
            } else {
                $back = "error";
            }
        } else {

            $back = "cad";
        }

        return $back;
    }
}
