<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Edital;
use App\Models\Programa;
use App\Validator\CandidatoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function arquivos(Request $request){
        $this->authorize('inscricao', Candidato::class);
        try {
            CandidatoValidator::validate($request->all()+['user_id' => \Auth::user()->id]);
            if (
                $request->hasFile('relato_familiar') &&
                $request->file('relato_familiar')->isValid() &&
                $request->hasFile('declaracao_rendimento') &&
                $request->file('declaracao_rendimento')->isValid()
            ){

                $candidato = \Auth::user()->candidatos;
                $relato_familiar = $request
                    ->file('relato_familiar')
                    ->getClientOriginalName();

                $declaracao_rendimento = $request
                    ->file('declaracao_rendimento')
                    ->getClientOriginalName();

                $nome_final_relato_familiar = \Auth::user()->id.'-'.$relato_familiar;
                $nome_final_declaracao_rendimento = \Auth::user()->id.'-'.$declaracao_rendimento;

                $upload_relato_familiar = $request
                    ->file('relato_familiar')
                    ->storeAs('candidato/'.\Auth::user()->id,$nome_final_relato_familiar,'public');

                $upload_declaracao_rendimento = $request
                    ->file('declaracao_rendimento')
                    ->storeAs('candidato/'.\Auth::user()->id,$nome_final_declaracao_rendimento,'public');

                if (!$upload_relato_familiar || !$upload_declaracao_rendimento){
                    return redirect('/inscricao/'.$request->idEdital.'/arquivos')
                        ->withErrors([
                            'relato_familiar' => 'Falha ao realizar upload',
                            'declaracao_rendimento' => 'Falha ao realizar upload'
                        ])
                        ->withInput();
                } else {
                    $candidato->relato_familiar = $upload_relato_familiar;
                    $candidato->declaracao_rendimento = $upload_declaracao_rendimento;
                    $candidato->update();
                    return redirect('/inscricao/'.$request->idEdital.'/confirmacao');
                }

            }
        } catch (ValidationException $ve){
            $programas = Programa::all();
            return redirect('/inscricao/'.$request->idEdital.'/arquivos')
                ->with([
                    'programas' => $programas
                ])
                ->withErrors($ve->getValidator())
                ->withInput();
        }


    }

    public  function arquivosView(Request $request){
        $this->authorize('inscricao', Candidato::class);
        return view('inscricao.inscricaoDeclaracao');

    }

    public function confirmacaoView(Request $request){
        return view('inscricao.inscricaoConfirmacao');
    }
}
