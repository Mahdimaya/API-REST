<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ligne_de_cart extends Model
{
    use HasFactory;
    protected $fillable = [
       "id_produit"  , "qte" , "attribute1"
    ];
    public function produits(){
        return $this->hasMany(Produit::class,'id');
    }


}


