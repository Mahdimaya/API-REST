<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Hash;

class UserController extends Controller
{
    public function inscription(Request $request)
    {
       $UserDonnées = $request->validate([
        "numero" => ["required", "int"],
        "otp_code" => ["required", "int","unique:users,numero",]
       ]);
       $utilisateur = user::create([
        "numero" => $UserDonnées["numero"],
        "otp_code" => $UserDonnées["otp_code"]
       ]);
       return response($utilisateur , 201);
    }





    public function connexion(Request $request){
        $UserDonnées = $request->validate([
            "numero" => ["required", "int"],
            "otp_code" => ["required", "int","unique:users,numero",]
           ]);
           $utilisateur = user::where("numero", $UserDonnées["numero"])->first();
           if(!$utilisateur){return response("error user introuvable, 401");}
           return $utilisateur ;
           if (!Hash::check($UserDonnées['otp_code'], $utilisateur->otp_code)) {
            return response('Mot de passe incorrect', 401);}
           $token = $utilisateur -> createtoken("CLE_SECRET")->PlainTextToken;
           return response([
            "utilisateur"=>$utilisateur,
            "token"=>$token
           ], 200 );





    }















    }
