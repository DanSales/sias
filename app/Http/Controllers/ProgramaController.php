<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    public function create(Request $request){
        Programa::create($request->all());
        return redirect('/programa');
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
