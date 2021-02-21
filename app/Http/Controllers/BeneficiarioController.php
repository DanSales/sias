<?php

namespace App\Http\Controllers;
use App\Models\Beneficiario;
use App\Models\EditalUser;
use App\Models\Programa;
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

    public function listar(Request $request){
        $this->authorize("view", \App\Models\Beneficiario::class);
        $programa = Programa::find($request->programa_id);

        $beneficiarioList = DB::select('
            select
                u.nome_completo,
                u.id,
                es.is_ativo
            from beneficiarios b
                join users u on u.id = b.user_id
                join edital_users es on es.user_id = u.id
                join editals e on es.edital_id = e.id
                join programas p on p.id = e.programa_id
            where es.is_beneficiario = TRUE
            AND p.id = ?
            ORDER BY es.is_ativo', [$request->programa_id]);

        return view('beneficiario.listaBeneficiariosPrograma',
            [
                'programa' =>$programa,
                'datas' => $beneficiarioList
            ]);
    }

    public function remover(Request $request){
        $this->authorize("delete", \App\Models\Beneficiario::class);
    	$beneficiario = Beneficiario::where('user_id', '=', $request->id)->first();
    	$programa_id = $request->programa_id;
    	$editalUserId = DB::select('
    	    select
                es.id
            from beneficiarios b
                join users u on u.id = b.user_id
                join edital_users es on es.user_id = u.id
                join editals e on es.edital_id = e.id
                join programas p on p.id = e.programa_id
            where es.is_beneficiario = TRUE
            AND p.id = ?
            AND u.id = ?', [$programa_id, $request->id]);

    	$editalUser = EditalUser::find($editalUserId[0]->id);
        $editalUser->is_ativo = false;
        $editalUser->update();

    	return redirect("/beneficiarios?programa_id=".$programa_id);
    }
}
