<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Edital;
use Illuminate\Http\Request;

class EditalController extends Controller
{
    public function create(){
        $this->authorize('create', Edital::class);
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

    public function delete(){
        $this->authorize('create', Edital::class);
    }
}
