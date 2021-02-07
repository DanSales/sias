<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Saude;
use App\Models\Familia;
class SaudeController extends Controller
{
    public function listar($id){
        $familia = Familia::where('id','=',$id)->first();
        $this->authorize("update",[$familia] , \App\Models\Familia::class);
        $saudes = Saude::where('familia_id', '=',$id)->get();
    	return view('saude.listasaude', ['saudes' => $saudes, 'id' => $id]);
    }
    
    public function inicio($id){
        $familia = Familia::where('id','=',$id)->first();
        $this->authorize("viewSaudeFamilia", [$familia],\App\Models\Familia::class);
    	return view('saude.adicionarsaude', ['familia_id' => $id]);
    }

    public function adicionar(Request $request){
        $familia_id = $request->familia_id;
        $familia = Familia::where('id','=',$familia_id)->first();
        $this->authorize("viewSaudeFamilia", [$familia], \App\Models\Familia::class);
    	try{
    		\App\Validator\SaudeValidator::validate($request->all());
    		Saude::create($request->all());
    		return redirect('/familias/'.$familia_id.'/saudes');

    	} catch(\App\Validator\ValidationException $exception){
    		return redirect('/familias/'.$familia_id.'/saudes/adicionar')
    			->withErrors($exception->getValidator())
    			->withInput();
    	}
    }
}
