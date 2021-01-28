<?php

namespace App\Http\Controllers;
use App\Models\Beneficiario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BeneficiarioController extends Controller
{
    public function inicio(){
		$datas = DB::select("SELECT * FROM users WHERE tipo_usuario = '1'");
		return view("adicionarbeneficiario", ['datas' => $datas]);
	}
	
	public function adicionar($id){
		$beneficiario = new Beneficiario();
		$beneficiario->user_id = $id;
		$beneficiario->save();
		$user = User::where('id', '=', $beneficiario->user_id)->first();
		$user->tipo_usuario = 2;
		$user->save();
		return redirect("/beneficiarios/");
		
    
    }
    
    public function listar(){
        $beneficiarios = DB::select("SELECT * FROM beneficiarios WHERE deleted_at IS NULL");
        $datas = array();
        foreach($beneficiarios as $beneficiario){
        	$user = User::where('id', '=', $beneficiario->user_id)->first();
        	array_push($datas, $user);
        }
        return view('listabeneficiario',['datas' => $datas]);
    }
    
    public function remover($id){
    	$beneficiario = Beneficiario::where('user_id', '=', $id)->first();
    	$beneficiario->delete();
    	return redirect("/beneficiarios/");
    }
}
