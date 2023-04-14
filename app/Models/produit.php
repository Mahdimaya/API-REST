<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_produit"  , "prix" , "nom", "photo","description" , "qte stock"
     ];
    public function ligne_de_cart(){
        return $this->belongsTo(produit::class , 'id_produit');
    }
}
