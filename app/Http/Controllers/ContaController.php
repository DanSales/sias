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
    	$contas = DB::select("select * from contas where deleted_at IS NULL");
    	return view('listaconta', ['contas' => $contas]);
    }

    public function inicio(){
        $this->authorize("create", \App\Models\Conta::class);
    	$beneficiarios = DB::select("select * from beneficiarios where deleted_at IS NULL");
    	return view('adicionarconta', ['beneficiarios' => $beneficiarios]);
    }

    public function adicionar(Request $request){
        $this->authorize("create", \App\Models\Conta::class);
    	try{
    		\App\Validator\ContaValidator::validate($request->all());
    		Conta::create($request->all());
    		return redirect("/contas/");

    	} catch(\App\Validator\ValidationException $exception){
    		$beneficiarios = DB::select("select * from beneficiarios where deleted_at IS NULL");
    		return redirect("/contas/adicionar/")
    			->with(['beneficiarios' => $beneficiarios])
    			->withErrors($exception->getValidator())
    			->withInput();
    	}
    }

    public function remover($id){
        $this->authorize("delete", \App\Models\Conta::class);
    	$conta = Conta::find($id);
    	$conta->delete();
    	return redirect("/contas/");
    }
}
