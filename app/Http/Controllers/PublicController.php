<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublicController extends Controller
{
    public function homeFunction()
    {

        return view('welcome');
    }

    // Funzione per cambiare lingua 
    public function setLenguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
