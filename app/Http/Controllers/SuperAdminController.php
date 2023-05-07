<?php

namespace App\Http\Controllers;

use App\Models\Super_Admin;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $SupAdmin = Super_Admin::all();
        return response(["Les super admins existant sont" => $SupAdmin], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = $request->validate([
            'id' => ['required','int'],
            'nom' => ['required'],
            'prenom' => ['required'],
            'email' => ['required'],
            'num_tel' => ['required'],
            'mot_de_passe' => ['required']
        ]);

       $validSupadmin = Super_Admin::create($validator);
       return response($validSupadmin);
    }
    public function update(Request $request)
        {

            $validatedAdmin = $request->validate([
                'id' => ['required','int'],
                'nom' => ['required'],
                'prenom' => ['required'],
                'email' => ['required'],
                'num_tel' => ['required'],
                'mot_de_passe' => ['required']

            ]);
            $Admin = Super_Admin::find($request->id);
            if($Admin->id != $validatedAdmin['id'])
            {
            return response(['message' => 'Impossible de terminer loperation!'],403);
            }

            $Admin->nom= $request['nom'] ;
            $Admin->prenom= $request['prenom'];
            $Admin->email= $request['email'];
            $Admin->num_tel= $request['num_tel'];
            $Admin->mot_de_passe= $request['mot_de_passe'];
            $Admin->save();


            return response( ['Admin mise a jour!'], 200);
        }

        public function destroy(Request $request)
    {
        $DeletedAdmin = Super_Admin::find($request->id);
        $DeletedAdmin->delete();
            return response('Le SuperAdmin est supprimé!', 200);
    }
}
