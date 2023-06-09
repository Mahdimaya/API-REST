<?php

namespace App\Http\Controllers;

use App\Models\produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //afficher les produits par id
    public function indexid($id_produit)
    {
        $produit = produit::where('id_produit', $id_produit)->first();
        if(!$produit || $produit->id_produit != $id_produit)
          return response(["Error, le produit n'existe pas"], 404);
        else
          return response([ $produit], 200)->json($produit);
    }

    //afficher tout les produits
    public function index()
    {
        $produit = produit::all();
        return response()->json($produit);

    }
    /**
     * Store a newly created resource in storage.
     */
    //enregistrer le produit dans la table produit
    public function store(Request $request)
    {

        $validator = $request->validate([
            'id_produit' => ['required','int'],
            'nom' => ['required'],
            'type' => ['required'],
            'prix' => ['required'],
            'image' =>['required'],
            'description' => ['required'],
            'id' => ['required', 'int'],

        ]);

       $validorder = produit::create($validator);
       return response($validorder)->json($validorder);
    }
    //mise a jour d'un produit
    public function update(Request $request)
        {

            $validatedcommande = $request->validate([
                'id_produit' => ['required','int'],
                'nom' => ['required'],
                'type' => ['required'],
                'prix' => ['required'],
                'image' =>['required'],
                'description' => ['required'],
                'id' => ['required', 'int'],

            ]);
            $product = produit::find($request->id_produit);
            if($product->id != $validatedcommande['id_produit'])
            {
            return response(['message' => 'Impossible de terminer loperation!'],403);
            }
            $product->nom= $request['nom'] ;
            $product->type= $request['type'];
            $product->prix= $request['prix'];
            $product->description= $request['description'];

            $product->save();


            return response( ['produit mise a jour!'], 200);
        }

        //supprimer un produit
        public function destroy(Request $request)
    {
        $Deletedproduct = produit::find($request->id_product);
        $Deletedproduct->delete();
            return response('Le produit est supprimé!', 200);
    }
}
