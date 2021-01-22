<?php

namespace App\Http\Controllers;

use App\Models\Anexo;
use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnexoController extends Controller
{
    public function createAnexo(Request $request){
        if ($request->file('arquivo')->isValid()){
            $anexo = new Anexo();
            $anexo->caminho_arquivo = $request->file('arquivo')->store('anexos');
            $anexo->programa_id = $request->id;

            $anexo->save();

            return redirect('/programa/'.$request->id.'/anexos');
        }
    }

    public function listAnexos($id){
        $anexos = Anexo::where('programa_id', '=',$id)->get();
        $programa = Programa::find($id);
        return view('anexos', ['anexos' => $anexos, 'programa' => $programa]);
    }

    public function deleteAnexo(Request $request){
        $anexo = Anexo::find($request->idAnexo);
        Storage::delete([$anexo->caminho_arquivo]);
        $anexo->delete();

        return redirect('/programa/'.$request->id.'/anexos');
    }
}
