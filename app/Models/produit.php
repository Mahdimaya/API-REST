<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_produit"  , "nom", "type", "prix", "image", "description" , "id"
     ];
    public function ligne_de_cart(){
        return $this->belongsTo(produit::class , 'id_produit');
    }
}
