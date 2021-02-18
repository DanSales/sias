<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Edital;
use App\Models\Programa;
use App\Validator\EditalValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EditalController extends Controller
{
    public function createView(){
        $this->authorize('create', Edital::class);
        $programas = Programa::all();
        return view('edital.createEdital', ['programas' => $programas]);
    }

    public  function create(Request $request){
        try {
            EditalValidator::validate($request->all());
            return $this->list();
        } catch (ValidationException $ve){
            $programas = Programa::all();
            return redirect('/edital/adicionar')
                ->with([
                    'programas' => $programas
                ])
                ->withErrors($ve->getValidator())
                ->withInput();
        }

        if ($request->hasFile('arquivo_edital') && $request->file('arquivo_edital')->isValid()){
            $edital = new Edital($request->all());
            $programa_id = $request->programa_id;

            $nome_arquivo = $request
                ->file('arquivo_edital')
                ->getClientOriginalName();

            $nome_final = $programa_id.'-'.$nome_arquivo;

            $upload = $request
                ->file('arquivo_edital')
                ->storeAs('editais/'.$programa_id,$nome_final,'public');

            if (!$upload){
                $programas = Programa::all();

                return redirect('/edital/adicionar')
                    ->with([
                        '$programas' => $programas
                    ])
                    ->withErrors(['arquivo_edital' => 'Falha ao realizar upload'])
                    ->withInput();
            } else {
                $edital->arquivo_edital = $upload;
                $edital->save();
                return redirect('/edital/');
            }

        }
    }

    public function update(Request $request){
        $this->authorize('create', Edital::class);

        if ($request->hasFile('arquivo_edital') && $request->file('arquivo_edital')->isValid()) {
            $edital = Edital::find($request->id);

            $fileDelete = $edital->arquivo_edital;
            $edital->data_edital = $request->data_edital;
            $edital->programa_id = $request->programa_id;
            $edital->numero_edital = $request->numero_edital;
            $edital->arquivo_edital = $request->arquivo_edital;

            try {
                EditalValidator::validate($edital->toArray());
                $nome_arquivo = $request
                    ->file('arquivo_edital')
                    ->getClientOriginalName();

                $nome_final = $request->programa_id.'-'.$nome_arquivo;

                $upload = $request
                    ->file('arquivo_edital')
                    ->storeAs('editais/'.$request->programa_id,$nome_final,'public');

                if (!$upload){
                    $programas = Programa::all();

                    return redirect('/edital/atualizar/'.$request->id)
                        ->with([
                            'programas' => $programas,
                            'edital' => Edital::find($request->id)
                        ])
                        ->withErrors(['arquivo_edital' => 'Falha ao realizar upload'])
                        ->withInput();
                } else {
                    $edital->arquivo_edital = $upload;
                    $edital->update();
                    unlink(storage_path("/app/public/".$fileDelete));
                    return redirect('/edital/');
                }
            } catch (ValidationException $ve){
                $programas = Programa::all();
                return redirect('/edital/atualizar/'.$request->id)
                    ->with([
                        'programas' => $programas,
                        'edital' => Edital::find($request->id)
                    ])
                    ->withErrors($ve->getValidator())
                    ->withInput();
            }
        }else {
            $edital = Edital::find($request->id);

            $edital->data_edital = $request->data_edital;
            $edital->programa_id = $request->programa_id;
            $edital->numero_edital = $request->numero_edital;

            $fileAddress = storage_path('app/public/'.$edital->arquivo_edital);
            $file = new UploadedFile($fileAddress, 'file');

            $request->files->set('arquivo_edital', $file);
            try {
                EditalValidator::validate($request->all());
                $edital->update();
                return $this->list();
            } catch (ValidationException $ve){
                $programas = Programa::all();
                return redirect('/edital/atualizar/'.$request->id)
                    ->with([
                        'programas' => $programas,
                        'edital' => Edital::find($request->id)
                    ])
                    ->withErrors($ve->getValidator())
                    ->withInput();
            }
        }

    }

    public function updateView(Request $request){
        $this->authorize('create', Edital::class);
        $edital = Edital::find($request->idEdital);
        $programas = Programa::all();
        return view('edital.updateEdital', ['edital' => $edital, 'programas' => $programas]);
    }

    public function list(){
        $editais = Edital::all();
        return view('edital.edital', ['editais' => $editais ]);
    }

    public function view(){

    }

    public function delete($id){
        $this->authorize('create', Edital::class);
        $edital = Edital::find($id);
        $edital->delete();
        return redirect('/edital');
    }
}
