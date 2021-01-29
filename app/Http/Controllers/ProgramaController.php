<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use App\Validator\ProgramaValidator;

class ProgramaController extends Controller
{
    public function create(Request $request){
        try {
            ProgramaValidator::validate($request->all());
            Programa::create($request->all());
            return redirect('/programa');
        } catch (ValidationException $ve){
            $programas = Programa::all();
            return redirect('/programa')
                ->with(['programas' => $programas])
                ->withErrors($ve->getValidator())
                ->withInput();
        }

    }

    public function updateView(){

    }

    public function update(){

    }

    public function delete($id){
        $programa = Programa::find($id);
        $programa->delete();
        return redirect('/programa');
    }

    public function list(){
        $list = Programa::all();
        return view('programa',['programas' => $list]);
    }
}
