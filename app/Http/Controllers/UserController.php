<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function initatualizar(){
        $user = \Auth::user();
        $this->authorize("update", [$user], \App\Models\User::class);
        return view('user.atualizaruser', ['user' => $user]);
    }
    
    public function atualizar(Request $request){
        $user = \Auth::user();
        $this->authorize("update", [$user], \App\Models\User::class);
        try{
    		\App\Validator\UserValidator::validate($request->all());
    		$user->update($request->all());
            return redirect("/home/");
        }catch(\App\Validator\ValidationException $exception){
    		return redirect("/atualizar/")
    			->withErrors($exception->getValidator());
    	}
    }
}
