<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListarBeneficiarioController extends Controller
{
    public function listar(){
        $beneficiarios = DB::select("select * from beneficiarios");
        $datas = array();
        foreach($beneficiarios as $beneficiario){
        	$user = User::where('id', '=', $beneficiario->user_id)->first();
        	array_push($datas, $user);
        }
        return view('listabeneficiario',['datas' => $datas]);
    }
}
