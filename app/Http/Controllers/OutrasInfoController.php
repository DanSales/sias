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
                'idFamilia' => $request->idFamilia
            ]);
    }

    public function adicionar(Request $request){
        $this->authorize('inscricao', Candidato::class);
        $idEdital = $request->idEdital;
        $request->request->remove('idEdital');
        try {
            OutrasInfoValidator::validate($request->all());
            OutrasInfo::create($request->all());

            return redirect("inscricao/".$idEdital."/familias/");
        } catch (ValidationException $ve){
            return redirect("inscricao/".$idEdital."/familias/".$request->idFamilia."/outifo/adicionar/")
                ->withErrors($ve->getValidator())
                ->withInput();
        }
    }
}
