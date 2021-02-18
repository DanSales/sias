<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\Conta;

class ContaController extends Controller
{
    public function listar(){
        $this->authorize("view", \App\Models\Conta::class);
        $id = \Auth::user()->beneficiarios->id;
    	$contas = DB::select("select * from contas where deleted_at IS NULL and beneficiario_id = '$id'");
    	return view('conta.listaconta', ['contas' => $contas]);
    }

    public function inicio(){
        $this->authorize("create", \App\Models\Conta::class);
    	return view('conta.adicionarconta');
    }

    public function adicionar(Request $request){
        $this->authorize("create", \App\Models\Conta::class);
    	try{
    	    $id = \Auth::user()->beneficiarios->id;
    		\App\Validator\ContaValidator::validate($request->all() + ["beneficiario_id" => $id]);
    		Conta::create($request->all() + ["beneficiario_id" => $id]);
    		return redirect("/contas/");

    	} catch(\App\Validator\ValidationException $exception){
    		return redirect("/contas/adicionar/")
    			->withErrors($exception->getValidator())
    			->withInput();
    	}
    }

    public function remover(Request $request){
        $conta = Conta::find($request->id);
        $this->authorize("delete", [$conta], \App\Models\Conta::class);
    	$conta->delete();
    	return redirect("/contas/");
    }
    public function initatualizar($id){
        $conta = Conta::find($id);
        $this->authorize("update", [$conta], \App\Models\Conta::class);
        return view('conta.atualizarconta', ['conta' => $conta]);
    }
    public function atualizar(Request $request, $id){
        $conta = Conta::find($id);
        $this->authorize("update", [$conta], \App\Models\Conta::class);
        try{
            $id = \Auth::user()->beneficiarios->id;
    		\App\Validator\ContaValidator::validate($request->all() + ["beneficiario_id" => $id]);
    		$conta->update($request->all());
            return redirect("/contas/");
        }catch(\App\Validator\ValidationException $exception){
    		return redirect("/contas/atualizar/{$conta->id}")
    			->withErrors($exception->getValidator());
    	}
    }
}
