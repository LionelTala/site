<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Symfony\Contracts\Service\Attribute\Required;

class InscriptionController extends Controller
{
    public function save(Request $request){
        
        $request->validate([
            
            'nom' => 'required',
            'prenom' =>'required',
            'email' => 'required|email',
            'numero' => 'required',
            'niveau' => 'required',
            'specialite' => 'required',
            'date' => 'required',
            'nomTuteur' => 'required',
            'numTuteur' => 'required',
            'sexe' =>'required'           
        ]);
        $candidature = new Candidature();
        $candidature->noms = $request->nom;
        $candidature->prenoms = $request->prenom;
        $candidature->email  = $request->email;
        $candidature->numero = $request->numero;
        $candidature->niveau = $request->niveau;
        $candidature->specialite = $request->specialite;
        $candidature->date = $request->date;
        $candidature->nomTuteur = $request->nomTuteur;
        $candidature->numTuteur = $request->numTuteur;
        $candidature->sexe = $request->sexe;
        $candidature->save();

       

       return redirect()->back()->with('success','Candidature Envoyer');


        //dd($request);
    }

    public function get(){
        $candidatures = Candidature::orderBy('created_at','desc')->get();
        return view('admin.listCandidature',compact('candidatures'));
    }
}
