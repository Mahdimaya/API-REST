<?php

namespace App\Http\Controllers;

use App\Models\CmdClient;
use Illuminate\Http\Request;

class CmdClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cmdClients = CmdClient::all();
        return response(["orders" => $cmdClients], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cmdValidation = $request->validate([
            'nom' => ['required'],
            'prenom' => ['required'],
            'date_de_naissance' => ['required', 'date'],
            'adresse' => ['required'],
            'numero' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'email' => ['required', 'email'],
            'produit' => ['required'],
            'paiement' => ['required'],
            'etat_de_la_commande' => ['required']
        ]);

        $cmdClient = CmdClient::create($cmdValidation);

        return response(["Commande ajoutée!"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show( CmdClient $CmdClient)
    {
        return response([$CmdClient]);

    }
    public function showetat(CmdClient $CmdClient)
    {
        return response([$CmdClient->with('etat_de_la_commande')]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request,CmdClient $cmdClient)
        {

            $validatedata = $request->validate([
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['sometimes', 'string', 'max:255'],
                'date_de_naissance' => ['nullable', 'date'],
                'adresse' => ['sometimes', 'string', 'max:255'],
                'numero' => ['sometimes', 'string', 'min:10', 'max:255'],
                'email' => ['sometimes', 'email', 'max:255'],
                'produit' => ['required'],
                'paiement' => ['required'],
                'etat_de_la_commande' => ['sometimes', 'string', 'max:255'],
            ]);
            $cmdClient==$validatedata;
            $cmdClient->save();

            return response( $cmdClient, 200);
        }
        //mise a jour du produit
        public function updateproduct(Request $request, CmdClient $cmdClient)
        {
$cmdValidation = $request->validate([
    'produit' => ['required'],
]);
$cmdClient->produit = $cmdValidation['produit'];

// sauvegarde de la commande mise à jour dans la base de données
$cmdClient->save();

// réponse HTTP
return response('Commande mise à jour avec succès', 200);
        }
                //mise a jour du paiement
        public function updatepaiement(Request $request, $id)
        {
$cmdClient = CmdClient::find($id);

if(!$cmdClient)
{
    return response('Commande inexistante',404);
}

$cmdValidation = $request->validate([
    'paiementt' => ['required'],
]);
$cmdClient->paiement = $cmdValidation['paiement'];

// sauvegarde de la commande mise à jour dans la base de données
$cmdClient->save();

// réponse HTTP
return response('Commande mise à jour avec succès', 200);
        }
                //mise a jour de l'etat
        public function updateetat(Request $request, $id)
        {
$cmdClient = CmdClient::find($id);

if(!$cmdClient)
{
    return response('Commande inexistante',404);
}

$cmdValidation = $request->validate([
    'etat_de_la_commande' => ['required'],
]);
$cmdClient->etat_de_la_commande = $cmdValidation['etat_de_la_commande'];

// sauvegarde de la commande mise à jour dans la base de données
$cmdClient->save();

// réponse HTTP
return response('Commande mise à jour avec succès', 200);
        }
        //suppression d'une commande
        public function destroy($id)
    {
        $cmdClient = CmdClient::find($id)->delete();

            if(!$cmdClient)
            {
                return response('Commande not found!', 404);
            }
            return response('Commande supprimé!', 200);
    }
}
