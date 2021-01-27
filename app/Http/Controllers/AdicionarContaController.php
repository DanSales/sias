<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Beneficiario;
use App\Models\Conta;
class AdicionarContaController extends Controller
{
    public function inicio(){
    	$beneficiarios = DB::select("select * from beneficiarios where deleted_at IS NULL");
    	return view('adicionarconta', ['beneficiarios' => $beneficiarios]);
    }
    
    public function adicionar(Request $request){
    	try{
    		\App\Validator\ContaValidator::validate($request->all());
    		Conta::create($request->all());
    		return redirect("/listar/contas");
    	
    	} catch(\App\Validator\ValidationException $exception){
    		$beneficiarios = DB::select("select * from beneficiarios where deleted_at IS NULL");
    		return redirect("/adicionar/contas")
    			->with(['beneficiarios' => $beneficiarios])
    			->withErrors($exception->getValidator())
    			->withInput();
    	}
    }
}
