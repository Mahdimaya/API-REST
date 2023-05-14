<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
       "id"  , "status" , "date"
    ];
    public function produits(){
        return $this->hasMany(Produit::class,'id');
    }


}


