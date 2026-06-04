<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function new(Request $request){
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
            'numero' => 'required',
            'nom'=>'required',
        ]);
         $message = new Message();
        $message->email = $request->email;
        $message->message = $request->message;
        $message->numero = $request->numero;
        $message->nom = $request->nom;
        $message->save();
        return redirect()->back()->with('success','Message envoyer nous vous contacterons par mail ou sur Whatssap');
    }

    public function get(){
        $messages = Message::orderBy('created_at','desc')->get();
        return view('admin.listMessage',compact('messages'));
    }

    public function  delete(Request $request){
        Message::find($request->id)->delete();
        return redirect()->back()->with('success' ,'Messag Supprimer Avec Success');
    }
}
