<?php


namespace App\Http\Controllers;
use App\Models\ligne_de_cart;
use App\Models\produit;
use Illuminate\Http\Request;

class ligne_de_cartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
    $produits = $produits = Produit::with('ligne_de_cart')
    ->whereHas('ligne_de_cart', function ($query) use ($id) {
        $query->where('id_produit', '=', $id);
    })
    ->get();


    return response(["Contenu de la ligne de commande est :" => $produits], 200);
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ligne = new ligne_de_cart;
        $ligne->id = $request->id;
        $ligne->nom = $request->nom;
        $ligne->prix = $request->prix;
        $ligne->qte = $request->qte;
        $ligne->description = $request->description;
        $ligne->attribute1 = $request->attribute1;
        $ligne->id_product = $request->id_product;

        $ligne->save();
            return response(["La ligne de panier a été créée avec succès" => $ligne], 201);
        }


    public function update(Request $request)
        {

            $validatedcommande = $request->validate([
                'id' => ['required'],
                'nom' => ['required'],
                'prix' => ['required'],
                'qte' => ['required'],
                'description' => ['required'],
                'attribute1' => ['required'],
                'id_produit' => ['required'],
            ]);
            $produit = ligne_de_cart::find($request->id_produit);
            if($produit->id != $validatedcommande['id_produit'])
            {
            return response(['message' => 'Impossible de terminer loperation!'],403);
            }
            $produit->id= $request['id'];
            $produit->nom= $request['nom'];
            $produit->prix= $request['prix'];
            $produit->qte= $request['qte'];
            $produit->description= $request['description'];
            $produit->attribute1= $request['attribute1'];
            $produit->id_produit= $request['id_produit'];
            $produit->save();

            return response( ['Cart mise a jour!'], 200);
        }

        public function destroy(Request $request)
    {
        $Deletedproduct = ligne_de_cart::find($request->id);
        $Deletedproduct->delete();
            return response('ligne de cart(produit) est supprimé!', 200);
    }
}
