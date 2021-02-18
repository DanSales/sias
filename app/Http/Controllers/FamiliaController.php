<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Familia;
use App\Models\Saude;
use Illuminate\Support\Facades\Storage;
class FamiliaController extends Controller
{
    public function listar($idEdital){
        $this->authorize("view", \App\Models\Familia::class);
        $id = \Auth::user()->id;
    	$familias = DB::select("select * from familias where deleted_at IS NULL and user_id = '$id'");
    	return view('familia.listafamilia',
            [
                'familias' => $familias,
                'idEdital' => $idEdital
            ]);
    }

    public function inicio(Request $request){
        $this->authorize("create", \App\Models\Familia::class);
    	return view('familia.adicionarfamilia', ['idEdital' => $request->idEdital]);
    }

    public function adicionar(Request $request){
        $this->authorize("create", \App\Models\Familia::class);
        $idEdital = $request->idEdital;
        $request->request->remove('idEdital');
        try{
    	    $id = \Auth::user()->id;
    		\App\Validator\FamiliaValidator::validate($request->except('despesa_mensal','valor_plano','flag_doenca','flag_plano','flag_dificuldade','flag_deficiencia') + ["user_id" => $id]);
    		if(($request->hasFile("declaracao_autonomo") && $request->file('declaracao_autonomo')->isValid()) || ($request->hasFile("declaracao_agricultor") && $request->file('declaracao_agricultor')->isValid())){
    		    $familia = new Familia();
    		    $familia->user_id = $id;
    		    $familia->nome = $request->input("nome");
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

                        return redirect("inscricao/".$idEdital."/familias/adicionar/")
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

                        return redirect("inscricao/".$idEdital."/familias/adicionar/")
                                    ->withErrors(['declaracao_agricultor' => 'Falha ao realizar upload'])
                                    ->withInput();
                    }
                    $familia->declaracao_agricultor = $upload;
    		    }
    		    //return redirect("inscricao/".$idEdital."/familias/");
    		}
    		else{
    		    $familia = new Familia();
    		    $familia->user_id = $id;
    		    $familia->nome = $request->input("nome");
    		    $familia->cpf = $request->input("cpf");
    		    $familia->data_nascimento = $request->input("data_nascimento");
    		    $familia->escolaridade = $request->input("escolaridade");
    		    $familia->renda_mensal = $request->input("renda_mensal");
    		    $familia->profissao = $request->input("profissao");
    		    //return redirect("inscricao/".$idEdital."/familias/");
    		}
    	} catch(\App\Validator\ValidationException $exception){
    		return redirect("inscricao/".$idEdital."/familias/adicionar/")
    			->withErrors($exception->getValidator())
    			->withInput();
    	}
    	try{
    	    \App\Validator\SaudeValidator::validate($request->except('nome','cpf','data_nascimento','escolaridade','renda_mensal','profissao','declaracao_autonomo','declaracao_agricultor')+["familia_id" => 1]);
    	    
    	    $saude = new Saude();
    	    $saude->despesa_mensal = $request->input("despesa_mensal");
    	    $saude->valor_plano = $request->input("valor_plano");
    	    $saude->flag_doenca = $request->input("flag_doenca");
    	    $saude->flag_plano = $request->input("flag_plano");
    	    $saude->flag_dificuldade = $request->input("flag_dificuldade");
    	    $saude->flag_deficiencia = $request->input("flag_deficiencia");
    	    $familia->save();
    	    $saude->familia_id = $familia->id;
    	    $saude->save();
    	    return redirect("inscricao/".$idEdital."/familias/");
    	} catch(\App\Validator\ValidationException $exception){
    	    return redirect("inscricao/".$idEdital."/familias/adicionar/")
    			->withErrors($exception->getValidator())
    			->withInput();
    	}
    }
    public function initatualizar($idEdital,$idFamilia){
        $familia = Familia::find($idFamilia);
        $saude = $familia->saudes;
        $this->authorize("update", [$familia], \App\Models\Familia::class);
        return view('familia.atualizarfamilia', ['idEdital'=> $idEdital, 'familia' => $familia, 'saude' => $saude]);
    }
    public function atualizar(Request $request, $idEdital,$idFamilia){
        $familia = Familia::find($idFamilia);
        $saude = $familia->saudes;
        $idEdital = $request->idEdital;
        $request->request->remove('idEdital');
        try{
    	    $id = \Auth::user()->id;
    		\App\Validator\FamiliaValidator::validate($request->all() + ["user_id" => $id]);
    		if(($request->hasFile("declaracao_autonomo") && $request->file('declaracao_autonomo')->isValid()) || ($request->hasFile("declaracao_agricultor") && $request->file('declaracao_agricultor')->isValid())){
    		    $familia->nome = $request->input("nome");
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

                        return redirect("inscricao/".$idEdital."/familias/atualizar/{$familia->id}")
                                    ->withErrors(['declaracao_autonomo' => 'Falha ao realizar upload']);
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

                        return redirect("inscricao/".$idEdital."/familias/atualizar/{$familia->id}")
                                    ->withErrors(['declaracao_agricultor' => 'Falha ao realizar upload']);
                    }
                    $familia->declaracao_agricultor = $upload;
    		    }
    		    //return redirect("inscricao/".$idEdital."/familias/");
    		}
    		else{
    		    $familia->user_id = $id;
    		    $familia->nome = $request->input("nome");
    		    $familia->cpf = $request->input("cpf");
    		    $familia->data_nascimento = $request->input("data_nascimento");
    		    $familia->escolaridade = $request->input("escolaridade");
    		    $familia->renda_mensal = $request->input("renda_mensal");
    		    $familia->profissao = $request->input("profissao");
    		    //return redirect("inscricao/".$idEdital."/familias/");
    		}
    	} catch(\App\Validator\ValidationException $exception){
    		return redirect("inscricao/".$idEdital."/familias/atualizar/{$familia->id}")
    			->withErrors($exception->getValidator());
    	}
    	try{
    	    \App\Validator\SaudeValidator::validate($request->all()+["familia_id" => $familia->id]);
    	    $saude->despesa_mensal = $request->input("despesa_mensal");
    	    $saude->valor_plano = $request->input("valor_plano");
    	    $saude->flag_doenca = $request->input("flag_doenca");
    	    $saude->flag_plano = $request->input("flag_plano");
    	    $saude->flag_dificuldade = $request->input("flag_dificuldade");
    	    $saude->flag_deficiencia = $request->input("flag_deficiencia");
    	    $familia->save();
    	    $saude->save();
    	    return redirect("inscricao/".$idEdital."/familias/");
    	} catch(\App\Validator\ValidationException $exception){
    	    //dd($idFamilia);
    	    return redirect("inscricao/".$idEdital."/familias/atualizar/{$familia->id}")
    			->withErrors($exception->getValidator());
    	}
    }
}
