<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Http\Requests\Api\UpdateProfileRequest;

class UserController extends Controller
{
    public function add(Request $request){

        try{

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();

            return ['retorno'=>'Usuario Cadastrado'];

        }   catch(Exception $erro){
            return ['retorno'=>'Erro', 'details'=>$erro];
        }
    }

    public function list(){

        $user = User::all();

        return $user;
    }

    public function select($id){

        $user = User::find($id);

        return $user;
    }

/*     public function update(Request $request, $id){

        try{

            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();

            return ['retorno'=>'Usário Editado'];

        }   catch(Exception $erro){
            return ['retorno'=>'Erro', 'details'=>$erro];
        }
    } */

    public function edit(){
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request){
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Profile updated successfully');

        return redirect()->back();
    }
}
