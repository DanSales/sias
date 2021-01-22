<?php

namespace App\Http\Controllers;
use App\Models\Beneficiario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdicionarBeneficiarioController extends Controller
{

	public function inicio(){
		$datas = DB::select("SELECT * FROM users WHERE tipo_usuario = '2'");
		return view("adicionarbeneficiario", ['datas' => $datas]);
	}
	public function adicionar($id){
		$beneficiario = new Beneficiario();
		$beneficiario->user_id = $id;
		$beneficiario->save();
		$user = User::where('id', '=', $beneficiario->user_id)->first();
		$user->tipo_usuario = 3;
		$user->save();
		return redirect("/listar/beneficiarios");
		
    
    }
}
