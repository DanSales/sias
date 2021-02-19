<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\OutrasInfo;
use App\Validator\OutrasInfoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

class OutrasInfoController extends Controller
{
    public function adicionarView(Request $request){
        $this->authorize('inscricao', Candidato::class);
        return view('outrasInfo.adicionarOutrasInfo',
            [
                'idEdital' => $request->idEdital,
                'idFamilia' => $request->idFamilia,
            ]);
    }

    public function listOutrasInfo(Request $request){
        $this->authorize('inscricao', Candidato::class);
        $outrasInfoFamiliar = OutrasInfo::where('familia_id', '=', $request->idFamilia)->get();
        return view('outrasInfo.listaOutrasInfo',
            [
                'outrasInfo' => $outrasInfoFamiliar,
                'idEdital' => $request->idEdital,
                'idFamilia' => $request->idFamilia,
            ]);
    }

    public function adicionar(Request $request){
        $this->authorize('inscricao', Candidato::class);
        $idEdital = $request->idEdital;
        $request->request->remove('idEdital');
        try {
            OutrasInfoValidator::validate($request->all());
            OutrasInfo::create($request->all());

            return $this->listOutrasInfo($request);
        } catch (ValidationException $ve){
            return redirect("inscricao/".$idEdital."/familias/".$request->idFamilia."/outifo/adicionar/")
                ->withErrors($ve->getValidator())
                ->withInput();
        }
    }

    public function delete(Request $request){
        $this->authorize('inscricao', Candidato::class);
        $outrasInfo = OutrasInfo::find($request->idOutraInfo);
        $outrasInfo->delete();

        return $this->listOutrasInfo($request);
    }

    public function atualizarView(Request $request){
        $this->authorize('inscricao', Candidato::class);
        $outrasInfo = OutrasInfo::find($request->idOutraInfo);
        return view('outrasInfo.atualizarOutrasInfo',
            [
                'idEdital' => $request->idEdital,
                'idFamilia' => $request->idFamilia,
                'outrasInfo' => $outrasInfo,
            ]);
    }

    public function atualizar(Request $request){
        $this->authorize('inscricao', Candidato::class);

        $outrasInfo = OutrasInfo::find($request->id);
        $outrasInfo->atividade = $request->atividade;
        $outrasInfo->renda = $request->renda;

        try {
            OutrasInfoValidator::validate($outrasInfo->toArray());
            $outrasInfo->update();
            return $this->listOutrasInfo($request);
        } catch (ValidationException $ve){
            return redirect("inscricao/".$request->idEdital."/familias/".$request->idFamilia."/outifo/atualizar?idOutraInfo=".$request->id)
                ->withErrors($ve->getValidator())
                ->withInput();
        }

    }
}
