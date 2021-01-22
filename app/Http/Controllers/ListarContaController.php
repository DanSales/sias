<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListarContaController extends Controller
{
    public function listar(){
    	$contas = DB::select("select * from contas");
    	return view('listaconta', ['contas' => $contas]);
    }
}
