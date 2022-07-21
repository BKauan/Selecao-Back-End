<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;


use App\Comentario;

class ComentarioController extends Controller
{
    public function status(){
        return ['status' => 'OK'];
    }

    public function add(Request $request){

        try{

            $comentario = new Comentario();

            $comentario->nome = $request->nome;
            $comentario->comentario = $request->comentario;

            $comentario->save();

            return ['retorno'=>'Comentario Feito'];

        }   catch(Exception $erro){
            return ['retorno'=>'Erro', 'details'=>$erro];
        }
    }

    public function list(Comentario $comentario){

        $comentario = Comentario::all();

        return $comentario;
    }

    public function select($id){

        $comentario = Comentario::find($id);

        return $comentario;
    }

    public function update(Request $request, $id){

        try{

            $comentario = Comentario::find($id);

            $comentario->nome = $request->nome;
            $comentario->comentario = $request->comentario;

            $comentario->save();

            return ['retorno'=>'Comentario Editado'];

        }   catch(Exception $erro){
            return ['retorno'=>'Erro', 'details'=>$erro];
        }
    }
}
