<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Beneficiario;
use Illuminate\Http\Request;
use App\Models\User;
class RemoverBeneficiarioController extends Controller
{
    public function remover($id){
    	$beneficiario = Beneficiario::where('user_id', '=', $id)->first();
    	$beneficiario->delete();
    	return redirect("/listar/beneficiarios");
    }
}
