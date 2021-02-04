<?php

namespace App\Http\Controllers;

use App\Models\Anexo;
use App\Models\Programa;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Validator\AnexoValidator;

class AnexoController extends Controller
{
    public function createAnexo(Request $request){
        if ($request->hasFile('caminho_arquivo') && $request->file('caminho_arquivo')->isValid()){
            try {
                AnexoValidator::validate($request->all());
                $programa_id = $request->id;

                $nome_arquivo = $request
                    ->file('caminho_arquivo')
                    ->getClientOriginalName();

                $nome_final = $programa_id.'-'.$nome_arquivo;

                $anexo = new Anexo();
                $anexo->programa_id = $programa_id;

                $upload = $request
                    ->file('caminho_arquivo')
                    ->storeAs('anexos/'.$programa_id,$nome_final,'public');

                if (!$upload){
                    $anexos = Anexo::where('programa_id', '=',$programa_id)->get();

                    return redirect('/programa/'.$programa_id.'/anexos')
                                ->with([
                                    'anexos' => $anexos,
                                    'programa_id' => $programa_id
                                ])
                                ->withErrors(['caminho_arquivo' => 'Falha ao realizar upload'])
                                ->withInput();
                } else {
                    $anexo->caminho_arquivo = $upload;
                    $anexo->save();
                    return redirect('/programa/'.$programa_id.'/anexos');
                }
            } catch (ValidationException $ve){
                $programa_id = $request->id;
                $anexos = Anexo::where('programa_id', '=',$programa_id)->get();

                return redirect('/programa/'.$programa_id.'/anexos')
                            ->with([
                                'anexos' => $anexos,
                                'programa_id' => $programa_id
                            ])
                            ->withErrors($ve->getValidator())
                            ->withInput();
            }
        }
    }

    public function listAnexos($id){
        $anexos = Anexo::where('programa_id', '=',$id)->get();
        $programa = Programa::find($id);
        return view('anexos.anexos', ['anexos' => $anexos, 'programa' => $programa]);
    }

    public function deleteAnexo(Request $request){
        $anexo = Anexo::find($request->idAnexo);
        Storage::delete([$anexo->caminho_arquivo]);
        $anexo->delete();

        return redirect('/programa/'.$request->id.'/anexos');
    }
}
