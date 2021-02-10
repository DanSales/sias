<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public  function inicio(){
        $editais = Edital::all();
        return view('welcome', ['editais'=>$editais]);
    }
}
