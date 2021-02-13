<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Edital;
use App\Models\Programa;
use Illuminate\Http\Request;

class InscricaoController extends Controller
{
    public function inscricaoSelectProgramaView(){
        $this->authorize('inscricao', Candidato::class);
        $programas = Programa::all();
        return view('inscricao.inscricaoSelectPrograma', ['programas' => $programas]);
    }

    public function inscricaoSelectEditalView($idPrograma){
        $this->authorize('inscricao', Candidato::class);
        $editais = Edital::where('programa_id', '=', $idPrograma)->get();
        return view('inscricao.inscricaoSelectEdital', ['editais' => $editais] );
    }
}
