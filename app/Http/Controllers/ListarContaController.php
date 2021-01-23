<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ListarContaController extends Controller
{
    public function listar(){
    	$contas = DB::select("select * from contas where deleted_at IS NULL");
    	return view('listaconta', ['contas' => $contas]);
    }
}
