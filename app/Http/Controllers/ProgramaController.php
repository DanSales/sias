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

    public function updateView(){
        $this->authorize('create', Programa::class);
    }

    public function update(){
        $this->authorize('create', Programa::class);
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
