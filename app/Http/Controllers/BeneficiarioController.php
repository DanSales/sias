<?php

namespace App\Http\Controllers;
use App\Models\Beneficiario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class  BeneficiarioController extends Controller
{
    public function inicio(){
        $this->authorize("create", \App\Models\Beneficiario::class);
		$datas = DB::select("SELECT * FROM users WHERE tipo_usuario = '1'");
		return view("beneficiario.adicionarbeneficiario", ['datas' => $datas]);
	}

	public function adicionar(Request $request){
	    $this->authorize("create", \App\Models\Beneficiario::class);
		$beneficiario = new Beneficiario();
		$beneficiario->user_id = $request->id;
		$beneficiario->save();
		$user = User::where('id', '=', $beneficiario->user_id)->first();
		$user->tipo_usuario = 2;
		$user->save();
		return redirect("/beneficiarios/");


    }

    public function listar(){
        $this->authorize("view", \App\Models\Beneficiario::class);
        $beneficiarios = DB::select("SELECT * FROM beneficiarios WHERE deleted_at IS NULL");
        $datas = array();
        foreach($beneficiarios as $beneficiario){
        	$user = User::where('id', '=', $beneficiario->user_id)->first();
        	array_push($datas, $user);
        }
        return view('beneficiario.listabeneficiario',['datas' => $datas]);
    }

    public function remover($id){
        $this->authorize("delete", \App\Models\Beneficiario::class);
    	$beneficiario = Beneficiario::where('user_id', '=', $id)->first();
    	$beneficiario->delete();
    	return redirect("/beneficiarios/");
    }
}
