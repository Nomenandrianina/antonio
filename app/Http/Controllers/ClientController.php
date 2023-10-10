<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::all();
        return view('dashboard.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('formclient');
    }

    public function store(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'statut' => 'required',
            'contact' => 'required',
            'whatsapp' => 'required',
            'email' => 'required|email|unique:clients,email',
            'adresse' => 'required',
        ]);

        // Créez un nouveau client en utilisant le modèle
        Client::create($validatedData);

        $clients = Client::all();
        return view('welcome', compact('clients'));
    }

    public function edit($id)
    {
        $client = Client::find($id);

        if (!$client) {
            // Gérez le cas où le client n'est pas trouvé (par exemple, affichez un message d'erreur ou redirigez)
            return redirect()->route('welcome')->with('error', 'Client non trouvé');
        }

        // Affichez la vue d'édition avec les données du client
        return view('editclient', compact('client'));
    }

    public function update(Request $request)
    {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'nom' => 'required',
            'statut' => 'required',
            'contact' => 'required',
            'whatsapp' => 'required',
            'email' => 'required|email',
            'adresse' => 'required',
        ]);

        // Recherchez le client à mettre à jour par son ID
        $client = Client::find($request->id);

        if (!$client) {
            // Gérez le cas où le client n'est pas trouvé (par exemple, affichez un message d'erreur ou redirigez)
            return redirect()->route('welcome')->with('error', 'Client non trouvé');
        }

        // Mettez à jour les données du client
        $client->update($validatedData);

        $clients = Client::all();
        return view('welcome', compact('clients'));
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        $clients = Client::all();
        return view('welcome', compact('clients'));

    }

}
