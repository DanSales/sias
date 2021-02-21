<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Edital;
use App\Models\EditalUser;
use App\Models\Programa;
use App\Validator\CandidatoValidator;
use App\Validator\ValidationException;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InscricaoController extends Controller
{
    public function inscricaoSelectProgramaView(){
        $this->authorize('inscricao', EditalUser::class);
        $programas = Programa::all();
        return view('inscricao.inscricaoSelectPrograma', ['programas' => $programas]);
    }

    public function inscricaoSelectEditalView($idPrograma){
        $this->authorize('inscricao', EditalUser::class);
        $editais = Edital::where('programa_id', '=', $idPrograma)->get();
        return view('inscricao.inscricaoSelectEdital', ['editais' => $editais] );
    }

    public function arquivos(Request $request){
        $this->authorize('inscricao', EditalUser::class);
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
        $this->authorize('inscricao', EditalUser::class);
        return view('inscricao.inscricaoDeclaracao');

    }

    public function confirmacaoView(Request $request){
        $this->authorize('inscricao', EditalUser::class);
        $edital = Edital::find($request->idEdital);
        return view('inscricao.inscricaoConfirmacao', ['edital' =>$edital]);
    }

    public function finalizarInscricao(Request $request){
        $this->authorize('inscricao',EditalUser::class);
        $inscricao = new EditalUser();
        $inscricao->edital_id = $request->idEdital;
        $inscricao->user_id = Auth::user()->id;

        $familiares = \Auth::user()->familias;
        $dadosCandidato = Candidato::where('user_id', '=', Auth::user()->id)->first();

        $inscricao->relato_familiar = $dadosCandidato->relato_familiar;
        $inscricao->declaracao_rendimento = $dadosCandidato->declaracao_rendimento;

        $inscricao->save();

        $idsFamiliares = [];
        foreach ($familiares as $f){
            $idsFamiliares[] = $f->id;
        }
        $inscricao->familias()->attach($idsFamiliares);

        return redirect('/home');
    }

    public function detalharInscricaoView(Request $request){
        $editalUser = new EditalUser();
        $editalUser->id = $request->idInscricao;
        $this->authorize('detalhesInscricao',[$editalUser], EditalUser::class);
        $editalUser = EditalUser::find($editalUser->id);
        $user = User::find($editalUser->user_id);
        return view('inscricao.inscricaoDetalher',
            [
                'inscricao' => $editalUser,
                'user' => $user,
            ]);
    }

    public function listMyInscricoes(Request $request){
        $this->authorize('listInscricoes', EditalUser::class);
        $inscricoes = EditalUser::where('user_id', '=', \Auth::user()->id)->get();
        return view('inscricao.inscricaoList', ['inscricoes' => $inscricoes]);
    }



}
