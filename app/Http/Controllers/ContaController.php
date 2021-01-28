<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\Conta;

class ContaController extends Controller
{
    public function listar(){
    	$contas = DB::select("select * from contas where deleted_at IS NULL");
    	return view('listaconta', ['contas' => $contas]);
    }
    
    public function inicio(){
    	$beneficiarios = DB::select("select * from beneficiarios where deleted_at IS NULL");
    	return view('adicionarconta', ['beneficiarios' => $beneficiarios]);
    }
    
    public function adicionar(Request $request){
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
    	$conta = Conta::find($id);
    	$conta->delete();
    	return redirect("/contas/");
    }
}
