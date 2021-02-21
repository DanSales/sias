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
        $arraySelect =  [$user_id];

        $programas = DB::select('select
            p.id as programa_id,
            p.descricao
        from edital_users es
            join editals e on e.id = es.edital_id
            join programas p on e.programa_id = p.id
            join users u on u.id = es.user_id
        where u.id = ?
            AND es.is_beneficiario = TRUE',$arraySelect);

        $bolsasPorPrograma = [];
        foreach ($programas as $p){
            $bolsasPorPrograma[$p->descricao] = DB::select('
                select
                    b.data_pagamento,
                    p.id as programa_id,
                    p.valor_beneficio,
                    u.name as beneficiario,
                    c.banco
                from bolsas b
                    join contas c on c.id = b.conta_id
                    join beneficiarios ben on c.beneficiario_id = ben.id
                    join users u on u.id = ben.user_id
                    join edital_users es on es.user_id = u.id
                    join editals e on e.id = es.edital_id
                    join programas p on e.programa_id = p.id
                where p.id = :programaId',['programaId' => $p->programa_id]);
        }

        return view('bolsa.bolsa', ['programasBolsas' => $bolsasPorPrograma]);
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
