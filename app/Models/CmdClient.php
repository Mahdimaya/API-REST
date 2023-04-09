<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmdClient extends Model
{
    use HasFactory;
    protected $fillable = [
        "nom" , "prenom" , "date_de_naissance" , "adresse" , "numero" , "email" , "produit","etat_de_la_commande"
    ];
}
