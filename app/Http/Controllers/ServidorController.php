<?php

namespace App\Http\Controllers;
use App\Models\Servidor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class ServidorController extends Controller
{
    public function listar(){
        $this->authorize("view", \App\Models\Servidor::class);
        $servidors = DB::select("SELECT * FROM servidors");
        $datas = array();
        foreach($servidors as $servidor){
        	$user = User::where('id', '=', $servidor->user_id)->first();
        	array_push($datas, $user);
        }
        return view('listaservidor',['datas' => $datas]);
    }
    
    public function inicio(){
        $this->authorize("create", \App\Models\Servidor::class);
		return view("adicionarservidor");
	}
	
	public function adicionar(Request $request){
	    $this->authorize("create", \App\Models\Servidor::class);
	    try{
    		\App\Validator\UserValidator::validate($request->all());
    		$user = User::create([
            'name' => "Servidor",
            'nome_completo' => $request->input('nome_completo'),
            'cpf' => $request->input('cpf'),
            'data_nascimento' => $request->input('data_nascimento'),
            'endereco' => $request->input('endereco'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'tipo_usuario' => 3,
            ]);
    		$servidor = new Servidor();
    		$servidor->user_id = $user->id;
    		$servidor->save();
    		return redirect("/servidors/");
    	
    	} catch(\App\Validator\ValidationException $exception){
    		return redirect("/servidors/adicionar/")
    			->withErrors($exception->getValidator())
    			->withInput();
    	}
    }
}
