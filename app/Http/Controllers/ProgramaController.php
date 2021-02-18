<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use App\Validator\ProgramaValidator;

class ProgramaController extends Controller
{
    public function createView(Request $request){
        $this->authorize('create', Programa::class);
        return view('programa.createPrograma');
    }

    public function create(Request $request){
        $this->authorize('create', Programa::class);
        try {
            ProgramaValidator::validate($request->all());
            Programa::create($request->all());
            return redirect('/programa/');
        } catch (ValidationException $ve){
            $programas = Programa::all();
            return redirect('/programa/adicionar')
                ->with(['programas' => $programas])
                ->withErrors($ve->getValidator())
                ->withInput();
        }

    }

    public function updateView(Request $request){
        $this->authorize('create', Programa::class);
        $programa = Programa::find($request->id);
        return view('programa.updatePrograma',
            [
                'programa'=> $programa,
            ]
        );

    }

    public function update(Request $request){
        $this->authorize('create', Programa::class);
        $programa = Programa::find($request->id);
        $programa->descricao = $request->descricao;
        $programa->valor_beneficio = $request-> valor_beneficio;
        try {
            ProgramaValidator::validate($programa->toArray());
            $programa->update();
            return redirect('/programa/');
        } catch (ValidationException $ve){
            return redirect('/programa/atualizar/'.$request->id)
                ->withErrors($ve->getValidator())
                ->withInput();
        }

    }

    public function delete($id){
        $this->authorize('create', Programa::class);
        $programa = Programa::find($id);
        $programa->delete();
        return redirect('/programa');
    }

    public function list(){
        $list = Programa::all();
        return view('programa.programa',['programas' => $list]);
    }
}
