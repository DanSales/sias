<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Bolsa;
use App\Models\Conta;
use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BolsaController extends Controller
{
    public function listBolsaBeneficiario(Request $request){
        $conta = Conta::find($request->idConta);

        $this->authorize('viewBolsaBeneficiario',[$conta], Conta::class);

        $user_id = Auth::user()->id;
        $arraySelect =  [$user_id, $request->idConta];

        $bolsasBeneficiario = DB::select('select
            b.data_pagamento,
            p.descricao as programa_name,
            p.id as programa_id,
            p.valor_beneficio
        from bolsas b
            join programas p on b.programa_id = p.id
            join contas c on c.id = b.conta_id
            join beneficiarios ben on c.beneficiario_id = ben.id
            join users u on u.id = ben.user_id
        where u.id = ?
            AND c.id = ?',$arraySelect);

        return view('bolsa.bolsa', ['bolsas' => $bolsasBeneficiario]);
    }

    public function listBolsasPrograma(Request $request){
        $idPrograma = $request->idPrograma;
        $programa = Programa::find($idPrograma);
        $this->authorize('viewBolsaPrograma', [$programa], Programa::class);

        $bolsasPrograma = DB::select('select
            b.data_pagamento,
            p.id as programa_id,
            p.valor_beneficio,
            u.name as beneficiario,
            c.banco
        from bolsas b
            join programas p on b.programa_id = p.id
            join contas c on c.id = b.conta_id
            join beneficiarios ben on c.beneficiario_id = ben.id
            join users u on u.id = ben.user_id
        where p.id = :programaId', ['programaId' => $programa->id]);

        return view('bolsa.bolsaPrograma', ['bolsas' => $bolsasPrograma]);
    }

    public function gerarBolsas(){
        $this->authorize('create', Bolsa::class);

    }

    public function editarBolsa(){
        $this->authorize('create', Bolsa::class);

    }


}
