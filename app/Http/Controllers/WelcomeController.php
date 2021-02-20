<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class WelcomeController extends Controller
{
    public  function inicio(){
        $editais = Edital::all();
        return view('welcome', ['editais'=>$editais]);
    }

    public function editaisListWelcome(Request $request){
        $tipo = $request->tipoConsulta;
        $dataHoje = date_create('now');
        if ($tipo == 1){
            $editais = Edital::where([
                ['inicio_inscricao', '<=', $dataHoje->format("Y-m-d")],
                ['fim_inscricao', '>=', $dataHoje->format("Y-m-d")],
            ])->get();
            $text = 'ABERTOS';
        } else {
            $editais = Edital::where([
                ['fim_inscricao', '<', $dataHoje->format("Y-m-d")],
            ])->get();
            $text = 'FECHADOS';
        }
        return view('editalListView', ['editais' => $editais, 'text' => $text]);

    }

    public function editaisViewWelcome(Request $request){
        $edital = Edital::find($request->idEdital);
        return view('editalDetalhesView', ['edital' => $edital]);
    }
}
