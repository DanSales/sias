<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Edital;
use App\Models\Programa;
use App\Validator\EditalValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;

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

    public function update(){
        $this->authorize('create', Edital::class);

    }

    public function updateView(){
        $this->authorize('create', Edital::class);

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
