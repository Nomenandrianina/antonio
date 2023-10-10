<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Client;


class UserController extends Controller{
 
    public function index()
    {
        return view('login');
    }  


    public function dashboard(){
        $clients = Client::all();
        return view('welcome', compact('clients'));
    }
       
 
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        // Utilisation d'une requête SQL brute pour vérifier les informations d'authentification
        $user = DB::select("SELECT * FROM users WHERE email = ? LIMIT 1", [$request->email]);
        if($user){
            if ( $user[0]->email == $request->email && $user[0]->password == $request->password) {
                Session::put('role', $user[0]->role);
                return redirect()->intended('dashboard')->withSuccess('Connecté');
            }else{
                // return redirect("/")->with(['error' => 'Les informations de connexion ne sont pas valides']);
                $error = 'Les informations de connexion ne sont pas valides';
                return view('login', compact('error'));
            }
        }else{
            $error = 'Cet Utilisateur n\'existe pas.';
            return view('login', compact('error'));
        }
    }
 
}

