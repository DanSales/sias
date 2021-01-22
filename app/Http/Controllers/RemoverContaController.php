<?php

namespace App\Http\Controllers;
use App\Models\Conta;
use Illuminate\Http\Request;

class RemoverContaController extends Controller
{
    public function remover($id){
    	$conta = Conta::find($id);
    	$conta->delete();
    	return redirect("/listar/contas");
    }
}
