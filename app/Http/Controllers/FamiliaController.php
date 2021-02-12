<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Familia;
use Illuminate\Support\Facades\Storage;
class FamiliaController extends Controller
{
    public function listar($idEdital){
        $this->authorize("view", \App\Models\Familia::class);
        $id = \Auth::user()->id;
    	$familias = DB::select("select * from familias where user_id = '$id'");
    	return view('familia.listafamilia',
            [
                'familias' => $familias,
                'idEdital' => $idEdital
            ]);
    }

    public function inicio(){
        $this->authorize("create", \App\Models\Familia::class);
    	return view('familia.adicionarfamilia');
    }

    public function adicionar(Request $request){
        $this->authorize("create", \App\Models\Familia::class);
        try{
    	    $id = \Auth::user()->id;
    		\App\Validator\FamiliaValidator::validate($request->all() + ["user_id" => $id]);
    		if(($request->hasFile("declaracao_autonomo") && $request->file('declaracao_autonomo')->isValid()) || ($request->hasFile("declaracao_agricultor") && $request->file('declaracao_agricultor')->isValid())){
    		    $familia = new Familia();
    		    $familia->user_id = $id;
    		    $familia->cpf = $request->input("cpf");
    		    $familia->data_nascimento = $request->input("data_nascimento");
    		    $familia->escolaridade = $request->input("escolaridade");
    		    $familia->renda_mensal = $request->input("renda_mensal");
    		    $familia->profissao = $request->input("profissao");

    		    if($request->hasFile('declaracao_autonomo') && $request->file('declaracao_autonomo')->isValid()){
    		        $nome_arquivo = $request
                    ->file('declaracao_autonomo')
                    ->getClientOriginalName();
                    $nome_final = $id.'-'.$nome_arquivo;

                    $upload = $request
                    ->file('declaracao_autonomo')
                    ->storeAs('familias/'.$id,$nome_final,'public');
                    if (!$upload){

                        return redirect("/familias/adicionar/")
                                    ->withErrors(['declaracao_autonomo' => 'Falha ao realizar upload'])
                                    ->withInput();
                    }
                    $familia->declaracao_autonomo = $upload;
    		    }
    		    if($request->hasFile('declaracao_agricultor') && $request->file('declaracao_agricultor')->isValid()){
    		        $nome_arquivo = $request
                    ->file('declaracao_agricultor')
                    ->getClientOriginalName();
                    $nome_final = $id.'-'.$nome_arquivo;

                    $upload = $request
                    ->file('declaracao_agricultor')
                    ->storeAs('familias/'.$id,$nome_final,'public');
                    if (!$upload){

                        return redirect("/familias/adicionar/")
                                    ->withErrors(['declaracao_agricultor' => 'Falha ao realizar upload'])
                                    ->withInput();
                    }
                    $familia->declaracao_agricultor = $upload;
    		    }
    		    $familia->save();
    		    return redirect("/familias/");
    		}
    		else{
    		    Familia::create($request->all() + ["user_id" => $id]);
    		    return redirect("/familias/");
    		}
    	} catch(\App\Validator\ValidationException $exception){
    		return redirect("/familias/adicionar/")
    			->withErrors($exception->getValidator())
    			->withInput();
    	}
    }
}
