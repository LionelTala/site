<?php

namespace App\Http\Controllers;

use App\Models\Composant;
use App\Models\Evenement;
use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home(){
        return view('admin.home');
    }
    public function login(Request $request)
    {
         
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the admin
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/Admin/Personaliser');
        }

        // If the authentication fails, redirect back with an error message
        return back()->with('error','Information Incorrecte !:(');
    }

   
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/AdminIPP');
    }

    public function formation(){
        
        $formations = Specialite::all();
        return view('admin.formation',compact('formations'));

    }

    public function personaliser(){
        $composants = Composant::all();
        
        return view('admin.personaliser',compact('composants'));

    }

    public function evenement(){

        $evenements = Evenement::orderBy('date')->get();
        return view('admin.evenement',compact('evenements'));

    }

    public function save1(Request $request){
        $composant = Composant::find($request->id);
                    
        $imagePath = $composant->image;
        //dd($request->description);

        if ($request->hasFile('image')) {
            $imagePath = 'images/'.time().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('images'), $imagePath);
            unlink($composant->image);
        }
        $composant->titre = $request->titre;
        $composant->image = $imagePath;
        $composant->description = $request->description;
        
        
        $composant->save();

        return redirect()->back()->with('success','Composant Modifier ! :)');


    }

    public function save2(Request $request){
        try{
            $evenement = new Evenement;
            $evenement->titre = $request->titre;
            $evenement->date = $request->date;
            $evenement->description = $request->description;
            if ($request->hasFile('image')) {
                $imagePath = 'evenements/'.time().'.'.$request->file('image')->extension();
                $request->file('image')->move(public_path('evenements'), $imagePath);
            } 
            $evenement->image = $imagePath;
            $evenement->save();
            return redirect()->back()->with('success','Evenement Ajouter!');

        }
        catch(\Exception){
            return redirect()->back()->with('error','une erreur est survenue');
        }
       
    }
    public function delete(Request $request){
        try{
            $evenement =  Evenement::find($request->id);
            unlink($evenement->image);
            $evenement->delete();
            return redirect()->back()->with( 'success','Evenement Supprimer');

        }
          catch(\Exception){
            return redirect()->back()->with('error','une erreur est survenue');
        }
    }

    public function updateName(Request $request){
        try{
            $formation = Specialite::find($request->id +1);
            $formation->nom = $request->nom;
            $formation->save();
            return redirect()->back()->with( 'success','Nom Modifier');
        }
        catch(\Exception){
            return redirect()->back()->with('error','une erreur est survenue');
        }
    
    }

    public function updateImage(Request $request){
        try{
                    
            $formation = Specialite::find($request->id +1);

            if ($request->hasFile('image')) {
                $imagePath = 'images/'.time().'.'.$request->file('image')->extension();
                $request->file('image')->move(public_path('images'), $imagePath);
            } 
            unlink($formation->image);

            $formation->image = $imagePath;
            $formation->save();
            return redirect()->back()->with( 'success','Nom Modifier');

        }
         catch(\Exception){
            return redirect()->back()->with('error','une erreur est survenue');
        }


    }
}
