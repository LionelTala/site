<?php

namespace App\Http\Controllers;

use App\Models\Composant;
use App\Models\Evenement;
use App\Models\Specialite;
use Illuminate\Http\Request;

class NavigationController extends Controller
{
    public function formation(){
        $formation = Specialite::all();
        $i = 0 ;
        foreach($formation as $item){
            $specialite[$i] = $item;
            $i++;
        }
        return view('formation',compact('specialite'));
    }

    public function home(){
        $composant= Composant::all();
        $i = 0;
        foreach($composant as $item){
            $composants[$i] = $item;
            $i++;
        }
        $evenements = Evenement::orderBy('date')->get();
        return view('home',compact('composants','evenements'));

    }
}
