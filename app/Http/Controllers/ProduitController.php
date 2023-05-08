<?php

namespace App\Http\Controllers;

use App\Models\ligne_de_cart;
use App\Models\produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id_produit)
    {
        $produit = produit::where('id_produit', $id_produit)->first();
        if(!$produit || $produit->id_produit != $id_produit)
          return response(["Error, le produit n'existe pas"], 404);
        else
          return response([ $produit], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'id_produit' => ['required','int'],
            'nom' => ['required'],
            'prix' => ['required'],
            'description' => ['required'],

        ]);

       $validorder = produit::create($validator);
       return response($validorder);
    }
    public function update(Request $request)
        {

            $validatedcommande = $request->validate([
                'id_produit' => ['required','int'],
                'nom' => ['required'],
                'prix' => ['required'],
                'description' => ['required']

            ]);
            $product = produit::find($request->id_product);
            if($product->id != $validatedcommande['id_produit'])
            {
            return response(['message' => 'Impossible de terminer loperation!'],403);
            }
            $product->nom= $request['nom'] ;
            $product->prix= $request['prix'];
            $product->save();
            $product1 = ligne_de_cart::find($request->id_produit);
            $product1->image= $request['image'];
            $product1->save();


            return response( ['produit mise a jour!'], 200);
        }

        public function destroy(Request $request)
    {
        $Deletedproduct = produit::find($request->id_product);
        $Deletedproduct->delete();
            return response('Le produit est supprimé!', 200);
    }
}
