<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factures = Facture::all();
        return response(["factures" => $factures], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'id_facture' => ['required','int'],
            'etat' => ['required'],
            'date' => ['required'],
            'tva' => ['required'],

        ]);

       $validatedfacture= Facture::create($validator);
       return response($validatedfacture);
    }
    public function update(Request $request)
        {

            $validatedfacture = $request->validate([
                'id_produit' => ['required','int'],
                'etat' => ['required'],
                'date' => ['required'],
                'tva' => ['required']

            ]);
            $Facture = Facture::find($request->id_facture);
            if($Facture->id != $validatedfacture['id_produit'])
            {
            return response(['message' => 'Impossible de terminer loperation!'],403);
            }
            $Facture->id_facture= $request['id_facture'] ;
            $Facture->etat= $request['etat'];
            $Facture->date= $request['date'];
            $Facture->tva= $request['tva'];
            $Facture->save();


            return response( ['produit mise a jour!'], 200);
        }

        public function destroy(Request $request)
    {
        $Deletedfacture = Facture::find($request->id_facture);
        $Deletedfacture->delete();
            return response('La facture est supprimé!', 200);
    }
}
